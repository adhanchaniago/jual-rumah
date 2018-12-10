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
            <a class="btn btn-xs btn-info" href="{{ route('admin.type-rumah.show',$type->id) }}">
                <span class="fa fa-info fa-fw"></span>
            </a>
            <a class="btn btn-xs btn-primary" data-toggle="modal" data-target="#roleModalEdit-{{ $type->id }}" href="#">
                <span class="fa fa-pencil fa-fw"></span>
            </a>
            <!-- Modal Form Edit-->
            <div class="modal fade" id="roleModalEdit-{{ $type->id }}" tabindex="-1" role="dialog" aria-labelledby="roleModalEdit-{{ $type->id }}">
                @include('administrator.type-rumah.edit_modal')
            </div>
                <form method="POST" action="{{ route('admin.role.destroy',$type->id) }}" accept-charset="UTF-8" style="display:inline">
                {{ method_field('DELETE') }}
                {{ csrf_field() }}
                <button type="submit" class="btn btn-xs btn-danger">
                  <span class="fa fa-close fa-fw"></span>
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
    @include('Xenon.administrator.user.create_modal')
  </div>
  
</div>
@endsection