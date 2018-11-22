<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require_once './vendor/autoload.php';

setlocale(LC_MONETARY, 'fr_FR');

// DOCTRINE INIT
require_once "./bootstrap.php";

// TWIG INIT
// $loader = new Twig_Loader_Filesystem('./views');
// $twig = new Twig_Environment($loader, array(
//     'cache' => './twig_cache',
//     'debug' => 'true'
// ));

// SLIM INIT
$app = require_once './config/bootstrap.php';
$app->run();




// SLIM CONFIGURATION

// $config['displayErrorDetails'] = true;
// $config['addContentLengthHeader'] = false;

// $config['db']['host']   = 'localhost';
// $config['db']['user']   = 'root';
// $config['db']['pass']   = '';
// $config['db']['dbname'] = 'ephedra';

// SLIM START

// $app = new \Slim\App(['settings' => $config]);

// ROUTES

// echo "hello";

// $app->get('/', function (Request $request, Response $response, array $args) {

//     $response = $this->view->render('home.twig');

//     return $response;
// });

// $app->run();





    
    
    // 

    // $path = "./controllers/";

    // // handle url redirections
    // switch($_SERVER['REQUEST_URI']) {
    //     case "/":
    //     case "/index.php":
    //         require_once $path."HomeController.php";
            
    //         $homeController = new HomeController();
    //         $homeController->index();
    
    //         break;
    //     case "/catalogue":
    //         require $path."ShopController.php";
            
    //         $shopController = new ShopController();
    //         $shopController->index();
            
    //         break;
    //     case "/compte":
    //         require $path."AccountController.php";
            
    //         $accountController = new AccountController();
    //         $accountController->index();
            
    //         break;
    //     case "/connexion":
    //         require $path."ConnectionController.php";
            
    //         $connectionController = new ConnectionController();
    //         $connectionController->index();
            
    //         break;
    //     case "/panier":
    //         require $path."CartController.php";
            
    //         $cartController = new CartController();
    //         $cartController->index();
            
    //         break;
    //     case "/produit":
    //         require $path."ProductController.php";
            
    //         $productController = new ProductController();
    //         $productController->index();
            
    //         break;
    //     default:
    //         $template = $twig->load("404.html");
    //         echo $template->render();
    //         break;
    // }
