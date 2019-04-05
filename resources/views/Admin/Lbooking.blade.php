
<table class="table card">
    <thead>
        <tr>
            <th>No</th>
            <th>Kode Booking</th>
            <th>Atas Nama</th>
            <th>Kendaraan</th>
            <th>BillSSSSS</th>
            <th>Asal</th>
            <th>Tujuan</th>
            <th>Tanggal</th>
        </tr>
    </thead>
    <tbody>
    @php $no = 1 @endphp
        @foreach ($bookings as $booking)
        <tr>
            <td>{{ $no++ }}</td>
            <td style="width:200px">{{ $booking->booking_code }}</td>
            <td>{{ $booking->users->name }}</td>
            <td>@if ($booking->vehicle == 'train')
                Kereta
              @else
              Pesawat  
            @endif</td>
            <td>IDR {{ number_format($booking->bill) }}</td>
            @if ($booking->vehicle == 'train')
                <td>{{ $booking->ScheduleT->from }}</td>
                <td>{{ $booking->ScheduleT->destination }}</td>
                @else
                <td>{{ $booking->ScheduleP->from }}</td>
                <td>{{ $booking->ScheduleP->destination }}</td>
                @endif
                <td>{{ $booking->created_at }}</td>

            </tr>
        @endforeach
    </tbody>
</table>