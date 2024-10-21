<?php
session_start();
if (!isset($_SESSION['auth'])) {
    header('Location: Connexion.php');
    exit();
}else {
    require_once "./Base_De_Donnees.php";
    $cours_a_modifier_id = isset($_GET['id']) ? $_GET['id'] :'';


    $requete = $pdo->query("SELECT * FROM programmation WHERE id = $cours_a_modifier_id");
    $cours_a_modifier = $requete->fetch();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier</title>
    <link rel="stylesheet" type="text/css" href="./bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
    <style>
    select,
    textarea,
    input {
        color: red !important;
    }
    </style>
</head>

<body>
    <?php require_once './navbar.php' ?>
    <form action="" method="post">
        <div style="min-height: 90vh !important;"
            class="login-container d-flex justify-content-center align-items-center">
            <div class="row border rounded-5 p-3 bg-white shadow box-area">

                <!--- Left Box --->
                <div class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column left-box modifier"
                    style="background: #103cbe;">
                    <div class="featured-image mb-3">
                        <img src="./images/modif.png" class="img-fluid" style="width: 250px;">
                    </div>
                    <small class="text-white text-wrap text-center"
                        style="width: 17rem;font-family: 'Courier New', Courier, monospace;">Programmation de cours <br>
                        LPSIC-LPMMI</small>
                </div>
                <!--- Right Box --->
                <div class="col-md-6 right-box">
                    <div class="row align-items-center">
                        <div class="input-group mb-3">
                            <label class="input-group-text" for="typeSelect">Cours</label>
                            <select name="cours" class="form-select form-control form-control-lg bg-light fs-6"
                                id="typeSelect">
                                <option value="" disabled>Choisir</option>
                                <option value="INF13255"
                                    <?php if ($cours_a_modifier['cours'] == "INF13255") {echo "selected";}  ?>>
                                    Programmation web côté serveur</option>
                                <option value="INF13254"
                                    <?php if ($cours_a_modifier['cours'] == "INF13254") {echo "selected";}  ?>>
                                    Algorithme
                                    Avancé</option>
                                <option value="INF13251"
                                    <?php if ($cours_a_modifier['cours'] == "INF13251") {echo "selected";}  ?>>Concepts
                                    et
                                    fondamentaux de la sécurité</option>
                                <option value="INF13250"
                                    <?php if ($cours_a_modifier['cours'] == "INF13250") {echo "selected";}  ?>>Principes
                                    des systèmes d'exploitation</option>
                                <option value="INF13252"
                                    <?php if ($cours_a_modifier['cours'] == "INF13252") {echo "selected";}  ?>>Services
                                    réseaux informatiques et ToIP</option>
                                <option value="INF13257"
                                    <?php if ($cours_a_modifier['cours'] == "INF13257") {echo "selected";}  ?>>Base de
                                    données avancée</option>
                                <option value="INF14255"
                                    <?php if ($cours_a_modifier['cours'] == "INF14255") {echo "selected";}  ?>>
                                    Infographie
                                    et multimédia</option>
                                <option value="INF14254"
                                    <?php if ($cours_a_modifier['cours'] == "INF14254") {echo "selected";}  ?>>
                                    Développement d'applications mobiles</option>
                                <option value="INF14250"
                                    <?php if ($cours_a_modifier['cours'] == "INF14250") {echo "selected";}  ?>>
                                    Administration systèmes et réseaux</option>
                                <option value="MTH11251"
                                    <?php if ($cours_a_modifier['cours'] == "MTH11251") {echo "selected";}  ?>>Algèbre
                                    Linéaire</option>
                            </select>
                        </div>
                        <div class="input-group mb-3">
                            <input type="date" name="date" value="<?= $cours_a_modifier['date'] ?>"
                                class="form-control form-control-lg bg-light fs-6">
                        </div>
                        <div class="input-group mb-3">
                            <input type="time" name="heure" value="<?= $cours_a_modifier['heure'] ?>"
                                class="form-control form-control-lg bg-light fs-6" placeholder="Heure (00:00:00)">
                        </div>
                        <div class="input-group mb-3">
                            <label class="input-group-text" for="typeSelect">Type</label>
                            <select name="type" class="form-select form-control form-control-lg bg-light fs-6"
                                id="typeSelect">
                                <option value="" disabled>Choisir</option>
                                <option value="P" <?php if ($cours_a_modifier['type'] == "P") {echo "selected";}  ?>>P
                                    (Présentiel)</option>
                                <option value="L" <?php if ($cours_a_modifier['type'] == "L") {echo "selected";}  ?>>L
                                    (En Ligne)</option>
                            </select>
                        </div>
                        <div class="input-group mb-4">
                            <textarea name="description" class="form-control form-control-lg bg-light fs-6"
                                id="exampleTextarea" placeholder="Description du cours ici..."
                                style="height: 100px;"> <?= $cours_a_modifier['description'] ?> </textarea>
                        </div>

                        <div class="input-group">
                            <button name="action" value="programmer"
                                class="btn btn-lg btn-primary w-100 fs-6">Modifier</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </form>


    <script src="./bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>