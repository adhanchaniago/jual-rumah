<div class="modal fade custom-width" id="modal-2">
		<div class="modal-dialog" style="width: 60%;">
			<div class="modal-content">
				
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Create New Perumahan</h4>
				</div>
				
				<div class="modal-body">
					<form class="form-horizontal"  action="{{ route('admin.perumahan.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('POST')

                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}"">
                  <label for="name" class="col-sm-2 control-label">Nama Perum.</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" placeholder="Nama Perumahan">
                    @if ($errors->has('name'))
                          <span class="help-block">
                              <strong>{{ $errors->first('name') }}</strong>
                          </span>
                      @endif
                  </div>
                </div> <!-- form-group -->
                  <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}"">
                    <label for="address" class="col-sm-2 control-label">Alamat Perum.</label>
                    <div class="col-sm-10">
                      <textarea name="address" placeholder="Alamat Perumahan" style="width: 100%; height: 50px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ old('address') }}</textarea>
                      @if ($errors->has('address'))
                            <span class="help-block">
                                <strong>{{ $errors->first('address') }}</strong>
                            </span>
                        @endif
                    </div>
                  </div> <!-- form-group -->
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
				
				<div class="modal-footer">
					<button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-info">Save changes</button>
				</div>
			</div>
		</div>
	</div>
	</form>