<?php

class ArticleImage {  
    public $id;  
    public $name;  
    public $article_id;
      
    public function __construct($name, $article_id)    
    {    
        $this->id = 0;
        $this->name = $name;
        $this->article_id = $article_id;
    }
} 