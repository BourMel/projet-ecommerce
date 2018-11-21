<?php

require_once("./models/Order.php");

global $twig;

class CartController {
    
    private $twig;
    
    public function __construct() {
        global $twig;
        $this->twig = $twig;
    }
    
    public function index() {
        // no fake data until we have relations on models
        
        $template = $this->twig->load("cart.twig");
        echo $template->render([]);
    }
    
}