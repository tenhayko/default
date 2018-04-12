@extends('admin.layouts.main')
@section('style')
    <link rel="stylesheet" href="admin_asset/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="admin_asset/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="admin_asset/bower_components/Ionicons/css/ionicons.min.css">
    <!-- bootstrap datepicker -->
    <link rel="stylesheet" href="admin_asset/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <!-- Bootstrap time Picker -->
    <link rel="stylesheet" href="admin_asset/plugins/timepicker/bootstrap-timepicker.min.css">
    <!-- daterange picker -->
    <link rel="stylesheet" href="admin_asset/bower_components/bootstrap-daterangepicker/daterangepicker.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="admin_asset/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
	 folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="admin_asset/dist/css/skins/_all-skins.min.css">
    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <link rel="stylesheet" href="admin_asset/bower_components/angular-ui-notification/dist/angular-ui-notification.min.css">
    <link rel='stylesheet' href='admin_asset/bower_components/angular-loading-bar/build/loading-bar.min.css' type='text/css' media='all' />
    <link rel="stylesheet" href="css/style.css">
    <script src="https://www.gstatic.com/firebasejs/4.6.2/firebase.js"></script>
    <script>
     var config = {
         apiKey: "AIzaSyArlm1gWZg0SVKggG1SewyCOVcmxDgDiqw",
         authDomain: "webapp-77e52.firebaseapp.com",
         databaseURL: "https://webapp-77e52.firebaseio.com",
         projectId: "webapp-77e52",
         storageBucket: "webapp-77e52.appspot.com",
         messagingSenderId: "397557131854"
     };
     firebase.initializeApp(config);
    </script>
@endsection
@section('content')
    <div ui-view autoscroll="true"></div>
@endsection
@section('script')
    <script type="text/javascript">
     var baseUrl = "{{ url('') }}";
     var API = baseUrl + '/admin/';
    </script>
    
    <!-- jQuery 3 -->
    <script src="admin_asset/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="admin_asset/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Excel -->
    <script src="js/jquery.table2excel.min.js"></script>
    <script src="js/excel.js"></script>

    <!-- AngularJs -->
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.6/angular.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular-ui-router/1.0.3/angular-ui-router.min.js"></script>
    <script src="admin_asset/bower_components/angular-ui-notification/dist/angular-ui-notification.min.js"></script>
    <script src="admin_asset/bower_components/angularfire/dist/angularfire.min.js"></script>
    <script type='text/javascript' src='admin_asset/bower_components/angular-loading-bar/build/loading-bar.min.js'></script>

    <!-- TinyMCE -->
    <script type="text/javascript" src="js/tinymce/tinymce.min.js"></script>
    <script type="text/javascript" src="js/angular-ui-tinymce/tinymce.js"></script>

    <script src="admin_asset/angular/admins/admin.js"></script>
    <script src="admin_asset/angular/app.js"></script>
    <!-- end AngularJs -->

    <!-- bootstrap datepicker -->
    <script src="admin_asset/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <!-- bootstrap time picker -->
    <script src="admin_asset/plugins/timepicker/bootstrap-timepicker.min.js"></script>
    <!-- InputMask -->
    <script src="admin_asset/plugins/input-mask/jquery.inputmask.bundle.js"></script>
    <!-- date-range-picker -->
    <script src="admin_asset/bower_components/moment/min/moment.min.js"></script>
    <script src="admin_asset/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- SlimScroll -->
    <script src="admin_asset/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="admin_asset/bower_components/fastclick/lib/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="admin_asset/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="admin_asset/dist/js/demo.js"></script>
    <script src="js/main.js"></script>
    <script>
     $(document).ready(function () {
	 $('.sidebar-menu').tree();
	 
     });
    </script>
@endsection
