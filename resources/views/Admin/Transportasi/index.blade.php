@extends('layouts.admin')
@section('content')

  <div class="container col-md-8">
<br><br>
      <a href="{{url('admin/transportasi/create')}}" class="btn">Tambah Transportasi</a>
      <a href="#" class="btn">Data Pesawat</a>
      <a href="#" class="btn">Rute</a>
<br><br>
      <table class="table" border="2">
        <thead>
          <tr>
            <td>ID</td>
            <td>Kode</td>
            <td>Jumlah Kursi</td>
            <td>Keterangan</td>
            <td>Tipe</td>
          </tr>
          @php
            $i = 1;
          @endphp
          @foreach ($transportasi as $transport)
              <tr>
                <td>{{$i++}}</td>
                <td>{{$transport->kode}}</td>
                <td>{{$transport->jumlah_kursi}}</td>
                <td>{{$transport->keterangan}}</td>
                <td>{{$transport->id_type_transportasi}}</td>
              </tr>
          @endforeach
        </thead>
      </table>
  </div>

@endsection
