@extends('layouts.app')

  @section('content')

              <div class="col-md-12">
                  <ul class="breadcrumb">
                    <li class="active">Admin</li>
                    <li class="active">Stasiun</li>
                  </ul>
                  <div class="panel panel-default">
                      <div class="panel-heading">
                        Stasiun
                      </div>
                      <div class="panel-body">
                          <div class="table-responsive">
                            <a href="{{url('admin/station/create')}}" class="btn btn-primary">Tambah Stasiun</a>
                              <table class="table" border="0" width="200">
                                <thead>
                                  <tr>
                                      <th>No.</th>
                                      <th>Kode</th>
                                      <th>Nama Stasiun</th>
                                      <th>Kota  </th>
                                      <th>Aksi</th>
                                  </tr>
                                  </thead>
                                  <tbody>
                                  @foreach($station as $data)
                                      <tr>
                                          <td>{{ $loop->iteration }}</td>
                                          <td>{{ $data->code }}</td>
                                          <td>{{ $data->station_name }}</td>
                                          <td>{{ $data->city }}</td>
                                          <td>
                                              <form action="{{ url('admin/station', $data->id) }}" method="post">
                                                  {{ csrf_field() }}
                                                  <input type="hidden" name="_method" value="DELETE">
                                                  <a href="{{ url('admin/station/'.$data->id.'/edit') }}" class=" btn btn-sm btn-hijau"><i class="fa fa-edit"></i></a>
                                                  <button class="btn btn-sm btn-oren" type="submit" onclick="return confirm('Yakin ingin menghapus data?')"><i class="fa fa-trash"></i></button>
                                              </form>
                                          </td>
                                      </tr>
                                  @endforeach
                                </thead>
                              </table>
                              {{$station->links()}}
                         </div>
                      </div>
                  </div>
              </div>
  @endsection
