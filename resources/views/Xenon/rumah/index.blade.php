@extends('layouts.Xenon.master')

@section('content')
<div class="col-md-12">
				
  <div class="panel panel-default">
    <d iv class="panel-heading">
      <h3 class="panel-title">{{ config('app.name') }} - <i class="linecons-shop"></i> Data Rumah</h3>
      
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
              <th>Perumahan</th>
              <th>Type</th>
              <th>Blok</th>
              <th>Nomor</th>
              <th>Subidi</th>
              <th>Harga</th>
              <th>Pemesan</th>
              <th>Dokumen Pemesan</th>
              <th>Aksi</th>
            </tr>
      </thead>
      
      <tbody>
          @foreach ($rumahs as $rumah)
          <tr>
            <td><a href="{{ route('admin.perumahan.show', $rumah->perumahan->id) }}">{{ $rumah->perumahan->name }}</a></td>
            <td>{{ $rumah->rumahType->type }}</td>
            <td>{{ $rumah->block }}</td>
            <td>{{ $rumah->number }}</td>
            <td>
              @if ($rumah->subsidi === 'subsidi')
              <span class="badge bg-green">{{ $rumah->subsidi }}</span>
              @endif
            </td>
            <td>Rp. {{ number_format($rumah->harga ,2,',','.')}}</td>
            <td>
              @if ($rumah->customer)
              <a href="{{ route('admin.user.show', $rumah->customer->id) }}">
                {{ $rumah->customer->username }}
              </a>
              @else
              <span class="badge bg-red">Kosong</span>
              @endif
            </td>
            <td>
              @if ($rumah->approved_document)
              <span class="badge bg-green">disetujui</span>
              @else
              <span class="badge bg-yellow">belum disetujui</span>
              @endif
            </td>
            <td>
              <a href="{{ route('admin.rumah.show', $rumah->id) }}" class="btn btn-xs btn-info"><i class="fa fa-search"></i> Detail</a>
              <a class="btn btn-xs btn-secondary" href="#" onclick="jQuery('#modalEdit-{{ $rumah->id }}').modal('show');" class="btn btn-icon btn-blue btn-xs"><i class="fa fa-edit"></i> Edit</a>
                @include('Xenon.rumah.edit_modal')
            </td>
          </tr>
      @endforeach
      </tbody>
    </table>
    <div class="vspacer v3"></div>
    <a href="#" onclick="jQuery('#modal-2').modal('show');" class="btn btn-info icon">
      <i class="linecons-shop"></i><span> Tambah Data</span>
    </a>
    @include('Xenon.rumah.create_modal')
  </div>
  
</div>
@endsection