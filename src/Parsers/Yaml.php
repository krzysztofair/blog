<?php

namespace Blog\Parsers;

use Symfony\Component\Yaml\Yaml as YamlParser;

class Yaml implements Parser
{
    public function parse($path)
    {
        $file = file_get_contents($path);

        return YamlParser::parse((string)$file);
    }
}