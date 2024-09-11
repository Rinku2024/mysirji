<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    {{-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> --}}
	<meta name="csrf-token" content="{{ csrf_token() }}">
	
    <title>@yield('title')</title>
        
        <!--<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">-->
        <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">-->
        <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">-->
      <link href="https://cdn.jsdelivr.net/npm/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
		<!-- Bootstrap Min CSS --> 
		<link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}">
		<!-- Owl Theme Default Min CSS --> 
		<link rel="stylesheet" href="{{ asset('frontend/css/owl.theme.default.min.css') }}">
		<!-- Owl Carousel Min CSS --> 
		<link rel="stylesheet" href="{{ asset('frontend/css/owl.carousel.min.css') }}">
		<!-- Animate Min CSS --> 
		<link rel="stylesheet" href="{{ asset('frontend/css/animate.min.css') }}">
		<!-- Boxicons Min CSS --> 
		<!--<link rel="stylesheet" href="{{ asset('frontend/css/boxicons.min.css') }}"> -->
		<!-- Magnific Popup Min CSS --> 
		<link rel="stylesheet" href="{{ asset('frontend/css/magnific-popup.min.css') }}"> 
		<!-- Flaticon CSS --> 
		<link rel="stylesheet" href="{{ asset('frontend/css/flaticon.css') }}">
		<!-- Meanmenu Min CSS -->
		<link rel="stylesheet" href="{{ asset('frontend/css/meanmenu.min.css') }}">
		<!-- Nice Select Min CSS -->
		<link rel="stylesheet" href="{{ asset('frontend/css/nice-select.min.css') }}">
		<!-- Odometer Min CSS-->
		<link rel="stylesheet" href="{{ asset('frontend/css/odometer.min.css') }}">
		<link rel="stylesheet" href="{{ asset('frontend/css/main-style/style.css') }}">
		<!-- Style CSS -->
		<link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
		<!-- Responsive CSS -->
		<link rel="stylesheet" href="{{ asset('frontend/css/responsive.css') }}">
		<!-- costume CSS -->
		<link rel="stylesheet" href="{{ asset('frontend/css/costume-style.css') }}">
		
		<link rel="stylesheet" href="{{ asset('frontend/css/main-style/costume-style.css') }}">
		<!-- Favicon -->
		<link rel="icon" type="image/png" href="{{ asset('frontend//img/main-img/Editvolv.png') }}">
		<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

		<style type="text/css">
			.error-message {
    font-size: 0.875em;
    margin-top: 0.25rem;
}
.is-invalid {
    border-color: #dc3545;
}

		</style>


		{{-- <link rel="stylesheet" href="{{ asset('css/style.css') }}"> --}}
		
		<!--<script id="messenger-widget-b" src="https://cdn.botpenguin.com/website-bot.js" defer>669bcd6699f33102a0ab616e,669bccbfa96be68837567b1e</script>-->
    
    @yield('styles')
</head>
<body>
    @include('frontend.partials.header')
    <div class="container-flued">
        @yield('frontend.content')
    </div>
    @include('frontend.partials.footer')
  
      <!-- Jquery Min JS -->
        <!--<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>-->
        <script src="https://cdn.jsdelivr.net/npm/boxicons@2.1.4/dist/boxicons.min.js"></script>
        <script src="{{ asset('frontend/js/jquery.min.js') }}"></script>
        <!-- Bootstrap Bundle Min JS -->
        <script src="{{ asset('frontend/js/bootstrap.bundle.min.js') }}"></script>
        <!-- Meanmenu Min JS -->
		<script src="{{ asset('frontend/js/meanmenu.min.js') }}"></script>
        <!-- Wow Min JS -->
        <script src="{{ asset('frontend/js/wow.min.js') }}"></script>
        <!-- Owl Carousel Min JS -->
		<script src="{{ asset('frontend/js/owl.carousel.min.js') }}"></script>
        <!-- Nice Select Min JS -->
		<script src="{{ asset('frontend/js/nice-select.min.js') }}"></script>
        <!-- Magnific Popup Min JS -->
		<script src="{{ asset('frontend/js/magnific-popup.min.js') }}"></script>
		<!-- Jarallax Min JS --> 
		<script src="{{ asset('frontend/js/jarallax.min.js') }}"></script>
		<!-- Appear Min JS --> 
        <script src="{{ asset('frontend/js/appear.min.js') }}"></script>
		<!-- Odometer Min JS --> 
		<script src="{{ asset('frontend/js/odometer.min.js') }}"></script>
		<!-- Form Validator Min JS -->
		<script src="{{ asset('frontend/js/form-validator.min.js') }}"></script>
		<!-- Contact JS -->
		<script src="{{ asset('frontend/js/contact-form-script.js') }}"></script>
		<!-- Ajaxchimp Min JS -->
		<script src="{{ asset('frontend/js/ajaxchimp.min.js') }}"></script>
        <!-- Custom JS -->
		<script src="{{ asset('frontend/js/custom.js') }}"></script>
		<script src="{{asset('js/script.js')}}"></script>
       
    @yield('scripts')
    
  
       <!--  <script>
		const dropArea = document.querySelector(".drop_box"),
			button = dropArea.querySelector("button"),
			dragText = dropArea.querySelector("header"),
			input = dropArea.querySelector("input");
		let file;
		var filename;

		button.onclick = () => {
			input.click();
		};

		input.addEventListener("change", function (e) {
			var fileName = e.target.files[0].name;
			let filedata = `
    <form action="" method="post">
    <div class="form">
    <h4>${fileName}</h4>
    <input type="email" placeholder="Enter email upload file">
    <button class="btn">Upload</button>
    </div>
    </form>`;
			dropArea.innerHTML = filedata;
		});

	</script> -->
   
</body>
</html>

