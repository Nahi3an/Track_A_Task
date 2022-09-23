<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with LeadMark landing page.">
    <meta name="author" content="Devcrud">
    <title>@yield('title')</title>
    <!-- font icons -->
    <link rel="stylesheet" href="{{ asset('front_end_asset/assets') }}/vendors/themify-icons/css/themify-icons.css">
    <!-- Bootstrap + LeadMark main styles -->
    <link rel="stylesheet" href="{{ asset('front_end_asset/assets') }}/css/leadmark.css">
</head>

<body data-spy="scroll" data-target=".navbar" data-offset="40" id="home">

    <!-- navbar & header start -->
    @include('front_end.include.header')
    <!-- navbar & header End -->



    @yield('content')

    <!-- Page Footer -->
    {{-- @include('front_end.include.footer') --}}
    <!-- End of Page Footer -->

    <!-- core  -->
    <script src="{{ asset('front_end_asset/assets') }}/vendors/jquery/jquery-3.4.1.js"></script>
    <script src="{{ asset('front_end_asset/assets') }}/vendors/bootstrap/bootstrap.bundle.js"></script>

    <!-- bootstrap 3 affix -->
    <script src="{{ asset('front_end_asset/assets') }}/vendors/bootstrap/bootstrap.affix.js"></script>

    <!-- Isotope -->
    <script src="{{ asset('front_end_asset/assets') }}/vendors/isotope/isotope.pkgd.js"></script>

    <!-- LeadMark js -->
    <script src="{{ asset('front_end_asset/assets') }}/js/leadmark.js"></script>

</body>

</html>
