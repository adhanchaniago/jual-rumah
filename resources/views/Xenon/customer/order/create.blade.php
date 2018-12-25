@extends('layouts.Xenon.horizontal_menu')

@section('content')
<div class="col-md-12">
					
    <!-- Colored panel, remember to add "panel-color" before applying the color -->
    <div class="panel panel-color panel-info"><!-- Add class "collapsed" to minimize the panel -->
      <div class="panel-heading">
        <h3 class="panel-title">Detail Order</h3>
      </div>
      
      <div class="panel-body">
          <form class="form-horizontal"  action="{{ route('user.order.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('POST')
            
            <div class="form-group{{ $errors->has('perumahan_id') ? ' has-error' : '' }}"">
                <label for="perumahan_id" class="col-sm-2 control-label">Nama Perum.</label>
                <div class="col-sm-10">
                  <input class="form-control" type="text" name="name" id="name" value="{{ $rumah->perumahan->name }}">
                  <input type="hidden" name="rumah_id" value="{{ $rumah->id }}">
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
                  <input class="form-control" type="text" name="rumah_type_id" id="rumah_type_id" value="{{ $rumah->rumahType->type }}">
                  @if ($errors->has('address'))
                        <span class="help-block">
                            <strong>{{ $errors->first('address') }}</strong>
                        </span>
                    @endif
                </div>
              </div> <!-- form-group -->
              <div class="form-group{{ $errors->has('block') ? ' has-error' : '' }}"">
                  <label for="block" class="col-sm-2 control-label">Blok</label>
                  <div class="col-sm-10">
                  <input class="form-control" type="text" name="block" id="block" value="{{ $rumah->block }}">
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
                      <input class="form-control" type="text" name="number" id="number" value="{{ $rumah->number }}">
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
                        <input type="text" name="subsidi" id="subsidi" value="{{ $rumah->subsidi }}" class="form-control">
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
                    <input class="form-control" type="text" name="price" id="price" value="{{ $rumah->harga }}">
                    @if ($errors->has('price'))
                          <span class="help-block">
                              <strong>{{ $errors->first('price') }}</strong>
                          </span>
                      @endif
                  </div>
                </div> <!-- form-group -->
                <div class="form-group{{ $errors->has('total') ? ' has-error' : '' }}"">
                    <label for="total" class="col-sm-2 control-label">Booking Fee</label>
                    <div class="col-sm-10">
                      <input class="form-control" type="text" name="total" id="total" value="{{ $rumah->harga * 0.1 }}">
                      @if ($errors->has('total'))
                            <span class="help-block">
                                <strong>{{ $errors->first('total') }}</strong>
                            </span>
                        @endif
                    </div>
                  </div> <!-- form-group -->
                <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}"">
                  <label for="description" class="col-sm-2 control-label">Keterangan</label>
                  <div class="col-sm-10">
                  <textarea name="description" class="form-control" cols="6" rows="6" rowid="field-7">{{ $rumah->description }}</textarea>
                    @if ($errors->has('description'))
                          <span class="help-block">
                              <strong>{{ $errors->first('description') }}</strong>
                          </span>
                      @endif
                  </div>
                </div> <!-- form-group -->
            <div class="form-group{{ $errors->has('file') ? ' has-error' : '' }}"">
                <label for="file" class="col-sm-2 control-label">File</label>
                <div class="col-sm-10">
                <input class="form-control" type="file" name="file" id="file">
                <input type="hidden" name="rumah_id" value="{{ $rumah->id }}">
                @if ($errors->has('file'))
                        <span class="help-file">
                            <strong>{{ $errors->first('file') }}</strong>
                        </span>
                    @endif
                </div>
            </div> <!-- form-group -->
      </div>
      <hr>
				<button type="submit" class="btn btn-info"><i class="fa fa-money"></i> Order</button>
    </div>
    
  </div>
  </form>
@endsection