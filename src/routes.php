<?php

$this->router->get('/', function(\Blog\Parsers\Yaml $yaml, \Blog\Parsers\Markdown $markdown) {

    $y = $yaml->parse(blog_path('blog.yaml'));

    $m = $markdown->parse(blog_path('my-first-post/post.md'));

    return view('index', array(
        'yaml' => json_encode($y),
        'markdown' => $m
    ));
});
