<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">
        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active">
                    <a href="{{ url('admin/dashbord') }}"><i class="menu-icon fa fa-laptop"></i>Dashboard </a>
                </li>
                <li class="menu-title">Create</li><!-- /.menu-title -->
                <li>
                    <a href="#" class="dropdown-toggle"> <i class="menu-icon fa fa-cogs"></i>User</a>
                </li>
                <li>
                    <a href="{{ url('admin/register/uni-admin') }}"> <i class="menu-icon fa fa-table"></i>University Admin</a>
                </li>

                <li class="menu-title">Tables</li><!-- /.menu-title -->

                <li>
                    <a href="{{ url('admin/tables/uni-admin') }}"> <i class="menu-icon fa-solid fa-user-tie"></i>Admin</a>
                </li>
                <li>
                    <a href="#" class="dropdown-toggle"> <i class="menu-icon fa fa-tasks"></i>University</a>
                </li>
                <li>
                    <a href="#"> <i class="menu-icon fa-solid fa-feather"></i>Auther</a>
                </li>
                <li>
                    <a href="#"> <i class="menu-icon fa-solid fa-magnifying-glass"></i>Reviewer</a>
                </li>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside>