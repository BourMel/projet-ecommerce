<?php

namespace App\Controllers;

use App\Models\User as User;
use App\Models\Client as Client;

global $twig;
global $entityManager;
global $app;

class ConnectionController extends BaseController {
    
    private $twig;
    private $entityManager;
    private $app;
    
    public function __construct() {
        global $twig;
        global $entityManager;
        global $app;
        
        $this->twig = $twig;
        $this->entityManager = $entityManager;
        $this->container = $app->getContainer();
    }
    
    public function index($request, $response, $args) {
        // set layout variables
        parent::index($request, $response, $args);
        
        $template = $this->twig->load("connection.twig");
        echo $template->render([
            "cart_size" => $this->cart_size,
            "error" => $request->getParams()["error"]
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
        if(password_verify($params["password"], $user->password)) {
            $_SESSION['user'] = $user->id;
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
            return;
        }
        
        // validate all params
        if(!filter_var($request->getParams()["email"], FILTER_VALIDATE_EMAIL)) {
            return;
        }
        if(($params["password"] != $params["password_conf"]) || strlen($params["new_password"] < 8)) {
            return;
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
        
        $_SESSION['user'] = $user->id;
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