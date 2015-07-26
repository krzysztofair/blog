<?php

namespace Blog;

class View extends Response
{
    protected $filename;

    protected $args = [];

    function __construct($filename, $args = [])
    {
        $this->filename = $filename;
        $this->args = $args;
    }

    public function handle()
    {
        global $app;

        return $app->make('Blog\\Blade')->compile($this->filename, $this->args);
    }
}
