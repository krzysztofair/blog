<?php

error_reporting(E_ALL);
ini_set("display_errors", "On");

require __DIR__."/paths.php";

require BASE_PATH."/vendor/autoload.php";

$app = include(__DIR__."/app.php");

$app->start();