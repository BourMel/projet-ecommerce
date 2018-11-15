<?php
    // all requests call this file (.htaccess rule)


    require_once "./vendor/autoload.php";

    // twig initialisation
    $loader = new Twig_Loader_Filesystem('./views');
    $twig = new Twig_Environment($loader, array(
        'cache' => './twig_cache'
    ));

    $path = "./controllers/";

    // handle url redirections
    switch($_SERVER['REQUEST_URI']) {
        case "/":
        case "/index.php":
            require $path."home.php";
            break;
        case "/catalogue":
            require $path."shop.php";
            break;
        case "/compte":
            require $path."account.php";
            break;
        case "/connexion":
            require $path."connection.php";
            break;
        case "/panier":
            require $path."cart.php";
            break;
        case "/produit":
            require $path."product.php";
            break;
        default:
            $template = $twig->load("404.html");
            echo $template->render();
            break;
    }
