<?php

class Order {  
    public $id;  
    public $date;
    public $client_id;
      
    public function __construct($date, $client_id)    
    {    
        $this->id = 0;
        $this->date = $date;
        $this->client_id = $client_id;
    }
}