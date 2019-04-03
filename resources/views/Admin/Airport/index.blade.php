@extends('layouts.app')

  @section('content')

              <div class="col-md-12">
                  <ul class="breadcrumb">
                    <li class="active">Admin</li>
                    <li class="active">Bandara</li>
                  </ul>
                  <div class="panel panel-default">
                      <div class="panel-heading">
                        Bandara
                      </div>

                      <div class="panel-body">

                          <div class="table-responsive">
                            <a href="{{url('admin/airport/create')}}" class="btn btn-primary">Tambah Bandara</a>
                              <table class="table" border="0" width="200">
                                <thead>
                                  <tr>
                                      <th>No.</th>
                                      <th>Kode</th>
                                      <th>Nama Bandara</th>
                                      <th>Kota  </th>
                                      <th>Aksi</th>
                                  </tr>
                                  </thead>
                                  <tbody>
                                  @foreach($airport as $data)
                                      <tr>
                                          <td>{{ $loop->iteration }}</td>
                                          <td>{{ $data->code }}</td>
                                          <td>{{ $data->airport_name }}</td>
                                          <td>{{ $data->city }}</td>
                                          <td>
                                              <form action="{{ url('admin/airport', $data->id) }}" method="post">
                                                  {{ csrf_field() }}
                                                  {{ method_field('delete') }}
                                                  <a href="{{ url('admin/airport/'.$data->id.'/edit') }}" class=" btn btn-sm btn-hijau"><i class="fa fa-edit"></i></a>
                                                  <button class="btn btn-sm btn-oren" type="submit" onclick="return confirm('Yakin ingin menghapus data?')"><i class="fa fa-trash"></i></button>
                                              </form>
                                          </td>
                                      </tr>
                                  @endforeach
                                </thead>
                              </table>
                              {{$airport->links()}}
                         </div>
                      </div>
                  </div>
              </div>
  @endsection
