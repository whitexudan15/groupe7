<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cours - Programmation</title>
    <link rel="stylesheet" type="text/css" href="./bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
</head>

<body>

    <?php require_once './navbar.php' ?>
    <form action="" method="post" enctype="multipart/form-data"></form>
    <!--- Main Container --->
    <div style="min-height: 95vh !important;" class="login-container d-flex justify-content-center align-items-center">
        <div class="row border rounded-5 p-3 bg-white shadow box-area">


            <!--- Right Box --->
            <div class="col-md-6 right-box">
                <div class="row align-items-center">
                    <div style="color: rgb(26, 26, 174);" class="header-text mb-2 text-center">
                        <h2 style="font-weight: 900;">Créer un compte</h2>
                        <p>Inscrivez-vous ici</p>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" name="email" class="form-control form-control-lg bg-light fs-6"
                            placeholder="Adresse Email">
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" name="nom" class="form-control form-control-lg bg-light fs-6"
                            placeholder="Nom">
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" name="prenom" class="form-control form-control-lg bg-light fs-6"
                            placeholder="Prenom">
                    </div>
                    <div class="mb-3">
                        <input class="form-control" name="profil" type="file" id="">
                    </div>
                    <div class="input-group mb-4">
                        <input type="password" name="mdp" class="form-control form-control-lg bg-light fs-6"
                            placeholder="Mot De Passe">
                    </div>
                    <div class="input-group mb-3">
                        <button name="inscrire" class="btn btn-lg btn-primary w-100 fs-6">S'Inscrire</button>
                    </div>
                    <div class="row">
                        <small class="text-center">Vous avez déjà un compte ? <a href="./Connexion.php">Se
                                Connecter</a></small>
                    </div>
                </div>
            </div>
            <!--- Left Box --->
            <div class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column left-box"
                style="background: #103cbe;">
                <div class="featured-image mb-3">
                    <img src="./images/cours.png" class="img-fluid" style="width: 250px;">
                </div>
                <p class="text-white fs-2" style="font-family: 'Courier New', Courier, monospace; font-weight: 600;">
                    GROUPE 7</p>
                <small class="text-white text-wrap text-center"
                    style="width: 17rem;font-family: 'Courier New', Courier, monospace;">Inscrivez-vous et rester
                    informé sur le programme des cours en LPSIC-LPMMI</small>
            </div>


        </div>
    </div>
    </form>
    <script src="./bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>