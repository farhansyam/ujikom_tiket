@extends('layouts.app')

  @section('content')
    @push('scripts')
      <script language="JavaScript">
        function bukajendela(url) {
         window.open(url, "window_baru", "width=800,height=500,left=120,top=10,resizable=1,scrollbars=1");
        }
        </script>
    @endpush
      <div class="container">
          <div class="row">
              <div class="col-md-8 col-md-offset-2">
                  <ul class="breadcrumb">
                    <li class="active">Admin</li>
                    <li class="active">Jadwal Pesawat</li>

                  </ul>
                  <div class="panel panel-default">
                      <div class="panel-heading">Kelola Jadwal Penerbangan</div>

                      <div class="panel-body">

                          <div class="table-responsive">
                          <a href="{{url('admin/schedule_plane/create')}}"><button type="button" name="button" class="btn btn-primary">Tambah Jadwal</button></a>
                          <div align="right">
                         Pencarian
                          <input type="text" v-bind:style="{width: '20%' }" v-model="pencarian" class="form-control" />
                          </div>
                          <table class="table" border="0" width="200">
                            <thead>
                              <tr>
                                <td>No</td>
                                <td>Asal</td>
                                <td>Tujuan</td>
                                <td>Jadwal Penerbangan</td>
                                <td>Option</td>
                              </tr>
                              @foreach ($schedule as $data)
                                  <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$data->from}}</td>
                                    <td>{{$data->destination}}</td>
                                    <td>{{$data->boarding_time}}</td>
                                    <td>
                                      <form class="" action="{{url('admin/schedule_plane')}}/{{$data->id}}" method="post">
                                        <input type="hidden" name="_method" value="DELETE">
                                            <button type="submit" name="button" class="btn btn-oren btn btn-sm"> <i class="fa fa-trash"></i> </button>
                                            <a href="{{url('admin/schedule_plane')}}/{{$data->id}}/edit" style="text-decoration:none"> <button type="button" name="button" class="btn btn-hijau btn btn-sm"><i class="fa fa-edit"></i></button>  </a>
                                             <button type="button" name="button" class="btn btn-biru btn btn-sm" onclick="bukajendela('{{url('admin/schedule_plane')}}/{{$data->id}}')"><i class="fa fa-eye"></i>
                                        @csrf
                                      </form>
                                    </td>
                                  </tr>
                              @endforeach
                            </thead>
                          </table>
                         </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>

    {{-- </div> --}}

  @endsection
