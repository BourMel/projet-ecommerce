<?php

require_once("./models/Article.php");

global $twig;

class ProductController {
    
    private $twig;
    
    public function __construct() {
        global $twig;
        $this->twig = $twig;
    }
    
    public function index() {
        // fake article to show in template
        $article = new Article("Ephedra", 42.00, "La plante emblématique de notre site !", 1);
        
        $template = $this->twig->load("product.twig");
        echo $template->render(["article" => $article]);
    }
    
}