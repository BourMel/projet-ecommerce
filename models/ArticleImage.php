<?php

namespace App\Models;

/**
 * @Entity @Table(name="article_image")
 */
class ArticleImage {  
    /** @Id @Column(type="integer") @GeneratedValue **/
    public $id;  
    /** @Column(type="string") **/
    public $name;  
    /**
     * @ManyToOne(targetEntity="Article", inversedBy="images")
     * @JoinColumn(name="article_id", referencedColumnName="id")
     */
    private $article;
      
    public function __construct($name, $article_id)    
    {    
        $this->id = 0;
        $this->name = $name;
        $this->article_id = $article_id;
    }
} 