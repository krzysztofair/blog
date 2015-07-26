<?php

namespace Blog;

class BlogController extends Controller
{
    public function index()
    {
        return view("index");
    }
}