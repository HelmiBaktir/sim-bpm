<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('logo-sima.png') }}">
    <title>SIM BPS</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    {{-- <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('materialize/css/materialize.min.css') }}" rel="stylesheet"> --}}
      <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('adminlte/dist/css/adminlte.min.css')}}">
  <style>
      body {
            background: linear-gradient(to bottom, #dd5353 50%, white 50%);
        }
  </style>
</head>
<body class="hold-transition ">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card" style=" border-radius:30px" >
    <div class="card-body ">
        <div class="login-logo">
           <img src="{{ asset('logo-sima.png') }}" width="25%" alt="">
        </div>

    <h2 class="mt-3 mb-4">LOGIN</h2>

      <form action="{{ route('login') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">Username</label>
            <input type="text" class="form-control" name="username"  placeholder="Masukan Username">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Password</label>
            <input type="password" class="form-control" name="password"  placeholder="Masukan Password">
        </div>
     
        <div class="mt-3">
          <button type="submit" class="btn btn-danger btn-block">Masuk</button>
        </div>
      </form>

      

    </div>
    <!-- /.login-card-body -->
  </div>
</div>

<!-- /.login-box -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
</body>
</html>


   {{-- <div class="row justify-content-center m-auto">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                        @csrf

                        <div class="form-group row">
                            <!-- <label for="username" class="col-sm-4 col-form-label text-md-right">{{ __('Username') }}</label> -->

                            <div class="input-field col-md-8  offset-md-2">
                                <input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" required>
                                <label for="username">Username</label>

                                @if ($errors->has('username'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('username') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <!-- <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label> -->

                            <div class=" input-field col-md-8 offset-md-2">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                                <label for="password">Password</label>

                                @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-5">
                                <a href="#" class="tooltipped" data-position="bottom" data-tooltip="Contact Your Administrator">
                                    {{ __('Forgot Password?') }}
                                </a>
                                <button type="submit" class="btn btn-primary red">
                                    {{ __('Login') }}
                                </button>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> --}}
