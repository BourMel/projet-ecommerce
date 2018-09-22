<?php
    // all requests call this file (.htaccess rule)

    $path = "./views/";

    require $path."shared/head.php";
    require $path."shared/header.php";
    
    // handle url redirections
    switch($_SERVER['REQUEST_URI']) {
        case "/":
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
            require $path."404.php";
            break;
    }
    
    require "./views/shared/footer.php";