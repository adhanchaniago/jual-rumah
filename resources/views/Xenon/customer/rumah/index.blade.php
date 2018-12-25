@extends('layouts.Xenon.horizontal_menu')

@section('content')
<h3 id="layout-variants">
  Rumah Terbaru
  <br />
  <small>Berbagai Hunian Asri Untuk Anda</small>
</h3>

<div class="panel panel-default panel-headerless">
  
  <div class="panel-body layout-variants">

    <div class="row">
      @forelse ($rumahs as $rumah)
      <div class="col-sm-4">

          <div class="layout-variant">
            <div class="layout-img">
              <a href="{{ route('rumah.show',$rumah->id) }}">
                @if ($rumah->getFirstMediaUrl('photo'))
                <img src="{{ asset($rumah->getFirstMediaUrl('photo')) }}" />
                @else
                <img src="{{ asset('Xenon/assets/images/layouts/layout-sidebar.png') }}" />
                @endif
              </a>
            </div>
            <div class="layout-name">
              <a href="{{ route('rumah.show',$rumah->id) }}">{{ $rumah->perumahan->name }} - Blok. {{ $rumah->block }}/{{ $rumah->number }}</a>
            </div>
            <ul class="layout-links">
              <li>
                <a href="#" class="">Rumah Type {{ $rumah->rumahType->type }}</a>
              </li>
              <li>
                <a href="#" class="">{{ $rumah->harga }}</a>
              </li>
              <li>
                <a href="#" class="">{{ $rumah->perumahan->address }}</a>
              </li>
            </ul>
          </div>
  
        </div>
      @empty
          
      @endforelse
    </div>
    <div class="row">
      <div class="col-md-12 text-center">
          {{ $rumahs->links() }}
      </div>
    </div>

  </div>

</div>
@endsection