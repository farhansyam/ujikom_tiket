@extends('layouts.app')
@section('content')
@if (Auth::user()->role == 3)
    <a href="{{url('admin/laporan/laporanExcel')}}" class="fa fa-file-excel" style="font-size:40px;color:#14ce14"></a>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="{{url('admin/laporan/laporanPDF')}}" class="fa fa-file-pdf" style="font-size:40px;color:#ff3636"></a>
@else
<a href="{{url('petugas/laporan/laporanExcel')}}" class="fa fa-file-excel" style="font-size:40px;color:#14ce14"></a>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="{{url('petugas/laporan/laporanPDF')}}" class="fa fa-file-pdf" style="font-size:40px;color:#ff3636"></a>

@endif
<br>
<table class="card table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Kode Booking</th>
                    <th>Atas Nama</th>
                    <th>Total</th>
                    <th>Tipe Transportasi</th>
                    <th>Asal</th>
                    <th>Tujuan</th>
                    <th>Tanggal</th>
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
                       <td>{{ $row->created_at }}</td>
                </tr>
​
                @empty
                <tr>
                    <td colspan="5" class="text-center">Tidak ada data</td>
                </tr>
                @endforelse
            </tbody>
        </table>
@endsection