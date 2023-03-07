<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>CMS - Future Generation Properties </title>
    <link rel="shortcut icon" href="{{url('')}}/assets/img/favicon.png">
    <link href="{{ url('') }}/assets/css/loader.css" rel="stylesheet" type="text/css" />
    <script src="{{ url('') }}/assets/js/loader.js"></script>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="{{ url('') }}/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ url('') }}/assets/css/plugins.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    <link href="{{ url('') }}/plugins/apex/apexcharts.css" rel="stylesheet" type="text/css">
    <link href="{{ url('') }}/assets/css/dashboard/dash_2.css" rel="stylesheet" type="text/css" />
    <link href="{{ url('') }}/plugins/sweetalerts/sweetalert2.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ url('') }}/plugins/sweetalerts/sweetalert.css" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->

    <style>
      #sidebar .theme-brand {
        background-color: #fff;
        padding: 0 12px 0 24px;
        border-bottom: 1px solid #fff;
        justify-content: space-between;
      }
    </style>
  </head>
  <body class="sidebar-noneoverflow">
    <!-- BEGIN LOADER -->
    <div id="load_screen"> <div class="loader"> <div class="loader-content">
        <div class="spinner-grow align-self-center"></div>
    </div></div></div>
    <!--  END LOADER -->

    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container" id="container">

    <div class="overlay"></div>
    <div class="cs-overlay"></div>
    <div class="search-overlay"></div>

    @section('header')
        @include('cms.layouts.header')
    @show

    @yield('top-styles')

    @section('leftside')
      @include('cms.layouts.leftside')
    @show

    <!-- ============================================================== -->
      <!-- Start right Content here -->
      <!-- ============================================================== -->
      
      @yield('content')
      <!-- ============================================================== -->
      <!-- End Right content here -->
      <!-- ============================================================== -->
      
        @include('cms.layouts.footer')
      @show
    
    </div>


<!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
<script src="{{ url('') }}/assets/js/libs/jquery-3.1.1.min.js"></script>
<script src="{{ url('') }}/bootstrap/js/popper.min.js"></script>
<script src="{{ url('') }}/bootstrap/js/bootstrap.min.js"></script>
<script src="{{ url('') }}/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="{{ url('') }}/assets/js/app.js"></script>
<script>
    $(document).ready(function() {
        App.init();
    });
</script>
<script src="{{ url('') }}/assets/js/custom.js"></script>
<!-- END GLOBAL MANDATORY SCRIPTS -->
<script src="{{ url('') }}/plugins/apex/apexcharts.min.js"></script>

@yield('bottom-mid-scripts')

<!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
<script src="{{ url('') }}/assets/js/dashboard/dash_2.js"></script>
<script src="{{ url('') }}/assets/js/sweetalert2.min.js"></script>
<!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->

@yield('bottom-bot-scripts')

  </body>
</html>
