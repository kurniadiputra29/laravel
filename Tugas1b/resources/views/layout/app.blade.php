<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>@yield('title')</title>

    <!-- Fontfaces CSS-->
    <link href="/CoolAdmin/css/font-face.css" rel="stylesheet" media="all">
    <link href="/CoolAdmin/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="/CoolAdmin/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="/CoolAdmin/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="/CoolAdmin/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- /CoolAdmin/Vendor CSS-->
    <link href="/CoolAdmin/vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="/CoolAdmin/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="/CoolAdmin/vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="/CoolAdmin/vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="/CoolAdmin/vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="/CoolAdmin/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="/CoolAdmin/vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="/CoolAdmin/css/theme.css" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        @include('layout.header')
        
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        @include('layout.sidebar')
        
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            @include('layout.headerDesktop')
            
            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                @yield('content')
            </div>
            @include('layout.footer')
            
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>

    </div>

    <!-- Jquery JS-->
    <script src="/CoolAdmin/vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="/CoolAdmin/vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="/CoolAdmin/vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- /CoolAdmin/Vendor JS       -->
    <script src="/CoolAdmin/vendor/slick/slick.min.js">
    </script>
    <script src="/CoolAdmin/vendor/wow/wow.min.js"></script>
    <script src="/CoolAdmin/vendor/animsition/animsition.min.js"></script>
    <script src="/CoolAdmin/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="/CoolAdmin/vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="/CoolAdmin/vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="/CoolAdmin/vendor/circle-progress/circle-progress.min.js"></script>
    <script src="/CoolAdmin/vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="/CoolAdmin/vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="/CoolAdmin/vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="/CoolAdmin/js/main.js"></script>

</body>

</html>
<!-- end document-->





