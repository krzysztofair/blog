<?php

$this->router->get('/', function(\Blog\Parsers\Yaml $yaml) {

    if( ! is_readable(blog_path('blog.yaml'))) throw new Exception(500);

    $blog = $yaml->parse(file_get_contents(blog_path('blog.yaml')));

    $posts = (isset($blog['posts'])) ? $blog['posts'] : array();

    foreach($posts as $slug => $post)
    {
        $posts[$slug]['slug'] = $slug;
    }

    usort($posts, function($a, $b)
    {
        if ($a['published'] == $b['published']) {
            return 0;
        }

        return ($a['published'] < $b['published']) ? 1 : -1;
    });

    return view('index', array(
        'posts' => $posts
    ));

});

$this->router->get('404', function() {
    return view('errors.not-found');
});

$this->router->get('500', function() {
    return view('errors.server-error');
});

$this->router->get('{slug}', function(\Blog\Parsers\Yaml $yaml, \Blog\Parsers\Markdown $markdown, $slug) {

    if( ! is_readable(blog_path('blog.yaml'))) throw new Exception(500);

    $blog = $yaml->parse(file_get_contents(blog_path('blog.yaml')));

    $posts = (isset($blog['posts'])) ? $blog['posts'] : array();

    $info = $posts[$slug];

    if( ! is_readable(blog_path($slug.".md"))) throw new Exception(404);

    $contents = file_get_contents(blog_path($slug.".md"));

    $title = $info['title'];
    $published = $info['published'];
    $image = $info['image'];

    $post = $markdown->parse($contents);

    return view('post', array(
        'title' => $title,
        'published' => $published,
        'post' => $post,
        'image' => $image
    ));

});