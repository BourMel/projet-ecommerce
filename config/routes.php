<?php

use Slim\Http\Request;
use Slim\Http\Response;

require_once "./controllers/HomeController.php";

$app->get('/', 'App\controllers\HomeController:index');
$app->get('/index.php', 'App\controllers\HomeController:index');

$app->get('/catalogue', 'App\controllers\ShopController:index');

$app->get('/produit/{id}', 'App\controllers\ProductController:index');

$app->post('/cart', 'App\controllers\CartController:addProduct');


// $app->post('/cart', function () use ($app) {
//     $req = $app->request();
//     print_r($req->params());
// });

// $app->post('/cart', function () {
//   $data = $request->getParams();
   
// //   $data["article_id"]
   
// //   var_dump($request);
// //   var_dump($data);
// //   echo json_encode($data['articleId']);
   
//   return new App\controllers\CartController->addProduct($data["article_id"]);
// });

// var_dump( $app->request() );

// $app->post('/cart', function() use ($app) {
//       $request = $app->request();
//       echo json_encode($request->post('articleId'));
// });

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
