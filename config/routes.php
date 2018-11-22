<?php

use Slim\Http\Request;
use Slim\Http\Response;

require_once "./controllers/HomeController.php";

$app->get('/', 'HomeController:index');

// $app->get('/', function (Request $request, Response $response) {

//     return $this->get('view')->render($response, 'home.twig', $viewData);
// })->setName('home');

$app->get('/hello/{name}', function (Request $request, Response $response) {
    $name = $request->getAttribute('name');
    $response->getBody()->write("Hello, $name");

    return $response;
});

$app->get('/time', function (Request $request, Response $response) {
    $viewData = [
        'now' => date('Y-m-d H:i:s')
    ];

    return $this->get('view')->render($response, 'time.twig', $viewData);
});
