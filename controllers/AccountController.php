<?php

namespace App\Controllers;
use App\Models\User as User; 
use App\Models\Client as Client; 

class AccountController extends BaseController {
    
    private $twig;
    
    public function __construct() {
        global $twig;
        global $entityManager;
        
        $this->twig = $twig;
        $this->entityManager = $entityManager;
    }
    
    public function index() {
        // set layout variables
        parent::index($request, $response, $args);
        
        $user = $this->logged_user;
        $client = $user->getClient();
        
        // to compute with database informations
        $nb_orders = 6;
        $nb_received_orders = 5;
        $nb_processed_orders = 1;
        
        $template = $this->twig->load("account.twig");
        echo $template->render([
            "user" => $user,
            "client" => $client,
            "nb_orders" => $nb_orders,
            "nb_received_orders" => $nb_received_orders,
            "nb_processed_orders" => $nb_processed_orders,
            "cart_size" => $this->cart_size,
            "user" => $this->logged_user
        ]);
    }
    
}