<?php
session_start();
include 'user.php';
$bdd = mysqli_connect('localhost', 'root', 'root', 'classes');
?>

<form action="" method="POST">
    <input type="text" name="loginD" placeholder="Login"></br>
    <button type="submit" name="delete">Supprimer</button>
</form>