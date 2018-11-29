<?php

namespace App\Controllers;

use App\Models\User as User;
use App\Models\Client as Client;

class ConnectionController extends BaseController {
    
    public function __construct() {
       parent::__construct();
    }
    
    public function index($request, $response, $args) {
        
        $template = $this->twig->load("connection.twig");
        echo $template->render([
            "cart_size" => $this->cart_size,
            "error" => $request->getParams()["error"],
            "register_error" => $request->getParams()["register_error"]
        ]);
    }
    
    /**
     * Login a user
     */
    public function login($request, $response, $args) {
        $params = $request->getParams();
        
        // if one param is missing, stop login
        if(empty($params["email"]) || empty($params["password"])) {
            return;
        }
        
        $user = $this->entityManager->getRepository(User::class)->findBy(["email" => $params["email"]]);
        
        // user doesn't exist
        if($user == null) {
            $url = $this->container->router->pathFor('login', [], ['error' => "Ce compte n'existe pas."]);
            return $response->withStatus(302)->withHeader('Location', $url);
        } 
        
        $user = $user[0];

        // authentification
        if(password_verify($params["password"], $user->getPassword())) {
            $_SESSION['user'] = $user->getId();
            return $response->withRedirect('/'); 
        }
        
        // password is wrong
        $url = $this->container->router->pathFor('login', [], ['error' => "Essayez de retrouver le bon mot de passe ;)"]);
        return $response->withStatus(302)->withHeader('Location', $url);
    }
    
    /**
     * Register a new user (and client)
     */
    public function register($request, $response, $args) {
        $params = $request->getParams();
        
        // if one param is missing, stop registration
        if(empty($params["email"]) || empty($params["password"]) || empty($params["password_conf"])
            || empty($params["lastname"]) || empty($params["firstname"]) || empty($params["address"])
            || empty($params["cp"]) || empty($params["city"])) {

            $url = $this->container->router->pathFor('login', [], ['register_error' => "Vous n'avez pas rempli tous les champs..."]);
            return $response->withStatus(302)->withHeader('Location', $url);
        }
        
        // validate all params
        if(!filter_var($request->getParams()["email"], FILTER_VALIDATE_EMAIL)) {
            $url = $this->container->router->pathFor('login', [], ['register_error' => "Votre adresse email ne semble pas valide"]);
            return $response->withStatus(302)->withHeader('Location', $url);
        }
        if($params["password"] != $params["password_conf"]) {
            $url = $this->container->router->pathFor('login', [], ['register_error' => "Votre mot de passe et sa confirmation ne correspondent pas"]);
            return $response->withStatus(302)->withHeader('Location', $url);
        }
        if(strlen($params["password"]) < 8) {
            $url = $this->container->router->pathFor('login', [], ['register_error' => "Votre mot de passe doit faire 8 caractères"]);
            return $response->withStatus(302)->withHeader('Location', $url);
        }
        
        // everything went fine, let's register the user
        $user = new User;
        $user->setEmail($params["email"]);
        $user->setPassword(password_hash($params["password"], PASSWORD_DEFAULT));
        $this->entityManager->persist($user);

        // and the client
        $client = new Client;
        $client->setLastname($params["lastname"]);
        $client->setFirstname($params["firstname"]);
        $client->setAddress($params["address"]);
        $client->setCity($params["city"]);
        $client->setPostalCode($params["cp"]);
        $client->setUser($user);
        $this->entityManager->persist($client);

        // save, connect and redirect user to home page
        $this->entityManager->flush();
        
        $_SESSION['user'] = $user->getId();
        return $response->withRedirect('/'); 
    }
    
    /**
     * Logout the user
     */
    public function logout($request, $response, $args) {
        unset($_SESSION['user']);
        return $response->withRedirect('/'); 
    }
    
}