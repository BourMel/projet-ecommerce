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
        
        $template = $this->twig->load("product.twig");
        echo $template->render([
            "article" => $article,
            "cart" => $_SESSION["cart"]
        ]);
    }
    
}