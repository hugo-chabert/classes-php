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
        mysqli_set_charset($this->bdd,'utf8');
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
?>