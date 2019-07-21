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

      <li class="nav-item">
        <a href="#" class="nav-link"
          onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
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