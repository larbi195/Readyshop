<?php 

function initDB() {
    
    $db_host = 'mariadb';
    $db_name = 'dbadmin';
    $db_port = '3306';
    $db_user = 'root';
    $db_pass = 'root';

    // data source name
    $dsn = 'mysql:host=' . $db_host . ';dbname=' . $db_name . ';port=' . $db_port . '';


    try {
        $db = new PDO($dsn, $db_user, $db_pass,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET time_zone = 'Europe/Paris'",
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    }
    catch (Exception $e) {
        die('Erreur MySQL, maintenance en cours.' . $e->getMessage());
    }

    return $db;
}

// connexion a la db
$pdo = initDB();
