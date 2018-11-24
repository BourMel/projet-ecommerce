<?php

use Slim\Http\Request;
use Slim\Http\Response;

$app->get('/', 'App\controllers\HomeController:index');
$app->get('/index.php', 'App\controllers\HomeController:index');

$app->get('/catalogue', 'App\controllers\ShopController:index');

$app->get('/produit/{id}', 'App\controllers\ProductController:index');

$app->get('/connexion', 'App\controllers\ConnectionController:index');
// $app->post('/connexion', 'App\controllers\ConnectionController:index');
$app->post('/inscription', 'App\controllers\ConnectionController:register');

$app->get('/panier', 'App\controllers\CartController:index');
$app->post('/panier', 'App\controllers\CartController:addProduct');
$app->delete('/panier/{article_id}', 'App\controllers\CartController:removeProduct');
