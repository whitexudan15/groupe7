<?php
session_start();
if (!isset($_SESSION['auth'])) {
    header('Location: Connexion.php');
    exit();
}
$message = isset($_GET['message']) ? $_GET['message'] : '';

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cours - Programmation</title>
    <link rel="stylesheet" type="text/css" href="./bootstrap/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="./style.css?v=<?php echo time(); ?>">
</head>

<body>
    <?php require_once './navbar.php' ?>
    <!--Affichage du popup d'erreur-->
    <?php if ($message): ?>
    <script>
    Swal.fire({
        position: 'top-end',
        icon: 'success',
        text: <?php echo json_encode($message); ?>,
        customClass: 'custom-swal2',
        showConfirmButton: false,
        timer: 1500
    });
    </script>
    <?php endif; ?>
    <div style="min-height: 50vh !important;" class="container d-flex align-items-start justify-content-center mt-5">
        <div class="row border p-3 bg-white shadow w-100">
            <table id="t_article" class="table table-striped w-100">
                <thead>
                    <tr>
                        <th style="color:red;">CODE</th>
                        <th style="color:red;">COURS</th>
                        <th style="color:red;">CREDITS/SESSION</th>
                        <th style="color:red;">DATE DE DEBUT</th>
                        <th class="options">
                            <?php if(isset($_SESSION['role']) && $_SESSION['role'] == 'admin'): ?>

                            <a style="background-color: blue !important; color: #e0ffff;"
                                class='btn btn-outline-primary btn-xs rounded-0'>Programmer un nouveau cours</a>

                            <?php endif;?>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr style="position:relative; z-index:1;">
                        <td> INF1325</td>
                        <td>INFORMATIQUE</td>
                        <td>3 Crédits / 30H</td>
                        <td>2024-10-23</td>
                        <td class="options">
                            <button type="button" class='btn btn-outline-primary btn-xs rounded-0'
                                id="display-details">Details</button>
                            <?php if(isset($_SESSION['role']) && $_SESSION['role'] == 'admin'): ?>
                            <a class='btn btn-warning btn-xs rounded-0'>Modifier</a>
                            <a class='btn btn-danger btn-xs rounded-0'>Déprogrammer</a>
                            <?php endif;?>
                        </td>
                    </tr>
                    <tr class="details-row" id="details">
                        <td colspan="1"
                            style="background-color:#8cd1ff; border-left: 2px blue solid ; border-bottom: 2px blue solid ;">
                            <div class="details-block">
                                Enseignant: <br> <span class="details-text-color">Dr. TIEBEKABE</span>
                            </div>
                        </td>
                        <td colspan="1" style="background-color:#8cd1ff; border-bottom: 2px blue solid ;">
                            <div class="details-block">
                                Heure de cours: <br> <span class="details-text-color">7H00</span>
                            </div>
                        </td>
                        <td colspan="1" style="background-color:#8cd1ff; border-bottom: 2px blue solid ;">
                            <div class="details-block">
                                Type: <br> <span class="details-text-color">Présentiel</span>
                            </div>
                        </td>
                        <td colspan="2"
                            style="background-color:#8cd1ff; border-right: 2px blue solid ; border-bottom: 2px blue solid ;">
                            <div class="details-block">
                                Description: <br> <span class="details-text-color">Détails sur le cours INF2345 :
                                    Algorithmes avancés, tri, recherche,
                                    etc.</span>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>


    <script src="./bootstrap/js/bootstrap.bundle.min.js"></script>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const detailButtons = document.querySelectorAll('#display-details');

        detailButtons.forEach(button => {
            button.addEventListener('click', function() {
                const detailsRow = this.closest('tr')
                    .nextElementSibling; // La ligne de détails correspondante

                // Ferme toutes les lignes de détails
                document.querySelectorAll('.details-row').forEach(row => {
                    if (row !== detailsRow) {
                        row.style.display =
                            'none'; // Cache les autres lignes de détails
                    }
                });

                // Alterne l'affichage de la ligne de détails cliquée
                if (detailsRow.style.display === 'table-row') {
                    detailsRow.style.display = 'none'; // Cache si elle est déjà affichée
                } else {
                    detailsRow.style.display = 'table-row'; // Affiche si elle est cachée
                    detailsRow.classList.add('fade-in'); // Ajoute la classe pour l'animation
                }
            });
        });
    });
    </script>
</body>

</html>

<!--


-->