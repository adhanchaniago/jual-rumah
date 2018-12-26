@extends('layouts.Xenon.horizontal_menu')

@section('content')
<div class="page-title">
    
  <div class="title-env">
    <h1 class="title">{{ $rumah->perumahan->name }}</h1>
    <p class="description">{{$rumah->perumahan->name }} Blok. {{ $rumah->block }}/{{ $rumah->number}} {{ $rumah->perumahan->address }}</p>
  </div>
  <div class="col-md-4">
    <p>{{$rumah->perumahan->description }}</p>
  </div>
  
</div>

<section class="gallery-env">
			
    <div class="row">
  
      <!-- Gallery Album Optipns and Images -->
      <div class="col-sm-9 gallery-right">
  
        <!-- Album Header -->
        <div class="album-header">
          <h2>Rp. {{ number_format($rumah->harga ,2,',','.')}}</h2>
        </div>
  
        <!-- Sorting Information -->
        <div class="album-sorting-info">
          <div class="album-sorting-info-inner clearfix">
            <a href="#" class="btn btn-secondary btn-xs btn-single btn-icon btn-icon-standalone pull-right" data-action="sort">
              <i class="fa-save"></i>
              <span>Save Current Order</span>
            </a>
  
            <i class="fa-arrows-alt"></i>
            Drag images to sort them
          </div>
        </div>
  
        <!-- Album Images -->
        <div class="album-images row">
            @forelse ($rumah->getMedia('photo') as $photo)
            <!-- Album Image -->
            <div class="col-md-3 col-sm-4 col-xs-6">
                <div class="album-image">
                  <a target="blank" href="{{ asset($photo->getUrl()) }}" class="thumb" data-action="edit">
                    <img src="{{ asset($photo->getUrl()) }}" class="img-responsive" />
                  </a>
      
                  <a href="#" class="name">
                    <span>{{ $photo->name }}</span>
                    <em>{{ $photo->created_at->toFormattedDateString() }}</em>
                  </a>
                </div>
              </div>
            @empty
            <div class="col-md-12 col-sm-12 col-xs-12">
              <h5 class="text-center">
                Belum Ada Gambar
              </h5>
            </div>
            @endforelse
        </div>
  
  
        <button class="btn btn-white btn-block">
          <i class="fa-bars"></i>
          Load More Images
        </button>
  
      </div>
  
      <!-- Gallery Sidebar -->
      <div class="col-sm-3 gallery-left">
  
        <div class="gallery-sidebar">
          @if (auth()->check())
            <a href="{{ route('user.order.create', $rumah->id) }}" class="btn btn-block btn-secondary btn-icon btn-icon-standalone btn-icon-standalone-right">
                <i class="fa fa-upload"></i>
                <span>Order Sekarang</span>
            </a>

          @else
          <a href="{{ route('login') }}" type="submit" class="btn btn-block btn-primary btn-icon btn-icon-standalone btn-icon-standalone-right">
              <i class="linecons-user"></i>
              <span>Login Untuk Booking</span>
          </a>
          @endif

          <div class="panel panel-default">
            <p>{{ $rumah->description }}</p>
          </div>
  
        </div>
  
      </div>
  
    </div>
  
  </section>
    
@endsection