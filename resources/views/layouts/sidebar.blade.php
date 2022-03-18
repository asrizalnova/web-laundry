<aside class="sidenav navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 " id="sidenav-main" style="background-color:#343435"  >
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href="{{route('dashboard')}}">
        <img src="{{asset('/assets2/img/logoku.png')}}" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 text-light font-weight-bold">EASY WASH</span>
      </a>
    </div>
    
    <div class="stylecollapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">

      <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs text-light font-weight-bolder opacity-15">CONTENT</h6>
        </li>
        
        <li class="nav-item">
          <a class="nav-link" href="{{route('dashboard')}}">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center" >
              <i class="ni ni-tv-2 text-white text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>

        @if (auth()->user()->role=="admin")  
        <li class="nav-item">
          <a class="nav-link " href="{{route('tampil-outlet')}}">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center" >
              <i class="ni ni-istanbul text-white text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Outlet</span>
          </a>
        </li>
        @endif
        @if (auth()->user()->role=="admin")  
        <li class="nav-item">
          <a class="nav-link " href="{{route('tampil-paket')}}">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-box-2 text-white text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Paket</span>
          </a>
        </li>
        @endif
        @if (auth()->user()->role != "owner")  
        <li class="nav-item">
          <a class="nav-link " href="{{route('tampil-member')}}">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-single-02 text-white text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Member</span>
          </a>
        </li>
        @endif

        <li class="nav-item">
          <a class="nav-link " href="{{route('tampil-transaksi')}}">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-money-coins text-white text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Transaksi</span>
          </a>
        </li>

        @if (auth()->user()->role=="admin")  
        <li class="nav-item">
          <a class="nav-link " href="{{route('tampil-user')}}">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center" >
              <i class="ni ni-badge text-white text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Data Pengurus</span>
            
          </a>
        </li> 

        @endif
      </ul>
    </div>
  </aside>