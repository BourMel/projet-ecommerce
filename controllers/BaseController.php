<?php

namespace App\Controllers;

global $twig;
global $entityManager;

class BaseController {
    
    private $twig;
    
    public function __construct() {
        global $twig;
        global $entityManager;
        
        $this->twig = $twig;
        $this->entityManager = $entityManager;
        $this->cart_size = 0;
        $this->logged_user = null;
    }
    
    public function index($request, $response, $args) {
        // count articles in cart
        foreach ($_SESSION['cart'] as $item => $quantity) {
            $this->cart_size += $quantity;
        }

        // handle user connection
        if(isset($_SESSION['user'])) {
            $this->logged_user = $this->entityManager->find("App\Models\User", $_SESSION['user']);
        }
        
        echo isset($_SESSION['user']);
    }
    
}