<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title> Login | Warehousema </title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="{{ asset('favicon.ico') }}">
        <!-- Place favicon.ico in the root directory -->
        <link rel="stylesheet" type="text/css" href="{{ asset('auth/css/vendor.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('auth/css/app.css') }}">
    
        <!-- Theme initialization -->
        <script>
            var themeSettings = (localStorage.getItem('themeSettings')) ? JSON.parse(localStorage.getItem('themeSettings')) :
            {};
            var themeName = themeSettings.themeName || '';
            if (themeName)
            {
                document.write('<link rel="stylesheet" id="theme-style" href="auth/css/app-' + themeName + '.css">');
            }
            else
            {
                document.write('<link rel="stylesheet" id="theme-style" href="auth/css/app.css">');
            }
        </script>
        <style>
            .help-block{
                color:red;
            }
        </style>
    </head>
    <body>
        <div class="auth">
            <div class="auth-container">
                <div class="card">
                    <header class="auth-header">
                        <h1 class="auth-title">
                            <div class="logo">
                                <span class="l l1"></span>
                                <span class="l l2"></span>
                                <span class="l l3"></span>
                                <span class="l l4"></span>
                                <span class="l l5"></span>
                            </div> Loops.id </h1>
                    </header>
                    <div class="auth-content">
                        <form id="login-form" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control underlined" name="email" id="email" placeholder="Your email" required> 
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control underlined" name="password" id="password" placeholder="Your password" required> 
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="remember">
                                    <input id="remember" class="checkbox" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <span>Remember me</span>
                                </label>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-block btn-primary">
                                    Login
                                </button>
                                <center><small>
                                    <b>2020 &copy Axel Titandrias Jodi Saputra</b>
                                </small></center>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Reference block for JS -->
        <div class="ref" id="ref">
            <div class="color-primary"></div>
            <div class="chart">
                <div class="color-primary"></div>
                <div class="color-secondary"></div>
            </div>
        </div>
    </body>
</html>
