<?php


require_once "../db.php";
$pdo= initDB();
$nom= $_POST["nom"];
$email= $_POST["email"];
$mdp= $_POST["mdp"];
$cmdp= $_POST["cmdp"];
 

if ($mdp == $cmdp){
    $save = $pdo->prepare('INSERT INTO utilisateur(nom, email, mdp, admin) VALUES(:nom, :email, :mdp, :admin) ');
    $save->execute ([
            ":nom"=> $nom,
            ":email"=> $email,
            ":mdp"=> password_hash($mdp, PASSWORD_DEFAULT),
            ":admin"=> 0
    ]);
    header("Location: ../../index.php");
} 
else {
    header("Location: ../../index.php");
};