<header class="main-header">
  <!-- Logo -->
  <a href="index2.html" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><b>E</b>T</span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><b>Embrace</b>Transfer</span>
  </a>
  <!-- Header Navbar: style can be found in header.less -->
  <nav class="navbar navbar-static-top">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
      <span class="sr-only">Toggle navigation</span>
    </a>

    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <!-- Messages: style can be found in dropdown.less-->
        <!-- User Account: style can be found in dropdown.less -->
        <li class="">
            <a href="{{ route('admin.logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
		<span class="hidden-xs">Đăng xuất</span>
            </a>
            <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
	    
          <ul class="dropdown-menu">
            <!-- User image -->
            <li class="user-header">
              <img src="{{ Auth::guard('admin')->user()->image?Auth::guard('admin')->user()->image:'admin_asset/dist/img/user2-160x160.jpg' }}" class="img-circle" alt="User Image">

              <p>
                {{ Auth::guard('admin')->user()->name.' - '.Auth::guard('admin')->user()->job_title }}
                <small>Member since {{ date('D-d-M-Y',strtotime(Auth::guard('admin')->user()->created_at)) }}</small>
              </p>
            </li>
            <!-- Menu Body -->
            <li class="user-body">
              <div class="row">
                <div class="col-xs-4 text-center">
                  <a href="#">Followers</a>
                </div>
                <div class="col-xs-4 text-center">
                  <a href="#">Sales</a>
                </div>
                <div class="col-xs-4 text-center">
                  <a href="#">Friends</a>
                </div>
              </div>
              <!-- /.row -->
            </li>
            <!-- Menu Footer-->
            <li class="user-footer">
              <div class="pull-left">
                <a href="/admin#!/profile" class="btn btn-default btn-flat">Profile</a>
              </div>
              <div class="pull-right">
                @if (!Auth::guest())
                <a href="{{ route('admin.logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="btn btn-default btn-flat">Sign out</a>
                <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
                @endif
              </div>
            </li>
          </ul>
        </li>
        <!-- Control Sidebar Toggle Button -->
      </ul>
    </div>
  </nav>
</header>
