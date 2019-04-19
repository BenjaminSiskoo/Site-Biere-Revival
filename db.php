<?php
require 'config.php';


/* Connexion à une base MySQL avec l'invocation de pilote */
$dsn = 'mysql:dbname='.$dbname.';host='.$dbhost.';charset=UTF8';


try {
    $pdo = new PDO($dsn, $dbuser, $dbpassword);
} catch (PDOException $e) {
    echo 'Connexion échouée : ' . $e->getMessage();
}