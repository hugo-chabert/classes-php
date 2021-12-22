<?php
session_start();
include 'user.php';
?>

<form action="" method="POST">
    <input type="text" name="loginC" placeholder="Login"></br>
    <input type="password" name="passwordC" placeholder="Mot de Passe"></br>
    <button type="submit" name="connexion">Connexion</button>
</form>

<?php

if(isset($_POST['connexion'])){
    $datas->connect($_POST['loginC'],$_POST['passwordC']);
}
?>