@extends('layouts.Xenon.horizontal_menu')

@section('content')
    <div class="panel panel-success panel-color">
      <div class="panel-heading">
        <h4>Semua Order</h4>
      </div>
      <div class="panel-body">
          <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Kode</th>
                  <th>Rumah</th>
                  <th>Valid Sampai</th>
                  <th>Konfirmasi</th>
                  <th>Pembatalan</th>
                  <th>Down Payment</th>
                </tr>
              </thead>
              
              <tbody>
                @foreach ($orders as $order)
                    <tr>
                      <td>{{ $order->id }}</td>
                      <td><a href="{{ $order->getFirstMediaUrl('photo') }}">{{ $order->code }}</a></td>
                      <td>{{ $order->rumah->perumahan->name }}</td>
                      <td>{{ $order->valid_until }}</td>
                      <td>{{ $order->confirmed ? 'Sudah Konfirmasi':'Belum Konfirmasi' }}</td>
                      <td>{{ $order->rejected ? 'Telah Dibatalkan':'Status Valid' }}</td>
                      <td>{{ $order->total }}</td>
                    </tr>
                @endforeach
              </tbody>
            </table>
      </div>
    </div>
@endsection