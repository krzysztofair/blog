<h1>{{ $post->title }}</h1>
<h3>{{ $post->published }}</h3>
<img src="images/{{ $post->image }}">
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