<div class="modal fade custom-width" id="modalEdit-{{ $rumah->id}}">
		<div class="modal-dialog" style="width: 60%;">
			<div class="modal-content">
				
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Edit Data Perumahan</h4>
				</div>
				
				<div class="modal-body">
				<form class="form-horizontal"  action="{{ route('admin.rumah.update', $rumah->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')

        <form class="form-horizontal"  action="{{ route('admin.role.update',$rumah->id) }}" method="POST">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}
            <div class="form-group{{ $errors->has('perumahan_id') ? ' has-error' : '' }}"">
                <label for="perumahan_id" class="col-sm-2 control-label">Nama Perum.</label>
                <div class="col-sm-10">
                  <select class="form-control" name="perumahan_id" id="perumahan_id">
                    @foreach ($listPerumahan as $perumahan)
                        <option {{ $perumahan->id === $rumah->perumahan_id ? 'selected' : ''}} value="{{ $perumahan->id }}">{{ $perumahan->name }}</option>
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
                          <option {{ $type->id === $rumah->rumah_type_id ? 'selected' : ''}} value="{{ $type->id }}">{{ $type->type }}</option>
                      @endforeach
                    </select>
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
                    <input class="form-control" type="text" name="price" id="price" value="{{ $rumah->harga }}">
                    @if ($errors->has('price'))
                          <span class="help-block">
                              <strong>{{ $errors->first('price') }}</strong>
                          </span>
                      @endif
                  </div>
                </div> <!-- form-group -->
                <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}"">
                      <label for="description" class="col-sm-2 control-label">Keterangan</label>
                      <div class="col-sm-10">
                      <textarea name="description" class="form-control" cols="5" id="field-5">{{ $rumah->description }}</textarea>
                        @if ($errors->has('description'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('description') }}</strong>
                              </span>
                          @endif
                      </div>
                    </div> <!-- form-group -->
				</div>
				
				<div class="modal-footer">
					<button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-info">Save changes</button>
				</div>
			</div>
		</div>
	</div>
	</form>