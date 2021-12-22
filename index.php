<?php
session_start();
include 'user.php';
$bdd = mysqli_connect('localhost', 'root', 'root', 'classes');
?>

<a href="inscription.php">Inscription</a>
<a href="connexion.php">Connexion</a>

<?php
if(isset($_SESSION['user'])){
    echo '  <form action="" method="POST">
                <button type="submit" name="deco">Deconnexion</button>
            </form>';
    var_dump ($_SESSION);
}
?>

<p>Supprimer un utilisateur</p>

<form action="" method="POST">
    <input type="text" name="loginD" placeholder="Login"></br>
    <button type="submit" name="delete">Supprimer</button>
</form>