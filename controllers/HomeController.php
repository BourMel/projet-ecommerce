<?php

require_once("./models/Article.php");

global $twig;
global $entityManager;

class HomeController {
    
    private $twig;
    private $articleRepo;
    
    public function __construct() {
        global $twig;
        global $entityManager;
        
        $this->twig = $twig;
        $this->articleRepo = $entityManager->getRepository(Article::class);
    }
    
    public function index() {
        // fake articles to show in template
        $articles = [
            new Article("Ephedra", 42.00, "La plante emblématique de notre site !", 1),
            new Article("Ficus", 18.00, "Une superbe idée cadeau", 1),
            new Article("Fougère", 26.00, "Parce que.", 2)
        ];
        
        // $articles = $this->articleRepo->getBestSales();
        
        $template = $this->twig->load("home.twig");
        echo $template->render(["best_articles" => $articles]);
    }
    
}