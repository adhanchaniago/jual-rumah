<ul class="user-info-menu right-links list-inline list-unstyled">
  <li class="search-form"><!-- You can add "always-visible" to show make the search input visible -->

<form name="userinfo_search_form" method="get" action="extra-search.html">
  <input type="text" name="s" class="form-control search-field" placeholder="Type to search..." />

  <button type="submit" class="btn btn-link">
    <i class="linecons-search"></i>
  </button>
</form>

</li>

<li class="dropdown user-profile">
<a href="#" class="dropdown-toggle" data-toggle="dropdown">
  <img src="{{ asset(auth()->user()->avatar) }}" alt="user-image" class="img-circle img-inline userpic-32" width="28" />
  <span>
    {{ auth()->user()->fullName }}
    <i class="fa-angle-down"></i>
  </span>
</a>

<ul class="dropdown-menu user-profile-menu list-unstyled">
  <li>
    <a href="#edit-profile">
      <i class="fa-edit"></i>
      New Post
    </a>
  </li>
  <li>
    <a href="#settings">
      <i class="fa-wrench"></i>
      Settings
    </a>
  </li>
  <li>
    <a href="#profile">
      <i class="fa-user"></i>
      Profile
    </a>
  </li>
  <li>
    <a href="#help">
      <i class="fa-info"></i>
      Help
    </a>
  </li>
  <li class="last">
    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
      <i class="fa fa-lock"></i>  Logout
    </a>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        {{ csrf_field() }}
    </form>
  </li>
</ul>
</li>

<li>
<a href="#" data-toggle="chat">
  <i class="fa-comments-o"></i>
</a>
</li>

</ul>