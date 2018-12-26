@extends('layouts.Xenon.master')

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
                <th>#</th>
              </tr>
            </thead>
            
            <tbody>
              @foreach ($orders as $order)
                  <tr>
                    <td>
                        <a href="#" onclick="jQuery('#modalPayment-{{ $order->id }}').modal('show');" class="btn btn-icon btn-blue btn-xs">{{ $order->code }}</a>
                        @include('Xenon.administrator.order.payment_modal')
                    </td>
                    <td><a href="{{ asset($order->getFirstMediaUrl('photo')) }}">{{ $order->code }}</a></td>
                    <td>{{ $order->rumah->perumahan->name }}</td>
                    <td>{{ $order->valid_until }}</td>
                    <td>{{ $order->confirmed ? 'Sudah Konfirmasi':'Belum Konfirmasi' }}</td>
                    <td>{{ $order->rejected ? 'Telah Dibatalkan':'Status Valid' }}</td>
                    <td>{{ $order->total }}</td>
                    <td>
                        @if (!$order->confirmed && !$order->rejected)
                        <a class="btn btn-xs btn-blue" href="#" onclick="event.preventDefault(); document.getElementById('verify-payment').submit();">
                            <i class="fa fa-check"></i> terima
                          </a>
                        
                          <form id="verify-payment" action="{{ route('admin.verify.payment') }}" method="POST" style="display: none;">
                            @csrf
                            <input type="hidden" name="code" value="{{ $order->code }}">
                          </form>

                          <a class="btn btn-xs btn-red" href="#" onclick="event.preventDefault(); document.getElementById('reject-payment').submit();">
                              <i class="fa fa-remove"></i> tolak
                            </a>
                          
                            <form id="reject-payment" action="{{ route('admin.reject.payment') }}" method="POST" style="display: none;">
                              @csrf
                              <input type="hidden" name="code" value="{{ $order->code }}">
                            </form>
                        @endif
                    </td>
                  </tr>
              @endforeach
            </tbody>
          </table>
    </div>
  </div>
@endsection