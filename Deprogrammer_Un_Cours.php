<?php
session_start();
if (!isset($_SESSION['auth'])) {
    header('Location: Connexion.php');
    exit();
}else{
    require_once './Base_De_Donnees.php';
    if (isset($_GET['id']) && !empty($_GET['id'])) {
        $id = $_GET['id'];
        $req = $pdo->query("DELETE FROM programmation WHERE id = $id");
        $_SESSION['deprogrammer'] = "Cours déprogrammé!";
        header('Location: Index.php');
    }
}