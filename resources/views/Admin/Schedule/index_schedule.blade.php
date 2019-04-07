@extends('layouts.app')
@section('content')
<div class="col-md-12">
  <ul class="breadcrumb">
                    <li class="active">Admin</li>
                    <li class="active">Jadwal Rute</li>
                  </ul>
</div>
   <div class="col-md-6">                 
                  <div class="panel panel-default">
                      <div class="panel-heading">Kelola Jadwal Kereta</div>
                      <div class="panel-body">
                          <div class="table-responsive">
                          <a href="{{url('admin/schedule_train/create')}}"><button type="button" name="button" class="btn btn-primary">Tambah Jadwal</button></a>
                          <table class="table" border="0" width="200">
                            <thead>
                              <tr>
                                <td>No</td>
                                <td>Asal</td>
                                <td>Tujuan</td>
                                <td>Jadwal Keberangkatan</td>
                                <td>Option</td>
                              </tr>
                              @foreach ($schedule1 as $data1)
                                  <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$data1->from}}</td>
                                    <td>{{$data1->destination}}</td>
                                    <td>{{$data1->boarding_time}}</td>
                                    <td>
                                      <form class="" action="{{url('admin/schedule_train')}}/{{$data1->id}}" method="post">
                                        <input type="hidden" name="_method" value="DELETE">
                                            <button type="submit" name="button" class="btn btn-oren btn btn-sm"> <i class="fa fa-trash"></i> </button>
                                            <a href="{{url('admin/schedule_train')}}/{{$data1->id}}/edit" style="text-decoration:none"> <button type="button" name="button" class="btn btn-hijau btn btn-sm"><i class="fa fa-edit"></i></button>  </a>
                                             <button type="button" name="button" class="btn btn-biru btn btn-sm" onclick="bukajendela('{{url('admin/schedule_train')}}/{{$data1->id}}')"><i class="fa fa-eye"></i>
                                        @csrf
                                      </form>
                                    </td>
                                  </tr>
                              @endforeach
                            </thead>
                          </table>
                          {{$schedule1->links()}}
                         </div>
                      </div>
                  </div>
              </div>
                @push('scripts')
      <script language="JavaScript">
        function bukajendela(url) {
         window.open(url, "window_baru", "width=800,height=500,left=120,top=10,resizable=1,scrollbars=1");
        }
        </script>
    @endpush
              <div class="col-md-6">
                  <div class="panel panel-default">
                      <div class="panel-heading">Kelola Jadwal Penerbangan</div>
                      <div class="panel-body">
                          <div class="table-responsive">
                          <a href="{{url('admin/schedule_plane/create')}}"><button type="button" name="button" class="btn btn-primary">Tambah Jadwal</button></a>
                          <table class="table" border="0" width="200">
                            <thead>
                              <tr>
                                <td>No</td>
                                <td>Asal</td>
                                <td>Tujuan</td>
                                <td>Jadwal Penerbangan</td>
                                <td>Option</td>
                              </tr>
                              @foreach ($schedule2 as $data2)
                                  <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$data2->from}}</td>
                                    <td>{{$data2->destination}}</td>
                                    <td>{{$data2->boarding_time}}</td>
                                    <td>
                                      <form class="" action="{{url('admin/schedule_plane')}}/{{$data2->id}}" method="post">
                                        <input type="hidden" name="_method" value="DELETE">
                                            <button type="submit" name="button" class="btn btn-oren btn btn-sm"> <i class="fa fa-trash"></i> </button>
                                            <a href="{{url('admin/schedule_plane')}}/{{$data2->id}}/edit" style="text-decoration:none"> <button type="button" name="button" class="btn btn-hijau btn btn-sm"><i class="fa fa-edit"></i></button>  </a>
                                             <button type="button" name="button" class="btn btn-biru btn btn-sm" onclick="bukajendela('{{url('admin/schedule_plane')}}/{{$data2->id}}')"><i class="fa fa-eye"></i>
                                        @csrf
                                      </form>
                                    </td>
                                  </tr>
                              @endforeach
                            </thead>
                          </table>
                          {{$schedule2->links()}}
                         </div>
                      </div>
                  </div>
              </div>

@endsection