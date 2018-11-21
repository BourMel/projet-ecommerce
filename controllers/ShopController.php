<?php

require_once("./models/Article.php");

global $twig;

class ShopController {
    
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
            new Article("Fougère", 26.00, "Parce que.", 2),
            new Article("Sapin", "98.05", "Indispensable à l'approche de Noël. Donc à certains moments de l'année, et pas à d'autres", 1),
            new Article("Palmier", "9.99", "Invitez l'été dans votre appartement !", 1),
            new Article("Kalanchoe", "11.99", "Une plante facile à entretenir", 2)
        ];
        
        $template = $this->twig->load("shop.twig");
        echo $template->render(["articles" => $articles]);
    }
    
}