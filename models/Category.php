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
      
    public function __construct() {}
    
    /**
     * All getters
     */
     
    public function getId() { return $this->id; }
    public function getName() { return $this->name; }
    public function getArticles() { return $this->articles; }
     
    /**
     * All setters
     */
     
    public function setName($name) { $this->name = $name; }
    public function setArticles($articles) { $this->articles = $articles; }
} 