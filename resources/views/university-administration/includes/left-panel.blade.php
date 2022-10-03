<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">
        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active">
                    <a href="{{ url('uni-admin/dashboard') }}"><i class="menu-icon fa fa-laptop"></i>Dashboard </a>
                </li>
                <li class="menu-title">Create</li><!-- /.menu-title -->
                <li>
                    <a href="{{ url('uni-admin/create-admin') }}"> <i class="menu-icon fa fa-cogs"></i>Create Admin</a>
                </li>
                <li>
                    <a href="{{ url('uni-admin/create-conference-paper') }}"> <i class="menu-icon fa fa-table"></i>Create Conference</a>
                </li>

                <li class="menu-title">Tables</li><!-- /.menu-title -->

                <li>
                    <a href="{{ url('uni-admin/conference-list') }}"> <i class="menu-icon fa fa-tasks"></i>Conference list</a>
                </li>
                <li>
                    <a href="{{ url('uni-admin/admin-list') }}"> <i class="menu-icon fa-solid fa-user-tie"></i>Admin list </a>
                </li>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside>