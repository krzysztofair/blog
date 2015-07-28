@extends('template')

@section('content')

<h3>{{ $post->title }} <small class="pull-right">{{ $post->published }}</small></h3>

<img src="images/{{ $post->image }}" class="img-responsive">
<br>
{{ $post->intro }}
<hr>
{!! $post->content !!}
<hr>
<h4>Another posts</h4>
<ul>
    @foreach($posts as $another)
        <li>
            <a href="{{ $another['slug'] }}">
                {{ $another['title'] }} <small>{{ $another['published'] }}</small>
            </a>
        </li>
    @endforeach
</ul>

@endsection