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
    public $course_code;

    function __construct($firstname,$lastname,$Email,$password,$role,$roleID,$faculty,$course_code){
        parent::__construct($firstname, $lastname, $Email, $password, $role,$roleID); 
          $this->faculty=$faculty;
          $this->course_code=$course_code;
     }
}

class TA extends user{
    public $faculty;
    public $course_code;
    function __construct($firstname,$lastname,$Email,$password,$role,$roleID,$faculty,array $assigned_doctors,$course_code){
        parent::__construct($firstname, $lastname, $Email, $password, $role,$roleID);   
        $this->faculty=$faculty;
        $this->course_code=$course_code;
     }
}

?>