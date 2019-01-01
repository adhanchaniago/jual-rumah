@extends('layouts.Xenon.master')

@section('content')
    <div class="col-md-12">
      <div class="panel panel-color {{ $order->confirmed ? 'panel-success': 'panel-danger' }}  ">
        <div class="panel-heading hidden-print`">
          <h4>Detail Order <b>{{ $order->code }}</b> {{ $order->rumah->perumahan->name }} {{ $order->rumah->block }}/{{$order->rumah->number}}</h4>
        </div>

        <div class="panel-body">
					
					<section class="invoice-env">
					
						<!-- Invoice header -->
						<div class="invoice-header">
							
							<!-- Invoice Options Buttons -->
							<div class="invoice-options hidden-print">
								<a href="#" class="btn btn-block btn-gray btn-icon btn-icon-standalone btn-icon-standalone-right text-left">
									<i class="fa-envelope-o"></i>
									<span>Send</span>
								</a>
								
								<a href="#" class="btn btn-block btn-secondary btn-icon btn-icon-standalone btn-icon-standalone-right btn-single text-left">
									<i class="fa-print"></i>
									<span>Print</span>
								</a>
							</div>
							
							<!-- Invoice Data Header -->
							<div class="invoice-logo">
							
								<a href="#" class="logo">
									Maxima Agent Property
								</a>
								
								<ul class="list-unstyled">
									<li class="upper">Order Code. <strong>#{{$order->code}}</strong></li>
									<li>{{$order->created_at->format('D d-m-Y')}}</li>
									<li>Batas Konfirmasi, {{$order->valid_until}}</li>
								</ul>
								
							</div>
							
						</div>
						
						
						<!-- Client and Payment Details -->
						<div class="invoice-details">
							
							<div class="invoice-client-info">
								<strong>Client</strong>
								
								<ul class="list-unstyled">
									<li>{{ $order->user->fullName }}</li>
								</ul>
								
								<ul class="list-unstyled">		
									<li>{{$order->user->email}} </li>
								</ul>
							</div>
							
							<div class="invoice-payment-info">
								<strong>Payment Details</strong>
								
								<ul class="list-unstyled">
									<li>BCA Reg #: <strong>542554(DEMO)78</strong></li>
									<li>Account Name: <strong>Maxima Agent Property</strong> </li>
									<li>SWIFT code: <strong>45454DEMO545DEMO</strong></li>
								</ul>
							</div>
							
						</div>
						
						
						<!-- Invoice Entries -->
						<table class="table table-bordered">
							<thead>
								<tr class="no-borders">
									<th class="text-center hidden-xs">#</th>
                  <th width="60%" class="text-center">Perumahan</th>
                  <th class="text-center hidden-xs">Konfirmasi</th>
                  <th class="text-center hidden-xs">Pembatalan</th>
									<th class="text-center">Total</th>
								</tr>
							</thead>
							
							<tbody>
								<tr>
									<td class="text-center hidden-xs">1</td>
									<td>
                    <b>{{ $order->rumah->perumahan->name }} Blok {{ $order->rumah->block }}/{{$order->rumah->number}}</b>
                  </td>
                  <td>{{ $order->confirmed ? 'Sudah Konfirmasi':'Belum Konfirmasi' }}</td>
                  <td>{{ $order->rejected ? 'Telah Dibatalkan':'Status Valid' }}</td>
									<td class="text-right text-primary text-bold">Rp. {{ number_format($order->total ,2,',','.')}}</td>
								</tr>
							</tbody>
						</table>
						
						<!-- Invoice Subtotals and Totals -->
						<div class="invoice-totals">
							
							<div class="invoice-subtotals-totals">
								<span>
									Sub - Total amount: 
									<strong>Rp. {{ number_format($order->total ,2,',','.')}}</strong>
								</span>
								
								<span>
									PPN: 
									<strong>10%</strong>
								</span>
								
								<hr />
								
								<span>
                  Grand Total:
                  @php
                      $grand_total = $order->total + $order->total * 0.1;
                  @endphp
									<strong>Rp. {{ number_format($grand_total ,2,',','.')}}</strong>
								</span>
							</div>
							
							<div class="invoice-bill-info">
								<address>
									Jl. Soekarno Hatta<br />
									Tanjungpinang Kepulauan Riau7<br /> 
									P: (234) 145-1810 <br />
									Maxima Agent Property <br />
									<a href="#">map.contact@email.com</a>
								</address>
							</div>
							
						</div>
						
					</section>
					
				</div>
      </div>
    </div>
@endsection