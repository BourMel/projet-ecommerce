<?php

class Order {  
    public $id;  
    public $date;
    public $client_id;
      
    public function __construct($lastname, $firstname, $address, $city, $postal_code)    
    {    
        $this->id = 0;
        $this->date = $date;
        $this->client_id = $client_id;
    }
}