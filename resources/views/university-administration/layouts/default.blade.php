@include('university-administration.includes.head')

<body>
    <!-- Left Panel -->
    @include('university-administration.includes.left-panel')
    <!-- /#left-panel -->
    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">
        <!-- Header-->
        @include('university-administration.includes.header')
        <!-- /#header -->
        @yield('content')

        <div class="clearfix"></div>
        <!-- Footer -->
        @include('university-administration.includes.footer')
        <!-- /.site-footer -->
    </div>
    <!-- /#right-panel -->

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>

    <!-- scripts for multiple input field  -->
    <script src="https://kit.fontawesome.com/46f536c64d.js" crossorigin="anonymous"></script>

</body>
</html>
