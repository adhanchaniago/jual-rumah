<li class="{{ active(['admin.user.*','admin.role.*'],'opened active') }}">
    <a href="#">
      <i class="linecons-user"></i>
      <span class="title">User</span>
    </a>
    <ul>
      <li class="{{ active('admin.user.index') }}">
        <a href="{{ route('admin.user.index') }}">
          <span class="title">All User</span>
        </a>
      </li>
      <li class="{{ active('admin.role.index') }}">
        <a href="{{ route('admin.role.index') }}">
          <span class="title">All Role</span>
        </a>
      </li>
    </ul>
</li>

<li class="{{ active(['admin.rumah.*','admin.type-rumah.*','admin.perumahan.*'],'opened active') }}">
    <a href="#">
      <i class="linecons-shop"></i>
      <span class="title">Rumah</span>
    </a>
    <ul>
      <li class="{{ active('admin.rumah.index') }}">
        <a href="{{ route('admin.rumah.index') }}">
          <span class="title">Data Rumah</span>
        </a>
      </li>
      <li class="{{ active('admin.type-rumah.index') }}">
        <a href="{{ route('admin.type-rumah.index') }}">
          <span class="title">Tipe Rumah</span>
        </a>
      </li>
      <li class="{{ active('admin.perumahan.index') }}">
          <a href="{{ route('admin.perumahan.index') }}">
            <span class="title">Data Perumahan</span>
          </a>
        </li>
    </ul>
</li>

<li class="{{ active(['admin.order.*'],'opened active') }}">
    <a href="#">
      <i class="linecons-wallet"></i>
      <span class="title">Data Booking</span>
    </a>
    <ul>
      <li class="{{ active('admin.order.index') }}">
        <a href="{{ route('admin.order.index') }}">
          <span class="title">Data Masuk</span>
        </a>
      </li>
    </ul>
</li>

<li class="{{ active(['admin.angsuran.*'],'opened active') }}">
    <a href="#">
      <i class="linecons-wallet"></i>
      <span class="title">Data Angsuran</span>
    </a>
    <ul>
      <li class="{{ active('admin.angsuran.index') }}">
        <a href="{{ route('admin.angsuran.index') }}">
          <span class="title">Data Masuk</span>
        </a>
      </li>
    </ul>
</li>

<li class="{{ active(['admin.report.*'],'opened active') }}">
    <a href="#">
      <i class="linecons-doc"></i>
      <span class="title">Laporan Pemesanan</span>
    </a>
    <ul>
      <li class="{{ active('admin.report.confirmed') }}">
        <a href="{{ route('admin.report.confirmed') }}">
          <span class="title">Telah Konfirmasi</span>
        </a>
      </li>
      <li class="{{ active('admin.report.notConfirmed') }}">
          <a href="{{ route('admin.report.notConfirmed') }}">
            <span class="title">Belum Konfirmasi</span>
          </a>
        </li>
    </ul>
</li>