<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>
    {{ Request::is('/') ? 'Home Moban-App' : '' }}
    {{ Request::is('dashboard') ? 'Dashboard Moban-App' : '' }}
    {{ Request::is('about') ? 'About Moban-App' : '' }}
    {{ Request::is('feedback') ? 'Feedback Moban-App' : '' }}
    {{ Request::is('admin') ? 'Admin Moban-App' : '' }}
    {{ Request::is('log') ? 'Log Moban-App' : '' }}
  </title> 
  
  <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/dashboard/">
  <link rel="icon" type="image/png" href="{{ URL::asset('img/logo-with-bg.png') }}">

  <!-- Bootstrap core CSS -->
  <link href="https://getbootstrap.com/docs/4.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <!-- Custom styles for this template -->
  <!-- <link href="https://getbootstrap.com/docs/4.0/examples/dashboard/dashboard.css" rel="stylesheet"> -->
  <!-- Nucleo Icons -->
  <link href="{{ URL::asset('css/nucleo-icons.css') }}" rel="stylesheet" />
  <!-- CSS Files -->
  <link href="{{ URL::asset('css/black-dashboard.min.css?v=1.0.0') }}" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <!-- <link href="{{ URL::asset('demo/demo.css') }} " rel="stylesheet" /> -->
  <script src="https://code.jquery.com/jquery-3.4.0.min.js"></script>
  <script src="https://www.gstatic.com/firebasejs/5.10.1/firebase.js"></script>
  <script src="https://cdn.firebase.com/libs/firebaseui/3.5.2/firebaseui.js"></script>
  <link type="text/css" rel="stylesheet" href="https://cdn.firebase.com/libs/firebaseui/3.5.2/firebaseui.css" />
   
  <!-- {{ Request::is('/') ? '<script src="C:\xampp\htdocs\banjir-ta\public\js\mulaifirebase.js"></script>' : '' }} -->
  <!-- Chart JS -->
  <script src="{{ URL::asset('js/plugins/chartjs.min.js') }} "></script>
  
  