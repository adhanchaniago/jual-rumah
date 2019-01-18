@extends('layouts.Xenon.master')

@section('script')
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDVHgvRIsfyRFZncJe1GDq5c9oOBtyVa6s"></script>
<script src="{{ asset('js/jquery-gmaps-latlon-picker.js') }}"></script>
<script>
  if (navigator && navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(location) {
        if ( !$(".gllpLatlonPicker .gllpLatitude").val() || !$(".gllpLatlonPicker .gllpLongitude").val() ) {
            $(".gllpLatlonPicker .gllpLatitude").val(location.coords.latitude);
            $(".gllpLatlonPicker .gllpLongitude").val(location.coords.longitude);
            $(document).trigger("gllp_update_fields");
        }
    }, function() {});
  }
</script>
@endsection

@section('css')
<link href="{{ asset('Xenon/assets/css/jquery-gmaps-latlon-picker.css') }}" rel="stylesheet">
@endsection


@section('content')

<div class="col-md-12">
				
  <div class="panel panel-default">
    <div class="panel-heading">
      <h3 class="panel-title">{{ config('app.name') }} - <i class="linecons-shop"></i> Tambah Data Rumah</h3>
    </div>

    <div class="panel-body">
    	<form class="form-horizontal"  action="{{ route('admin.rumah.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('POST')

                <div class="form-group{{ $errors->has('perumahan_id') ? ' has-error' : '' }}"">
              <label for="perumahan_id" class="col-sm-2 control-label">Nama Perum.</label>
              <div class="col-sm-10">
                <select class="form-control" name="perumahan_id" id="perumahan_id">
                  @foreach ($listPerumahan as $perumahan)
                      <option value="{{ $perumahan->id }}">{{ $perumahan->name }}</option>
                  @endforeach
                </select>
                @if ($errors->has('perumahan_id'))
                      <span class="help-block">
                          <strong>{{ $errors->first('perumahan_id') }}</strong>
                      </span>
                  @endif
              </div>
            </div> <!-- form-group -->
            <div class="form-group{{ $errors->has('rumah_type_id') ? ' has-error' : '' }}"">
              <label for="rumah_type_id" class="col-sm-2 control-label">Tipe Rumah.</label>
              <div class="col-sm-10">
                <select class="form-control" name="rumah_type_id" id="rumah_type_id">
                    @foreach ($rumahType as $type)
                        <option value="{{ $type->id }}">{{ $type->type }}</option>
                    @endforeach
                  </select>
                @if ($errors->has('rumah_type_id'))
                      <span class="help-block">
                          <strong>{{ $errors->first('rumah_type_id') }}</strong>
                      </span>
                  @endif
              </div>
            </div> <!-- form-group -->
            <div class="form-group{{ $errors->has('block') ? ' has-error' : '' }}"">
                <label for="block" class="col-sm-2 control-label">Blok</label>
                <div class="col-sm-10">
                <input class="form-control" type="text" name="block" id="block">
                @if ($errors->has('block'))
                        <span class="help-block">
                            <strong>{{ $errors->first('block') }}</strong>
                        </span>
                    @endif
                </div>
            </div> <!-- form-group -->
            <div class="form-group{{ $errors->has('number') ? ' has-error' : '' }}"">
                    <label for="number" class="col-sm-2 control-label">Nomor</label>
                    <div class="col-sm-10">
                    <input class="form-control" type="text" name="number" id="number">
                    @if ($errors->has('number'))
                            <span class="help-block">
                                <strong>{{ $errors->first('number') }}</strong>
                            </span>
                        @endif
                    </div>
                </div> <!-- form-group -->
                <div class="form-group{{ $errors->has('subsidi') ? ' has-error' : '' }}"">
                    <label for="subsidi" class="col-sm-2 control-label">Subsidi</label>
                    <div class="col-sm-10">
                      <select name="subsidi" id="subsidi" class="form-control">
                        <option value="subsidi">Rumah Subsidi</option>
                        <option value="tidak">Rumah Tidak Subsidi</option>
                      </select>
                      @if ($errors->has('subsidi'))
                            <span class="help-block">
                                <strong>{{ $errors->first('subsidi') }}</strong>
                            </span>
                        @endif
                    </div>
                  </div> <!-- form-group -->
              <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}"">
                <label for="price" class="col-sm-2 control-label">Harga</label>
                <div class="col-sm-10">
                  <input class="form-control" type="text" name="price" id="price">
                  @if ($errors->has('price'))
                        <span class="help-block">
                            <strong>{{ $errors->first('price') }}</strong>
                        </span>
                    @endif
                </div>
            </div><!-- form-group -->


                  <div class="form-group">
                	<div class="col-sm-2"></div>
                	<div class="col-sm-10">
                		<div class="callout callout-info text-left">
                		<h4><i class="icon fa fa-info"></i> Pastikan Alamat Anda Sesuai.</h4>
		                <p>Lengkapi data alamat anda dengan map, agar pelanggan mudah menemukan kost anda!</p>
	              	</div>
                	</div>
                </div>

                <!-- google map -->
                <div class="gllpLatlonPicker">
                	<!-- form group -->
	                <div class="form-group">
	                	<label for="inputGeoName" class="col-sm-2 control-label">Lokasi Perumahan</label>

	                	<div class="col-sm-7">
      						    <input class="gllpSearchField gllpLocationName form-control" name="geoName" id="inputGeoName" placeholder="Masukan alamat/nama temoat (contoh : Batam)" type="text">
      						  </div>
      							<input type="button" class="gllpSearchButton btn btn-warning col-sm-2" value="search">
      					 </div><!-- form group 1 google map -->
                <!-- form group -->
                	<div class="form-group">

					<label for="" class="col-sm-2 control-label"></label>

						<div class="col-sm-10">
							<div class="gllpMap"></div>
						</div>

					</div><!-- form group 2 google map -->

					<!-- form group -->
					<div class="form-group">
						<label for="" class="col-sm-2 control-label"></label>

						<div class="col-sm-5">
							<span><b>Latitude</b></span>
							<input class="gllpLatitude form-control" name="latitude" type="text" required/>
						</div>
						<div class="col-sm-5">
							<span><b>Longitude</b></span>
							<input class="gllpLongitude form-control" name="longitude" type="text" required/>
							<input type="text" class="gllpZoom hidden" value="15"/>
						</div>
					</div><!-- form group 3 google maap -->
					<!-- form group -->
					<div class="form-group">
						<label for="" class="col-sm-2 control-label"></label>
						<div class="col-sm-5">
							<span><b>Subdistrict</b></span>
							<input class="gllSubdistrict form-control disabled" name="subdistrict" type="text" />
						</div>
						<div class="col-sm-5">
							<span><b>City/Region</b></span>
							<input class="gllCity form-control disabled" name="city" type="text" />
						</div>
					</div><!-- form group 4 google map -->
                </div><!-- end div google map -->

                <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}"">
                  <label for="description" class="col-sm-2 control-label">Deskripsi</label>
                  <div class="col-sm-10">
                    <textarea name="description" class="textarea" placeholder="Deskripsi Perumahan" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ old('description') }}</textarea>
                    @if ($errors->has('description'))
                          <span class="help-block">
                              <strong>{{ $errors->first('description') }}</strong>
                          </span>
                      @endif
                  </div>
                </div> <!-- form-group -->
    </div>
    
    <div class="vspacer v3"></div>
    <div class="panel-footer">
		<button type="submit" class="btn btn-info">Save changes</button>
	</div>
  </div>
  
</div>
</form>

@endsection