<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" class="light-style customizer-hide"
      dir="{{app()->getLocale() == 'ar' ? 'rtl': 'ltr' }}" data-theme="theme-default"
      data-template="vertical-menu-template">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"/>
    <meta name="description" content="Wanes admin">
    <meta name="keywords" content="Wanes admin">
    <title>@lang('admin.adminwebsiteTitle')</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('images/fiv-icn.png') }}"/>
    <meta name="csrf-token" id="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="{{ asset('adminStyle/assets/vendor/fonts/materialdesignicons.css') }}"/>
    <link rel="stylesheet" href="{{ asset('adminStyle/assets/vendor/fonts/fontawesome.css') }}"/>
    <link rel="stylesheet" href="{{ asset('adminStyle/assets/vendor/libs/node-waves/node-waves.css') }}"/>
    <link rel="stylesheet" href="{{ asset('adminStyle/assets/vendor/css/rtl/core.css') }}"/>


    <link rel="stylesheet" href="{{ asset('adminStyle/assets/vendor/css/rtl/theme-default.css') }}"/>
    <link rel="stylesheet" href="{{ asset('adminStyle/assets/css/demo.css') }}"/>
    <link rel="stylesheet"
          href="{{ asset('adminStyle/assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}"/>
    <link rel="stylesheet"
          href="{{ asset('adminStyle/assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}"/>
    <link rel="stylesheet"
          href="{{ asset('adminStyle/assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css') }}"/>
    <link rel="stylesheet"
          href="{{ asset('adminStyle/assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css') }}"/>
    <link rel="stylesheet" href="{{ asset('adminStyle/assets/vendor/libs/select2/select2.css') }}"/>

    <link rel="stylesheet" href="{{ asset('adminStyle/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}"/>
    <link rel="stylesheet" href="{{ asset('adminStyle/assets/vendor/libs/typeahead-js/typeahead.css') }}"/>
    <link rel="stylesheet" href="{{ asset('adminStyle/assets/vendor/libs/flatpickr/flatpickr.css') }}" />

    <link rel="stylesheet" href="{{ asset('adminStyle/assets/vendor/libs/apex-charts/apex-charts.css') }}"/>
    <link rel="stylesheet" href="{{ asset('adminStyle/assets/vendor/libs/swiper/swiper.css') }}"/>
    <link rel="stylesheet" href="{{ asset('adminStyle/assets/vendor/css/pages/cards-statistics.css') }}"/>

    <link rel="stylesheet" href="{{ asset('adminStyle/assets/vendor/css/pages/page-auth.css') }}"/>
    <link rel="stylesheet" href="{{ asset('adminStyle/assets/vendor/libs/toastr/toastr.css') }} "/>
    <link rel="stylesheet" href="{{ asset('adminStyle/assets/vendor/libs/animate-css/animate.css') }}"/>
    <link rel="stylesheet" href="{{ asset('adminStyle/assets/vendor/libs/sweetalert2/sweetalert2.css') }}"/>
    <link rel="stylesheet" href="{{ asset('adminStyle/assets/vendor/css/pages/page-profile.css') }}"/>
    <script src="{{asset('adminStyle/assets/vendor/js/helpers.js')}}"></script>
    <script src="{{asset('adminStyle/assets/vendor/js/template-customizer.js')}}"></script>
    <script src="{{asset('adminStyle/assets/js/config.js')}}"></script>

    @stack('css')
    {{-- parsly --}}
    <link rel="stylesheet" href="{{ asset('parsley/parsly.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@500;1000&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Cairo', sans-serif;
            font-size: 18px;
        }
    </style>
</head>

