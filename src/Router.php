<?php

namespace Blog;

class Router
{
    protected $routes = [];

    /**
     * @singleton
     */

    public function __construct()
    {

    }

    public function add($method, $pattern, $action, $params = [])
    {
        $route = new Route($method, '/' . trim($pattern, '/'), $action, $params);

        $this->routes[$method][$pattern] = $route;

        return $route;
    }

    public function match($method, $uri)
    {
        if( ! isset($this->routes[$method])) return false;

        foreach($this->routes[$method] as $route)
        {
            if (! preg_match("@^".$route->getRegex()."*$@i", $uri, $matches))
            {
                continue;
            }

            $params = array();

            if (preg_match_all("/:([\\w-%]+)/", $route->getPattern(), $arguments))
            {
                $arguments = $arguments[1];

                foreach ($arguments as $key => $name)
                {
                    if (isset($matches[$key + 1]))
                    {
                        $params[$name] = $matches[$key + 1];
                    }
                }
            }

            list($controller, $action) = explode("@", $route->getAction());

            return [ $controller, $action, $params ];
        }
    }
}
