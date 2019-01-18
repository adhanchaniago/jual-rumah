@extends('layouts.Xenon.horizontal_menu')

@section('content')

<div class="panel panel-color panel-success">
	<div class="panel-heading">
		<h4>Upload Bukti Pembayaran Angsuran {{ $angsuran->order->rumah->perumahan->name }} {{ $angsuran->order->rumah->block }}/{{ $angsuran->order->rumah->number }}</h4>
	</div>

	<div class="panel-body">
		<form class="form-horizontal"  action="{{ route('user.angsuran.update', $angsuran->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

		<div class="form-group{{ $errors->has('perumahan_id') ? ' has-error' : '' }}"">
                <label for="total_payment" class="col-sm-2 control-label">Nominal</label>
                <div class="col-sm-10">
                  <input class="form-control" type="text" name="total_payment" id="total_payment" value="{{ $angsuran->total }}">
                  <input type="hidden" name="angsuran_kode" value="{{ $angsuran->kode }}">
                  @if ($errors->has('perumahan_id'))
                        <span class="help-block">
                            <strong>{{ $errors->first('perumahan_id') }}</strong>
                        </span>
                    @endif
                </div>
              </div> <!-- form-group -->
                <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}"">
                  <label for="description" class="col-sm-2 control-label">Keterangan</label>
                  <div class="col-sm-10">
                  <textarea name="description" class="form-control" cols="6" rows="6" rowid="field-7"></textarea>
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
                <input class="form-control" type="file" name="file" id="file" required>
                <input type="hidden" name="rumah_id" value="{{ $angsuran->order->rumah->id }}">
                @if ($errors->has('file'))
                        <span class="help-file">
                            <strong>{{ $errors->first('file') }}</strong>
                        </span>
                    @endif
                </div>
            </div> <!-- form-group -->
      </div>
      <hr>
				<button type="submit" class="btn btn-info"><i class="fa fa-upload"></i> Upload</button>
    </div>
	</div>
	
</div>

@endsection