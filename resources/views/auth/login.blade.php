
<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="bootstrap admin template">
    <meta name="author" content="">

    <title>LAYO SF LOGIN</title>

    <link rel="apple-touch-icon" href="{{asset('images/logo-layo.png')}}">
    <link rel="shortcut icon" href="{{asset('images/logo-layo.png')}}">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{asset('global/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('global/css/bootstrap-extend.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/site.min.css')}}">

    <!-- Plugins -->
    <!-- <link rel="stylesheet" href="{{asset('global/vendor/animsition/animsition.css')}}"> -->
    <link rel="stylesheet" href="{{asset('global/vendor/asscrollable/asScrollable.css')}}">
    <link rel="stylesheet" href="{{asset('global/vendor/switchery/switchery.css')}}">
    <link rel="stylesheet" href="{{asset('global/vendor/intro-js/introjs.css')}}">
    <!-- <link rel="stylesheet" href="{{asset('global/vendor/slidepanel/slidePanel.css')}}"> -->
    <link rel="stylesheet" href="{{asset('global/vendor/flag-icon-css/flag-icon.css')}}">
    <link rel="stylesheet" href="{{asset('examples/css/pages/login-v3.css')}}">


    <!-- Fonts -->
    <link rel="stylesheet" href="{{asset('global/fonts/web-icons/web-icons.min.css')}}">
    <link rel="stylesheet" href="{{asset('global/fonts/brand-icons/brand-icons.min.css')}}">
    <!-- <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic'> -->

    <!-- Scripts -->
    <script src="{{asset('global/vendor/breakpoints/breakpoints.js')}}"></script>
    <script>
        Breakpoints();
    </script>
     <!-- Core  -->
    <script src="{{asset('global/vendor/babel-external-helpers/babel-external-helpers.js')}}"></script>
    <script src="{{asset('global/vendor/jquery/jquery.js')}}"></script>
    <!-- <script src="{{asset('global/vendor/popper-js/umd/popper.min.js')}}"></script> -->
    <script src="{{asset('global/vendor/bootstrap/bootstrap.js')}}"></script>
    <!-- <script src="{{asset('global/vendor/animsition/animsition.js')}}"></script> -->
    <script src="{{asset('global/vendor/mousewheel/jquery.mousewheel.js')}}"></script>
    <script src="{{asset('global/vendor/asscrollbar/jquery-asScrollbar.js')}}"></script>
    <script src="{{asset('global/vendor/asscrollable/jquery-asScrollable.js')}}"></script>
    <script src="{{asset('global/vendor/ashoverscroll/jquery-asHoverScroll.js')}}"></script>
    
    <!-- Plugins -->
    <!-- <script src="{{asset('global/vendor/switchery/switchery.js')}}"></script> -->
    <script src="{{asset('global/vendor/intro-js/intro.js')}}"></script>
    <script src="{{asset('global/vendor/screenfull/screenfull.js')}}"></script>
    <script src="{{asset('global/vendor/slidepanel/jquery-slidePanel.js')}}"></script>
    <script src="{{asset('global/vendor/jquery-placeholder/jquery.placeholder.js')}}"></script>
    
    <!-- Scripts -->
    <script src="{{asset('global/js/Component.js')}}"></script>
    <script src="{{asset('global/js/Plugin.js')}}"></script>
    <script src="{{asset('global/js/Base.js')}}"></script>
    <script src="{{asset('global/js/Config.js')}}"></script>
    
    <!-- <script src="{{asset('js/Section/Menubar.js')}}"></script> -->
    <!-- <script src="{{asset('js/Section/GridMenu.js')}}"></script> -->
    <!-- <script src="{{asset('js/Section/Sidebar.js')}}"></script> -->
    <!-- <script src="{{asset('js/Section/PageAside.js')}}"></script> -->
    <script src="{{asset('js/Plugin/menu.js')}}"></script>
    
    <script src="{{asset('global/js/config/colors.js')}}"></script>
    <!-- <script src="{{asset('js/config/tour.js')}}"></script> -->
    
    <!-- Page -->
    <script src="{{asset('js/Site.js')}}"></script>
    <script src="{{asset('global/js/Plugin/asscrollable.js')}}"></script>
    <script src="{{asset('global/js/Plugin/slidepanel.js')}}"></script>
    <script src="{{asset('global/js/Plugin/switchery.js')}}"></script>
    <script src="{{asset('global/js/Plugin/jquery-placeholder.js')}}"></script>
    <script src="{{asset('global/js/Plugin/material.js')}}"></script>
    
    <script>
      (function(document, window, $){
        'use strict';
    
        var Site = window.Site;
        $(document).ready(function(){
          Site.run();
        });
      })(document, window, jQuery);
    </script>
</head>
<body class="animsition page-login-v3 layout-full">
    <div class="page vertical-align text-center" data-animsition-in="fade-in" data-animsition-out="fade-out">
      <div class="page-content vertical-align-middle animation-slide-top animation-duration-1">
        <div class="panel">
          <div class="panel-body">
            <div class="brand">
              <img class="brand-img" src="{{asset('images/logo-layo.png')}}" height="90px" width="140px">
              <!-- <h2 class="brand-text font-size-18">LAYO SF</h2> -->
            </div>
            <form method="POST" action="{{ route('login') }}">
              @csrf
                <div class="form-group form-material floating" data-plugin="formMaterial">
                    <input id="email" type="text" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                   
                    <label class="floating-label">Username</label>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
              <div class="form-group form-material floating" data-plugin="formMaterial">
                <input type="password" class="form-control" name="password" value="{{ old('password') }}" required autocomplete="current-password"/>
                <label class="floating-label">Password</label>
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <div class="form-group clearfix">
                <!-- <div class="checkbox-custom checkbox-inline checkbox-primary checkbox-lg float-left">
                  <input type="checkbox" id="inputCheckbox" name="remember">
                  <label for="inputCheckbox">Remember me</label>
                </div>
                <a class="float-right" href="forgot-password.html">Forgot password?</a> -->
              </div>
              <button type="submit" class="btn btn-primary btn-block btn-lg mt-40">Sign in</button>
            </form>
            <!-- <p>Still no account? Please go to <a href="register-v3.html">Sign up</a></p> -->
          </div>
        </div>

        <footer class="page-copyright page-copyright-inverse">
          <p>Copyright {{ date('Y')}}. IT-SFMP. All RIGHT RESERVED.</p>
          
        </footer>
      </div>
    </div>

</body>
</html>
