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

    public function __construct($date, $client_id)    
    {    
        $this->id = 0;
        $this->date = $date;
        $this->client_id = $client_id;
    }
}