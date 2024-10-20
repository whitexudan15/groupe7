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
    <title>Modifier</title>
    <link rel="stylesheet" type="text/css" href="./bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
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
                            <input type="text" name="cours" class="form-control form-control-lg bg-light fs-6"
                                placeholder="Cours">
                        </div>
                        <div class="input-group mb-3">
                            <input type="text" name="professeur" class="form-control form-control-lg bg-light fs-6"
                                placeholder="Chargé Du Cours">
                        </div>
                        <div class="input-group mb-3">
                            <input type="date" name="date" class="form-control form-control-lg bg-light fs-6"
                                placeholder="Date (0000-00-00)">
                        </div>
                        <div class="input-group mb-3">
                            <input type="text" name="heure" class="form-control form-control-lg bg-light fs-6"
                                placeholder="Heure (00:00:00)">
                        </div>
                        <div class="input-group mb-3">
                            <label class="input-group-text" for="typeSelect">Choisir</label>
                            <select name="type" class="form-select form-control form-control-lg bg-light fs-6"
                                id="typeSelect">
                                <option selected disabled>Type</option>
                                <option value="P">P (Présentiel)</option>
                                <option value="L">L (En ligne)</option>
                            </select>
                        </div>
                        <div class="input-group mb-4">
                            <textarea name="description" class="form-control form-control-lg bg-light fs-6"
                                id="exampleTextarea" placeholder="Description du cours ici..."
                                style="height: 100px;"></textarea>
                        </div>


                        <div class="input-group">
                            <button name="action" value="modifier"
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