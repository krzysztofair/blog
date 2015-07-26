<?php

namespace Blog;

class Route
{
    protected $method;

    protected $pattern;

    protected $action;

    protected $params;

    protected $filters = [];

    public function __construct($method, $pattern, $action, $params = [])
    {
        $this->method = $method;
        $this->pattern = $pattern;
        $this->action = $action;
        $this->params = $params;
    }

    public function getPattern()
    {
        return $this->pattern;
    }

    public function getAction()
    {
        return $this->action;
    }

    public function getName()
    {
        return (isset($this->params['name'])) ? $this->params['name'] : '';
    }

    public function getRegex()
    {
        return preg_replace_callback("/:(\\w+)/", array(&$this, 'substituteFilter'), $this->pattern);
    }

    private function substituteFilter($matches)
    {
        if (isset($matches[1]) && isset($this->filters[$matches[1]])) {
            return $this->filters[$matches[1]];
        }
        return "([\\w-%]+)";
    }

    public function where($param, $regex)
    {
        $this->filters[$param] = "($regex)";

        return $this;
    }
}
