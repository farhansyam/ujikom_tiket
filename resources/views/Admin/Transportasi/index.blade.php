@extends('layouts.app')

  @section('content')

      <div class="container">
            <div class="row">
              <div class="col-md-8 col-md-offset-2">
                  <ul class="breadcrumb">
                    <li class="active">Admin</li>
                    <li class="active"><a href="{{url('admin/transportasi')}}">Transportasi</a></li>

                    @if (url()->current() == "http://localhost:8000/admin/transportasi/kereta")
                      <li class="active">
                      transportasi
                       Kereta
                      @elseif(url()->current() == "http://localhost:8000/admin/transportasi/pesawat")
                       Pesawat
                      @else
                      @endif
                    </li>
                  </ul>
                  <div class="panel panel-default">
                      <div class="panel-heading">Kelola   @if (url()->current() == "http://localhost:8000/admin/transportasi/kereta")
                         Kereta
                       @elseif(url()->current() == "http://localhost:8000/admin/transportasi/pesawat")
                       Pesawat
                      @else
                      transportasi
                      @endif
                      </div>

                      <div class="panel-body">

                          <div class="table-responsive">
                            @if (url()->current() == "http://localhost:8000/admin/transportasi/kereta")
                              <a href="{{url('admin/transportasi/create')}}" class="btn btn-primary">Tambah Kereta</a>
                            @elseif(url()->current() == "http://localhost:8000/admin/transportasi/pesawat")
                              <a href="{{url('admin/transportasi/create')}}" class="btn btn-primary">Tambah Pesawat</a>

                      @else
                              <a href="{{url('admin/transportasi/create')}}" class="btn btn-primary">Tambah Transporatsi</a>
                      @endif
                          <div align="right">
                         Pencarian
                          <input type="text" v-bind:style="{width: '20%' }" v-model="pencarian" class="form-control" />
                          </div>

                              <table class="table" border="0" width="200">
                                <thead>
                                  <tr>
                                    <td>ID</td>
                                    <td>Kode</td>
                                    <td>Jumlah Kursi</td>
                                    <td>Keterangan</td>
                                    <td>Tipe</td>
                                    <td>option</td>

                                  </tr>
                                  @php
                                    $i = 1;
                                  @endphp
                                  @foreach ($transportasi as $transport)
                                      <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$transport->kode}}</td>
                                        <td>{{$transport->jumlah_kursi}}</td>
                                        <td>{{$transport->keterangan}}</td>
                                        <td>{{$transport->id_type_transportasi}}</td>
                                        <td>
                                          <form class="" action="{{url('admin/transportasi')}}/{{$transport->id_transportasi}}" method="post">
                                            <input type="hidden" name="_method" value="DELETE">
                                                <button type="submit" name="button" class="btn btn-hijau"> <i class="fa fa-trash"></i> </button>
                                                <a href="{{url('admin/transportasi')}}/{{$transport->id_transportasi}}/edit"> <button href="asd" type="button" name="button" class="btn btn-biru"><i class="fa fa-pencil"></i></button>  </a>
                                            @csrf
                                          </form>
                                          <a href="{{url('admin/transportasi')}}/{{$transport->id_transportasi}}/edit"></a>
                                        </td>
                                      </tr>
                                  @endforeach
                                </thead>
                              </table>
                         </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>

    {{-- </div> --}}

  @endsection
