<?php

require __DIR__."/paths.php";

require BASE_PATH."/vendor/autoload.php";

$app = include(__DIR__."/app.php");

require __DIR__."/routes.php";

/**
 * This file creates the kernel
 * and gets the response from it
 */

if(php_sapi_name() == 'cli')
{

}
else
{
    $kernel = $app->make("Blog\\Kernel", [ $app ]);
    $request = $app->make("Blog\\Request");

    $response = $kernel->handle($request);
}

if( ! is_object($response) )
{
    print json_encode($response);
    exit;
}

print $response->handle();