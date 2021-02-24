<!DOCTYPE HTML>
<!--
	Retrospect by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
	<head>
		<title>Mini Article</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="{{url('fe_sites/assets/css/main.css')}}" />
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
	</head>
	<body class="landing">

		<!-- Header -->
			<header id="header" class="alt">
				<h1><a href="{{ url('/') }}">{{$title}}</a></h1>
				<a href="#nav">Menu</a>
			</header>

		<!-- Nav -->
			<nav id="nav">
				<ul class="links">
					<li><a href="{{ url('/') }}">Home</a></li>
					<li><a href="{{ url('sites/articles') }}">Articles</a></li>
					<li><a href="{{ url('sites/login') }}">{Login}</a></li>
				</ul>
			</nav>
			<section id="main" class="wrapper">
				<div class="container">
					<!-- Form -->
						<section style="margin-top:200px">
						
							@if($errors->any())
								<div class="alert alert-danger">
								<h1 style="color:red">{{$errors->first()}}</h1>
								</div>
							@endif
								
							@if (Session::has('success'))
							<div class="alert alert-success">
								<h1>{{Session::get('success')}}</h1>
								</div>
							@endif<br>
							<h1><a href="{{ url('sites/register') }}">{{$title}}</a></h1>
							<form method="post" action="{{ url('sites/register') }}">
							
								{{ csrf_field() }}
								<div class="row uniform 50%">
									<div class="6u$ 12u$(xsmall)">
										<input type="text" name="fullname" id="fullname"  placeholder="Fullname" required />
									</div>
									<div class="6u$ 12u$(xsmall)">
										<input type="email" name="email" id="email"  placeholder="Email" required />
									</div>
									<div class="6u$ 12u$(xsmall)">
										<input type="password" name="password" id="password"  placeholder="Password" required />
									</div>
									
									<div class="6u$ 12u$(xsmall)">
										<input type="password" name="password_confirmation" id="password"  placeholder="Confirmation Password" required />
									</div>
									
									<div class="6u$ 12u$(xsmall)">
										<ul class="actions">
										<select class="custom-select" name="gender" required>
										<option value="">Select Gender</option>
										<option value="Male">Male</option>
										<option value="Female">Female</option>
										</select>
										</ul>
									</div>
									
									<div class="12u$">
										<ul class="actions">
											<li><input type="submit" value="Register" class="special" /></li>
											<li><input type="reset" value="Reset" /></li>
										</ul>
									</div>
								</div>
							</form>
							
							<h5><a href="{{ url('sites/login') }}">Login</a></h5>
							<h5><a href="{{ url('auth/facebook') }}" style="background: #3B5499; color: #ffffff; padding: 10px; width: 100%; text-align: center;border-radius:3px;">
							Register with Facebook</a></h5>
						</section>
				</div>
			</section>

		<!-- Footer -->
		<footer id="footer">
				<div class="inner">
					<ul class="icons">
						<li><a href="#" class="icon fa-phone">
							<span class="label">19208923028</span>
						</a></li>
						<li><a href="#" class="icon fa-twitter">
							<span class="label">@testbackend</span>
						</a></li>
						<li><a href="#" class="icon fa-instagram">
							<span class="label">@testbackend</span>
						</a></li>
					</ul>
					<ul class="copyright">
						<li>&copy; Regita Lisgiani | 2021 Test Saga Digital.</li>
						<li>Images: <a href="http://unsplash.com">Unsplash</a>.</li>
						<li>Design: <a href="http://templated.co">TEMPLATED</a>.</li>
					</ul>
				</div>
			</footer>

		<!-- Scripts -->
			<script src="{{url('fe_sites/assets/js/jquery.min.js')}}"></script>
			<script src="{{url('fe_sites/assets/js/skel.min.js')}}"></script>
			<script src="{{url('fe_sites/assets/js/util.js')}}"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="{{url('fe_sites/assets/js/main.js')}}"></script>

	</body>
</html>