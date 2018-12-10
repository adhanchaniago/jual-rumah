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

<li class="{{ active([],'opened active') }}">
    <a href="#">
      <i class="linecons-wallet"></i>
      <span class="title">Data Booking</span>
    </a>
    <ul>
      <li class="{{ active('admin.user.index') }}">
        <a href="{{ route('admin.user.index') }}">
          <span class="title">Data Masuk</span>
        </a>
      </li>
      <li class="{{ active('admin.user.index') }}">
          <a href="{{ route('admin.user.index') }}">
            <span class="title">Semua Booking</span>
          </a>
        </li>
      <li class="{{ active('admin.user.index') }}">
        <a href="{{ route('admin.user.index') }}">
          <span class="title">Sudah Verifikasi</span>
        </a>
      </li>
      <li class="{{ active('admin.role.index') }}">
        <a href="{{ route('admin.role.index') }}">
          <span class="title">Belum Verifikasi</span>
        </a>
      </li>
    </ul>
</li>