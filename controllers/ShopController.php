<?php

namespace App\Controllers;
use App\Models\Article as Article; 

use Doctrine\ORM\Tools\Pagination\Paginator;

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
                            ->createQueryBuilder('Article');
    }
    
    public function index($request, $response, $args) {
        // set layout variables
        parent::index($request, $response, $args);
    
        // get filters    
        $params = $request->getParams();
    
        $search = $params["search"]; 
        $price = $params["price"];
        $category = $params["plant"];
        
        $query = $this->queryBuilder;
    
        
        // filter by price
        if(!empty($price) && $price != "all") {
        
            if($price == "less_30") {
                $max = 30;
            } else {
                $max = 10;
            }
            
            $query = $query
                ->where('Article.price < :max')
                ->setParameter("max", $max);
        }
        
        // filter by keywords (not working)
        if(!empty($search)) {
            
            $query = $query
                ->andWhere('Article.name LIKE :search')
                ->setParameter("search", "%".$search."%");
        }
        
        //filter by categories
        if(!empty($category) && $category != "all") {

            $query = $query
                ->leftJoin('Article.category', 'c')
                ->andWhere('c.id = :category')
                ->setParameter("category", $category);
        }
    
        echo $query->getDQL();
        $query = $query->getQuery();
    
        $paginator = new Paginator($query);

        $paginator->getQuery()
        ->setFirstResult(100 * (1 - 1)) // Offset
        ->setMaxResults(100); // Limit
    
      
        echo count($paginator);
      
        // get categories
        $categories = $this->entityManager->getRepository("App\Models\Category")->findAll();
        
        $template = $this->twig->load("shop.twig");
        echo $template->render([
            "articles" => $paginator,
            "cart_size" => $this->cart_size,
            "user" => $this->logged_user,
            "categories" => $categories
        ]);
    }
    
}