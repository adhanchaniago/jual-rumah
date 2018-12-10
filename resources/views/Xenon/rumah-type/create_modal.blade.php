<div class="modal fade custom-width" id="modal-2">
		<div class="modal-dialog" style="width: 60%;">
			<div class="modal-content">
				
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Create New Role</h4>
				</div>
				
				<div class="modal-body">
					<form class="form-horizontal"  action="{{ route('admin.type-rumah.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('POST')

						<div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
                <label for="type" class="col-sm-2 control-label">Type</label>

                <div class="col-sm-10">
                  <input id="type" name="type" type="text" class="form-control" placeholder="Type Rumah" value="{{ old('type') }}" required>

                  @if ($errors->has('type'))
                      <span class="help-block">
                          <strong>{{ $errors->first('type') }}</strong>
                      </span>
                  @endif
                </div>
              </div>

				</div>
				
				<div class="modal-footer">
					<button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-info">Save changes</button>
				</div>
			</div>
		</div>
	</div>
	</form>