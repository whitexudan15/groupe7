<?php 
if (isset($_POST['deconnecter'])) {
    # code...
    session_start();
    // Détruire la session et rediriger vers la page de connexion
    session_destroy();
    header('Location: Connexion.php');
    exit(); // Stopper le script après la redirection
}

?>
<nav class="navbar navbar-expand-lg bg-nav">
    <div class="container">
        <a style="font-weight: 900 !important; font-size: 25px;" class="navbar-brand text-white me-5"
            href="./Index.php">GROUPE7.</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a style="margin-right: 10px; font-weight: 500;" class="nav-link text-white active"
                        aria-current="page" href="./Index.php">Accueil</a>
                </li>
                <li class="nav-item">
                    <a style="font-weight: 500;" class="nav-link text-white" href="#">Programmation</a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 d-flex align-items-center">
                <?php if(isset($_SESSION['auth'])): ?>
                <li class="nav-item">
                    <a class="profil nav-link text-white d-flex align-items-center" href="./profil.php">
                        <div
                            style="width: 50px; height: 50px; border-radius: 50%; border: 3px #e0ffff solid; background: transparent; overflow:hidden;">
                            <img src="./profils/<?=$_SESSION['profil']?>" class="img-fluid" alt="profil"
                                style="background: white;">
                        </div>
                    </a>

                </li>
                <li class="nav-item">
                    <form action="" method="post">
                        <button type="submit" name="deconnecter" class='btn btn-danger btn-xs rounded-1'>Se
                            Déconnecter</button>
                    </form>

                </li>
                <?php else: ?>
                <li class="nav-item">
                    <a style="font-weight: 500; background: #5aaf75;" class="nav-link text-white rounded-1"
                        href="./Connexion.php">Se
                        connecter</a>
                </li>
                <?php endif;?>
            </ul>
        </div>
    </div>
</nav>