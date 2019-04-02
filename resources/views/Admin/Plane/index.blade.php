@extends('layouts.app')

  @section('content')

              <div class="col-md-12">
                  <ul class="breadcrumb">
                    <li class="active">Admin</li>
                    <li class="active">Plane</li>
                  </ul>
                  <div class="panel panel-default">
                      <div class="panel-heading">
                        Pesawat
                      </div>

                      <div class="panel-body">

                          <div class="table-responsive">
                            <a href="{{url('admin/plane/create')}}" class="btn btn-primary">Tambah Pesawat</a>
                          <div align="right">
                         Pencarian
                          <input type="text" v-bind:style="{width: '20%' }" v-model="pencarian" class="form-control" />
                          </div>

                              <table class="table table-responsive table-striped" border="0" width="200">
                                <thead>
                                  <tr>
                                      <th>No.</th>
                                      <th>Maskapai</th>
                                      <th>Nama Pesawat</th>
                                      <th>Ekonomi</th>
                                      <th>Bisnis</th>
                                      <th>/ Ekonomi</th>
                                      <th>/ Bisnis</th>
                                      <th>Aksi</th>
                                  </tr>
                                  </thead>
                                  <tbody>
                                  @foreach($plane as $data)
                                      <tr>
                                          <td>{{ $loop->iteration }}</td>
                                          <td class="center"><img src="{{asset('storage/images/'.$data->Partner->logo)}}" height="100" width="100"></td>
                                          <td>{{ $data->plane_name }}</td>
                                          <td>{{ $data->eco_seat }}</td>
                                          <td>{{ $data->bus_seat }}</td>
                                          <td>IDR {{ number_format($data->planefare['eco_seat'])}}</td>
                                          <td>IDR {{ number_format($data->planefare['bus_seat']) }}</td>
                                          <td>
                                    <form class="" action="{{url('admin/plane')}}/{{$data->id}}" method="post">
                                      <input type="hidden" name="_method" value="DELETE">
                                      <a href="{{url('admin/plane')}}/{{$data->id}}/edit"> <button href="" type="button" name="button" class="btn btn-hijau btn btn-sm"><i class="fa fa-edit"></i></button>  </a>
                                      <button type="submit" name="button" class="btn btn-oren btn btn-sm"> <i class="fa fa-trash"></i> </button>
                                      @csrf
                                    </form>
                                          </td>
                                      </tr>
                                  @endforeach
                                </thead>
                              </table>
                              {{$plane->links()}}

                         </div>
                      </div>
                  </div>
              </div>

    {{-- </div> --}}

  @endsection
