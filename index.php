<?php
    // all requests call this file (.htaccess rule)

    $path = "./views/";

    require $path."shared/head.php";
    require $path."shared/header.php";
    
    // handle url redirections
    switch($_SERVER['REQUEST_URI']) {
        case "/":
            require $path."shop.php";
            break;
        default:
            require $path."404.php";
            break;
    }
    
    require "./views/shared/footer.php";