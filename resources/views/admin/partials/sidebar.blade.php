<div class="sidebar">

  <!-- Sidebar Menu -->
  <nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <li class="nav-item">
        <a href="{{ url('/admin') }}" class="nav-link">
          <i class="nav-icon fa fa-th"></i>
          <p>
            Dashboard
          </p>
        </a>
      </li>
      
      <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-video-camera"></i>
              <p>
                Studios
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="display: none;">
              <li class="nav-item">
                <a href="{{ route('admin.studio.create') }}" class="nav-link">
                  <i class="fa fa-plus nav-icon"></i>
                  <p>Create</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.studios') }}" class="nav-link">
                  <i class="fa fa-circle nav-icon"></i>
                  <p>List</p>
                </a>
              </li>
            </ul>
          </li>

      <li class="nav-item">
        <a href="{{ route('admin.albums') }}" class="nav-link">
          <i class="nav-icon fa fa-book"></i>
          <p>
            Albums
          </p>
        </a>
      </li>

      <li class="nav-item">
        <a href="{{ route('admin.password.change') }}" class="nav-link">
          <i class="nav-icon fa fa-key"></i>
          <p>
            Change Password
          </p>
        </a>
      </li>

      <li class="nav-item">
        <a href="#" class="nav-link"
          onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
          <i class="nav-icon fa fa-sign-out"></i>
          <p>
            {{ __('Logout') }}
          </p>
        </a>
        <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
          @csrf
        </form>
      </li>
    </ul>
  </nav>
  <!-- /.sidebar-menu -->
</div>