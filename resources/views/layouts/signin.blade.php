<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Shreyu - Admin & Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('shreyu/images/favicon.ico') }}">

    <!-- App css -->
    <link href="{{ asset('shreyu/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('shreyu/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('shreyu/css/app.min.css') }}" rel="stylesheet" type="text/css" />

    @livewireStyles
</head>

<body class="authentication-bg">

    @yield('content')
    <!-- end page -->

    @livewireScripts
    <!-- Vendor js -->
    <script src="{{ asset('shreyu/js/vendor.min.js') }}"></script>

    <!-- App js -->
    <script src="{{ asset('shreyu/js/app.min.js') }}"></script>

    <!-- SweetAlert JavaScript -->
    <script src="{{ asset('js/sweetalert.min.js') }}"></script>

    <script>
        window.addEventListener('swal:modal', event => {
            swal({
                title: event.detail.message,
                text: event.detail.text,
                icon: event.detail.type,
            });
        });
        window.addEventListener('redirect-blank', event => {
            window.open(event.detail.url, '_blank');
		});
    </script>
</body>
</html>
