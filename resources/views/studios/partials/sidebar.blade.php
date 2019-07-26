<div class="sidebar">

  <!-- Sidebar Menu -->
  <nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <li class="nav-item">
        <a href="{{ route('home') }}" class="nav-link">

          <i class="nav-icon fa fa-th"></i>
          <p>
            Dashboard
          </p>
        </a>
      </li>

      <li class="nav-item">
        <a href="{{ route('studio.albums') }}" class="nav-link">
          <i class="nav-icon fa fa-book"></i>
          <p>
            Albums
          </p>
        </a>
      </li>

      <li class="nav-item has-treeview">
        <a href="#" class="nav-link">
          <i class="nav-icon fa fa-video-camera"></i>
          <p>
            Banners
            <i class="right fa fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview" style="display: none;">
          <li class="nav-item">
            <a href="{{ route('studio.banner.create') }}" class="nav-link">
              <i class="fa fa-plus nav-icon"></i>
              <p>Create</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('studio.banners') }}" class="nav-link">
              <i class="fa fa-circle nav-icon"></i>
              <p>List</p>
            </a>
          </li>
        </ul>
      </li>
      
      <li class="nav-item has-treeview">
        <a href="#" class="nav-link">
          <i class="nav-icon fa fa-video-camera"></i>
          <p>
            Services
            <i class="right fa fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview" style="display: none;">
          <li class="nav-item">
            <a href="{{ route('studio.service.create') }}" class="nav-link">
              <i class="fa fa-plus nav-icon"></i>
              <p>Create</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('studio.services') }}" class="nav-link">
              <i class="fa fa-circle nav-icon"></i>
              <p>List</p>
            </a>
          </li>
        </ul>
      </li>
      
      <li class="nav-item has-treeview">
        <a href="#" class="nav-link">
          <i class="nav-icon fa fa-video-camera"></i>
          <p>
            Portfolio
            <i class="right fa fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview" style="display: none;">
          <li class="nav-item">
            <a href="{{ route('studio.portfolio.create') }}" class="nav-link">
              <i class="fa fa-plus nav-icon"></i>
              <p>Create</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('studio.portfolios') }}" class="nav-link">
              <i class="fa fa-circle nav-icon"></i>
              <p>List</p>
            </a>
          </li>
        </ul>
      </li>

      <li class="nav-item has-treeview">
        <a href="#" class="nav-link">
          <i class="nav-icon fa fa-video-camera"></i>
          <p>
            Team
            <i class="right fa fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview" style="display: none;">
          <li class="nav-item">
            <a href="{{ route('studio.team.create') }}" class="nav-link">
              <i class="fa fa-plus nav-icon"></i>
              <p>Create</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('studio.team') }}" class="nav-link">
              <i class="fa fa-circle nav-icon"></i>
              <p>List</p>
            </a>
          </li>
        </ul>
      </li>

      <li class="nav-item">
        <a href="{{ route('studio.profile') }}" class="nav-link">
          <i class="nav-icon fa fa-user"></i>
          <p>
            Profile
          </p>
        </a>
      </li>

      <li class="nav-item">
        <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
          <i class="nav-icon fa fa-sign-out"></i>
          <p>
            {{ __('Logout') }}
          </p>
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
        </form>
      </li>
    </ul>
  </nav>
  <!-- /.sidebar-menu -->
</div>