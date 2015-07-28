<h1>{{ $title }}</h1>
<h3>{{ $published }}</h3>
<img src="images/{{ $image }}">
{!! $post !!}
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