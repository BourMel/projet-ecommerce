<?php

global $twig;

class ConnectionController {
    
    private $twig;
    
    public function __construct() {
        global $twig;
        $this->twig = $twig;
    }
    
    public function index() {
        $template = $this->twig->load("connection.twig");
        echo $template->render([]);
    }
    
}