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
                            <a href="{{url('admin/partner/create')}}" class="btn btn-primary">Tambah Partner</a>
                          <div align="right">
                         Pencarian
                          <input type="text" v-bind:style="{width: '20%' }" v-model="pencarian" class="form-control" />
                          </div>

                              <table class="table table-striped" border="0" width="200">
                                <thead>
                                  <tr>
                                      <th>No.</th>
                                      <th>Logo</th>
                                      <th>Nama</th>
                                      <th>Jenis</th>
                                      <th>Aksi</th>
                                  </tr>
                                  </thead>
                                  <tbody class="centered">
                                  @foreach($partners as $data)
                                      <tr>
                                          <td>{{ $loop->iteration }}</td>
                                          <td class="center"><img src="{{asset('storage/images/'.$data->logo)}}" height="100" width="100"></td>
                                          <td>{{ $data->nama }}</td>
                                          <td>@if($data->jenis == 1)
                                            Pesawat
                                            @else
                                            Kereta
                                            @endif
                                          </td>
                                          <td>
                                              <form class="" action="{{url('admin/partner')}}/{{$data->id}}" method="post">
                                                <input type="hidden" name="_method" value="DELETE">
                                      <a href="{{url('admin/partner')}}/{{$data->id}}/edit"> <button href="asd" type="button" name="button" class="btn btn-hijau btn btn-sm"><i class="fa fa-edit"></i></button>  </a>
                                      <button type="submit" name="button" class="btn btn-oren btn btn-sm"> <i class="fa fa-trash"></i> </button>
                                      @csrf
                                    </form>
                                          </td>
                                      </tr>
                                  @endforeach
                                </thead>
                              </table>
                              {{$partners->links()}}

                         </div>
                      </div>
                  </div>
              </div>

    {{-- </div> --}}

  @endsection
