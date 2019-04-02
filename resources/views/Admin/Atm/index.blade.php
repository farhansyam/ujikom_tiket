@extends('layouts.app')

  @section('content')

      <div class="container">
            <div class="row">
              <div class="col-md-8 col-md-offset-2">
                  <ul class="breadcrumb">
                    <li class="active">Admin</li>
                    <li class="active">Atm</li>
                  </ul>
                  <div class="panel panel-default">
                      <div class="panel-heading">
                      Account Atm
                      </div>

                      <div class="panel-body">

                          <div class="table-responsive">
                            <a href="{{url('admin/atm/create')}}" class="btn btn-primary">Tambah Atm</a>
                          <div align="right">
                         Pencarian
                          <input type="text" v-bind:style="{width: '20%' }" v-model="pencarian" class="form-control" />
                          </div>

                              <table class="table" border="0" width="200">
                                <thead>
                                  <tr>
                                      <th>No.</th>
                                      <th>Nama</th>
                                      <th>No Rekening</th>
                                      <th>Bank  </th>
                                      <th>Aksi</th>
                                  </tr>
                                  </thead>
                                  <tbody>
                                  @foreach($atms as $data)
                                      <tr>
                                          <td>{{ $loop->iteration }}</td>
                                          <td>{{ $data->account_name }}</td>
                                          <td>{{ $data->account_number }}</td>
                                          <td>{{ $data->bank }}</td>
                                          <td>
                                              <form action="{{ url('admin/atm', $data->id) }}" method="post">
                                                  {{ csrf_field() }}
                                                  {{ method_field('delete') }}
                                                  <a href="{{ url('admin/atm/'.$data->id.'/edit') }}" class=" btn btn-sm btn-hijau fa fa-edit"></a>
                                                  <button class="btn btn-sm btn-oren fa fa-trash" type="submit" onclick="return confirm('Yakin ingin menghapus data?')"></button>
                                              </form>
                                          </td>
                                      </tr>
                                  @endforeach
                                </thead>
                              </table>
                              {{$atms->links()}}
                         </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>

    {{-- </div> --}}

  @endsection
