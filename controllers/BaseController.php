<?php

namespace App\Controllers;

global $twig;
global $entityManager;
global $app;

class BaseController {
    
    protected $twig;
    protected $app;
    protected $entityManager;
    protected $container;
    
    public function __construct() {
        global $twig;
        global $entityManager;
        global $app;
        
        // useful for the app
        $this->app = $app;
        $this->twig = $twig;
        $this->entityManager = $entityManager;
        $this->container = $app->getContainer();
        
        // related to sessions
        $this->cart_size = 0;
        $this->logged_user = null;
        
        // count articles in cart
        if(isset($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $item => $quantity) {
                $this->cart_size += $quantity;
            }
        }
        
        // handle user connection
        if(isset($_SESSION['user'])) {
            $this->logged_user = $this->entityManager->find("App\Models\User", $_SESSION['user']);
        }
    }
}