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
    /**
     * @ManyToOne(targetEntity="Category", inversedBy="articles")
     * @JoinColumn(name="category_id", referencedColumnName="id")
     */
    private $category;
    /** @OneToMany(targetEntity="ArticleImage", mappedBy="article") **/
    private $images;
    /** @OneToMany(targetEntity="ArticleOrder", mappedBy="article") **/
    private $orders;
      
    public function __construct()    
    {    
        $this->orders = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * All getters
     */
    public function getId() { return $this->id; }
    public function getName() { return $this->name; }
    public function getPrice() { return $this->price; }
    public function getDescription() { return $this->description; }
    public function getCategory() { return $this->category; }
    public function getImages() { return $this->images; }
    public function getOrders() { return $this->orders; }
    
    /**
     * All setters
     */
    public function setName($name) { $this->name = $name; }
    public function setPrice($price) { $this->price = $price; }
    public function setDescription($description) { $this->description = $description; }
    public function setCategory($category) { $this->category_id = $category; }
} 