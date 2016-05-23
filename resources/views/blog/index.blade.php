@extends('main')

@section('title', '| Blog')

@section('content')

	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h1 class="article-title">List of Blog Posts</h1>
		</div>
	</div>

	@foreach ($posts as $post)

	<div class="row">
		<div class="col-md-8 col-md-offset-2">

			<div class="article-wrapp">

				<h2>{{ $post->title }}</h2>
				<h5>Published: {{ date('M j, Y', strtotime($post->created_at)) }}</h5>

				<div class="article-body">{!! substr($post->body, 0, 255) !!}{!! strlen($post->body) > 255 ? '...' : "" !!}</div>

				<a class="btn btn-primary" href="{{ route('blog.single', $post->slug) }}">Read More</a>
				
			</div>

		</div>
	</div>

	@endforeach

	<div class="row">
		<div class="col-md-12">
			<div class="text-center">
				{!! $posts->links() !!}
			</div>
		</div>
	</div>

@stop