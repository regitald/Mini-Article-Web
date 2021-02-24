
@extends('sites.template.main')
@section('content')
		<!-- Main -->
		@if(count($data)== 0 )
		<h2>Content or Article Not Found !</h2>
		@endif
			@foreach($data as $key)
			<section id="main" class="wrapper">
				<div class="container">
					<!-- Image -->
						<section>
						<p>
							<span class="image left">
								<img src="{{$key['banner_url']}}" alt="" />
							</span>
							<h4>{{$key['title']}}</h4>
							{{ Str::limit($key['content'], 250) }}
						</p>
						
						<ul class="actions">
							<li>
								<a href="{{ url('/sites/articles/'.$key['slug'].'#main') }}" class="button alt">More</a>
							</li>
						</ul>
						</section>

				</div>
			</section>
				@endforeach<br>
@endsection