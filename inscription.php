<?php
session_start();
include 'user.php';
$bdd = mysqli_connect('localhost', 'root', 'root', 'classes');
if(isset($_POST['inscription'])){
    $login = $_POST['login'];
    $RecupUser = mysqli_query($bdd, "SELECT * FROM utilisateurs WHERE login = '".$login."'");
    $fetch = mysqli_fetch_all($RecupUser, MYSQLI_ASSOC);
    foreach($fetch AS $Datas){
        echo (' <table>
                    <thead>
                        <tr>
                            <th>
                                Login
                            </th>
                            <th>
                                Mot de Passe
                            </th>
                            <th>
                                Email
                            </th>
                            <th>
                                Prenom
                            </th>
                            <th>
                                Nom
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                '.$Datas["login"].'
                            </td>
                            <td>
                                '.$Datas["password"].'
                            </td>
                            <td>
                                '.$Datas["email"].'
                            </td>
                            <td>
                                '.$Datas["firstname"].'
                            </td>
                            <td>
                                '.$Datas["lastname"].'
                            </td>
                        </tr>
                    </tbody>
                </table>');
    }
}
?>
<form action="" method="POST">
    <input type="text" name="login" placeholder="Login"></br>
    <input type="password" name="password" placeholder="Mot de Passe"></br>
    <input type="text" name="email" placeholder="Email"></br>
    <input type="text" name="firstname" placeholder="Prenom"></br>
    <input type="text" name="lastname" placeholder="Nom"></br>
    <button type="submit" name="inscription">Inscription</button>
</form>

<?php

if(isset($_POST['inscription'])){
    $datas->register($_POST['login'],$_POST['password'], $_POST['email'], $_POST['firstname'], $_POST['lastname']);
}
?>