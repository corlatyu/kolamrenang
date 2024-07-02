<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>SignIn Boxed | CORK - Multipurpose Bootstrap Dashboard Template</title>
    <link rel="icon" type="image/x-icon" href="cork/src/assets/img/favicon.ico"/>

    <!-- Global CSS -->
    <link href="{{ asset('cork/layouts/collapsible-menu/css/light/loader.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('cork/layouts/collapsible-menu/css/dark/loader.css') }}" rel="stylesheet" type="text/css"/>
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="{{ asset('cork/src/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>

    <link href="{{ asset('cork/layouts/collapsible-menu/css/light/plugins.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('cork/src/assets/css/light/authentication/auth-boxed.css') }}" rel="stylesheet" type="text/css"/>

    <link href="{{ asset('cork/layouts/collapsible-menu/css/dark/plugins.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('cork/src/assets/css/dark/authentication/auth-boxed.css') }}" rel="stylesheet" type="text/css"/>

    <!-- END GLOBAL MANDATORY STYLES -->

</head>
<body class="form">

<!-- BEGIN LOADER -->
{{-- <div id="load_screen">
    <div class="loader">
        <div class="loader-content">
            <div class="spinner-grow align-self-center"></div>
        </div>
    </div>
</div> --}}
<!-- END LOADER -->

<div class="auth-container d-flex">

    <div class="container mx-auto align-self-center">

        <div class="row">

            <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-8 col-12 d-flex flex-column align-self-center mx-auto">
                <div class="card mt-3 mb-3">
                    <div class="card-body">

                        @yield('content')

                    </div>
                </div>
            </div>

        </div>

    </div>

</div>

<!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
<script src="{{ asset('cork/src/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- END GLOBAL MANDATORY SCRIPTS -->

</body>
</html>
