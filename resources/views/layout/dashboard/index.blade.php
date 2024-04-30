@include('layout.partials.styles')

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        @include('layout.partials.nav')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        @include('layout.partials.side-bar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->

            {{ $conentHeader }}

            <!-- /.content-header -->

            <!-- Main content -->

            <div class="content">
                <div class="container-fluid">

                    {{ $slot }}

                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->



        <!-- Main Footer -->
        @include('layout.partials.footer')
    </div>
    <!-- ./wrapper -->

    @include('layout.partials.scripts')
