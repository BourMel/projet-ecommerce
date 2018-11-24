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
        $this->entityManager = $entityManager;
    }
    
    public function index() {
        // build an array which contains, in the same order as the session array,
        // the articles from the database
        $articles = [];
        $total_price = 0;
        foreach($_SESSION["cart"] as $article_id => $quantity) {
            $articles[$article_id] = $this->entityManager->find(
                "App\Models\Article",
                (int)$article_id
            );
            
            $total_price += $articles[$article_id]->getPrice()*$quantity;
        }
        
        $template = $this->twig->load("cart.twig");
        echo $template->render([
            "cart_articles" => $articles,
            // we keep the session informations since we need the quantities
            "cart_quantities" => $_SESSION["cart"],
            "total" => $total_price
        ]);
    }
    
    /**
     * Add a product to the cart, using PHP session 
     */
    public function addProduct($request, $response, $args) {
        if (!isset($_SESSION['cart'])) {
          $_SESSION['cart'] = [];
        }
        
        $newArticle = $request->getParams()["article_id"];
        
        // if key exists, we only increment quantity
        // (key = articleId, value = quantity)
        if(array_key_exists($newArticle, $_SESSION['cart'])) {
            $_SESSION["cart"][$newArticle]++;
            
        } else {
            $_SESSION["cart"][$newArticle] = 1;
        }
    }
    
}