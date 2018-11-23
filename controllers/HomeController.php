<?php

namespace App\Controllers;
use App\Models\Article as Article; 

global $twig;
global $entityManager;

class HomeController {
    
    private $twig;
    private $articleRepo;
    
    public function __construct() {
        global $twig;
        global $entityManager;
        
        $this->twig = $twig;
        $this->queryBuilder = $entityManager
                            ->getRepository(Article::class)
                            ->createQueryBuilder('articles');
    }
    
    public function index() {

        $articles = $this->queryBuilder
            ->from('App\Models\Article', 'a')
            ->orderBy('a.name', 'ASC')
            ->setMaxResults(3)
            ->getQuery()
            ->getResult();
            
        $template = $this->twig->load("home.twig");
        echo $template->render(["best_articles" => $articles]);
    }
    
}