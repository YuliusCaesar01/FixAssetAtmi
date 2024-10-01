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

    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('icon.jpg') }}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('vendor/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/css/buttons.bootstrap4.min.css') }}">
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- Include Flatpickr CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

<!-- Include Flatpickr JS -->
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <style>
      /* CSS untuk membuat isi kolom berada di tengah */
      #tbl_permintaanfa td {
          text-align: center; /* Tengah secara horizontal */
          vertical-align: middle; /* Tengah secara vertikal */
      }
  </style>
    
<!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Include DataTables CSS and JS -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha384-DyZv8nQj1YIDwDgJ+ohIYo0D0/lfYzwgMnOoj39Xj31d74yUep/yZyW5DiD5Z0Qj" crossorigin="anonymous">
<title>Document</title>
    <!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://js.pusher.com/6.0/pusher.min.js"></script>
<style>
  .tab-background {
      background-color: #f8f9fa; /* Light gray background for each tab content */
      border-radius: 8px; /* Optional: round corners */
      padding: 15px; /* Padding inside the tab content */
  }

  /* Other styles remain the same */
  .validation-time {
      position: absolute; /* Position the time in the corner */
      top: 10px; /* Adjust top position */
      right: 10px; /* Adjust right position */
      font-size: 12px; /* Font size for the validation time */
      color: #6c757d; /* Light gray color for better visibility */
      font-weight: normal; /* Not bold */
  }

  .progress-timeline {
      display: flex;
      justify-content: space-between;
      flex-wrap: wrap;
      margin-top: 20px;
      padding: 10px;
      border-radius: 8px;
  }

  .btn-download {
      background-color: #007bff; /* Blue background */
      color: white; /* White text */
      border: none; /* No border */
      border-radius: 4px; /* Rounded corners */
      padding: 8px 12px; /* Padding for the button */
      font-size: 14px; /* Font size */
      cursor: pointer; /* Pointer cursor on hover */
      margin-top: 10px; /* Space above the button */
  }

  .btn-download:hover {
      background-color: #0056b3; /* Darker blue on hover */
  }
  .countdown {
          display: block;
          width: 100%;
          padding: 0.5rem;
          text-align: center;
          color: white;
          background-color: #6a6a6a;
      }
                      .timeline-item {
      text-align: center;
      flex: 1 1 18%; /* Adjust to allow for 5 items (100% / 5 = 20% minus margin) */
      min-width: 150px; /* Optional: set a minimum width if needed */
      position: relative;
      padding: 15px;
      background-color: white;
      border-radius: 8px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      margin-bottom: 15px;
  }

  .timeline-item:hover {
      transform: scale(1.02); /* Slightly scale up on hover */
  }

  .status-indicator.default {
      background-color: #ffc107; /* Color for the default state (yellow) */
      border: 2px solid white; /* White border */
  }

  .status-indicator.default i {
      color: white; /* White color for the icon */
  }

  .timeline-item:not(:last-child) {
      margin-right: 15px;
  }

  .profile-status {
      display: flex;
      align-items: center;
      justify-content: center;
      margin-bottom: 10px;
  }

  .profile-pic {
      width: 60px;
      height: 60px;
      border-radius: 50%;
      object-fit: cover;
      margin-right: 10px;
  }

  .status-indicator {
      width: 20px; /* Adjust width as needed */
      height: 20px; /* Adjust height as needed */
      border-radius: 50%; /* Makes it circular */
      border: 2px solid white; /* White border */
      background-color: transparent; /* Transparent background */
      display: flex; /* Use flexbox for centering */
      align-items: center; /* Center vertically */
      justify-content: center; /* Center horizontally */
      position: relative; /* Ensure positioning for child elements */
  }

  .status-indicator i {
      color: white; /* White color for the icons */
      font-size: 10px; /* Size of the icons */
      margin: 0; /* Remove any default margin */
  }

  .status-indicator.approved {
      background-color: #28a745;
  }

  .status-indicator.rejected {
      background-color: #dc3545;
  }

  .timeline-content {
      padding-top: 10px;
      font-size: 14px;
  }

  .status-note {
      margin-top: 10px;
      text-align: left;
  }

  .status {
      background-color: #f8f9fa;
      padding: 5px;
      border-radius: 5px;
      margin-bottom: 5px;
  }
  .bg-dark-500 {
      background-color: #333; /* Atau warna lain sesuai kebutuhan */
  }
  .note {
      background-color: #e9ecef;
      padding: 5px;
      border-radius: 5px;
  }

  @media (max-width: 768px) {
      .timeline-item {
          flex: 1 1 45%; /* Show 2 items in a row on smaller screens */
      }
  }

  @media (max-width: 480px) {
      .timeline-item {
          flex: 1 1 90%; /* Show 1 item in a row on mobile */
      }
  }
</style>

<style>
  .qr-code-container {
      position: absolute;
      bottom: 10px; /* Adjust as needed */
      right: 10px;  /* Adjust as needed */
      background-color: #fff; /* Optional: add background color for better visibility */
      padding: 10px; /* Optional: add padding */
      border: 1px solid #ccc; /* Optional: add border */
      border-radius: 5px; /* Optional: add rounded corners */
  }

  .qr-code-container img {
      display: block;
      margin-bottom: 10px;
  }

  .button-group {
      display: flex;
      justify-content: space-between;
  }

  .button-group button {
      flex: 1;
      margin: 0 5px;
      padding: 10px;
      font-size: 16px;
  }

  .button-group a {
      text-decoration: none;
  }
</style>
<style>
    .icon-button {
  position: relative;
  display: flex;
  align-items: center;
  justify-content: center;
  width: 45px;
  height: 30px;
  color: #ffffff;
  background: #ffffff;
  border: none;
  outline: none;
  border-radius: 50%;
}

.icon-button:hover {
  cursor: pointer;
  color: #333333;
  background: #dddddd;
}

.icon-button:active {
  background: #cccccc;
}

.icon-button__badge {
  position: absolute;
  top: -10px;
  right: -10px;
  width: 25px;
  height: 25px;
  background: red;
  color: #ffffff;
  display: flex;
  justify-content: center;
  align-items: center;
  border-radius: 50%;
}

    </style>


    @yield('scriptheadtambahan')
    @stack('header')
</head>
