@extends('main')

@section('title', '| Create New Post')

@section('stylesheets')

	{!! Html::style('css/parsley.css') !!}
	{!! Html::style('css/select2.min.css') !!}

@endsection

@section('content')

	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h1 class="pull-left">Create New Post</h1>
			{{ Html::linkRoute('posts.index', '<< See All Posts', [], ['class' => 'btn btn-default btn-sm btn-mt pull-right']) }}
			<div class="clearfix"></div>
			<hr>

			{!! Form::open(array('route' => 'posts.store', 'data-parsley-validate' => '')) !!}
    			{{ Form::label('title', 'Title:') }}
    			{{ Form::text('title', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '255')) }}

				{{ Form::label('slug', 'Slug:') }}
				{{ Form::text('slug', null, array('class' => 'form-control', 'required' => '', 'minlenght' => '5', 'maxlength' => '255')) }}

				<!-- ja sam dodao ovo -->
				<div class="form-group"> 
					{{ Form::label('featured_post', 'Featured Post:') }}
					{{ Form::hidden('featured_post', 0) }}
					{{ Form::checkbox('featured_post', 1) }}
				</div>
				
				<div class="form-group"> 
					{{ Form::label('category_id', 'Category:') }}
					<select class="form-control" name="category_id">
						
						@foreach($categories as $category)

							<option value="{{ $category->id }}">{{ $category->name }}</option>

						@endforeach

					</select>
				</div>
				
				<div class="form-group"> 
					{{ Form::label('tags', 'Tags:') }}
					<select class="form-control select2-multi" name="tags[]" multiple="multiple">
						
						@foreach($tags as $tag)

							<option value="{{ $tag->id }}">{{ $tag->name }}</option>

						@endforeach

					</select>
				</div>

  			{{ Form::label('body', 'Post Body:') }}
  			{{ Form::textarea('body', null, array('class' => 'form-control', 'required' => '')) }}

  			{{ Form::submit('Create Post', array('class' => 'btn btn-success btn-lg btn-block btn-create-post')) }}
			{!! Form::close() !!}

		</div>
	</div>

@endsection

@section('scripts')

	{!! Html::script('js/parsley.min.js') !!}
	{!! Html::script('js/select2.min.js') !!}

	<script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
	<script src="/vendor/unisharp/laravel-ckeditor/adapters/jquery.js"></script>
	<script>
		$('textarea').ckeditor();
		// $('.textarea').ckeditor(); // if class is prefered.
	</script>

	<script>
		$('.select2-multi').select2();
	</script>

@endsection