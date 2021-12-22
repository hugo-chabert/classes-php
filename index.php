<?php
session_start();
include 'user.php';
$bdd = mysqli_connect('localhost', 'root', 'root', 'classes');
?>

<a href="inscription.php">Inscription</a>
<a href="connexion.php">Connexion</a>
<a href="delete.php">Suprimer un utilisateur</a>
<a href="update.php">Modifier votre profil</a>

<?php
if(isset($_SESSION['user'])){
    ?>
    <form action="" method="POST">
        <button type="submit" name="deco">Deconnexion</button>
    </form>
    <p>Bienvenue <?php echo $_SESSION['user']['login'];?></p>
    <?php
}
?>