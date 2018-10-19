<?php
    // all requests call this file (.htaccess rule)

    $path = "./controllers/";

    require "./views/shared/head.html";
    require "./views/shared/header.html";

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
            require "./views/404.html";
            break;
    }

    require "./views/shared/footer.html";
