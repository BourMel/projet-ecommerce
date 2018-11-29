<?php

namespace App\Controllers;

use App\Models\Article as Article; 

class HomeController extends BaseController {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function index($request, $response, $arg) {

        // order the articles by the number of orders containing them
        $articles = $this->entityManager->getRepository(Article::class)
            ->createQueryBuilder('articles')
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