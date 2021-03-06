<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{asset('dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{auth()->user()->full_name}}</p>
                <!-- Status -->
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form (Optional) -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">MENU</li>
            <!-- Optionally, you can add icons to the links -->

            @if(auth()->user()->full_name == 'admin')


            <li><a href="{{route('admin.home')}}"><i class="fa fa-home"></i> <span>Home</span></a></li>

            <li class="treeview">
                <a href="#"><i class="fa fa-flag"></i> <span>Languages</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('admin.languages.create')}}">Add new</a></li>
                    <li><a href="{{route('admin.languages.index')}}">View all</a></li>
                </ul>
            </li>



            <li class="treeview">
                <a href="#"><i class="fa fa-columns"></i> <span>Categories</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('admin.categories.create')}}">Add new</a></li>
                    <li><a href="{{route('admin.categories.index')}}">View all</a></li>
                </ul>
            </li>


            <li class="treeview">
                <a href="#"><i class="fa fa-file-o"></i> <span>Pages</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('admin.pages.create')}}">Add new</a></li>
                    <li><a href="{{route('admin.pages.index')}}">View all</a></li>
                </ul>
            </li>

            <li><a href="{{route('admin.users.index')}}"><i class="fa fa-user"></i> <span>Users</span></a></li>
            <li><a href="{{route('admin.orders.index')}}"><i class="fa fa-calendar-o"></i> <span>Orders</span></a></li>
            <li><a href="{{route('user.orders.index')}}"><i class="fa fa-calendar-o"></i> <span>My orders</span></a></li>

            @endif

        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>