<!DOCTYPE html>
<html lang="en">

<head>

    @include('includes.auth-meta')
    <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('assets/favicon') }}/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('assets/favicon') }}/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('assets/favicon') }}/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/favicon') }}/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('assets/favicon') }}/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('assets/favicon') }}/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('assets/favicon') }}/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('assets/favicon') }}/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/favicon') }}/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="{{ asset('assets/favicon') }}/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/favicon') }}/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('assets/favicon') }}/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/favicon') }}/favicon-16x16.png">
    <link rel="manifest" href="{{ asset('assets/favicon') }}/manifest.json">

    <title>@yield('title') | GOLKAR</title>

    @stack('before-style')
    @include('includes.auth-style')
    @stack('after-style')

</head>

<body style="background-color: #F4CE14">
    @include('sweetalert::alert')

    @yield('content')
</body>

</html>
