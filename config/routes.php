<?php

use Slim\Http\Request;
use Slim\Http\Response;

require_once "./controllers/HomeController.php";

$app->get('/', 'App\controllers\HomeController:index');
$app->get('/index.php', 'App\controllers\HomeController:index');

$app->get('/catalogue', 'App\controllers\ShopController:index');

$app->get('/produit/{id}', 'App\controllers\ProductController:index');

// $app->get('/hello/{name}', function (Request $request, Response $response) {
//     $name = $request->getAttribute('name');
//     $response->getBody()->write("Hello, $name");

//     return $response;
// });

// $app->get('/time', function (Request $request, Response $response) {
//     $viewData = [
//         'now' => date('Y-m-d H:i:s')
//     ];

//     return $this->get('view')->render($response, 'time.twig', $viewData);
// });
