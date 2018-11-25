<?php

namespace App\Models;

/**
 * @Entity @Table(name="clients")
 **/

class Client {
    /** @Id @Column(type="integer") @GeneratedValue **/
    public $id;
    /** @Column(type="string") **/
    public $lastname;
    /** @Column(type="string") **/
    public $firstname;
    /** @Column(type="string") **/
    public $address;
    /** @Column(type="string") **/
    public $city;
    /** @Column(type="string") **/
    public $postal_code;
    /**
     * @OneToOne(targetEntity="User", inversedBy="client")
     * @JoinColumn(name="user_id", referencedColumnName="id")
     */
    public $user;
    /** @OneToMany(targetEntity="Order", mappedBy="client") **/
    public $orders;
      
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