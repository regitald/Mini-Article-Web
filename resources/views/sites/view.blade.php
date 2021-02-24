

@extends('sites.template.main')
@section('content')
		<!-- One -->
		<section id="one" class="wrapper style1">
				<div class="inner">
				
                @foreach($data as $key)
				<article class="feature left">
					<span class="image"><img src="{{$key['banner_small_url']}}" alt="" / style="width:250px;height:250px"></span>
					<div class="content">
						<h2>{{$key['title']}}</h2>
						<p>{{ Str::limit($key['content'], 100) }}</p>
						<ul class="actions">
							<li>
								<a href="{{ url('/sites/articles/'.$key['slug'].'#main') }}" class="button alt">More</a>
							</li>
						</ul>
					</div>
				</article>
				@endforeach
				</div>
			</section>
			<section id="four" class="wrapper style2 special">
				<div class="inner">
					<header class="major narrow">
						<h2>Get in touch</h2>
						<p>Ipsum dolor tempus commodo adipiscing</p>
					</header>
					<form action="#" method="POST">
						<div class="container 75%">
							<div class="row uniform 50%">
								<div class="6u 12u$(xsmall)">
									<input name="name" placeholder="Name" type="text" />
								</div>
								<div class="6u$ 12u$(xsmall)">
									<input name="email" placeholder="Email" type="email" />
								</div>
								<div class="12u$">
									<textarea name="message" placeholder="Message" rows="4"></textarea>
								</div>
							</div>
						</div>
						<ul class="actions">
							<li><input type="submit" class="special" value="Submit" /></li>
							<li><input type="reset" class="alt" value="Reset" /></li>
						</ul>
					</form>
				</div>
			</section>

@endsection