<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title')</title>

    <!-- Masukkan link CSS atau script lainnya di sini -->
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('NiceAdmin') }}/assets/img/admin.png" rel="icon">
    <link href="{{ asset('NiceAdmin') }}/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('NiceAdmin') }}/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('NiceAdmin') }}/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="{{ asset('NiceAdmin') }}/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="{{ asset('NiceAdmin') }}//vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="{{ asset('NiceAdmin') }}/assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="{{ asset('NiceAdmin') }}/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="{{ asset('NiceAdmin') }}/assets/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('NiceAdmin') }}/assets/css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <!-- ======= Header ======= -->
        <header id="header" class="header fixed-top d-flex align-items-center">

            <div class="d-flex align-items-center justify-content-between">
                <a href="index.html" class="logo d-flex align-items-center">
                    <img src="{{ asset('NiceAdmin') }}/assets/img/admin.png" alt="">
                    <span class="d-none d-lg-block">Penjualan produk</span>
                </a>
                <i class="bi bi-list toggle-sidebar-btn"></i>
            </div><!-- End Logo -->

            <nav class="header-nav ms-auto">
                <ul class="d-flex align-items-center">

                    <li class="nav-item d-block d-lg-none">
                        <a class="nav-link nav-icon search-bar-toggle " href="#">
                            <i class="bi bi-search"></i>
                        </a>
                    </li><!-- End Search Icon-->

                    <li class="nav-item dropdown pe-3">

                        <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#"
                            data-bs-toggle="dropdown">
                            <span>PT.Jak Art</span>
                        </a><!-- End Profile Iamge Icon -->
        </header><!-- End Header -->
        @include('layouts.navbar')
        @yield('content')

    </div>
    <script src="{{ asset('js/bootstrap.bundle.js') }}"></script>
    <!-- Vendor JS Files -->
    <script src="{{ asset('NiceAdmin') }}/assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="{{ asset('NiceAdmin') }}/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('NiceAdmin') }}/assets/vendor/chart.js/chart.umd.js"></script>
    <script src="{{ asset('NiceAdmin') }}/assets/vendor/echarts/echarts.min.js"></script>
    <script src="{{ asset('NiceAdmin') }}/assets/vendor/quill/quill.min.js"></script>
    <script src="{{ asset('NiceAdmin') }}/assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="{{ asset('NiceAdmin') }}/assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="{{ asset('NiceAdmin') }}/assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('NiceAdmin') }}/assets/js/main.js"></script>
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</body>

</html>
