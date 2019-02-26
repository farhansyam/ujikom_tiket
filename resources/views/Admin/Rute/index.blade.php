@extends('layouts.admin')

@section('content')

  {{-- <div class="container col-md-8"> --}}
<br><br>
    <a href="{{url('admin/rute/create')}}" class="btn btn-primary">Tambah Rute</a>
<br><br>
    <div class="container col-md-7">
      <table class="table" border="0" width="200">
        <thead>
          <tr>
            <td>No</td>
            <td>Tujuan</td>
            <td>rute awal</td>
            <td>rute akhir</td>
            <td>harga</td>
            <td>transportasi</td>
            <td>Option</td>
          </tr>
          @php
            $i = 1;
          @endphp
          @foreach ($rutes as $rute)
              <tr>
                <td>{{$i++}}</td>
                <td>{{$rute->tujuan}}</td>
                <td>{{$rute->rute_awal}}</td>
                <td>{{$rute->rute_akhir}}</td>
                <td>{{$rute->harga}}</td>
                <td>{{$rute->id_transportasi}}</td>
                <td>
                  <form class="" action="{{url('admin/rute')}}/{{$rute->id_rute}}" method="post">
                    <input type="hidden" name="_method" value="DELETE">
                    @csrf
                    <input type="submit" name="" value="Hapus">
                  </form>
                  <a href="{{url('admin/rute')}}/{{$rute->id_rute}}/edit">Edit</a>
                </td>
              </tr>
          @endforeach
        </thead>
      </table>
    </div>

  {{-- </div> --}}

@endsection
