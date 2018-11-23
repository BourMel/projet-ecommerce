<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

use App\Controllers\HomeController;


require_once './vendor/autoload.php';

setlocale(LC_MONETARY, 'fr_FR');

// DOCTRINE INIT
require_once "./bootstrap.php";

// TWIG INIT
$loader = new Twig_Loader_Filesystem('./views');
$twig = new Twig_Environment($loader, array(
    'cache' => './twig_cache',
    'debug' => 'true'
));

// SLIM INIT
$app = require_once './config/bootstrap.php';
$app->run();
