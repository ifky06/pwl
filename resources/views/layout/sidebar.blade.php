<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{url('/')}}" class="brand-link">
      <img src="{{asset('assets/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('assets/dist/img/profile.jpg')}}" width="160" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{Auth::user()->name}}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

          <li class="nav-item">
            <a href="{{ url('/') }}" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('/profile') }}" class="nav-link">
              <i class="nav-icon far fa-user"></i>
              <p>
                Profile
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('/kuliah') }}" class="nav-link">
              <i class="nav-icon far fa-image"></i>
              <p>
                Pengalaman Kuliah
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('/hobby') }}" class="nav-link">
              <i class="nav-icon fas fa-heart"></i>
              <p>
                Hobby
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('/keluarga') }}" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Keluarga
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('/matkul') }}" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Mata Kuliah
              </p>
            </a>
          </li>
            <li class="nav-item">
                <a href="{{ url('/mahasiswa') }}" class="nav-link">
                    <i class="nav-icon fas fa-book"></i>
                    <p>
                        Mahasiswa
                    </p>
                </a>
            </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
