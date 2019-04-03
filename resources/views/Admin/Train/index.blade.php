@extends('layouts.app')

  @section('content')

              <div class="col-md-12">
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
                              <table class="table" border="0" width="200">
                                <thead>
                                  <tr>
                                      <th>No.</th>
                                      <th>Partner</th>
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
                                          <td class="center"><img src="{{asset('storage/images/'.$data->Train->logo)}}" height="100" width="100"></td>
                                          <td>{{ $data->train_name }}</td>
                                          <td>{{ $data->eco_seat }}</td>
                                          <td>{{ $data->bus_seat }}</td>
                                          <td>{{ $data->exec_seat }}</td>
                                          <td>IDR {{ number_format($data->TrainFare['eco_seat'])}}</td>
                                          <td>IDR {{ number_format($data->TrainFare['bus_seat']) }}</td>
                                          <td>IDR {{ number_format($data->TrainFare['exec_seat']) }}</td>
                                          <td>
                                   <form class="" action="{{url('admin/train')}}/{{$data->id}}" method="post">
                                      <input type="hidden" name="_method" value="DELETE">
                                      <a href="{{url('admin/train')}}/{{$data->id}}/edit"> <button href="asd" type="button" name="button" class="btn btn-hijau btn btn-sm"><i class="fa fa-edit"></i></button>  </a>
                                      <button type="submit" name="button" class="btn btn-oren btn btn-sm"> <i class="fa fa-trash"></i> </button>
                                      @csrf
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

    {{-- </div> --}}

  @endsection
