<?php

class Category {  
    public $id;  
    public $name;
      
    public function __construct($name)    
    {    
        $this->id = 0;
        $this->name = $name;
    }
} 