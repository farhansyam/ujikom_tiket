@extends('layouts.app')

  @section('content')

      <div class="container">
            <div class="row">
              <div class="col-md-8 col-md-offset-2">
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

                              <table class="table" border="0" width="200">
                                <thead>
                                  <tr>
                                      <th>No.</th>
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
                                          <td>{{ $data->plane_name }}</td>
                                          <td>{{ $data->eco_seat }}</td>
                                          <td>{{ $data->bus_seat }}</td>
                                          <td>IDR {{ number_format($data->planefare['eco_seat'])}}</td>
                                          <td>IDR {{ number_format($data->planefare['bus_seat']) }}</td>
                                          <td>
                                              <form action="{{ url('admin/plane', $data->id) }}" method="post">
                                                  {{ csrf_field() }}
                                                  {{ method_field('delete') }}
                                                  <a href="{{ url('admin/plane/'.$data->id.'/edit') }}" class=" btn btn-sm btn-hijau fa fa-edit"></a>
                                                  <button class="btn btn-sm btn-oren fa fa-trash" type="submit" onclick="return confirm('Yakin ingin menghapus data?')"></button>
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
          </div>
      </div>

    {{-- </div> --}}

  @endsection
