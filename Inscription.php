<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cours - Programmation</title>
    <link rel="stylesheet" type="text/css" href="./bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <?php require_once './navbar.php' ?>

    <!--- Main Container --->
    <div style="min-height: 90vh !important;" class="login-container d-flex justify-content-center align-items-center">
        <div class="row border rounded-5 p-3 bg-white shadow box-area">

            <!--- Right Box --->
            <div class="col-md-6 right-box">
                <div class="row align-items-center">
                    <div class="header-text mb-4 text-center">
                        <h2>Bienvenue</h2>
                        <p>Inscrivez-vous ici</p>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control form-control-lg bg-light fs-6"
                            placeholder="Adresse Email">
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control form-control-lg bg-light fs-6" placeholder="Nom">
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control form-control-lg bg-light fs-6" placeholder="Prenom">
                    </div>
                    <div class="mb-3">
                        <input class="form-control" type="file" id="">
                    </div>
                    <div class="input-group mb-4">
                        <input type="password" class="form-control form-control-lg bg-light fs-6"
                            placeholder="Mot De Passe">
                    </div>
                    <div class="input-group mb-3">
                        <button class="btn btn-lg btn-primary w-100 fs-6">S'Inscrire</button>
                    </div>
                    <div class="row">
                        <small>Vous avez déjà un compte ? <a href="./Connexion.php">Se Connecter</a></small>
                    </div>
                </div>
            </div>
            <!--- Left Box --->
            <div class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column left-box"
                style="background: #103cbe;">
                <div class="featured-image mb-3">
                    <img src="./images/1.png" class="img-fluid" style="width: 250px;">
                </div>
                <p class="text-white fs-2" style="font-family: 'Courier New', Courier, monospace; font-weight: 600;">
                    GROUPE 7</p>
                <small class="text-white text-wrap text-center"
                    style="width: 17rem;font-family: 'Courier New', Courier, monospace;">Inscrivez-vous et rester
                    informé sur le programme des cours en LPSIC-LPMMI</small>
            </div>
        </div>
    </div>

    <script src="./bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>