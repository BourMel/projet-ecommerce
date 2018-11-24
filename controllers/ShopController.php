<?php

namespace App\Controllers;
use App\Models\Article as Article; 

global $twig;
global $entityManager;

class ShopController extends BaseController {
    
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
    
    public function index() {
        // set layout variables
        parent::index($request, $response, $args);
        
        // PAGE
        $articles = $this->queryBuilder
            ->from('App\Models\Article', 'a')
            // ->orderBy('a.name', 'ASC')
            ->setMaxResults(6)
            ->getQuery()
            ->getResult();
        
        $template = $this->twig->load("shop.twig");
        echo $template->render([
            "articles" => $articles,
            "cart_size" => $this->cart_size,
            "user" => $this->logged_user
        ]);
    }
    
}