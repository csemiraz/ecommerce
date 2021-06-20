<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>@yield('title')</title>
        <link rel="stylesheet" href="{{ asset('assets/common/bootstrap-5.0.1-dist/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/common/DataTables-1.10.25/css/jquery.dataTables.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/common/fontawesome-free-5.15.3-web/css/all.css') }}">
        <link href="{{ asset('assets/back-end/admin/css/styles.css') }}" rel="stylesheet" />
        <link rel="stylesheet" href="{{ asset('assets/common/toastrjs/toastr.min.css') }}">
    </head>
    <body class="sb-nav-fixed">

        @include('back-end.admin.layouts.partial.nav-bar')

        <div id="layoutSidenav">

            @include('back-end.admin.layouts.partial.left-bar')

            <div id="layoutSidenav_content" class="mt-5">
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
        <script src="{{ asset('assets/common/toastrjs/toastr.min.js') }}"></script>
        <script src="{{ asset('assets/common/sweetalert2/sweetalert2.all.min.js') }}"></script>

        <script>
          $(document).ready( function () {
            $('#myTable').DataTable();
          } );
        </script>
        {!! Toastr::message() !!}

        <script>
          @if($errors->any())
            @foreach ($errors->all() as $error)
              toastr.error('{{ $error }}', 'Error', {
                closeButton:true,
                progressBar:true,
              })
            @endforeach
          @endif
        </script>

      <script>
        function deleteData(id) {
          const swalWithBootstrapButtons = Swal.mixin({
          customClass: {
            confirmButton: 'btn btn-success',
            cancelButton: 'btn btn-danger'
          },
          buttonsStyling: false
        })

        swalWithBootstrapButtons.fire({
          title: 'Are you sure?',
          text: "You won't be able to revert this!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonText: 'Yes, delete it!',
          cancelButtonText: 'No, cancel!',
          reverseButtons: true
        }).then((result) => {
          if (result.value) {
            event.preventDefault();
            document.getElementById('delete-data-'+id).submit();
          } else if (
            /* Read more about handling dismissals below */
            result.dismiss === Swal.DismissReason.cancel
          ) {
            swalWithBootstrapButtons.fire(
              'Cancelled',
              'Your imaginary file is safe :)',
              'error'
            )
          }
        })
        }
      </script>



    </body>
</html>
