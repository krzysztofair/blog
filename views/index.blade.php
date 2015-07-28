@extends('template')

@section('content')

<h2>All posts</h2>

@foreach($posts as $post)
    <div class="col-md-12">
        <a href="{{ $post['slug'] }}">
            <h3>{{ $post['title'] }} <small>{{ $post['published'] }}</small></h3>
            <p>
                <img src="images/{{ $post['image'] }}" class="img-responsive">
            </p>
        </a>
        <p><small>{{ $post['intro'] }}</small></p>
        <a href="{{ $post['slug'] }}" class="btn btn-success pull-right">
            Read more
        </a>
    </div>
@endforeach

@endsection