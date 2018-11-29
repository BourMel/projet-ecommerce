<?php

namespace App\Controllers;

use App\Models\Article as Article; 
use Doctrine\ORM\Tools\Pagination\Paginator;

class ShopController extends BaseController {
    
    public function __construct() {
        parent::__construct();
        
        $this->results_per_page = 6;
    }
    
    public function index($request, $response, $args) {
        // get filters    
        $params = $request->getParams();
        
        $search = $params["search"]; 
        $price = $params["price"];
        $category = $params["plant"];
        
        // handle pages
        $current_page = $params["page"] <= 0 ? 1 : $params["page"];
        
        $first_result = $current_page*$this->results_per_page - $this->results_per_page;
        $last_result = $this->results_per_page*$current_page;
        
        // start building query according to get parameters
        $query = $this->entityManager->getRepository(Article::class)->createQueryBuilder('Article');
        
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
    
        $query = $query->getQuery();
    
        $paginator = new Paginator($query);
    
        $paginator->getQuery()
        ->setFirstResult($first_result)
        ->setMaxResults($last_result);
    
        $nb_pages = ceil(count($paginator)/$this->results_per_page);
      
        // get categories
        $categories = $this->entityManager->getRepository("App\Models\Category")->findAll();
        
        $template = $this->twig->load("shop.twig");
        echo $template->render([
            "articles" => $paginator,
            "cart_size" => $this->cart_size,
            "user" => $this->logged_user,
            "categories" => $categories,
            // used for paginator :
            "nb_pages" => $nb_pages,
            "param_search" => $search,
            "param_category" => $category,
            "param_price" => $price,
            "current_page" => $current_page
        ]);
    }
    
}