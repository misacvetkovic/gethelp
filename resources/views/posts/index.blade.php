@extends('main')

@section('title', '| All Posts')

@section('content')

	<div class="row">
		<div class="col-md-9">
			<h1>All Posts</h1>
		</div>
		<div class="col-md-3">
			<a class="btn btn-lg btn-block btn-primary btn-create" href="{{ route('posts.create') }}">Create New Post</a>
		</div>
		<div class="clearfix"></div>
		<hr>
	</div>

	<div class="row">
		<div class="col-md-12">
			<div class="table-responsive">
				<table class="table table-striped table-hover">
					<thead>
						<th>#</th>
						<th>Title</th>
						<th>Body</th>
						<th>Created At</th>
						<th>Options</th>
					</thead>
					<tbody>
						
						@foreach( $posts as $post )
							
							<tr>
								<th>{{ $post->id }}</th>
								<td>{{ $post->title }}</td>
								<td>{{ strip_tags(substr($post->body, 0, 50)) }} {{ strlen($post->body) > 50 ? "..." : "" }}</td>
								<td>{{ date('M j, Y', strtotime($post->created_at)) }}</td>
								<td><a class="btn btn-info btn-sm" href="{{ route('posts.show', $post->id) }}">View</a> <a class="btn btn-success btn-sm" href="{{ route('posts.edit', $post->id) }}">Edit</a></td>
							</tr>

						@endforeach

					</tbody>
				</table>
			</div>

			<!-- Pagination -->
			<div class="text-center">
				{!! $posts->links(); !!}
			</div>

		</div>
	</div>

@stop