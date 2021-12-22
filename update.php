<?php
session_start();
include 'user.php';
$bdd = mysqli_connect('localhost', 'root', 'root', 'classes');

if(!isset($_SESSION['user'])){
    echo "Vous n'êtes pas connecté";
}
else{
    ?>
    <form action="" method="POST">
        <input type="text" name="loginModif" placeholder="Login"></br>
        <input type="password" name="passwordModif" placeholder="Mot de Passe"></br>
        <input type="password" name="emailModif" placeholder="Email"></br>
        <input type="password" name="firstnameModif" placeholder="Prenom"></br>
        <input type="password" name="lastnameModif" placeholder="Nom"></br>
        <button type="submit" name="MODIF">Modifier</button>
    </form>
    <?php
}
?>
