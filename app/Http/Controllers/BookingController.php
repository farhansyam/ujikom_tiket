<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;

use DB;
use Auth;
use Illuminate\Support\Facades\Mail;
use App\Station;
use App\Booking;
use App\Airport;
use App\Passenger;
use Carbon\Carbon;
use App\BankAccount;
use App\Transaction;
use App\DetailBooking;
use App\PlaneSchedule;
use App\TrainSchedule;
use App\Mail\MailTiket;

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

    public function tikettest()
    {
        $booking = Booking::whereUserId(4)->whereVehicle('plane')->first();
        $detail = DetailBooking::whereBookingId($booking->id)->first();
        $passenger = Passenger::whereDetailBookingId($detail->id)->get();
        return view('Mails.tiket',compact('booking','detail','passenger'));
    }

    public function index()
    {
      $booking = Booking::with('users','transaction')->paginate(5);
      return view('admin.booking.index', compact('booking'));
    }
    public function tiket($id,$email,$vehicle)
    {    
      
        $booking = Booking::whereUserId($id)->whereVehicle($vehicle)->first();
        if ($vehicle == 'plane') {
            $jadwalP = PlaneSchedule::whereId($booking->schedule_id)->with('plane')->first();
            $detail = DetailBooking::whereBookingId($booking->id)->first();
            $jadwalT = TrainSchedule::whereId(1)->first();
            Mail::to($email)->send(new MailTiket($booking,$detail,$jadwalP,$jadwalT));

          }
        else {
            $jadwalT = TrainSchedule::whereId($booking->schedule_id)->with('train')->first();
            $detail = DetailBooking::whereBookingId($booking->id)->first();
            $jadwalP = PlaneSchedule::whereId(1)->first();
            Mail::to($email)->send(new MailTiket($booking,$detail,$jadwalP,$jadwalT));
          }
    }

    public function destroy($id)
    {

      Booking::Destroy($id);
      return redirect('admin/booking')->with('delete','d');
    }

    public function edit($id)
    {
        $transaksi = Transaction::whereBookingId($id)->first();
        $transaksi->update([
            'status' => 2
        ]);

        return redirect('admin/booking')->with('edit','s');
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
          return view('user.booking.hasil_cari_2', compact('scheduleG', 'scheduleB', 'vehicle','type','total', 'seat'));
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
        $expire  = $date->addHours(8);

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

    public function verify()
    {
        return view('user.verifyPayment');
    }

    public function kirim(Request $request)
    {
            $nama = time().'.jpg';
            $request->file('gambar')->storeAs('public/images',$nama);

        $booking = Booking::whereBookingCode($request->booking_code)->first();
        $transaksi = Transaction::where('booking_id',$booking->id)->first();
        $transaksi->update([
          'receipt' => $nama,
          'status' => 2
        ]);
        return redirect('/paymentVerify')->with('kirim','s');
      }

     function check(Request $request)
    {
     if($request->get('booking_code'))
     {
      $code = $request->get('booking_code');
      $data = Booking::where('booking_code',$code)->count();
      if($data > 0)
      {
       echo 'unique';
      }
      else
      {
       echo 'not';
      }
     }
     else {
       echo "g ada";
     }
    }

    public function detail($id)
    {
      $booking = Booking::whereId($id)->first();
      $transaksi =Transaction::where('booking_id',$booking->id)->first();
      return view('admin.booking.detail',compact('transaksi'));
    }
}
