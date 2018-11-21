<?php

require_once("./models/Article.php");

global $twig;

class HomeController {
    
    private $twig;
    
    public function __construct() {
        global $twig;
        $this->twig = $twig;
    }
    
    public function index() {
        // fake articles to show in template
        $articles = [
            new Article("Ephedra", 42.00, "La plante emblématique de notre site !", 1),
            new Article("Ficus", 18.00, "Une superbe idée cadeau", 1),
            new Article("Fougère", 26.00, "Parce que.", 2)
        ];
        
        $template = $this->twig->load("home.twig");
        echo $template->render(["best_articles" => $articles]);
    }
    
}