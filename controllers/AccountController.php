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
        
        // gives a summary of recent commands
        $nb_orders = count($client->orders);
        
        $nb_received_orders = 0;
        $nb_processed_orders = 0;
        
        foreach($client->orders as $order) {
            $now = new \DateTime();
            $order_date = $order->getDate();
            $interval = $order_date->diff($now)->days;
            
            // number of days >= 3 : command received
            if($interval >= 3) {
                $nb_received_orders--;
                
            // number of days >= 1 : command processed
            } else if ($interval >= 1) {
                $nb_processed_orders++;
            }
        }
        
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