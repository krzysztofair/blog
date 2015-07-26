<?php

namespace Blog;

use Blog\Router;

class Kernel
{
    /**
     * @var Application instance
     */

    protected $app;

    protected $router;

    /**
     * @param Application $app
     */

    public function __construct($app, Router $router)
    {
        $this->app = $app;
        $this->router = $router;
    }

    /**
     * Handles the request by passing it
     * through security layers
     *
     * @param Request $request
     * @return Response
     */

    public function handle(Request $request)
    {
        try
        {
            list($controller, $action, $args) = $this->getController(
                $request->getMethod(), $request->getUri()
            );

            $controller = $this->app->make(
                $controller
            );

            $response = call_user_func_array([$controller, $action], $args);

            return $response;
        }
        catch(Error $e)
        {
            return $this->generateErrorResponse($e);

        }
        catch(\Exception $e)
        {
            return $this->generateErrorResponse($e);

        }
    }

    public function getController($method, $uri)
    {
        return $this->router->match($method, $uri);
    }

    /**
     * @param $e
     * @return mixed
     */
    private function generateErrorResponse($e)
    {
        print "404: Not found.";
        exit;
    }
}
