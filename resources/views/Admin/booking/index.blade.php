@extends('layouts.app')

  @section('content')

      <div class="container">
            <div class="row">
              <div class="col-md-8 col-md-offset-2">
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
                          <div align="right">
                         Pencarian
                          <input type="text" v-bind:style="{width: '20%' }" v-model="pencarian" class="form-control" />
                          </div>

                              <table class="table" border="0" width="200">
                                <thead>
                                  <tr>
                                      <th>No.</th>
                                      <th>Atas Nama</th>
                                      <th>Kode Booking</th>
                                      <th>Transportasi</th>
                                      <th>Total</th>
                                      <th>Expireb bdgwrwgt2ngaggggggqmagrh3wh6txuxkxlx; v</th>
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
                                          <td>{{ $data->expire }}</td>
                                          <td>
                                              <form action="{{ url('admin/airport', $data->id) }}" method="post">
                                                  {{ csrf_field() }}
                                                  {{ method_field('delete') }}
                                                  <a href="{{ url('admin/airport/'.$data->id.'/edit') }}" class=" btn btn-sm btn-hijau fa fa-edit"></a>
                                                  <button class="btn btn-sm btn-oren fa fa-trash" type="submit" onclick="return confirm('Yakin ingin menghapus data?')"></button>
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
          </div>
      </div>

    {{-- </div> --}}

  @endsection
