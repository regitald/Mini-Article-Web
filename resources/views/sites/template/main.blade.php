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
				<h1><a href="{{ url('/') }}">Articles</a></h1>
				<a href="#nav">Menu</a>
			</header>

		<!-- Nav -->
			<nav id="nav">
				<ul class="links">
					<li><a href="{{ url('/') }}">Home</a></li>
					<li><a href="{{ url('sites/articles') }}">Articles</a></li>
					@if(Session::has('member'))
					<li><a href="{{ url('sites/logout') }}">Logout</a></li>
					@else
					<li><a href="{{ url('sites/login') }}">Login</a></li>
					@endif
				</ul>
			</nav>

		<!-- Banner -->
			<section id="banner">
				<i class="icon fa-book"></i>
				<h2>Saga Digital Backend Developer Test</h2>
				@if(Session::has('member'))
				<p>Hello {{Session::get('member.fullname')}}</p>
				@else
				<p>Hello</p>
				@endif
				<ul class="actions">
					<li><a href="{{ url('sites/articles') }}" class="button big special">Explore</a></li>
				</ul>
			</section>
            @section('content')
            @show

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