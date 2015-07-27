<?php

namespace Blog\Parsers;

use Parsedown;

class Markdown implements Parser
{
    protected $parsedown;

    public function __construct(Parsedown $parsedown)
    {
        $this->parsedown = $parsedown;
    }

    public function parse($path)
    {
        $file = file_get_contents($path);

        return $this->parsedown->text((string)$file);
    }
}