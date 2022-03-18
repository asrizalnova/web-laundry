<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
      <div class="container-fluid py-1 px-3">

        @yield('navigasi')

        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
          </div>
          <ul class="navbar-nav  justify-content-end">
            <li class="nav-item d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-black font-weight-bold px-0">
                <i class="fa fa-user me-sm-1"></i>
                <span class="d-sm-inline d-none"><b>WELCOME , {{Auth::user()->name}}</b></span>
              </a>
              </li>

            <li class="nav-item px-3 d-flex align-items-center">
              <a href="{{route('logout')}}" class="nav-link text-danger p-0">
                <i class="fa fa-rocket"></i>
                <span class="d-sm-inline d-none"><b>LOGOUT</b></span>
              </a>
            </li>
            
            
            
            
          </ul>
        </div>
      </div>
    </nav>