<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href="#">
        <!-- <img src="../assets/img/logo-ct.png" class="navbar-brand-img h-100" alt="main_logo"> -->
        <span class="ms-1 font-weight-bold text-white fs-5">Sut Aung</span>
      </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link text-white active {{Request::is('dashboard') ? 'bg-gradient-primary':'';}}" href="{{asset('dashboard')}}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">dashboard</i>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white {{Request::is('categories') ? 'bg-gradient-primary':'';}} " href="{{asset('categories')}}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">table_view</i>
            </div>
            <span class="nav-link-text ms-1">Categories</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link text-white {{Request::is('products') ? 'bg-gradient-primary':'';}} " href="{{asset('products')}}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <!-- <i class="material-icons opacity-10">table_view</i> -->
              <i class="fa fa-shopping-cart"></i>
            </div>
            <span class="nav-link-text ms-1">Products</span>
          </a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link text-white {{Request::is('brands') ? 'bg-gradient-primary':'';}} " href="{{asset('brands')}}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <!-- <i class="material-icons opacity-10">table_view</i> -->
              <i class="fa fa-pie-chart" aria-hidden="true"></i>
            </div>
            <span class="nav-link-text ms-1">Brands</span>
          </a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link text-white {{Request::is('coupons') ? 'bg-gradient-primary':'';}} " href="{{asset('coupons')}}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <!-- <i class="material-icons opacity-10">table_view</i> -->
              <i class="fa fa-codiepie" aria-hidden="true"></i>
            </div>
            <span class="nav-link-text ms-1">Coupons</span>
          </a>
        </li>
  
        <li class="nav-item">
          <a class="nav-link text-white {{Request::is('orders') ? 'bg-gradient-primary':'';}} " href="{{asset('orders')}}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <!-- <i class="material-icons opacity-10">table_view</i> -->
              <i class="fa fa-archive" aria-hidden="true"></i>
            </div>
            <span class="nav-link-text ms-1">Orders</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white {{Request::is('users') ? 'bg-gradient-primary':'';}} " href="{{asset('users')}}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <!-- <i class="material-icons opacity-10">table_view</i> -->
              <i class="fa fa-user" aria-hidden="true"></i>
            </div>
            <span class="nav-link-text ms-1">Users</span>
          </a>
        </li>
       
        
        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Account pages</h6>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="#">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <!-- <i class="material-icons opacity-10">person</i> -->
              <i class="fa fa-user-circle" aria-hidden="true"></i>
            </div>
            <span class="nav-link-text ms-1">Profile</span>
          </a>
        </li>
        <li class="nav-item">
          <!-- <a class="nav-link text-white " href="../pages/sign-in.html">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">logout</i>
            </div>
            <span class="nav-link-text ms-1">Log out</span>
          </a> -->
          <a class="nav-link text-white" href="{{ route('logout') }}"
            onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">logout</i>
            </div>
            <span class="nav-link-text ms-1">Log out</span>
          </a>

          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
          </form>
        </li>
        
      </ul>
    </div>
</aside>