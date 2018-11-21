<?php

class Article {  
    public $id;  
    public $name;  
    public $price;  
    public $description;  
    public $category_id;
      
    public function __construct($name, $price, $description, $category_id)    
    {    
        $this->id = 0;
        $this->name = $name;
        $this->price = $price;
        $this->description = $description;
        $this->category_id = $category_id;
    }
} 