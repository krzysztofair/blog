<?php

namespace Blog;

class Request
{
    public function getUri()
    {
        return '/' . trim($_SERVER['REQUEST_URI'], '/');
    }

    public function getMethod()
    {
        return $_SERVER['REQUEST_METHOD'];
    }
}
