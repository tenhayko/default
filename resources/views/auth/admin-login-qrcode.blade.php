<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Viet Go Admin Login</title>
        <base href="{{asset('')}}">
        <!-- Styles -->
        <!-- Bootstrap 3.3.7 -->
        <link rel="stylesheet" href="admin_asset/bower_components/bootstrap/dist/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="admin_asset/bower_components/font-awesome/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="admin_asset/bower_components/Ionicons/css/ionicons.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="admin_asset/dist/css/AdminLTE.min.css">
        <!-- iCheck -->
        <link rel="stylesheet" href="admin_asset/plugins/iCheck/square/blue.css">
        <!-- Google Font -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    </head>

   <body class="hold-transition login-page">
    <div class="login-box">
      <div class="login-logo">
        <a href="#"><b>Admin</b>VietGo</a>
      </div>
      <!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">Sign in to start your session</p>
        <div class="row">
        	<div class="col-xs-12 text-center">
        		<img src="{{ $QrUrl }}" alt="">
        	</div>
        </div>
        <form class="form-horizontal" method="POST" action="{{ route('admin.qrcode') }}">
            {{ csrf_field() }}
          <div class="has-feedback form-group">
            <input id="secret" type="text" class="form-control" name="secret" value="" required autofocus placeholder="secret">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
           <div class="has-feedback form-group">
               <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
		   </div>
        </form>

        <!-- /.social-auth-links -->
      </div>
      <!-- /.login-box-body -->
    </div>
    <!-- /.login-box -->

    <!-- jQuery 3 -->
    <script src="admin_asset/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="admin_asset/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    </body>

</html>
