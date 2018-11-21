<?php
    // all requests call this file (.htaccess rule)

    require_once "./vendor/autoload.php";

    // twig initialisation
    $loader = new Twig_Loader_Filesystem('./views');
    $twig = new Twig_Environment($loader, array(
        'cache' => './twig_cache',
        'debug' => 'true'
    ));
    
    setlocale(LC_MONETARY, 'fr_FR');

    $path = "./controllers/";

    // handle url redirections
    switch($_SERVER['REQUEST_URI']) {
        case "/":
        case "/index.php":
            require_once $path."HomeController.php";
            
            $homeController = new HomeController();
            $homeController->index();
    
            break;
        case "/catalogue":
            require $path."ShopController.php";
            
            $shopController = new ShopController();
            $shopController->index();
            
            break;
        case "/compte":
            require $path."AccountController.php";
            
            $accountController = new AccountController();
            $accountController->index();
            
            break;
        case "/connexion":
            require $path."ConnectionController.php";
            
            $connectionController = new ConnectionController();
            $connectionController->index();
            
            break;
        case "/panier":
            require $path."CartController.php";
            
            $cartController = new CartController();
            $cartController->index();
            
            break;
        case "/produit":
            require $path."ProductController.php";
            
            $productController = new ProductController();
            $productController->index();
            
            break;
        default:
            $template = $twig->load("404.html");
            echo $template->render();
            break;
    }
