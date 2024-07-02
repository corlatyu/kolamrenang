<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <link href="{{ asset('adminsb/css/sb-admin-2.css') }}" rel="stylesheet">


    <title>Yovie Rizki</title>

    <!-- Custom fonts for this template -->
    <link href="{{ asset('adminsb/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">


    <!-- Custom styles for this template -->
    {{-- <link href="{{ asset('adminsb/css/sb-admin-2.min.css') }}" rel="stylesheet"> --}}

    <!-- Custom styles for this page -->
    <link href="{{ asset('adminsb/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">


</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">



        <!-- Sidebar -->
        @include('layout.sidebaradmin')
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                @include('layout.navbar')
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif
                    @if ($message = Session::get('errors'))
                        <div class="alert alert-danger alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif

                    <!-- Page Heading -->
                    @yield('content')

                    <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->

            </div>
            <!-- End of Content Wrapper -->
            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website Wisata Kolam Yovie 2024</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->
        </div>
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button -->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <!-- Include Modals Outside of the Table -->
        @include('dashboard.modal.logout')

        <!-- Bootstrap core JavaScript -->
        <script src="{{ asset('adminsb/vendor/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('adminsb/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

        <!-- Core plugin JavaScript -->
        <script src="{{ asset('adminsb/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

        <script src="{{ asset('adminsb/js/sb-admin-2.js') }}"></script>


        <!-- Custom scripts for all pages -->
        {{-- <script src="{{ asset('adminsb/js/sb-admin-2.min.js') }}"></script> --}}




        <!-- Page level plugins -->
        <script src="{{ asset('adminsb/vendor/chart.js/Chart.min.js') }}"></script>

        <!-- Page level custom scripts -->
        <script src="{{ asset('adminsb/js/demo/chart-area-demo.js') }}"></script>
        <script src="{{ asset('adminsb/js/demo/chart-pie-demo.js') }}"></script>

        <!-- Add this in the head or before the closing body tag -->
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

        <!-- Page level custom scripts -->
        <script src="{{ asset('adminsb/js/demo/datatables-demo.js') }}"></script>

        <!-- DataTables -->
        <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('vendor/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('vendor/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
        <script src="{{ asset('vendor/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>

        <script>
            $(function() {
                $("#example1").DataTable({
                    "aLengthMenu": [5, 10, 25, 50, 100],
                    "responsive": true,
                    "autoWidth": false
                });
            });
        </script>
            <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>


        @yield('scripts')

</body>

</html>
