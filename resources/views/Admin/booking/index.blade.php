@extends('layouts.app')

  @section('content')

              <div class="col-md-12">
                  <ul class="breadcrumb">
                    <li class="active">Admin</li>
                    <li class="active">Booking</li>
                  </ul>
                  <div class="panel panel-default">
                      <div class="panel-heading">
                        Data Booking
                      </div>

                      <div class="panel-body">

                          <div class="table-responsive">

                              <table class="table" border="0" width="200">
                                <thead>
                                  <tr>
                                      <th>No.</th>
                                      <th>Atas Nama</th>
                                      <th>Kode Booking</th>
                                      <th>Transportasi</th>
                                      <th>Total</th>
                                      <th>Status</th>
                                      <th>Expire</th>
                                      <th>Opsi</th>

                                  </tr>
                                  </thead>
                                  <tbody>
                                  @foreach($booking as $data)
                                  <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $data->users->name }}</td>
                                    <td>{{ $data->booking_code }}</td>
                                    <td>{{ $data->vehicle }}</td>
                                    <td>{{ $data->bill }}</td>
                                    <td>@if($data->transaction->status == 0)
                                        <a style="background-color:red;color:white">Belum Bayar</a>
                                        @else
                                        <a style="background-color:greenyellow;color:white">Di Bayar</a>
                                        @endif
                                    </td>
                                          <td>{{ $data->expire }}</td>
                                          <td>
                                              <form action="{{ url('admin/booking', $data->id) }}" method="post">
                                                  {{ csrf_field() }}
                                                  {{ method_field('delete') }}
                                                  <button class="btn btn-sm btn-oren" type="submit" onclick="return confirm('Yakin ingin menghapus data?')"><i class="fa fa-trash"></i></button>
                                                  @if($data->transaction->status == 0)
                                                  <a href="{{ url('admin/booking/'.$data->id.'/edit') }}" class=" btn btn-sm btn-biru"><i class=" fa fa-check"></i></a>
                                                  @else
                                                  <a href="{{ url('admin/booking/'.$data->users->id.'/'.$data->users->email.'/'.$data->vehicle.'/tiket') }}" class=" btn btn-sm btn-hijau"><i class=" fa fa-ticket-alt"></i></a>
                                                  @endif
                                              </form>
                                          </td>
                                      </tr>
                                  @endforeach
                                </thead>
                              </table>
                              {{$booking->links()}}
                         </div>
                      </div>
                  </div>
              </div>


  @endsection
