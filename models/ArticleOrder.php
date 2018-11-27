<?php

// source: https://symfonycasts.com/screencast/collections/many-to-many-extra-fields
/**
 * Since we want to add a field on the article_order relation table ("quantity"),
 * we need to create an extra class and replace our many-to-many relations by
 * one-to-many relations
 */

namespace App\Models;


/**
 * @Entity @Table(name="article_order")
 */
class ArticleOrder { 
    /**
     * @Id @ManyToOne(targetEntity="Article", inversedBy="orders")
     * @JoinColumn(nullable=false)
     */
    private $article;
    
    /**
     * @Id @ManyToOne(targetEntity="Order", inversedBy="articles")
     * @JoinColumn(nullable=false)
     */
    private $order;
    
    /** @Column(type="integer") **/
    private $quantity;
    
    /**
     * All getters
     */
     
    public function getArticle() { return $this->article; }
    public function getOrder() { return $this->order; }
    public function getQuantity() { return $this->quantity; }
     
    /**
     * All setters
     */
     
     public function setArticle($article) { $this->article = $article; }
     public function setOrder($order) { $this->order = $order; }
     public function setQuantity($quantity) { $this->quantity = $quantity; }
}