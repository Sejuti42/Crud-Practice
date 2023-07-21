<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>@yield('title')</title>
   @include('back.includes.css')
</head>
<body class="sb-nav-fixed">
    @include('back.includes.header')
<div id="layoutSidenav">
   @include('back.includes.menu')
    <div id="layoutSidenav_content">
        @yield('body')
        @include('back.includes.footer')
    </div>
</div>
    @include('back.includes.js')
</body>
</html>
