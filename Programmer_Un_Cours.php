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
    <title>Programmer</title>
    <link rel="stylesheet" type="text/css" href="./bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./style.css?v=<?php echo time(); ?>">
</head>

<body>
    <?php require_once './navbar.php'?>
    <form action="./Action.php" method="post">
        <!--- Main Container --->
        <div style="min-height: 90vh !important;"
            class="login-container d-flex justify-content-center align-items-center">
            <div class="row border rounded-5 p-3 bg-white shadow box-area">

                <!--- Left Box --->
                <div class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column left-box programmer"
                    style="background: #103cbe;">
                    <div class="featured-image mb-3">
                        <img src="./images/program.png" class="img-fluid" style="width: 250px;">
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
                                <option value="" selected disabled>Choisir</option>
                                <option value="INF13255">Programmation web côté serveur</option>
                                <option value="INF13254">Algorithme Avancé</option>
                                <option value="INF13251">Concepts et fondamentaux de la sécurité</option>
                                <option value="INF13250">Principes des systèmes d'exploitation</option>
                                <option value="INF13252">Services réseaux informatiques et ToIP</option>
                                <option value="INF13257">Base de données avancée</option>
                                <option value="INF14255">Infographie et multimédia</option>
                                <option value="INF14254">Développement d'applications mobiles</option>
                                <option value="INF14250">Administration systèmes et réseaux</option>
                                <option value="MTH11251">Algèbre Linéaire</option>
                            </select>
                        </div>
                        <div class="input-group mb-3">
                            <input type="date" name="date" class="form-control form-control-lg bg-light fs-6">
                        </div>
                        <div class="input-group mb-3">
                            <input type="time" name="heure" class="form-control form-control-lg bg-light fs-6"
                                placeholder="Heure (00:00:00)">
                        </div>
                        <div class="input-group mb-3">
                            <label class="input-group-text" for="typeSelect">Type</label>
                            <select name="type" class="form-select form-control form-control-lg bg-light fs-6"
                                id="typeSelect">
                                <option value="" selected disabled>Choisir</option>
                                <option value="P">P (Présentiel)</option>
                                <option value="L">L (En Ligne)</option>
                            </select>
                        </div>
                        <div class="input-group mb-4">
                            <textarea name="description" class="form-control form-control-lg bg-light fs-6"
                                id="exampleTextarea" maxlength="85" placeholder="Description ici(max 85 Catactères)..."
                                style="height: 100px;"></textarea>
                        </div>
                        <div class="input-group">
                            <button name="action" value="programmer"
                                class="btn btn-lg btn-primary w-100 fs-6">Valider</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <script src="./bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>