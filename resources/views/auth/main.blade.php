<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Purple Admin</title>
    <link rel="stylesheet" href="{{('assets/vendors/mdi/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{('assets/vendors/css/vendor.bundle.base.css')}}">

    <link rel="stylesheet" href="{{('assets/css/style.css')}}">
    <link rel="shortcut icon" href="{{('assets/images/favicon.ico')}}" />
  </head>
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth">
          <div class="row flex-grow">
            <div class="col-lg-4 mx-auto">
              <div class="auth-form-light text-left p-5">
                <div class="brand-logo">
                  <img src="{{('assets/images/logo.svg')}}">
                </div>
                @yield('content')
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>

    <script src="{{('assets/vendors/js/vendor.bundle.base.js')}}"></script>

    <script src="{{('assets/js/off-canvas.js')}}"></script>
    <script src="{{('assets/js/hoverable-collapse.js')}}"></script>
    <script src="{{('assets/js/misc.js')}}"></script>
  </body>
</html>