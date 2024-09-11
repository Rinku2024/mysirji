<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        
          <!-- Favicons -->
          <link href="backend/img/favicon.png" rel="icon">
          <link href="backend/img/apple-touch-icon.png" rel="apple-touch-icon">

          <!-- Google Fonts -->
          <link href="https://fonts.gstatic.com" rel="preconnect">
          <link
   href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
   rel="stylesheet">

       <!-- Vendor CSS Files -->
       <link href="backend/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
       <link href="backend/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
       <link href="backend/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
       <link href="backend/vendor/quill/quill.snow.css" rel="stylesheet">
       <link href="backend/vendor/quill/quill.bubble.css" rel="stylesheet">
       <link href="backend/vendor/remixicon/remixicon.css" rel="stylesheet">
       <link href="backend/vendor/simple-datatables/style.css" rel="stylesheet">

       <link href="backend/css/style.css" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
            <div>
                <a href="/">
                    <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                </a>
            </div>

            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                {{ $slot }}
            </div>
        </div>

        <!-- ======= Footer ======= -->
       <footer id="footer" class="footer">
        <div class="copyright">
          &copy; Copyright <strong><span>Edite Volv</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
          Designed by <a href="">Edite Volv</a>
        </div>
      </footer><!-- End Footer -->

      <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
     class="bi bi-arrow-up-short"></i></a>

      <!-- Vendor JS Files -->
      <script src="backend/vendor/apexcharts/apexcharts.min.js"></script>
      <script src="backend/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
      <script src="backend/vendor/chart.js/chart.min.js"></script>
      <script src="backend/vendor/echarts/echarts.min.js"></script>
      <script src="backend/vendor/quill/quill.min.js"></script>
      <script src="backend/vendor/simple-datatables/simple-datatables.js"></script>
      <script src="backend/vendor/tinymce/tinymce.min.js"></script>
      <script src="backend/vendor/php-email-form/validate.js"></script>

      <!-- Template Main JS File -->
      <script src="backend/js/main.js"></script>
    </body>
</html>
