<?php

require_once("./models/User.php");
require_once("./models/Client.php");

global $twig;

class AccountController {
    
    private $twig;
    
    public function __construct() {
        global $twig;
        $this->twig = $twig;
    }
    
    public function index() {
        // fake data
        $user = new User("jeanne_dupont@ephedra.fr", "*****");
        $client = new Client("Dupont", "Jeanne", "6 rue du Lapin Vert", "Strasbourg", "67300");
        
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
            "nb_processed_orders" => $nb_processed_orders
        ]);
    }
    
}