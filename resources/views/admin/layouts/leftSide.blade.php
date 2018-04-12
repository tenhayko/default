<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
	<!-- Sidebar user panel -->
	<div class="user-panel">
	    <div class="pull-left image">
		<img src="{{ Auth::guard('admin')->user()->image?Auth::guard('admin')->user()->image:'admin_asset/dist/img/user2-160x160.jpg' }}" class="img-circle" alt="User Image">
	    </div>
	    <div class="pull-left info">
		<p>{{ Auth::guard('admin')->user()->name }}</p>
		<a href="javascript:void(0)"><i class="fa fa-circle text-success"></i> Online</a>
	    </div>
	</div>
	<!-- /.search form -->
	<!-- sidebar menu: : style can be found in sidebar.less -->
	<ul class="sidebar-menu" data-widget="tree">
	    <li class="header">MAIN NAVIGATION</li>
	    <li class="active treeview">
		<a href="#">
		    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
		    <span class="pull-right-container">
			<i class="fa fa-angle-left pull-right"></i>
		    </span>
		</a>
		<ul class="treeview-menu">
		    <li class="active"><a ui-sref="home()"><i class="fa fa-circle-o"></i> Dashboard v1</a></li>
		</ul>
	    </li>

	    <li class="treeview">
			<a ui-sref="admin.list()">
			    <i class="fa fa-taxi" aria-hidden="true"></i> <span>Admin</span>
			</a>
	    </li>
	    
	</ul>
    </section>
    <!-- /.sidebar -->
</aside>
