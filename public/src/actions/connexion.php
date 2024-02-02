<?php


require_once "../db.php";
$pdo= initDB();
$nom1= $_POST["nom1"];
$email1= $_POST["email1"];
$mdp1= $_POST["mdp1"];

$save = $pdo->prepare('SELECT id, mdp FROM utilisateur WHERE email = :email1');
$save->execute ([
        ":email1" => $email1,
]);
$utilisateur = $save->fetch();

if (password_verify($mdp1, $utilisateur['mdp']))
{
    $_SESSION['id_utilisateur'] = $utilisateur['id'];
    $getNom = $pdo->prepare('SELECT nom FROM utilisateur WHERE id = :id');
    $getNom->execute ([":id" => $_SESSION['id_utilisateur']]);
    $nomU = $getNom->fetch()['nom'];
    header("Location: ../../index.php");
} else {
    header("Location: ../../index.php");
}
