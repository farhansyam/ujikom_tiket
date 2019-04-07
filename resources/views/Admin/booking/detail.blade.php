@extends('layouts.app')
@section('content')
    @if ($transaksi->status == 1)
        <h1>Sudah Verifikasi</h1>
        <img src="{{asset('storage/images/'.$transaksi->receipt)}}" alt="">
     @elseif($transaksi->status == 2) 
        <h1>Tiket Sudah D kirim</h1> 
      @else
      <h1>Belum Bayar Atau Belum Verifikasi</h1>   
    @endif
@endsection