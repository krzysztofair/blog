<?php

define("BASE_PATH", realpath(__DIR__."/../"));

define("BLOG_PATH",     BASE_PATH . "/blog");
define("PUBLIC_PATH",   BASE_PATH . "/public");
define("VIEWS_PATH",    BASE_PATH . "/views");
define("CACHE_PATH",    BASE_PATH . "/cache");

function prepare($name)
{
    return trim($name, '/');
}

function base_path($file = null)
{
    return BASE_PATH . '/' . prepare($file);
}

function blog_path($file = null)
{
    return BLOG_PATH . '/' . prepare($file);
}

function public_path($file = null)
{
    return PUBLIC_PATH . '/' . prepare($file);
}

function views_path($file = null)
{
    return VIEWS_PATH . '/' . prepare($file);
}

function cache_path($file = null)
{
    return CACHE_PATH . '/' . prepare($file);
}

function view($file, $args = [])
{
    global $app;

    return $app->make("Blog\\Http\\View", [ $app, $file, $args ]);
}