@extends('layouts.admin')

@section('content')

  {{-- <div class="container col-md-8"> --}}
<br><br>
    <div class="container col-md-7">
      <table class="table" border="0" width="200">
        <thead>
          <tr>
            <td>No</td>
            <td>nama</td>
            <td>email</td>
            <td>alamat</td>
            <td>jk</td>
            <td>no tlpn</td>
            <td>tgl lahir</td>
            <td>Opsi</td>
          </tr>
          @php
            $i = 1;
          @endphp
          @foreach ($users as $user)
              <tr>
                <td>{{$i++}}</td>
                <td>{{$user->nama}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->alamat}}</td>
                <td>{{$user->jenis_kelamin}}</td>
                <td>{{$user->telfone}}</td>
                <td>{{$user->tanggal_lahir}}</td>
                <td>
                  <form class="" action="{{url('admin/rute')}}/{{$user->id_rute}}" method="post">
                    <input type="hidden" name="_method" value="DELETE">
                    @csrf
                    <input type="submit" name="" value="Hapus">
                  </form>
                  <a href="{{url('admin/rute')}}/{{$user->id_rute}}/edit">Edit</a>
                </td>
              </tr>
          @endforeach
        </thead>
      </table>
    </div>

  {{-- </div> --}}

@endsection
