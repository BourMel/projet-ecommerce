<?php

namespace App\Controllers;
use App\Models\Article as Article; 

global $twig;
global $entityManager;

class CartController {
    
    private $twig;
    private $articleRepo;
    
    public function __construct() {
        global $twig;
        global $entityManager;
        
        $this->twig = $twig;
        $this->queryBuilder = $entityManager
                            ->getRepository(Article::class)
                            ->createQueryBuilder('articles');
    }
    
    public function index() {
        // no fake data until we have relations on models
        
        $template = $this->twig->load("cart.twig");
        echo $template->render([]);
    }
    
    public function addProduct($request, $response, $args) {
        if (!isset($_SESSION['cart'])) {
          $_SESSION['cart'] = [];
        }

        $newArticle = $request->getParams()["article_id"];
        array_push($_SESSION['cart'], $newArticle);
    }
    
}