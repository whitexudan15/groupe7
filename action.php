<?php
session_start();
if (!isset($_SESSION['auth'])) {
    header('Location: Connexion.php');
    exit();
}else{
    
    require_once './Base_De_Donnees.php';
    
    $action = isset(($_POST['action'])) ? htmlspecialchars($_POST['action']): '';
    
    $id = isset($_POST['id']) ? htmlspecialchars($_POST['id']) :'';
    $code = isset($_POST['cours']) ? htmlspecialchars($_POST['cours']) : '';
    $date = isset($_POST['date']) ? htmlspecialchars($_POST['date']) :'';
    $heure = isset($_POST['heure']) ? htmlspecialchars($_POST['heure']) : '';
    $type = isset($_POST['type']) ? htmlspecialchars($_POST['type']) :'';
    $description = isset($_POST['description']) ? htmlspecialchars($_POST['description']) :'';
    
    switch ($action) {
        case 'programmer':
            # code...
            $req = $pdo->prepare("INSERT INTO programmation (cours, date, heure, type, description) VALUES (?, ?, ?, ?, ?)");
            $req->execute([$code, $date, $heure, $type, $description]);

            $_SESSION['message'] = "Nouveau Cours Programmé";
            header("Location: ./Index.php");

            break;
            
        case 'modifier':
            # code...
            $req = $pdo->prepare("UPDATE programmation SET cours = ?, date = ?, heure = ?, type = ?, description = ? WHERE id = ?");
            $req->execute([$code, $date, $heure, $type, $description, $id]);
            $_SESSION['message'] = "Mise à jour effectuée";
            header("Location: ./Index.php");                                                                                                                                                                                                          break;
        default:
            # code...
            header("Location: ./Index.php");
            break;
    }
}