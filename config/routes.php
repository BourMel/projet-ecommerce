<?php

use Slim\Http\Request;
use Slim\Http\Response;

// home
$app->get('/', 'App\controllers\HomeController:index')->setName('root');
$app->get('/index.php', 'App\controllers\HomeController:index')->setName('index');

// shop
$app->get('/catalogue', 'App\controllers\ShopController:index')->setName('shop');

// product
$app->get('/produit/{id}', 'App\controllers\ProductController:index')->setName('product');

// register & login pages
$app->get('/connexion', 'App\controllers\ConnectionController:index')->setName('login');
$app->post('/connexion', 'App\controllers\ConnectionController:login')->setName('login_post');
$app->post('/inscription', 'App\controllers\ConnectionController:register')->setName('register');
$app->post('/deconnexion', 'App\controllers\ConnectionController:logout')->setName('logout');

// handle cart content and allow a user to order
$app->get('/panier', 'App\controllers\CartController:index')->setName('cart');
$app->post('/panier', 'App\controllers\CartController:addProduct')->setName('cart_add');
$app->get('/achat', 'App\controllers\CartController:buy')->setName('buy');
$app->delete('/panier/{article_id}', 'App\controllers\CartController:removeProduct')->setName('cart_remove');

// client account
$app->get('/compte', 'App\controllers\AccountController:index')->setName('account');
$app->post('/compte', 'App\controllers\AccountController:edit')->setName('edit_account');

