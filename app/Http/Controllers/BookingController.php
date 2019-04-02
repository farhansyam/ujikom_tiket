<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;

use DB;
use PDF;
use Auth;
use Excel;
use App\Station;
use App\Booking;
use App\Airport;
use App\Passenger;
use Carbon\Carbon;
use App\BankAccount;
use App\Transaction;
use App\DetailBooking;


class BookingController extends Controller
{
    public function __construct()
    {
      $this->plane = "App\Plane";
      $this->planeFare = "App\PlaneFare";
      $this->planeSchedule = "App\PlaneSchedule";
      $this->train = "App\Train";
      $this->trainFare = "App\TrainFare";
      $this->trainSchedule = "App\TrainSchedule";
    }

    public function index()
    {
      $booking = Booking::with('users','transaction')->paginate(5);
      foreach($booking as $pas)
      // dd($pas->transaction->status);
      return view('admin.booking.index', compact('booking'));
    }
    public function edit($id)
    {
      $booking = Booking::with('transaction')->whereId($id)->first();
      $booking->transaction->update([
        'status' => 1
        ]);

       return redirect('admin/booking')->with('edit','s'); 

    }

    public function tiket($id,$email)
    {
      return view('Mails.tiket');
      // Mail::to($email)-send(new MailTiket);
    }

    public function destroy($id)
    {

      Booking::Destroy($id);
      return redirect('admin/booking')->with('delete','d');
    }

    public function search(Request $request)
    {

      $request['date'] = date('Y-m-d', strtotime($request->date));
      $request['dateB'] = date('Y-m-d', strtotime($request->dateB));
      if ($request->baby <= $request->adult){
        $vehicle = $request->vehicle;
        if ($vehicle == 'plane') {
          $total = [
            'baby' => $request->baby,
            'child'=> $request->child,
            'adult'=> $request->adult
          ];
        }elseif($vehicle == 'train'){
          $total = [
            'child'=> $request->child,
            'adult'=> $request->adult
          ];
        }
        $type = $request->type;
        $seat  = "";
        $model = "";
        //cek kendaraan
        if ($vehicle == 'plane'){
          $model = $this->planeSchedule;
        }elseif($vehicle == 'train'){
          $model = $this->trainSchedule;
        }
        //cek kursi
        if ($request->class == "Ekonomi") {
          $seat = 'eco_seat';
        }elseif($request->class == "Bisnis") {
          $seat = 'bus_seat';
        }elseif($request->class == "Eksekutif"){
          $seat = 'exec_seat';
        }
        //cek tipe
        if ($type == 'st'){
          $schedule = $model::findSchedule($request->from_code, $request->destination_code, $request->date, $seat, count($total));
          return view('user.booking.hasil_cari',compact('schedule','seat','vehicle','total'));
          // return $schedule;
        }elseif($type == 'rt'){
          $scheduleG = $model::findSchedule($request->from_code, $request->destination_code, $request->date, $seat, count($total));
          $scheduleB = $model::findSchedule($request->destination_code, $request->from_code, $request->dateB, $seat, count($total));
          // return $scheduleB;
          return view('booking.bookingRound', compact('scheduleG', 'scheduleB', 'vehicle','type','total', 'seat'));
        }else{
          abort(404);
        }
      }else{
        return redirect('')->withError('Bayi tidak boleh lebih dari dewasa');
      }
    }

    public function order(Request $request)
    {

      $model = "";
      $class = "";
      $vehicle = $request->vehicle;
      $id = [$request->go,$request->back];
      $fareTotal = 0;
      $bank = BankAccount::select('*')->get();
      $total = explode(',',$request->total);
      if ($vehicle == 'plane') {
        $totalCount = $total[0] + $total[1] + $total[2];
        $total = [
          'baby' => $total[0],
          'child'=> $total[1],
          'adult'=> $total[2]
        ];
      }elseif($vehicle == 'train'){
        $totalCount = $total[0] + $total[1];
        $total = [
          'child'=> $total[0],
          'adult'=> $total[1]
        ];
      }
      $seat = $request->seat;
      if ($seat == 'eco_seat') {
        $class = 'Ekonomi';
      }elseif($seat == 'bus_seat'){
        $class = 'Bisnis';
      }elseif($seat == 'first_seat'){
        $class = 'First Class';
      }elseif($seat == 'exec_seat'){
        $class = 'Eksekutif';
      }
      if ($vehicle == 'plane'){
        $model = $this->planeSchedule;
      }elseif($vehicle == 'train'){
        $model = $this->trainSchedule;
      }

      if (isset($id) && isset($seat)) {
        $schedule = $model::findWithPrice($id, $seat);
      }else{
        abort(404);
      }
      return view('user.booking.booking_fix', compact('schedule','vehicle', 'total', 'totalCount', 'seat', 'class', 'fareTotal', 'bank'));
    }

