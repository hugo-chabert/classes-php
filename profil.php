<?php
session_start();
include 'user.php';
$bdd = mysqli_connect('localhost', 'root', 'root', 'classes');

if(isset($_SESSION['user'])){
    ?>
    <a href="update.php">Modifier votre profil</a></br></br>
    <form action="" method="POST">
        <button type="submit" name="deco">Deconnexion</button>
    </form>
    <form action="" method="POST">
        <button type="submit" name="delete">Supprimer compte</button>
    </form>
    <?php
    $datas->getAllInfos();
}
else{
    echo "Vous n'êtes pas connecté";
}


if(isset($_POST['delete'])){
    $datas->delete();
}

if(isset($_POST['deco'])){
    $datas->disconnect();
}
?>

<a href="index.php">Retour à l'accueil</a></br>