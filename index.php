<?php
session_start();
include 'user.php';
$bdd = mysqli_connect('localhost', 'root', 'root', 'classes');
?>

<a href="inscription.php">Inscription</a></br>
<a href="connexion.php">Connexion</a></br>
<a href="update.php">Modifier votre profil</a></br>

<?php
if(isset($_SESSION['user'])){
    ?>
    <form action="" method="POST">
        <button type="submit" name="deco">Deconnexion</button>
    </form>
    <?php
}

if(isset($_SESSION['user'])){
    ?>
    <form action="" method="POST">
        <button type="submit" name="delete">Supprimer compte</button>
    </form>
    <?php
}

if(isset($_POST['delete'])){
    $datas->delete();
}

if(isset($_POST['deco'])){
    $datas->disconnect();
}

if(isset($_SESSION)){
    $datas->isConnected();
}
?>