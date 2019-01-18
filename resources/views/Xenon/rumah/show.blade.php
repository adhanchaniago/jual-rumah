@extends('layouts.Xenon.master')

@section('script')
<script>
function showMap() {
        var uluru = {lat: {{ $rumah->latitude }}, lng: {{$rumah->longitude}} };
        var map = new google.maps.Map(document.getElementById('kostMapLocation'), {
          zoom: 15,
          center: uluru
        });
        var marker = new google.maps.Marker({
          position: uluru,
          map: map
        });
        var contentString = "<div class='col-sm-12'><h4>{{$rumah->perumahan->name }} Blok. {{ $rumah->block }}/{{ $rumah->number}} </h4><p>{{ $rumah->perumahan->address }}</p><p class='text-success'>tersedia : {{ $rumah->harga }}</p></div>";

        var infoWindow = new google.maps.InfoWindow({
          content: contentString,
          maxWidth: 200
        });

        marker.addListener('click',function(){
          infoWindow.open(map, marker);
        });

        infoWindow.open(map,marker);
      }

</script>

<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDVHgvRIsfyRFZncJe1GDq5c9oOBtyVa6s&callback=showMap">
</script>
@endsection

@section('content')
<div class="col-md-12">
    <div class="page-title">
    
        <div class="title-env">
          <h1 class="title">{{ $rumah->perumahan->name }}</h1>
          <p class="description">{{$rumah->perumahan->name }} Blok. {{ $rumah->block }}/{{ $rumah->number}} {{ $rumah->perumahan->address }}</p>
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
                      <a target="blank" href="{{ $photo->getUrl() }}" class="thumb" data-action="edit">
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

              <div class="col-md-12">
              <div class="panel panel-success panel-color">
                <div class="panel-heading">
                  <h5>Lokasi Perumahan</h5>
                </div>
                <div class="panel-body">
                  <div id="kostMapLocation" style="width: 100%;height: 400px"></div>
                </div>
              </div>
            </div>
        
              <div class="col-sm-2"></div>
              <div class="col-sm-10">
                <div id="kostMapLocation" style="width: 100%;height: 400px"></div>
              </div>
        
            </div>
        
            <!-- Gallery Sidebar -->
            <div class="col-sm-3 gallery-left">
        
              <div class="gallery-sidebar">

                  <a href="#" onclick="jQuery('#modal-2').modal('show');" class="btn btn-block btn-secondary btn-icon btn-icon-standalone btn-icon-standalone-right">
                      <i class="fa fa-upload"></i>
                      <span>Upload Photo</span>
                  </a>
                    @include('Xenon.rumah.upload_modal')
        
                <div class="panel panel-default">
                  {{ $rumah->description }}
                </div>
        
              </div>
        
            </div>
        
          </div>
        
        </section>
          
</div>
@endsection