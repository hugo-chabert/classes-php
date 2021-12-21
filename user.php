<?php

class User{
    private $id;
    public $login;
    public $email;
    public $firstname;
    public $lastname;

    public function __construct($id,$login,$email,$firstname,$lastname){
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
        return '<tr><td>'.$login.'</td><td>'.$password.'</td><td>'.$email.'</td><td>'.$firstname.'</td><td>'.$lastname.'</td></tr>';
    }
}

$datas = new User(1, $_POST('login'), $_POST('email'), $_POST('firstname'), $_POST('lastname'));
$datas->register();
var_dump($datas);

?>

<form action="" method="POST">
    <input type="text" name="login" placeholder="Login"></br>
    <input type="text" name="password" placeholder="Mot de Passe"></br>
    <input type="text" name="email" placeholder="Email"></br>
    <input type="text" name="firstname" placeholder="Prenom"></br>
    <input type="text" name="lastname" placeholder="Nom"></br>
    <button type="submit" name="send">Envoyer</button>
</form>