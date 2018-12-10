<li>
  <a href="dashboard-1.html">
    <i class="fa fa-home"></i>
    <span class="title">Rumah</span>
  </a>
  <ul>
    <li>
      <a href="dashboard-1.html">
        <span class="title">Semua</span>
      </a>
    </li>
    <li>
      <a href="dashboard-2.html">
        <span class="title">Terbaru</span>
      </a>
    </li>
    <li>
      <a href="dashboard-3.html">
        <span class="title">Terjual</span>
      </a>
    </li>
    <li>
      <a href="dashboard-4.html">
        <span class="title">Sudah Booking</span>
      </a>
    </li>
  </ul>
</li>
<li class="o{{ active([],'active','opened') }}">
  <a href="layout-variants.html">
    <i class="linecons-location"></i>
    <span class="title">Lokasi</span>
  </a>
  <ul>
    <li class="">
      <a href="layout-collapsed-sidebar.html">
        <span class="title">Kota Tanjungpinang</span>
      </a>
    </li>
    <li class="">
      <a href="layout-static-sidebar.html">
        <span class="title">Kota Batam</span>
      </a>
    </li>
    <li class="">
      <a href="layout-horizontal-menu.html">
        <span class="title">Daerah Bintan</span>
      </a>
    </li>
    <li class="">
      <a href="layout-horizontal-plus-sidebar.html">
        <span class="title">Tanjung Balai</span>
      </a>
    </li>
  </ul>
</li>

@if (auth()->check())
<li class="o{{ active([],'active','opened') }}">
    <a href="layout-variants.html">
      <i class="linecons-wallet"></i>
      <span class="title">My Booking</span>
    </a>
    <ul>
        <li class="">
            <a href="layout-collapsed-sidebar.html">
              <span class="title">Semua Booking</span>
            </a>
          </li>
      <li class="">
        <a href="layout-collapsed-sidebar.html">
          <span class="title">Sudah Verifikasi</span>
        </a>
      </li>
      <li class="">
        <a href="layout-static-sidebar.html">
          <span class="title">Berlum Verifikasi</span>
        </a>
      </li>
    </ul>
  </li>
@endif

@if (auth()->guest())
<li>
    <a href="">
      <i class="linecons-user"></i>
      <span class="title">User Area</span>
    </a>
    <ul>
      <li>
        <a href="{{ route('login') }}">
          <i class="linecons-key"></i>
          <span class="title">Login</span>
        </a>
      </li>
      <li>
          <a href="{{ route('register') }}">
            <i class="linecons-key"></i>
            <span class="title">Register</span>
          </a>
        </li>

    </ul>
  </li>
@endif