<?php

namespace Blog;

class Application extends Container
{
    protected $errors = [];

    /**
     * Resolves a class from IoC Container
     *
     * @param string $class A class name
     * @param array $args Optional arguments for object's constructor
     * @return mixed|object
     */

    public function make($class, $args = [])
    {
        return $this->resolve($class, $args);
    }

    public function error($type, $callback)
    {
        $this->errors[$type] = $callback;
    }

    public function hasError($type)
    {
        return isset($this->errors[$type]);
    }

    public function getError($type)
    {
        return ($this->hasError($type)) ? $this->errors[$type] : false;
    }
}
