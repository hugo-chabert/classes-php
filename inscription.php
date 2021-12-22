<?php
session_start();
include 'user.php';
?>
<form action="" method="POST">
    <input type="text" name="login" placeholder="Login"></br>
    <input type="password" name="password" placeholder="Mot de Passe"></br>
    <input type="text" name="email" placeholder="Email"></br>
    <input type="text" name="firstname" placeholder="Prenom"></br>
    <input type="text" name="lastname" placeholder="Nom"></br>
    <button type="submit" name="inscription">Inscription</button>
</form>