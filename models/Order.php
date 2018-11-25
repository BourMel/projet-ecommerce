<?php

namespace App\Models;

/**
 * @Entity @Table(name="orders")
 **/

class Order {
    /** @Id @Column(type="integer") @GeneratedValue **/
    public $id;
    /** @Column(type="date") **/
    public $date;
    /**
     * @ManyToOne(targetEntity="Client", inversedBy="orders")
     * @JoinColumn(name="client_id", referencedColumnName="id")
     */
    public $client;
    /**
     * @ManyToMany(targetEntity="Article", inversedBy="orders")
     * @JoinTable(name="article_order")
     */
    public $articles;

    public function __construct() {
        $this->articles = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * All setters
     */
    public function setDate($date) { $this->date = $date; }
    public function setClient($client) { $this->client = $client; }
     
    /**
     * All getters
     */
    public function getDate() { return $this->date; }
    public function getClient() { return $this->client; }
    public function getArticles() { return $this->articles; }
}