<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>HaNoiTransfer Admin</title>
        <base href="{{asset('')}}">
        <!-- Styles -->
        @yield('style')
    </head>

    <body class="hold-transition skin-blue sidebar-mini" ng-app="app">
        <div class="wrapper">
            @include('admin.layouts.header')
            @include('admin.layouts.leftSide')
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Page Content -->
                @yield('content')
                <!-- /#page-wrapper -->
            </div>
            <!-- /.content-wrapper -->
            <footer class="main-footer">
                <div class="pull-right hidden-xs">
                  <b>Version</b> 1.0.0
                </div>
                <strong>Copyright &copy; 2018 SilkroadPacific.</strong>
            </footer>
            @include('admin.layouts.controlSlidebar')
            <div class="control-sidebar-bg"></div>
        </div><!-- ./wrapper -->
        @yield('script')
    </body>

</html>
