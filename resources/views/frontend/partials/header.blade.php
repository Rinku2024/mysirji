<!-- Start Header Area -->
		<header class="header-area" style="background: #030f21;">
			<!-- Start Nav Area -->
			<div class="container">
			<div class="navbar-area navbar-area-two">
				<div class="mobile-nav">
					<div class="container-fluid">
						<a href="{{ asset('/') }}" class="logo">
							<img src="{{ asset('frontend/img/main-img/Editvolv.png') }}" alt="Logo" style="width:90px;">
						</a>
					</div>
				</div>

				<div class="main-nav">
					<div class="container-fluid">
						<nav class="navbar navbar-expand-md">
							<a class="navbar-brand" href="{{ asset('/') }}">
								<img src="{{ asset('frontend/img/main-img/Editvolv.png') }}" alt="Logo" style="width:90px;">
							</a>
							
							<div class="collapse navbar-collapse mean-menu">
								<ul class="navbar-nav m-auto">
									<li class="nav-item">
										<a href="{{ asset('/') }}" class="nav-link active">
											Home
										</a>
									</li>
									<li class="nav-item">
										<a href="#" class="nav-link">
											All PDF Tools
											<!--<i class="bx bx-chevron-down"></i>-->
											<i class="fa fa-caret-down" aria-hidden="true"></i>
										</a>

										<ul class="dropdown-menu">
											<li class="nav-item">
												<a href="{{ route('docx-to-pdf.create') }}" class="nav-link">Word To PDF</a>
											</li>

											<li class="nav-item">
												<a href="{{ route('jpg-to-pdf.create') }}" class="nav-link">JPG To PDF</a>
											</li>

											
											<li class="nav-item">
												<a href="{{ route('html-to-pdf.create') }}" class="nav-link">HTML To PDF</a>
											</li>
                                            
                                            	<li class="nav-item">
												<a href="{{ route('excel-to-pdf.create') }}" class="nav-link">Excel To PDF</a>
											</li>
											
												<li class="nav-item">
												<a href="{{ route('powerpoint-to-pdf.create') }}" class="nav-link">Powerpoint To PDF</a>
											</li>
											
												<li class="nav-item">
												<a href="{{ route('pdf-to-excel.create') }}" class="nav-link">PDF To Excel</a>
											</li>
											
											
												<li class="nav-item">
												<a href="{{ route('pdf-to-jpg.create') }}" class="nav-link">PDF To-JPG</a>
											</li>
												<li class="nav-item">
												<a href="{{ route('pdf-to-powerpoint.create') }}" class="nav-link">PDF To Powerpoint</a>
											</li>
													<li class="nav-item">
												<a href="{{ route('pdf-to-word.create') }}" class="nav-link">PDF To Word</a>
											</li>
										
										</ul>
									</li>
										<li class="nav-item">
										<a href="{{ asset('login') }}" class="nav-link">Login</a>
									</li>
										<li class="nav-item">
										<a href="{{ asset('register') }}" class="nav-link">Signup</a>
									</li>
									<li class="nav-item">
										<a href="{{ asset('contact') }}" class="nav-link">Contact</a>
									</li>
								</ul>
							</div>
						</nav>
					</div>
				</div>
			</div>
			</div>
			<!-- End Nav Area -->
		</header>
		<!-- End Header Area -->
