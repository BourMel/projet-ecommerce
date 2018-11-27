<?php

namespace App\Models;

/**
 * @Entity @Table(name="categories")
 **/

class Category { 
    /** @Id @Column(type="integer") @GeneratedValue **/
    private $id;  
    /** @Column(type="string") **/
    private $name;
    /** @OneToMany(targetEntity="Article", mappedBy="category") **/
    private $articles;
      
    public function __construct($name)    
    {    
        $this->id = 0;
        $this->name = $name;
    }
} 