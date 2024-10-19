<?php
abstract class user{
    public $firstname;
    public $lastname;
    public $Email;
    public $password;
    public $role;

    function __construct($firstname,$lastname,$Email,$password,$role){
        $this->firstname=$firstname;
        $this->lastname=$lastname;
        $this->Email=$Email;
        $this->password=$password;
        $this->role=$role;
    }
}

class student extends user{
    function __construct($firstname,$lastname,$Email,$password,$role){
        parent::__construct($firstname, $lastname, $Email, $password, $role);   
 }
    
}

class doctor extends user{
    function __construct($firstname,$lastname,$Email,$password,$role){
        parent::__construct($firstname, $lastname, $Email, $password, $role);   
     }
}

class TA extends user{
    function __construct($firstname,$lastname,$Email,$password,$role){
        parent::__construct($firstname, $lastname, $Email, $password, $role);   
     }
}

class admin extends user{
    function __construct($firstname,$lastname,$Email,$password,$role){
        parent::__construct($firstname, $lastname, $Email, $password, $role);   
     }
}
?>