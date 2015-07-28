<h1>Posts</h1>

<ul>
@foreach($posts as $post)
    <li>
        <a href="{{ $post['slug'] }}">
            {{ $post['title'] }} <small>{{ $post['published'] }}</small>
            <p>
                <img src="images/{{ $post['image'] }}">
            </p>
            <p><small>{{ $post['intro'] }}</small></p>
        </a>
    </li>
@endforeach
</ul>