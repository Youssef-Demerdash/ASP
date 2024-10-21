<?php
abstract class User{
    public $firstname;
    public $lastname;
    public $Email;
    public $password;
    public $role;
    public $roleID;

    function __construct($firstname,$lastname,$Email,$password,$role,$roleID){
        $this->firstname=$firstname;
        $this->lastname=$lastname;
        $this->Email=$Email;
        $this->password=$password;
        $this->role=$role;
        $this->roleID=$roleID;
    }
}

class Admin extends user{
    function __construct($firstname,$lastname,$Email,$password,$role,$roleID){
        parent::__construct($firstname,$lastname,$Email,$password,$role,$roleID);
    }
}

class Student extends user{
    public $major;
    public $minor;
    public $status;
    public $semgpa;
    public $cumgpa;
    public $semcrdh;
    public $totalcrdh;
    public $taken_Courses;
    function __construct($firstname,$lastname,$Email,$password,$role,$roleID,$major,$minor,$status,$semgpa,$cumgpa,$semcrdh,$totalcrdh,array $taken_Courses){
        parent::__construct($firstname, $lastname, $Email, $password, $role,$roleID);   
        $this->major=$major;
        $this->minor=$minor;
        $this->status=$status;
        $this->semgpa=$semgpa;
        $this->cumgpa=$cumgpa;
        $this->semcrdh=$semcrdh;
        $this->totalcrdh=$totalcrdh;
 }
}

class Doctor extends user{
    public $faculty;
    public $num_courses;

    function __construct($firstname,$lastname,$Email,$password,$role,$roleID,$faculty,array $num_courses){
        parent::__construct($firstname, $lastname, $Email, $password, $role,$roleID); 
          $this->faculty=$faculty;
          $this->num_course=$num_courses;
     }
}

class TA extends user{
    public $faculty;
    public $assigned_doctors;
    public $num_courses;
    function __construct($firstname,$lastname,$Email,$password,$role,$roleID,$faculty,array $assigned_doctors,array $num_courses){
        parent::__construct($firstname, $lastname, $Email, $password, $role,$roleID);   
        $this->faculty=$faculty;
        $this->assigned_doctor=$assignem_doctor;
        $this->num_courses=$num_courses;
     }
}

?>