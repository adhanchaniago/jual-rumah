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
                  <th>Perumahan</th>
                  <th>Kode Order</th>
                  <th>Kode angsuran</th>
                  <th>Jumlah</th>
                  <th>Dibayar</th>
                  <th>Tanggal Tempo</th>
                  <th>Tanggal Pembayaran</th>
                  <th>Status</th>
                  <th>#</th>
                </tr>
              </thead>
              
              <tbody>
                @foreach ($angsurans as $key => $angsuran)
                    <tr>
                      <td>{{ $key += 1 }}</td>
                      <td>
                      	<a href="{{route('rumah.show',$angsuran->order->rumah->id)}}">
	                      	{{ $angsuran->order->rumah->perumahan->name }}
	                      	{{ $angsuran->order->rumah->block }}/{{ $angsuran->order->rumah->number }}
                      	</a>
                      </td>
                      <td>
                      	<a href="{{ route('user.order.show', $angsuran->order->code ) }}">{{ $angsuran->order->code }}</a>
                      </td>
                      <td><a href="#">{{ $angsuran->kode }}</a></td>
                      <td>{{ $angsuran->total }}</td>
                      <td>{{ $angsuran->total_payment }}</td>
                      <td>{{ $angsuran->tanggal_tempo }}</td>
                      <td>{{ $angsuran->tanggal_bayar ? $angsuran->tanggal_bayar : 'Belum Dibayar' }}</td>
                      <td>
                      	@if($angsuran->paid && !$angsuran->verified)
                      		Menunggu Verifikasi
                      	@endif
                      	@if($angsuran->paid && $angsuran->verified)
                      		Sudah Verifikasi
                      	@endif
                      	@if(!$angsuran->paid && !$angsuran->verified)
                      		Belum Bayar
                      	@endif

                      </td>
                      <td>
                        <a href="{{ route('user.angsuran.create', $angsuran->kode) }}" class="btn btn-secondary {{ $angsuran->paid ? 'disabled' : '' }}"><i class="fa fa-money" ></i> Upload Pembayaran</a>
                      </td>
                    </tr>
                @endforeach
              </tbody>
            </table>
      </div>
    </div>
@endsection