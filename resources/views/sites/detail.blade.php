
@extends('sites.template.main')
@section('content')

<!-- Main -->
	<section id="main" class="wrapper">
		<div class="container">

			<header class="major special">
				<h2>{{$data['title']}}</h2>
				<p>{{date('d-F-Y', strtotime($data['created_at']))}}</p>
			</header>
			<a href="#" class="image fit"><img src="{{$data['banner_url']}}" alt="" /></a>
			<p>{{$data['content']}}</p>
			

		</div>
	</section>
@endsection