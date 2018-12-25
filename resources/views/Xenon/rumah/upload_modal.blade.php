<div class="modal fade custom-width" id="modal-2">
		<div class="modal-dialog" style="width: 60%;">
			<div class="modal-content">
				
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Upload New Photo</h4>
            </div>
            
            <div class="modal-body">
            <form class="form-horizontal"  action="{{ route('admin.upload.photo') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('POST')
            
            <div class="form-group{{ $errors->has('file') ? ' has-error' : '' }}"">
                <label for="file" class="col-sm-2 control-label">Nama</label>
                <div class="col-sm-10">
                <input class="form-control" type="text" name="name" id="name">
                @if ($errors->has('name'))
                        <span class="help-name">
                            <strong>{{ $errors->first('name') }}</strong>
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
				
				<div class="modal-footer">
					<button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-info">Save changes</button>
				</div>
			</div>
		</div>
	</div>
	</form>