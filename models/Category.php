<?php

namespace App\Models;

/**
 * @Entity @Table(name="categories")
 **/

class Category { 
    /** @Id @Column(type="integer") @GeneratedValue **/
    public $id;  
    /** @Column(type="string") **/
    public $name;
    /** @OneToMany(targetEntity="Article", mappedBy="category") **/
    public $articles;
      
    public function __construct($name)    
    {    
        $this->id = 0;
        $this->name = $name;
    }
} 