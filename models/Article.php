<?php

namespace App\Models;

/**
 * @Entity @Table(name="articles")
 **/

class Article {
    /** @Id @Column(type="integer") @GeneratedValue **/
    private $id;
    /** @Column(type="string") **/
    private $name; 
    /** @Column(type="float") **/
    private $price;  
    /** @Column(type="text") **/
    private $description;
    /** @Column(type="integer") **/
    private $category_id;
      
    public function __construct($name, $price, $description, $category_id)    
    {    
        $this->id = 0;
        $this->name = $name;
        $this->price = $price;
        $this->description = $description;
        $this->category_id = $category_id;
    }
    
    /**
     * All getters
     */
    public function getId() { return $this->id; }
    
    public function getName() { return $this->name; }
    
    public function getPrice() { return $this->price; }
    
    public function getDescription() { return $this->description; }
    
    public function getCategory() {
        // @TODO
        return $category_id;
    }
    
    /**
     * All setters
     */
    public function setName($name) { $this->name = $name; }
    
    public function setPrice($price) { $this->price = $price; }
    
    public function setDescription($description) { $this->description = $description; }
    
    public function setCategory($category) { $this->category_id = $category; }
} 