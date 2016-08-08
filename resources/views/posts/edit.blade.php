@extends('main')

@section('title', '| Edit Blog Post')

@section('stylesheets')

	{!! Html::style('css/select2.min.css') !!}

@endsection

@section('content')

	<div class="row">
		
		{!! Form::model($post, ['route' => ['posts.update', $post->id], 'method' => 'PUT']) !!}

		<div class="col-md-8">

			{{ Form::label('title', 'Post Title:') }}
			{{ Form::text('title', null, ['class' => 'form-control input-lg']) }}

			{{ Form::label('slug', 'Slug:') }}
			{{ Form::text('slug', null, ['class' => 'form-control']) }}
			
			<!-- ja sam dodao ovo -->
			<div class="form-group"> 
				{{ Form::label('featured_post', 'Featured Post:') }}
				{{ Form::hidden('featured_post', 0) }}
				{{ Form::checkbox('featured_post', 1) }}
			</div>
			
			<div class="form-group">
				{{ Form::label('category_id', 'Category:') }}
				{{ Form::select('category_id', $categories, null, ['class' => 'form-control']) }}
			</div>

			<div class="form-group">
				{{ Form::label('tags', 'Tags') }}
				{{ Form::select('tags[]', $tags, null, ['class' => 'form-control select2-multi', 'multiple' => 'multiple']) }}
			</div>
			
			{{ Form::label('body', 'Post Body:') }}
			{{ Form::textarea('body',null, ['class' => 'form-control']) }}

		</div>
		<div class="col-md-4">

			<div class="well">

				<dl class="dl-horizontal">
					<dt>Created At:</dt>
					<dd>{{ date('M j, Y h:ia', strtotime($post->created_at)) }}</dd>
				</dl>

				<dl class="dl-horizontal">
					<dt>Last Updated:</dt>
					<dd>{{ date('M j, Y h:ia', strtotime($post->updated_at)) }}</dd>
				</dl>

				<hr>

				<div class="row">
					<div class="col-sm-6">
						{!! Html::linkRoute('posts.show', 'Cancel', array($post->id), array('class' => 'btn btn-danger btn-block')) !!}
					</div>
					<div class="col-sm-6">
						{{ Form::submit('Save Changes', ['class' => 'btn btn-success btn-block']) }}
					</div>
				</div>

				<div class="row">
					<div class="col-md-12">
						{{ Html::linkRoute('posts.index', '<< See All Posts', [], ['class' => 'btn btn-default btn-block btn-mt']) }}
					</div>
				</div>

			</div>

		</div>

		{!! Form::close() !!}

	</div>

@stop

@section('scripts')

	{!! Html::script('js/select2.min.js') !!}

	<script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
	<script src="/vendor/unisharp/laravel-ckeditor/adapters/jquery.js"></script>
	<script>
		$('textarea').ckeditor();
		// $('.textarea').ckeditor(); // if class is prefered.
	</script>

	<script>

		$('.select2-multi').select2();

		$('.select2-multi').select2().val({!! json_encode($post->tags()->getRelatedIds()) !!}).trigger('change');

	</script>

@stop