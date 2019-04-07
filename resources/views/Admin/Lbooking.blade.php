<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invoice #{{ $bookings }}</title>
</head>
<body>
    <div class="header">
        <h3>Laporan Go Tiket</h3>
        <p></p>
    </div>
    <div class="page">
        <table class="layout display responsive-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Kode Booking</th>
                    <th>Atas Nama</th>
                    <th>Tipe Transportasi</th>
                    <th>Total</th>
                    <th>Asal</th>
                    <th>Tujuan</th>
                    <th>Tanggal Booking</th>
                </tr>
            </thead>
            <tbody>
                @php 
                    $no = 1;
                    $total = 0;
                @endphp
                @forelse ($bookings as $row)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $row->booking_code }}</td>
                    <td>{{ $row->users->name }}</td>
                    @if ($row->vehicle == 'train')
                    <td>Kereta</td>
                    <td>{{ $row->scheduleT->from }}</td>
                    <td>{{ $row->scheduleT->destination }}</td>
                       @else
                       <td>Pesawat</td>
                       <td>{{ $row->scheduleP->from }}</td>
                       <td>{{ $row->scheduleP->destination }}</td>
                    @endif
                </tr>
​
                @empty
                <tr>
                    <td colspan="5" class="text-center">Tidak ada data</td>
                </tr>
                @endforelse
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="2" style="align:center"><strong>Total</strong></th>
                </tr>
            </tfoot>
        </table>
    </div>
</body>
</html>