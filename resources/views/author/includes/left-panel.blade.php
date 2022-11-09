<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">
        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
            

                <li class="menu-title">Tables</li><!-- /.menu-title -->

                <li>
                    <a href="{{ url('author/tables/conference') }}"> <i class="menu-icon fa-solid fa-user-tie"></i>Available Conference</a>
                </li>
                <li>
                    <a href="{{ url('author/tables/submission') }}" class="dropdown-toggle"> <i class="menu-icon fa fa-tasks"></i>Submissions</a>
                </li>
                <li>
                    <a href="{{ url('author/tables/submission/accept') }}"> <i class="menu-icon fa-solid fa-feather"></i>Accepted Paper</a>
                </li>
                <li>
                    <a href="{{ url('author/tables/submission/reject') }}"> <i class="menu-icon fa-solid fa-magnifying-glass"></i>Rejected Paper</a>
                </li>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside>