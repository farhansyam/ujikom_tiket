<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Register At</th>
            <th>Booking Code</th>
            <th>Bill</th>
        </tr>
    </thead>
    <tbody>
    @php $no = 1 @endphp
    @foreach($penumpangs as $passanger)
        @foreach ($bookings as $booking)
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $passanger->name }}</td>
            <td>{{ $passanger->created_at }}</td>
            <td>{{ $booking->booking_code }}</td>
            <td>IDR {{ number_format($booking->bill) }}</td>
            </tr>
        @endforeach
    @endforeach
    </tbody>
</table>