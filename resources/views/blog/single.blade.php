@extends('main')

@section('title', "| $post->title")

@section('content')

	<div class="row">
		<div class="col-md-8 col-md-offset-2">

			<h1 class="article-title">{{ $post->title }}</h1>

			<p>Posted In: {{ $post->category->name }}</p>

			<div class="article-wrapp">{!! $post->body !!}</div>
			
		</div>
	</div>

@stop