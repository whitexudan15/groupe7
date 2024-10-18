<?php
try {
    //Creation d'une instance de PDO
    $pdo = new PDO('mysql:host=localhost;dbname=goupe7', 'root', '');
} catch (Exception $e) {
    die('Error: ' . $e->getMessage());
}