<?php

namespace App\Models;

/**
 * @Entity @Table(name="orders")
 **/

class Order {
    /** @Id @Column(type="integer") @GeneratedValue **/
    private $id;
    /** @Column(type="date") **/
    private $date;
    /**
     * @ManyToOne(targetEntity="Client", inversedBy="orders")
     * @JoinColumn(name="client_id", referencedColumnName="id")
     */
    private $client;
    /** @OneToMany(targetEntity="ArticleOrder", mappedBy="order") **/
    private $articles;

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