<?php

namespace App\Models;

/**
 * @Entity @Table(name="article_image")
 */
class ArticleImage {  
    /** @Id @Column(type="integer") @GeneratedValue **/
    private $id;  
    /** @Column(type="string") **/
    private $name;  
    /**
     * @ManyToOne(targetEntity="Article", inversedBy="images")
     * @JoinColumn(name="article_id", referencedColumnName="id")
     */
    private $article;
      
    public function __construct() {}
    
    /**
     * All getters
     */
    public function getId() { return $this->id; }
    public function getName() { return $this->name; }
    public function getArticle() { return $this->article; }
     
    /**
     * All setters
     */
    public function setName($name) { $this->name = $name; }
    public function setArticle($article) { $this->articles = $article; }
} 