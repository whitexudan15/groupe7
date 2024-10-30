<?php
session_start();
require_once("./Base_De_Donnees.php");
$error = ''; //Variables de message d'erreur
$message = ''; //Variables de message de success

if (isset($_POST["inscrire"])) {
    
    // Validation des champs du formulaire
    $nom = isset($_POST["nom"]) ? htmlspecialchars($_POST["nom"]) : '';
    $prenom = isset($_POST["prenom"]) ? htmlspecialchars($_POST["prenom"]) : '';
    $email = isset($_POST["email"]) ? htmlspecialchars($_POST["email"]) : '';
    $role = isset($_POST['role']) ? htmlspecialchars($_POST['role']) : '';
    $mdp = isset($_POST["mdp"]) ? password_hash($_POST["mdp"], PASSWORD_DEFAULT) : '';
    $profil = $_FILES["profil"]; // Récupérer le fichier

    
    if (!empty($email) && !empty($nom) && !empty($prenom) && !empty($mdp) && !empty($role) && !empty($profil)){
        if (preg_match("/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/", $email)){
            # code...
            $target_dir = "./profils/"; //Dossier parent pour stocker les profils des utilisateurs
            $target_file = $target_dir . basename($profil['name']);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    
            // Verifier si le fichier chargé est une image
            $check = getimagesize($profil['tmp_name']);
            
            //Verifer si l'User existe déjà sur le site
            $checkIfUserIsAlreadyExists = $pdo->prepare('SELECT email FROM utilisateurs WHERE email = ?');
            $checkIfUserIsAlreadyExists->execute(array($email));
            if ($checkIfUserIsAlreadyExists->rowCount() == 0) {
               // Contrôler le fichier
                if ($check === false) {
                $uploadOk = 0;
                $error = "Le fichier n'est pas une image.";
                }elseif (file_exists($target_file)) {
                    # code...
                    $uploadOk = 0;
                    $error = "Ooops! Image déjà existante.";
                }elseif ($profil['size'] > 500000) {
                    # code...
                    $uploadOk = 0;
                    $error = "Ooops! L'image dépasse 500Ko.";
                }

                if ($uploadOk === 0){
                    $error = $error . "<br> Téléchargement de profil échoué...";
                } elseif (move_uploaded_file($profil['tmp_name'], $target_file)) {
                    $query = $pdo->prepare("INSERT INTO utilisateurs (nom, prenom, email, role, profil, mdp) VALUES (?, ?, ?, ?, ?, ?)");
                    $query->execute([$nom, $prenom, $email, $role, basename($profil['name']), $mdp]); 
                    $_SESSION['message'] = "Inscription reussie!";
                    header("Location: Connexion.php");
                }
            }else{
                $error = "Un Compte existe déjà avec cet Email";
            }
        }else{
            $error = "Format Email Incorrect";
        }
    }else {
            # code...
            $error = "Veuillez remplir tous les champs";
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

    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
</head>

<body>

    <?php require_once './navbar.php' ?>

    <form action="" method="post" enctype="multipart/form-data">

        <!--- Main Container --->
        <div style="margin-top: 3%;" class="login-container d-flex justify-content-center align-items-center">

            <div class="row">
                <!--Affichage du popup d'erreur-->
                <?php if ($error): ?>
                <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Erreur',
                    text: <?php echo json_encode($error); ?>,
                    customClass: 'custom-swal',
                    backdrop: `
                        rgb(26, 26, 174, 0.95)
                        center
                        no-repeat
                    `
                });
                </script>
                <div class="text-center"
                    style="color:red; background-color: #ffc6c6; border: 1px solid red; border-radius: 10px; margin: 10px; font-weight: 600;">
                    <small><?php echo $error ?></small>
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
                        <div class="input-group mb-3">
                            <input type="hidden" class="form-control form-control-lg bg-light fs-6" name="role"
                                value="user">
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" name="mdp" class="form-control form-control-lg bg-light fs-6"
                                placeholder="Mot De Passe">
                        </div>
                        <div class="mb-4">
                            <input class="form-control  form-control-lg bg-light fs-6" name="profil" type="file">
                        </div>
                        <div class="input-group mb-3">
                            <button name="inscrire" class="btn btn-lg btn-primary w-100 fs-6">S'inscrire</button>
                        </div>
                        <div class="row">
                            <small class="text-center" style="font-weight: 600;">Vous avez déjà un compte ? <a
                                    href="./Connexion.php">Se
                                    Connecter</a></small>
                        </div>
                    </div>
                </div>



            </div>
        </div>
    </form>
    <script src="./bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>