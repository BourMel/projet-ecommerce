<?php

class Category {  
    public $id;  
    public $lastname;
    public $firstname;
    public $address;
    public $city;
    public $postal_code;
    public $user_id;
      
    public function __construct($lastname, $firstname, $address, $city, $postal_code)    
    {    
        $this->id = 0;
        $this->lastname = $lastname;
        $this->firstname = $firstname;
        $this->address = $address;
        $this->city = $city;
        $this->postal_code = $postal_code;
        $this->user_id = $user_id;
    }
}