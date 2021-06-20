<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - SB Admin</title>
        <link rel="stylesheet" href="{{ asset('assets/common/bootstrap-5.0.1-dist/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/common/DataTables-1.10.25/css/jquery.dataTables.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/common/fontawesome-free-5.15.3-web/css/all.css') }}">
        <link href="{{ asset('assets/back-end/admin/css/styles.css') }}" rel="stylesheet" />
    </head>
    <body class="sb-nav-fixed">

        @include('back-end.admin.layouts.partial.nav-bar')

        <div id="layoutSidenav">

            @include('back-end.admin.layouts.partial.left-bar')

            <div id="layoutSidenav_content">
                @yield('content')
                
                @include('back-end.admin.layouts.partial.footer')
            </div>
        </div>
        <script src="{{ asset('assets/common/jQuery-3.3.1/jquery-3.3.1.min.js') }}"></script>
        <script src="{{ asset('assets/common/bootstrap-5.0.1-dist/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('assets/back-end/admin/js/scripts.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="{{ asset('assets/back-end/admin/assets/demo/chart-area-demo.js') }}"></script>
        <script src="{{ asset('assets/back-end/admin/assets/demo/chart-bar-demo.js') }}"></script>
        <script src="{{ asset('assets/common/DataTables-1.10.25/js/jquery.dataTables.min.js') }}"></script>

        <script>
          $(document).ready( function () {
            $('#myTable').DataTable();
          } );
        </script>
    </body>
</html>
