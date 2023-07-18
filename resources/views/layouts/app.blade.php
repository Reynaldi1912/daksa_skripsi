<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="ThemeStarz">
    <link rel="shortcut icon" href="../cuba/assets/images/favicon.png" type="image/x-icon">
    <!--CSS -->
    <link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/font-awesome/css/fontawesome-all.min.css">
    <!-- <link rel="stylesheet" href="/assets/css/leaflet.css"> -->
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
     integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
     crossorigin=""/>
     <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
     integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
     crossorigin=""></script>

    <title>DAKSA</title>

</head>

<body>

<!-- WRAPPER
=====================================================================================================================-->
<div class="ts-page-wrapper ts-homepage" id="page-top">

    @include('layouts.header')
    <main id="ts-main">
    <script src="/assets/js/jquery-3.3.1.min.js"></script>
        @yield('content')

    </main>

    <!--*********************************************************************************************************-->
    <!--************ FOOTER *************************************************************************************-->
    <!--*********************************************************************************************************-->

@include('layouts.footer')

<script src="/assets/js/popper.min.js"></script>
<script src="/assets/js/jquery.magnific-popup.min.js"></script>
<script src="/assets/js/owl.carousel.min.js"></script>
<!-- <script src="/assets/js/leaflet.js"></script> -->
<!-- <script src="/assets/js/leaflet.markercluster.js"></script> -->
<!-- <script src="/assets/js/map-leaflet.js"></script> -->

     <script src="/assets/bootstrap/js/bootstrap.min.js"></script>
     <script src="/assets/js/custom.js"></script>

</body>
</html>
