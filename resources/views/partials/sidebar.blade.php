<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
    <div class="sidebar-brand-text mx-4">PetCare <i class="fa fa-plus" aria-hidden="true"></i></div>
  </a>
  
  <!-- Divider -->
  <hr class="sidebar-divider my-0">
  
  <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ request()->routeIs('dashboard.*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('dashboard.index') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <li class="nav-item {{ request()->routeIs('checkups.*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('checkup.index') }}">
            <i class="fas fa-stethoscope"></i>
            <span>Pemeriksaan</span>
        </a>
    </li>
  <hr class="sidebar-divider">

  <div class="sidebar-heading">Manajemen Data</div>

  <li class="nav-item {{ request()->routeIs('owners.*') ? 'active' : '' }}">
      <a class="nav-link" href="{{ route('owner.index') }}">
          <i class="fas fa-user"></i>
          <span>Data Pemilik Hewan</span>
      </a>
  </li>

  <li class="nav-item {{ request()->routeIs('pets.*') ? 'active' : '' }}">
      <a class="nav-link" href="{{ route('pet.index') }}">
          <i class="fas fa-paw"></i>
          <span>Data Hewan</span>
      </a>
  </li>


  <li class="nav-item {{ request()->routeIs('treatments.*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('treatment.index') }}">
        <i class="fas fa-medkit"></i>
        <span>Data Perawatan</span>
    </a>
</li>

  <hr class="sidebar-divider d-none d-md-block">
</ul>