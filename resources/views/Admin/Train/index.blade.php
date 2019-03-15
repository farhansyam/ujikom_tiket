@extends('layouts.app')

  @section('content')

      <div class="container">
            <div class="row">
              <div class="col-md-10 col-md-offset-1">
                  <ul class="breadcrumb">
                    <li class="active">Admin</li>
                    <li class="active">Train</li>
                  </ul>
                  <div class="panel panel-default">
                      <div class="panel-heading">
                        Kereta
                      </div>

                      <div class="panel-body">

                          <div class="table-responsive">
                            <a href="{{url('admin/train/create')}}" class="btn btn-primary">Tambah Kereta</a>
                          <div align="right">
                         Pencarian
                          <input type="text" v-bind:style="{width: '20%' }" v-model="pencarian" class="form-control" />
                          </div>

                              <table class="table" border="0" width="200">
                                <thead>
                                  <tr>
                                      <th>No.</th>
                                      <th>Nama Kerata</th>
                                      <th>Ekonomi</th>
                                      <th>Bisnis</th>
                                      <th>Exekutif</th>
                                      <th>/ Ekonomi</th>
                                      <th>/ Bisnis</th>
                                      <th>/ Exekutif</th>
                                      <th>Aksi</th>
                                  </tr>
                                  </thead>
                                  <tbody>
                                  @foreach($train as $data)
                                      <tr>
                                          <td>{{ $loop->iteration }}</td>
                                          <td>{{ $data->train_name }}</td>
                                          <td>{{ $data->eco_seat }}</td>
                                          <td>{{ $data->bus_seat }}</td>
                                          <td>{{ $data->exec_seat }}</td>
                                          <td>IDR {{ number_format($data->TrainFare['eco_seat'])}}</td>
                                          <td>IDR {{ number_format($data->TrainFare['bus_seat']) }}</td>
                                          <td>IDR {{ number_format($data->TrainFare['exec_seat']) }}</td>
                                          <td>
                                              <form action="{{ url('admin/train', $data->id) }}" method="post">
                                                  {{ csrf_field() }}
                                                  {{ method_field('delete') }}
                                                  <a href="{{ url('admin/train/'.$data->id.'/edit') }}" class=" btn btn-sm btn-hijau fa fa-edit"></a>
                                                  <button class="btn btn-sm btn-oren fa fa-trash" type="submit" onclick="return confirm('Yakin ingin menghapus data?')"></button>
                                              </form>
                                          </td>
                                      </tr>
                                  @endforeach
                                </thead>
                              </table>
                              {{$train->links()}}
                         </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>

    {{-- </div> --}}

  @endsection
