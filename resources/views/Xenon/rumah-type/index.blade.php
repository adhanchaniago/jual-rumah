@extends('layouts.Xenon.master')

@section('content')
<div class="col-md-12">
				
  <div class="panel panel-default">
    <d iv class="panel-heading">
      <h3 class="panel-title">{{ config('app.name') }} - <i class="linecons-shop"></i> Tipe Rumah</h3>
      
      <div class="panel-options">
        <a href="#">
          <i class="linecons-cog"></i>
        </a>
        
        <a href="#" data-toggle="panel">
          <span class="collapse-icon">&ndash;</span>
          <span class="expand-icon">+</span>
        </a>
        
        <a href="#" data-toggle="reload">
          <i class="fa-rotate-right"></i>
        </a>
        
        <a href="#" data-toggle="remove">
          &times;
        </a>
      </div>
    </d>
    
    <table class="table table-striped">
      <thead>
        <tr>
          <th>#</th>
          <th>Type</th>
          <th>Action</th>
        </tr>
      </thead>
      
      <tbody>
      @foreach ($rumahTypes as $type)
      <tr>
        <td style="width: 10px;">{{ $type->id }}</td>
        <td>{{ $type->type }}</td>
        <td width="20%">
            <!-- Modal Form Edit-->
            <a href="#" onclick="jQuery('#modalEdit-{{ $type->id }}').modal('show');" class="btn btn-icon btn-blue btn-xs"><i class="fa fa-edit"></i></a>
                @include('Xenon.rumah-type.edit_modal')
            </div>
            <form method="POST" action="{{ route('admin.type-rumah.destroy',$type->id) }}" accept-charset="UTF-8" style="display:inline">
                {{ method_field('DELETE') }}
                {{ csrf_field() }}
                <button type="submit" class="btn btn-icon btn-xs btn-red">
                  <i class="fa fa-remove"></i>
                </button>
            </form>
          </td>
      </tr>
      @endforeach
      </tbody>
    </table>
    <div class="vspacer v3"></div>
    <a href="#" onclick="jQuery('#modal-2').modal('show');" class="btn btn-info icon">
      <i class="linecons-shop"></i><span> Tambah Data</span>
    </a>
    @include('Xenon.rumah-type.create_modal')
  </div>
  
</div>
@endsection