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
        header('Location: index.php');
        exit();
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
        header('Location: index.php');
        exit();
    }

    public function disconnect(){
        session_destroy();
        header('Location: index.php');
        exit();
    }

    public function delete(){
        mysqli_set_charset($this->bdd,'utf8');
        $loginD = $_SESSION['user']['login'];
        $delete = mysqli_query($this->bdd,"DELETE FROM utilisateurs WHERE login = '".$loginD."'");
        session_destroy();
        header('Location: index.php');
        exit();
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
        header('Location: index.php');
        exit();
    }

    public function isConnected(){
        mysqli_set_charset($this->bdd,'utf8');
        echo ((bool)$_SESSION);
    }
}


$datas = new User(0,0,0,0,0);

?>