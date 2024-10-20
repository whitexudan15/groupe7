<?php 
session_start();
if (!isset($_SESSION['auth'])) {
    header('Location: Connexion.php');
    exit();
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Profil - Utilisateur</title>
</head>

<body>
    <?php require_once"./navbar.php"; ?>
    <div class="card container border p-3 bg-white shadow w-100"
        style="margin-top: 5%; padding : 0 !important; border-radius: 0 !important;">

        <h1 class="card-header" style="display: flex; align-items:center;">
            <div class=""
                style="width:70px;height:70px; border: 3px solid blue; border-radius:50%; background: white; margin-right:10px; overflow:hidden;">
                <img src="./profils/<?=$_SESSION['profil']?>" class="img-fluid" alt="profil" style="background: white;">

            </div>
            <div>
                <?= $_SESSION['email'] ?>
            </div>
        </h1>
        <div class="card-body">
            <h5 class="card-title">Nom : <?= $_SESSION['nom'] ?></h5>
            <h5 class="card-title">Prenom : <?= $_SESSION['prenom'] ?></h5>
            <h5 class="card-title">Rôle : <?= $_SESSION['role'] ?></h5>

        </div>

    </div>

    <script src="./bootstrap/js/bootstrap.min.js"></script>

</html>
</body>

</html>