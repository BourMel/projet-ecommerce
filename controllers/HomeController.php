<?php

namespace App\Controllers;
use App\Models\Article as Article; 

global $twig;
global $entityManager;

class HomeController extends BaseController {
    
    private $twig;
    private $articleRepo;
    
    public function __construct() {
        global $twig;
        global $entityManager;
        
        $this->twig = $twig;
        $this->entityManager = $entityManager;
        $this->queryBuilder = $entityManager
                            ->getRepository(Article::class)
                            ->createQueryBuilder('articles');
    }
    
    public function index($request, $response, $arg) {
        // set layout variables
        parent::index($request, $response, $args);

        // order the articles by the number of orders containing them
        $articles = $this->queryBuilder
            ->select('a')
            ->from('App\Models\Article', 'a')
            ->groupBy('a.id')
            ->leftJoin('a.orders', 'o')
            ->leftJoin('a.images', 'i')
            ->setMaxResults(3)
            ->orderBy('count(a.id)', 'DESC')
            ->getQuery()
            ->getResult();
            
        $template = $this->twig->load("home.twig");
        echo $template->render([
            "best_articles" => $articles,
            "cart_size" => $this->cart_size,
            "user" => $this->logged_user
        ]);
    }
    
}