<?php
session_start();
include 'user.php';
?>

<a href="inscription.php">Inscription</a>
<a href="connexion.php">Connexion</a>

<form action="" method="POST">
    <button type="submit" name="deco">Deconnexion</button>
</form>


<?php

if($_SESSION){
    var_dump ($_SESSION);
}
?>