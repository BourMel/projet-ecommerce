<?php

namespace App\Controllers;
use App\Models\Article as Article; 

class ProductController extends BaseController {

    public function __construct() {
        global $twig;
        global $entityManager;
        
        $this->twig = $twig;
        $this->entityManager = $entityManager;
    }
    
    public function index($request, $response, $args) {
        // set layout variables
        parent::index($request, $response, $args);
        
        $article_id = (int)$args["id"];
        $article = $this->entityManager->find("App\Models\Article", $article_id);
        
        $template = $this->twig->load("product.twig");
        echo $template->render([
            "article" => $article,
            "cart_size" => $this->cart_size,
            "user" => $this->logged_user
        ]);
    }
    
}