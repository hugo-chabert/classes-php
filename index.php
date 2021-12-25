<?php
session_start();
include 'user.php';
$bdd = mysqli_connect('localhost', 'root', 'root', 'classes');
?>

<a href="inscription.php">Inscription</a></br>
<a href="connexion.php">Connexion</a></br>
<a href="profil.php">Profil</a></br>

<?php


if(isset($_SESSION['user'])){
    $datas->isConnected();
    $datas->getLogin();
    $datas->getEmail();
    $datas->getFirstname();
    $datas->getLastname();
}


?>