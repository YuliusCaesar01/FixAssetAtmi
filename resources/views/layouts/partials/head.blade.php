<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
  <title>@yield('title') Sarpras</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet"
        type="text/css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- SweetAlert2 CDN -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Tempusdominus Bootstrap 4 -->
    <link href="{{ asset('vendor/css/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet">
    <!-- iCheck -->
    <link href="{{ asset('vendor/css/icheck-bootstrap.min.css') }}" rel="stylesheet">
    <!-- Theme style -->
    <link href="{{ asset('vendor/css/adminlte.min.css') }}" rel="stylesheet">
    <!-- overlayScrollbars -->
    <link href="{{ asset('vendor/css/OverlayScrollbars.min.css') }}" rel="stylesheet">
    <!-- Daterange picker -->
    <link href="{{ asset('vendor/css/daterangepicker.css') }}" rel="stylesheet">
    <!-- summernote -->
    <link href="{{ asset('vendor/css/summernote-bs4.min.css') }}" rel="stylesheet">
    
    <!-- navbar-->
    <link href="{{ asset('vendor/css/navbar.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/css/head.css') }}" rel="stylesheet">

    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('icon.jpg') }}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('vendor/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/css/buttons.bootstrap4.min.css') }}">
   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- Include Flatpickr CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">

<!-- Include Flatpickr JS -->
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<!-- Include DataTables CSS and JS -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<title>Document</title>
    <!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">


  <style>
    chatgpt-sidebar,
    chatgpt-sidebar-popups {
        display: none !important; /* Menyembunyikan elemen */
    }
</style>

  
    @yield('scriptheadtambahan')
    @stack('header')
</head>
