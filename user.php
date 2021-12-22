<?php

class User{
    private $id;
    public $login;
    public $email;
    public $firstname;
    public $lastname;
    public $bdd;

    public function __construct($id,$login,$email,$firstname,$lastname){
        $this->id = $id;
        $this->login = $login;
        $this->email = $email;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->bdd = mysqli_connect('localhost', 'root', 'root', 'classes');
    }

    public function register($login, $password, $email, $firstname, $lastname){
        mysqli_set_charset($this->bdd,'utf8');
        $User_Exist = mysqli_query($this->bdd, "SELECT * FROM utilisateurs WHERE login = '".$login."'");
        $Row_Exist = mysqli_num_rows($User_Exist);
        if($Row_Exist == 1){
            echo 'Utilisateur déjà existant';
        }
        else{
            $Register = mysqli_query($this->bdd, "INSERT INTO utilisateurs (login, password, email, firstname, lastname) VALUES ('$login','$password','$email','$firstname','$lastname')");
        }
    }

    public function connect($login, $password){
        mysqli_set_charset($this->bdd,'utf8');
        $loginC = $_POST['loginC'];
        $passwordC = $_POST['passwordC'];
        $recupUserConnect = mysqli_query($this->bdd, "SELECT * FROM utilisateurs WHERE login = '".$loginC."' AND password ='".$passwordC."'");
        $row = mysqli_num_rows($recupUserConnect);
        $fetch = mysqli_fetch_assoc($recupUserConnect);
        if($row == 1){
            $_SESSION['user'] = $fetch;
        }
    }

    public function disconnect(){
        session_destroy();
    }

    public function delete(){
        mysqli_set_charset($this->bdd,'utf8');
        $loginD = $_POST['loginD'];
        $deleteUserRequest = mysqli_query($this->bdd, "SELECT * FROM utilisateurs WHERE login = '".$loginD."'");
        $rowDelete = mysqli_num_rows($deleteUserRequest);
        if($rowDelete == 1){
            $delete = mysqli_query($this->bdd,"DELETE FROM utilisateurs WHERE login = '".$loginD."'");
        }
        else{
            echo 'Utilisateur inexistant';
        }
    }

    public function update($login, $password, $email, $firstname, $lastname){
        mysqli_set_charset($this->bdd,'utf8');
        $loginUpdate = $_SESSION['user']['login'];
        $updateUser = mysqli_query($this->bdd, "UPDATE utilisateurs SET
                                    login = '".$login."',
                                    password = '".$password."',
                                    email = '".$email."',
                                    firstname = '".$firstname."',
                                    lastname = '".$lastname."'
                                    WHERE login = '".$loginUpdate."'");
        session_destroy();
        header('Location : index.php');
    }
}


$datas = new User(0,0,0,0,0);

if(isset($_POST['inscription'])){
    $datas->register($_POST['login'],$_POST['password'], $_POST['email'], $_POST['firstname'], $_POST['lastname']);
}

if(isset($_POST['connexion'])){
    $datas->connect($_POST['loginC'],$_POST['passwordC']);
}

if(isset($_POST['deco'])){
    $datas->disconnect();
}

if(isset($_POST['delete'])){
    $datas->delete();
}

if(isset($_POST['MODIF'])){
    if(empty($_POST['loginModif'])){
        $loginModif = $_SESSION['user']['login'];
    }
    else{
        $loginModif = $_POST['loginModif'];
    }
    if(empty($_POST['passwordModif'])){
        $passwordModif = $_SESSION['user']['password'];
    }
    else{
        $passwordModif = $_POST['passwordModif'];
    }
    if(empty($_POST['emailModif'])){
        $emailModif = $_SESSION['user']['email'];
    }
    else{
        $emailModif = $_POST['emailModif'];
    }
    if(empty($_POST['loginModif'])){
        $firstnameModif = $_SESSION['user']['firstname'];
    }
    else{
        $firstnameModif = $_POST['firstnameModif'];
    }
    if(empty($_POST['lastnameModif'])){
        $lastnameModif = $_SESSION['user']['lastname'];
    }
    else{
        $lastnameModif = $_POST['lastnameModif'];
    }
    $datas->update($loginModif, $passwordModif, $emailModif, $firstnameModif, $lastnameModif);
}
?>