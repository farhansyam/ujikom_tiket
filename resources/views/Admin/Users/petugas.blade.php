@extends('layouts.app')
@section('content')
            <div class="col-md-12">
                <ul class="breadcrumb">
                  <li class="active">Admin</li>

                  <li class="active">Petugas</li>
                </ul>
                <div class="panel panel-default">
                    <div class="panel-heading">Kelola Petugas</div>

                    <div class="panel-body">

                        <div class="table-responsive">

                        <div align="right">
                       Pencarian
                        <input type="text" v-bind:style="{width: '20%' }" v-model="pencarian" class="form-control" />
                        </div>
                        <br>
                        <table class="table table-responsive table-bordered" border="0" width="200">
                          <thead>
                            <tr>
                              <td>No</td>
                              <td>nama</td>
                              <td>email</td>
                              <td>alamat</td>
                              <td>jk</td>
                              <td>no tlpn</td>
                              <td>tgl lahir</td>
                              <td>Opsi</td>
                            </tr>
                            @php
                              $i = 1;
                            @endphp
                            @foreach ($users as $user)
                                <tr>
                                  <td>{{$i++}}</td>
                                  <td>{{$user->name}}</td>
                                  <td>{{$user->email}}</td>
                                  <td>{{$user->alamat}}</td>
                                  <td>{{$user->jenis_kelamin}}</td>
                                  <td>{{$user->telfone}}</td>
                                  <td>{{$user->tanggal_lahir}}</td>
                                  <td>
                                    <form class="" action="{{url('admin/user')}}/{{$user->id}}" method="post">
                                      <input type="hidden" name="_method" value="DELETE">
                                      <a href="{{url('admin/user')}}/{{$user->id}}/edit"> <button href="asd" type="button" name="button" class="btn btn-hijau btn btn-sm"><i class="fa fa-edit"></i></button>  </a>
                                          <button type="submit" name="button" class="btn btn-oren btn btn-sm"> <i class="fa fa-trash"></i> </button>
                                      @csrf
                                    </form>
                                  </td>
                                </tr>
                            @endforeach
                          </thead>
                        </table>

                       </div>
                    </div>
                </div>
            </div>

  {{-- </div> --}}
@endsection
