<link rel="stylesheet" href="css/style.css">
<?php
require('db.conn.php');

$uploadDir = './uploads/';

if (!file_exists($uploadDir)) {
    mkdir($uploadDir, 0777, true);
}

if (isset($_POST['submit'])) {
    require ('affichage.php');
} elseif (isset($_POST['enregistrer'])) {
    require ('enregistrer.php');
} elseif (isset($_POST['affichage_liste'])) {
    require ('affichage_liste.php');
}