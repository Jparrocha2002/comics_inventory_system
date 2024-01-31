<ul class="navbar-nav bg-gradient-secondary sidebar sidebar-dark accordion" id="accordionSidebar">
  
  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
    <div class="sidebar-brand-icon rotate-n-15">
      <!-- <i class="fas fa-laugh-wink"></i> -->
    </div>
    <div class="sidebar-brand-text mx-3" href="{{ route('dashboard') }}">Comics Inventory</div>
  </a>
  
  <!-- Divider -->
  <hr class="sidebar-divider my-0">
  
  <!-- Nav Item - Dashboard -->
  <li class="nav-item">
    <a class="nav-link" href="{{ route('dashboard') }}">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span></a>
  </li>
  
  <hr class="sidebar-divider">

  <div class="sidebar-heading">
      Components
  </div>

@if (auth()->user()->role == 'Admin')
  <li class="nav-item">
    <a class="nav-link" href="{{ route('comics') }}">
      <i class="fas fa-fw fa-table" style='font-size:14px'></i>
      <span>Comics</span></a>
  </li>
@endif
  
  <li class="nav-item">
    <a class="nav-link" href="{{ route('transactions') }}">
      <i class="fas fa-fw fa-table" style='font-size:14px'></i>
      <span>Transaction</span></a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="{{ route('categories') }}">
      <i class="fas fa-fw fa-table" style='font-size:14px'></i>
      <span>Category</span></a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="{{ route('reviews') }}">
      <i class="fas fa-fw fa-table" style='font-size:14px'></i>
      <span>Reviews</span></a>
  </li>

  @if (auth()->user()->role == 'Admin')
  <hr class="sidebar-divider">

  <div class="sidebar-heading">
      Registered
  </div>

  <li class="nav-item">
    <a class="nav-link" href="{{ route('admin') }}">
      <i class="fas fa-user-tie"></i>
      <span>Users</span></a>
  </li>
  @endif
  
  <!-- <li class="nav-item">
    <a class="nav-link" href="/profile">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Profile</span></a>
  </li> -->
  
  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">
  
  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>
  
  
</ul>