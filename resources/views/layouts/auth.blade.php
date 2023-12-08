<!DOCTYPE html>
<html lang="en">

<head>

    @include('includes.auth-meta')

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
