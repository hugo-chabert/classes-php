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
        $Register = mysqli_query($this->bdd, "INSERT INTO utilisateurs (login, password, email, firstname, lastname) VALUES ('$login','$password','$email','$firstname','$lastname')");
        $RecupUser = mysqli_query($this->bdd, "SELECT * FROM utilisateurs WHERE login = '".$login."'");
        $fetch = mysqli_fetch_all($RecupUser, MYSQLI_ASSOC);
        foreach($fetch AS $Datas){
            echo (' <table>
                        <thead>
                            <tr>
                                <th>
                                    Login
                                </th>
                                <th>
                                    Mot de Passe
                                </th>
                                <th>
                                    Email
                                </th>
                                <th>
                                    Prenom
                                </th>
                                <th>
                                    Nom
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    '.$Datas["login"].'
                                </td>
                                <td>
                                    '.$Datas["password"].'
                                </td>
                                <td>
                                    '.$Datas["email"].'
                                </td>
                                <td>
                                    '.$Datas["firstname"].'
                                </td>
                                <td>
                                    '.$Datas["lastname"].'
                                </td>
                            </tr>
                        </tbody>
                    </table>');
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
?>