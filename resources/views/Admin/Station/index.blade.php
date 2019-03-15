@extends('layouts.app')

  @section('content')

      <div class="container">
            <div class="row">
              <div class="col-md-8 col-md-offset-2">
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
                          <div align="right">
                         Pencarian
                          <input type="text" v-bind:style="{width: '20%' }" v-model="pencarian" class="form-control" />
                          </div>

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
                                              <form action="{{ url('admin/stasiun', $data->id) }}" method="post">
                                                  {{ csrf_field() }}
                                                  {{ method_field('delete') }}
                                                  <a href="{{ url('admin/stasiun/'.$data->id.'/edit') }}" class=" btn btn-sm btn-hijau fa fa-edit"></a>
                                                  <button class="btn btn-sm btn-oren fa fa-trash" type="submit" onclick="return confirm('Yakin ingin menghapus data?')"></button>
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
          </div>
      </div>

    {{-- </div> --}}

  @endsection
