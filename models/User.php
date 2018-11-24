<?php

namespace App\Models;

/**
 * @Entity @Table(name="users")
 **/

class User {
    /** @Id @Column(type="integer") @GeneratedValue **/
    public $id;
    /** @Column(type="string") **/
    public $email;
    /** @Column(type="string") **/
    public $password;
    /** @OneToOne(targetEntity="Client", mappedBy="user") **/
    private $client;
    
    public function __construct() { }
    
    /**
     * All getters
     */
    public function getId() { return $this->id; }
    public function getEmail() { return $this->email; }
    public function getPassword() { return $this->password; }
    public function getClient() { return $this->client; }
    
    /**
     * All setters
     */
    public function setEmail($email) { $this->email = $email; }
    public function setPassword($password) { $this->password = $password; }
    public function setClient($client) { $this->client = $client; }
}