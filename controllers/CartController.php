<?php

namespace App\Controllers;

use App\Models\Article as Article; 
use App\Models\ArticleOrder as ArticleOrder; 
use App\Models\Order as Order; 

class CartController extends BaseController {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function index($request, $response, $args) {
        
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
            "total" => $total_price,
            "cart_size" => $this->cart_size,
            "user" => $this->logged_user
        ]);
    }
    
    /**
     * Allow the user to create an order (buy its cart content) 
     */
    public function buy($request, $response, $args) {
        $order = new Order;
        
        $client = $this->logged_user->getClient();
        $order->setClient($client);
        
        $order->setDate(new \DateTime());
        
        $this->entityManager->persist($order);
        
        // add all cart articles into the new order
        foreach($_SESSION['cart'] as $article_id => $quantity) {
            $article = $this->entityManager->find("App\Models\Article", $article_id);
            
            // relation table
            $article_order = new ArticleOrder();
            $article_order->setArticle($article);
            $article_order->setOrder($order);
            $article_order->setQuantity($quantity);
            
            $this->entityManager->persist($article_order);
        }
        
        $this->entityManager->flush();
        
        // after order, erase cart and redirect to home page
        unset($_SESSION['cart']);
        return $response->withRedirect('/'); 
    }
    
    /**
     * Add a product to cart, using PHP session 
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
    
    /**
     * Remove a product from cart, using PHP session 
     */
    public function removeProduct($request, $response, $args) {
        if (!isset($_SESSION['cart'])) {
          return;
        }
        
        $articleToRemove = (int)$args["article_id"];
        
        if(!array_key_exists($articleToRemove, $_SESSION['cart'])) {
            return;
        }
        
        // if there is more than one article, we only decrement quantity
        if($_SESSION["cart"][$articleToRemove] > 1) {
            $_SESSION["cart"][$articleToRemove]--;
            
        } else {
            unset($_SESSION["cart"][$articleToRemove]);
        }
    }
    
}