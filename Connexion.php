<?php
session_start();
require_once("./Base_De_Donnees.php");
$error = '';
$message = isset($_GET['message']) ? $_GET['message'] : ''; // Récupérer le message de success

if (isset($_POST["connecter"])) {
    // Validation des champs du formulaire
    $email = isset($_POST["email"]) ? htmlspecialchars($_POST["email"]) : '';
    $mdp = isset($_POST["mdp"]) ? htmlspecialchars($_POST["mdp"]) : '';

    if (!empty($email) && !empty($mdp)){
        //Vérifier si l'utilisateur existe
        $checkIfUserExists = $pdo->prepare("SELECT * FROM utilisateur WHERE email = ?");
        $checkIfUserExists->execute([$email]);

        if ($checkIfUserExists->rowCount() == 1) {
            $infosUtilisateurs = $checkIfUserExists->fetch();
            // Stockage d'informations sur l'utilisateur dans les sessions

             //Vérifier  si le mot de pass est correct
             if(password_verify($mdp, $infosUtilisateurs['mdp'])){
                $_SESSION['auth'] = true;
                $_SESSION['email'] = $infosUtilisateurs['email'];
                $_SESSION['role'] = $infosUtilisateurs['role'];
                $_SESSION['nom'] = $infosUtilisateurs['nom'];
                $_SESSION['prenom'] = $infosUtilisateurs['prenom'];
                $_SESSION['profil'] = $infosUtilisateurs['profil'];
                $message = "Connecté";
                header('Location: index.php?message='. $message);
                exit();
            } else {
                $error = "Mot de passe incorrect.";
            }
        }else {
            # code...
            $error = "Email inconnu.";
        }
    }else {
        # code...
        $error = "Veuillez remplir tous les champs.";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cours - Programmation</title>
    <link rel="stylesheet" type="text/css" href="./bootstrap/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <?php require_once './navbar.php' ?>
    <form action="" method="post">
        <!--- Main Container --->
        <div style="margin-top: 3%;" class="login-container d-flex justify-content-center align-items-center">
            <div class="row">
                <!--Affichage du popup d'erreur-->
                <?php if ($message): ?>
                <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: <?php echo json_encode($message); ?>,
                    customClass: 'custom-swal2',
                    backdrop: `rgb(26, 26, 174, 0.95)
                    center
                    no-repeat`
                });
                </script>
                <div class="" style="color:green; margin: 5px;margin-top: 15px; font-weight: 600;">
                    <p class="text-center">
                        <?php echo $message . "<br> Connectez-vous!"; ?>
                    </p>
                </div>
                <?php elseif($error): ?>
                <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: <?php echo json_encode($error); ?>,
                    customClass: 'custom-swal',
                    backdrop: `rgb(26, 26, 174, 0.95)
                    center
                    no-repeat`
                });
                </script>
                <div class="" style="color:red; margin: 5px;margin-top: 15px; font-weight: 600;">
                    <p class="text-center">
                        <?php echo $error ?>
                    </p>
                </div>
                <?php endif; ?>

            </div>
            <div class="row border rounded-5 p-3 bg-white shadow box-area">
                <!--- Left Box --->
                <div class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column left-box"
                    style="background: #103cbe;">
                    <div class="featured-image mb-3">
                        <img src="./images/cours.png" class="img-fluid" style="width: 250px;">
                    </div>
                    <p class="text-white fs-2"
                        style="font-family: 'Courier New', Courier, monospace; font-weight: 600;">
                        GROUPE 7</p>
                    <small class="text-white text-wrap text-center"
                        style="width: 17rem;font-family: 'Courier New', Courier, monospace;">Inscrivez-vous et rester
                        informé sur le programme des cours en LPSIC-LPMMI</small>
                </div>
                <!--- Right Box --->
                <div class="col-md-6 right-box">
                    <div class="row align-items-center">
                        <div class="header-text mb-2 text-center">
                            <h2 style="font-weight: 900;">Bienvenue</h2>
                            <p>Connectez-vous</p>
                        </div>
                        <div class="input-group mb-3">
                            <input type="text" name="email" class="form-control form-control-lg bg-light fs-6"
                                placeholder="Adresse Email">
                        </div>
                        <div class="input-group mb-1">
                            <input type="password" name="mdp" class="form-control form-control-lg bg-light fs-6"
                                placeholder="Mot De Passe">
                        </div>
                        <div class="input-group mb-5 d-flex justify-content-between">
                            <div class="form-check">
                                <input type="checkbox" name="remember" class="form-check-input" id="formCheck">
                                <label for="formCheck" class="form-check-label text-secondary"><small>Remember
                                        Me</small></label>
                            </div>
                            <div class="forgot">
                                <small><a href="#">Mot De Passe Oublié ?</a></small>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <button name="connecter" class="btn btn-lg btn-primary w-100 fs-6">Se Connecter</button>
                        </div>
                        <div class="row">
                            <small class="text-center">Vous n'avez pas de compte ? <a
                                    href="./Inscription.php">S'inscrire</a></small>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </form>
    <script src="./bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>