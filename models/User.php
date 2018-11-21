<?php

class User {  
    public $id;  
    public $email;
    public $password;
      
    public function __construct($email, $password)    
    {    
        $this->id = 0;
        $this->email = $email;
        $this->password = $password;
    }
}