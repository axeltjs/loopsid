<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Blog</title>
        <link href="https://fonts.googleapis.com/css?family=B612+Mono|Cabin:400,700&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="{{ asset('non-auth/fonts/icomoon/style.css') }}">
        <link rel="stylesheet" href="{{ asset('non-auth/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('non-auth/css/jquery-ui.css') }}">
        <link rel="stylesheet" href="{{ asset('non-auth/css/owl.carousel.min.css') }}">
        <link rel="stylesheet" href="{{ asset('non-auth/css/owl.theme.default.min.css') }}">
        <link rel="stylesheet" href="{{ asset('non-auth/css/owl.theme.default.min.css') }}">
        <link rel="stylesheet" href="{{ asset('non-auth/css/jquery.fancybox.min.css') }}">
        <link rel="stylesheet" href="{{ asset('non-auth/css/bootstrap-datepicker.css') }}">
        <link rel="stylesheet" href="{{ asset('non-auth/fonts/flaticon/font/flaticon.css') }}">
        <link rel="stylesheet" href="{{ asset('non-auth/css/aos.css') }}">
        <link href="{{ asset('non-auth/css/jquery.mb.YTPlayer.min.css') }}" media="all" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="{{ asset('non-auth/css/style.css') }}">
        @yield('css')
    </head>
    <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

        <div class="site-wrap">
      
          <div class="site-mobile-menu site-navbar-target">
            <div class="site-mobile-menu-header">
              <div class="site-mobile-menu-close mt-3">
                <span class="icon-close2 js-menu-toggle"></span>
              </div>
            </div>
            <div class="site-mobile-menu-body"></div>
          </div>
          <div class="header-top">
            <div class="container">
              <div class="row align-items-center">
                <div class="col-12 col-lg-6 d-flex">
                  <a href="index.html" class="site-logo">
                    Blog
                  </a>
      
                  <a href="#" class="ml-auto d-inline-block d-lg-none site-menu-toggle js-menu-toggle text-black"><span
                      class="icon-menu h3"></span></a>
      
                </div>
                <div class="col-12 col-lg-6 ml-auto d-flex">
                  <div class="ml-md-auto top-social d-none d-lg-inline-block">
                    <a href="#" class="d-inline-block p-3"><span class="icon-facebook"></span></a>
                      <a href="#" class="d-inline-block p-3"><span class="icon-twitter"></span></a>
                      <a href="#" class="d-inline-block p-3"><span class="icon-instagram"></span></a>
                  </div>
                <form action="{{ url('blog') }}" class="search-form d-inline-block">
                    <div class="d-flex">
                      <input type="text" name="q" class="form-control" placeholder="Search...">
                      <button type="submit" class="btn btn-secondary" ><span class="icon-search"></span></button>
                    </div>
                  </form>
      
                  
                </div>
                <div class="col-6 d-block d-lg-none text-right">
                  
                </div>
              </div>
            </div>
            
            <div class="site-navbar py-2 js-sticky-header site-navbar-target d-none pl-0 d-lg-block" role="banner">
      
            <div class="container">
              <div class="d-flex align-items-center">
                
                <div class="mr-auto">
                  <nav class="site-navigation position-relative text-right" role="navigation">
                    <ul class="site-menu main-menu js-clone-nav mr-auto d-none pl-0 d-lg-block">
                        <li class="{{ Request::segment(2) == '' ? 'active' : '' }}">
                            <a href="{{ url('/') }}" class="nav-link text-left">Home</a>
                        </li>
                        <li class="{{ Request::segment(2) == 'blog' ? 'active' : '' }}">
                            <a href="{{ route('blog') }}" class="nav-link text-left">Blog</a>
                        </li>
                        @guest
                        <li>
                            <a href="{{ route('login') }}" class="nav-link text-left">Login</a>
                        </li>
                        @endguest
                        @auth
                        <li>
                            <a href="{{ route('home') }}" class="nav-link text-left">Admin Page</a>
                        </li>
                        <li class="pull-right">
                            <a href="{{ route('logout') }}"
                              onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();" class="nav-link text-left">Logout</a>
                        </li>
                        @endauth                                                                                                                                                                                                                                                                                        
                      </ul> 
                    </nav>
      
                </div>
               
              </div>
            </div>
      
          </div>
          
          </div>
          @yield('container')

  
  <div class="footer">
    <div class="container">
      

      <div class="row">
        <div class="col-12">
          <div class="copyright">
              <p>
                  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart text-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank" >Colorlib</a>
                  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                  </p>
          </div>
        </div>
      </div>
    </div>
  </div>
  

</div>
<!-- .site-wrap -->


<!-- loader -->
<div id="loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#ff5e15"/></svg></div>

<script src="{{ asset('non-auth/js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('non-auth/js/jquery-migrate-3.0.1.min.js') }}"></script>
<script src="{{ asset('non-auth/js/jquery-ui.js') }}"></script>
<script src="{{ asset('non-auth/js/popper.min.js') }}"></script>
<script src="{{ asset('non-auth/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('non-auth/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('non-auth/js/jquery.stellar.min.js') }}"></script>
<script src="{{ asset('non-auth/js/jquery.countdown.min.js') }}"></script>
<script src="{{ asset('non-auth/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('non-auth/js/jquery.easing.1.3.js') }}"></script>
<script src="{{ asset('non-auth/js/aos.js') }}"></script>
<script src="{{ asset('non-auth/js/jquery.fancybox.min.js') }}"></script>
<script src="{{ asset('non-auth/js/jquery.sticky.js') }}"></script>
<script src="{{ asset('non-auth/js/jquery.mb.YTPlayer.min.js') }}"></script>
<script src="{{ asset('non-auth/js/main.js') }}"></script>
@yield('js')
</body>
</html>
