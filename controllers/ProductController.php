<?php

namespace App\Controllers;
use App\Models\Article as Article; 

global $twig;
global $entityManager;

class ProductController {
    
    private $twig;
    
    public function __construct() {
        global $twig;
        global $entityManager;
        
        $this->twig = $twig;
        $this->entityManager = $entityManager;
    }
    
    public function index($request, $response, $args) {
        $article = $this->entityManager->find("App\Models\Article", (int)$args["id"]);

        // count articles in cart
        $cart_size = 0;
        foreach ($_SESSION['cart'] as $item => $quantity) {
            $cart_size += $quantity;
        }
        
        $template = $this->twig->load("product.twig");
        echo $template->render([
            "article" => $article,
            "cart_size" => $cart_size
        ]);
    }
    
}