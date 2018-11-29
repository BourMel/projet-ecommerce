<?php

/**
 * This file is where we load everything we need to run the app
 * Inspired by this article :
 * https://odan.github.io/2017/11/30/creating-your-first-slim-framework-application.html
 */

// choose locale
setlocale(LC_MONETARY, 'fr_FR');

// instantiate the slim application

$app = new \Slim\App(['settings' => require __DIR__.'/settings.php']);

require  __DIR__.'/container.php';
require __DIR__.'/middleware.php';
require __DIR__.'/routes.php';

// init Doctrine
require  __DIR__.'/doctrine/bootstrap.php';

// init twig

$loader = new Twig_Loader_Filesystem('./views');
$twig = new Twig_Environment($loader, array(
    'cache' => './twig_cache',
    'debug' => 'true'
));

// start session

session_cache_limiter(false);
session_start();

return $app;

