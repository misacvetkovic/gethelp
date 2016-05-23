@extends('main')

@section('title', '| Home Page')

@section('content')

    <!-- Ja sam dodao za featured post -->
    @foreach($features as $featured)
        <div class="row">
            <div class="col-md-12">
                <div class="jumbotron">

                    <h1>{{ $featured->title }}</h1>
                    <p class="lead">{{ strip_tags(substr($featured->body, 0, 300)) }}{{ strlen($featured->body) > 300 ? "..." : "" }}</p>
                    <p><a class="btn btn-primary btn-lg" href="{{ url('blog/'.$featured->slug) }}" role="button">Popular Post</a></p>

                </div>
            </div>
        </div>
    @endforeach
    <!-- end of header .row -->

    <div class="row">
        <div class="col-md-8">

            @foreach($posts as $post)

                <div class="post">

                    <h3>{{ $post->title }}</h3>
                    <p>{{ strip_tags(substr($post->body, 0, 300)) }}{{ strlen($post->body) > 300 ? "..." : "" }}</p>
                    <a class="btn btn-primary btn-mt" href="{{ url('blog/'.$post->slug) }}">Read More</a>
                    
                </div>

                <hr>

            @endforeach

        </div>

        <div class="col-md-3 col-md-offset-1">
            <h2>Sidebar</h2>
        </div>
    </div>
      
@endsection