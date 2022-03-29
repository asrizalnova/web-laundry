<aside class="sidenav navbar-vertical navbar-expand-xs border-20  my-20 fixed-start ms-30 " id="sidenav-main"  style="background-color:#343435"  >
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-light opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href="{{route('dashboard')}}">
        <img src="{{asset('/assets2/img/logoku.png')}}" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 text-light font-weight-bold">Laundry Sawahan</span>
      </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="stylecollapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">

      
        
        <li class="nav-item">
          <a class="nav-link" href="{{route('dashboard')}}">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center" >
              <i class="ni ni-shop text-light text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text text-light ms-1">Dashboard</span>
          </a>
        </li>

        @if (auth()->user()->role=="admin")  
        <li class="nav-item">
          <a class="nav-link " href="{{route('tampil-outlet')}}">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center" >
              <i class="ni ni-collection text-light text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text text-light ms-1">Outlet</span>
          </a>
        </li>
        @endif

        @if (auth()->user()->role=="admin")  
        <li class="nav-item">
          <a class="nav-link " href="{{route('tampil-paket')}}">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-tag text-light text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text text-light ms-1">Paket</span>
          </a>
        </li>
        @endif
        
        @if (auth()->user()->role != "owner")  
        <li class="nav-item">
          <a class="nav-link " href="{{route('tampil-member')}}">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-single-02 text-light text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text text-light ms-1">Member</span>
          </a>
        </li>
        @endif

        <li class="nav-item">
          <a class="nav-link " href="{{route('tampil-transaksi')}}">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-cart text-light text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text text-light  ms-1">Transaksi</span>
          </a>
        </li>
          
        

        @if (auth()->user()->role=="admin")  
        <li class="nav-item">
          <a class="nav-link " href="{{route('tampil-user')}}">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center" >
              <i class="ni ni-badge text-light text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text text-light ms-1">User</span>
          </a>
        </li> 
        @endif
      </ul>
    </div>
  </aside>