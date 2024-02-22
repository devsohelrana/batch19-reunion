<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="light-style layout-menu-fixed"
    data-theme="theme-default" data-assets-path="{{ asset('/assets') . '/' }}" data-base-url="{{ url('/') }}"
    data-framework="laravel" data-template="vertical-menu-laravel-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>@yield('title')</title>

    <meta name="description" content="" />
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/favicon/favicon.ico') }}" />


    <!-- Include Styles -->
    @include('layouts.vendor.styles')

    <!-- Include Scripts for customizer, helper, analytics, config -->
    @include('layouts.vendor.scriptsIncludes')

</head>

<body>

    <!-- Layout Content -->
    @yield('layoutContent')
    <!-- / Layout wrapper -->

    <!-- Include Scripts -->
    @include('layouts.vendor.scripts')
</body>

</html>
