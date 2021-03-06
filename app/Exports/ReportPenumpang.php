<?php
namespace App\Exports;

use App\Booking;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\Exportable;

class ReportPenumpang implements FromView, WithEvents, ShouldAutoSize
{
    use Exportable;
   

     public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
                //CELL TERKAIT AKAN DI-MERGE
                $event->sheet->mergeCells('A1:C1');
                $event->sheet->mergeCells('A2:B2');
                $event->sheet->mergeCells('A3:B3');

 
                //DEFINISIKAN STYLE UNTUK CELL
                $styleArray = [
                    'font' => [
                        'bold' => true,
                    ],
                    'alignment' => [
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                    ],
                    'borders' => [
                        'top' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                        ],
                    ],
                    'fill' => [
                        'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_GRADIENT_LINEAR,
                        'rotation' => 90,
                        'startColor' => [
                            'argb' => 'FFA0A0A0',
                        ],
                        'endColor' => [
                            'argb' => 'FFFFFFFF',
                        ],
                    ],
                ];
                //CELL TERAKAIT AKAN MENGGUNAKAN STYLE DARI $styleArray
                $event->sheet->getStyle('A9:H9')->applyFromArray($styleArray);

 
                //FORMATTING STYLE UNTUK CELL TERKAIT
                $headCustomer = [
                    'font' => [
                        'bold' => true,
                    ]
                ];
                $event->sheet->getStyle('A5:A7')->applyFromArray($headCustomer);
            },
        ];
    }
    public function view(): View
    {
        $bookings = Booking::with('users','scheduleT','scheduleP')->get();
        // dd($bookings);
        return view('admin.Lbooking',compact('bookings'));
    }
}