    public function fixOrder(Request $request)
    {
      if (Auth::check()) {
        $modelV = "";
        $modelF = "";
        $modelS = "";
        $vehicle = $request->vehicle;
        $id = $request->id;
        $userId = Auth::user()->id;
        $total = $request->totalCount;
        $seat = $request->seat;
        $date = Carbon::now();
        $expire = $date->addHours(8);

        if ($vehicle == 'plane'){
          $modelV = $this->plane;
          $modelF = $this->planeFare;
          $modelS = $this->planeSchedule;
        }elseif($vehicle == 'train'){
          $modelV = $this->train;
          $modelF = $this->trainFare;
          $modelS = $this->trainSchedule;
        }else{
          abort(404);
        }

        if (isset($id)) {
          $math = $modelS::seatMath($total, $seat, $id);
            DB::transaction(function() use ($modelS, $userId, $vehicle, $seat, $total, $expire, $request)
            {
              for ($i=0; $i < count($request->id); $i++) {
                $price = $modelS::findPrice($request->id[$i], $seat);
                  $booking = new Booking();
                  $booking->user_id = $userId;
                  $booking->booking_code = str_random(4);
                  $booking->vehicle = $vehicle;
                  $booking->bill = $price->$seat * $total + $price->unique_code;
                  $booking->schedule_id = $request->id[$i];
                  $booking->expire = $expire;
                  $booking->save();
                  //
                  $detbook = new DetailBooking;
                  $detbook->booking_id = $booking->id;
                  $detbook->passenger =  $total;
                  $detbook->class = $seat;
                  $detbook->save();
                  //
                  $transaction = new Transaction;
                  $transaction->booking_id = $booking->id;
                  $transaction->bank = $request->bank;
                  $transaction->save();
                  //
                  for ($j=0; $j < count($request->name); $j++) {
                  $passenger = new Passenger;
                  $passenger->detail_booking_id = $detbook->id;
                  $passenger->name = $request->name[$j];
                  $passenger->save();
                  }
                }
              });
              return redirect('my_order/'.Auth::user()->id);
        }else{
          abort(404);
        }
      }
    }

    public function payment(Request $request, $id)
    {
      $request->request->add(['status'=> 1]);
      $data = $this->validate($request,[
        'sender_name' => 'required',
        'ammount' => 'required|integer',
        'status' => 'required'
      ]);
      $booking = Booking::find($id);
      if ($booking->bill == $request->ammount) {
        Transaction::where('id', $id)->update($data);
        return redirect('user/booking/'.Auth::user()->id)->with('success', 'Pembayaran berhasil');
      }else{
        return back()->with('error', 'Jumlah uang tidak sesuai');
      }
    }

    public function export($type)
    {
        $data = Passenger::all();
        return Excel::create('passenger_'.date('d-m-Y'),function($excel) use ($data){
          $excel->sheet('test', function($sheet) use($data){
            $sheet->cell('A1', function($cell) {$cell->setValue('Nama');   });
              if (!empty($data)) {
                foreach ($data as $key => $value) {
                    $i= $key+2;
                    $sheet->cell('A'.$i, $value['name']);
                }
              }
          });
        })->download($type);
    }

    public function plane()
    {
        $airport = Airport::all();
        return view('user.plane',compact('airport'));
    }

    public function train()
    {
        $station = Station::all();
        return view('user.train',compact('station'));
    }
}
