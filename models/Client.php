<?php

namespace App\Models;

/**
 * @Entity @Table(name="clients")
 **/

class Client {
    /** @Id @Column(type="integer") @GeneratedValue **/
    private $id;
    /** @Column(type="string") **/
    private $lastname;
    /** @Column(type="string") **/
    private $firstname;
    /** @Column(type="string") **/
    private $address;
    /** @Column(type="string") **/
    private $city;
    /** @Column(type="string") **/
    private $postal_code;
    /**
     * @OneToOne(targetEntity="User", inversedBy="client")
     * @JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user;
    /** @OneToMany(targetEntity="Order", mappedBy="client") **/
    private $orders;
      
    public function __construct() { }
    
    /**
     * All getters
     */
    public function getId() { return $this->id; }
    public function getLastname() { return $this->lastname; }
    public function getFirstname() { return $this->firstname; }
    public function getAddress() { return $this->address; }
    public function getCity() { return $this->city; }
    public function getPostalCode() { return $this->postal_code; }
    public function getUser() { return $this->user; }
    public function getOrders() { return $this->orders; }
    
    /**
     * All setters
     */
    public function setLastname($lastname) { $this->lastname = $lastname; }
    public function setFirstname($firstname) { $this->firstname = $firstname; }
    public function setAddress($address) { $this->address = $address; }
    public function setCity($city) { $this->city = $city; }
    public function setPostalCode($postal_code) { $this->postal_code = $postal_code; }
    public function setUser($user) { $this->user = $user; }
}