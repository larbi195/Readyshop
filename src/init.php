<?php
session_start();

require_once __DIR__ . '/db.php';

// require des utilitaires *utils*

// require les classes
require_once __DIR__ . '/class/User.php';

$user = false;
if (isset($_SESSION['user_id'])) {
    // utiliser une méthode static avec ::
    $user = User::getById($_SESSION['user_id']);
}
