@extends('layouts.admin')

@section('content')

  {{-- <div class="container col-md-8"> --}}
<br><br>
  @if (url()->current() == "http://localhost/ujikom_tiket/public/admin/transportasi/kereta")
    <a href="{{url('adin/transportasi/create')}}" class="btn btn-primary">Tambah Kereta</a>
  @else
    <a href="{{url('adin/transportasi/create')}}" class="btn btn-primary">Tambah Pesawat</a>
  @endif
<br><br>
    <div class="container col-md-7">
      <table class="table" border="0" width="200">
        <thead>
          <tr>
            <td>ID</td>
            <td>Kode</td>
            <td>Jumlah Kursi</td>
            <td>Keterangan</td>
            <td>Tipe</td>
            <td>option</td>

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
                <td>
                  <form class="" action="{{$transport->id_transportasi}}" method="post">
                    <input type="hidden" name="_method" value="DELETE">
                    @csrf
                    <input type="submit" name="" value="Hapus">
                  </form>
                  <a href="{{url('admin/transportasi')}}/{{$transport->id_transportasi}}/edit">Edit</a>
                </td>
              </tr>
          @endforeach
        </thead>
      </table>
    </div>

  {{-- </div> --}}

@endsection
