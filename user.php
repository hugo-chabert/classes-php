<?php

class User{
    private $id;
    public $login;
    public $email;
    public $firstname;
    public $lastname;

    public function __construct(){
        $this->id = $id;
        $this->login = $login;
        $this->email = $email;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
    }

    public function register($login, $password, $email, $firstname, $lastname){
        $bdd = mysqli_connect('localhost', 'root', 'root', 'classes');
        mysqli_set_charset($bdd,'utf8');
        $requete = mysqli_query($bdd, "INSERT INTO utilisateurs (login, password, email, firstname, lastname) VALUES ('$login','$password','$email','$firstname','$lastname')");
    }

    public function connect($login,$password){
        
    }
}



?>