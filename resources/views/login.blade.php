<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets2/img/logoku.png">
  <link rel="icon" type="image/png" href="../assets2/img/logoku.png">
  <title>
    Login
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="../assets2/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets2/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="../assets2/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="../assets2/css/argon-dashboard.css?v=2.0.0" rel="stylesheet" />
</head>

<body class="">
  <div class="container position-sticky z-index-sticky top-0">
    <div class="row">
      <div class="col-12">
      </div>
    </div>
  </div>
  <main class="main-content  mt-0 ">
    <div class="page-header align-items-start min-vh-100" >
      <span class="mask bg-gradient-dark opacity-6"></span>
      <div class="text-center container my-auto">
        <div class="row">
          <div class="col-lg-4 col-md-8 col-12 mx-auto">
            <div class="card z-index-0 fadeIn3 fadeInBottom">
             
              <br>
              <h5>Laundry Sawahan<h/5>
              <br>
              <br>

              <div class="card-body">
                  <form method="POST" action="{{route('login')}}" role="form">
                    @csrf
                    <div class="wrap-input100 validate-input m-b-16">
                      <input type="email" class="form-control form-control-lg" name="email" placeholder="Email" aria-label="Email">
                    </div>

                    <br>

                    <div class="wrap-input100 validate-input m-b-16">
                      <input type="password" class="form-control form-control-lg" name="password" placeholder="Password" aria-label="Password">
                    </div>

                    @if(session('message'))
                    <div class="text-right text-danger">
                      {{session('message')}}
                    </div>
                  @endif
                    <div class="text-center">
                      <button type="submit" class="btn btn-lg btn-info btn-gradient btn-lg w-100 mt-4 mb-0">Login</button>
                    </div>
                    <br>   
                  </form>
                </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
  <!--   Core JS Files   -->
  <script src="../assets2/js/core/popper.min.js"></script>
  <script src="../assets2/js/core/bootstrap.min.js"></script>
  <script src="../assets2/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets2/js/plugins/smooth-scrollbar.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets2/js/argon-dashboard.min.js?v=2.0.0"></script>
</body>

</html>