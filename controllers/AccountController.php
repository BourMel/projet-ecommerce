<?php

namespace App\Controllers;

use App\Models\User as User; 
use App\Models\Client as Client;

class AccountController extends BaseController {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function index($request, $response, $args) {
        
        // summary of commands
        
        $client = $this->logged_user->getClient();
    
        $nb_orders = count($client->getOrders());
        $nb_received_orders = 0;
        $nb_processed_orders = 0;
        
        // determines if the order is received or processed
        foreach($client->getOrders() as $order) {
            $now = new \DateTime();
            $order_date = $order->getDate();
            $interval = $order_date->diff($now)->days;
            
            // number of days >= 3 : command received
            if($interval >= 3) {
                $nb_received_orders++;
                
            // number of days >= 1 : command processed
            } else if ($interval >= 1) {
                $nb_processed_orders++;
            }
        }
        
        
        $template = $this->twig->load("account.twig");
        echo $template->render([
            "client" => $client,
            "nb_orders" => $nb_orders,
            "nb_received_orders" => $nb_received_orders,
            "nb_processed_orders" => $nb_processed_orders,
            "cart_size" => $this->cart_size,
            "user" => $this->logged_user,
            "error" => $request->getParams()["error"]
        ]);
    }
    
    /**
     * Allow a user to change his/her informations
     */
    public function edit($request, $response, $args) {
        
        $params = $request->getParams();
        
        // if one param is missing, stop edition
        if(empty($params["email"]) || empty($params["password"]) || empty($params["firstname"])
            || empty($params["lastname"]) || empty($params["address"])
            || empty($params["cp"]) || empty($params["city"])) {
            return;
        }
        
        // check password matches the logged in user's
        if(!password_verify($params["password"], $this->logged_user->getPassword())) {
            $url = $this->container->router->pathFor('account', [], ['error' => "Mauvais mot de passe..."]);
            return $response->withStatus(302)->withHeader('Location', $url);
        }
        
        // validate params (check email)
        if(!filter_var($request->getParams()["email"], FILTER_VALIDATE_EMAIL)) {
            return;
        }
        
        // now we can edit the USER informations
        $this->logged_user->setEmail($params["email"]);
        
        // update the password if needed
        if(!empty($params["new_password"])) { 
            
            if(strlen($params["new_password"]) < 8) {
                $url = $this->container->router->pathFor('account', [], ['error' => "Mot de passe trop court !"]);
                return $response->withStatus(302)->withHeader('Location', $url);
            }
            
            $this->logged_user->setPassword(password_hash($params["new_password"], PASSWORD_DEFAULT));
        }
        
        $this->entityManager->persist($this->logged_user);
        
        // and the CLIENT informations
        $client = $this->logged_user->getClient();
        
        $client->setFirstname($params["firstname"]);
        $client->setLastname($params["lastname"]);
        $client->setAddress($params["address"]);
        $client->setPostalCode($params["cp"]);
        $client->setCity($params["city"]);
        
        $this->entityManager->persist($client);
        
        // save and redirect
        $this->entityManager->flush();
        return $response->withRedirect('/compte'); 
    }
}