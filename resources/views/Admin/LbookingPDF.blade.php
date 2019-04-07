<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Go Tiket </title>

      <style>
          
          table {
    border-collapse: collapse;
    border: 1px solid red;
    margin-bottom: 1em;
    width: auto;
}
 table thead tr td {
    background-color: #F0F0F0;
    border: 1px solid #DDDDDD;
    min-width: 0.6em;
    padding: 5px;
    text-align: left;
    vertical-align: top;
    font-weight: bold;
}
table tbody tr td {
    border: 1px solid #DDDDDD;
    min-width: 0.6em;
    padding: 5px;
    vertical-align: top;
}
tbody tr.even td {
    background-color: transparent;
}      tr:nth-child(even) {
  background-color: #f2f2f2
}
    </style>
</head>
<body>
    <div class="header">
        <h3>Laporan Booking Tiket</h3>
    </div>
        </table>
    </div>
    <div class="page">
        <table class="layout display responsive-table" border="0">
            <thead>
                <tr class="">
                    <th>#</th>
                    <th>Kode Booking</th>
                    <th>Atas Nama</th>
                    <th>Total</th>
                    <th>Tipe Transportasi</th>
                    <th>Asal</th>
                    <th>Tujuan</th>
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
                    <td>Rp {{ number_format($row->bill) }}</td>
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
        </table>
    </div>
</body>
</html>