<?php

// source : https://odan.github.io/2017/11/30/creating-your-first-slim-framework-application.html#starting

require_once __DIR__ . '/../vendor/autoload.php';

// instantiate the app
$app = new \Slim\App(['settings' => require __DIR__ . '/../config/settings.php']);

// dependencies
require  __DIR__ . '/container.php';

// middlewares
require __DIR__ . '/middleware.php';

// routes
require __DIR__ . '/routes.php';

return $app;

