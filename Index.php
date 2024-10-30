<?php
require_once "./Base_De_Donnees.php";
session_start();
if (!isset($_SESSION['auth'])) {
    $_SESSION['message'] = "Veuillez-vous connecter";
    header('Location: Connexion.php');
    exit();
}else {
    $message = isset($_SESSION['message']) ? $_SESSION['message'] : '';
    $supprimer = isset($_SESSION['deprogrammer']) ? $_SESSION['deprogrammer'] : '';

    // Fetch les cours programmées dans la base de donnees
    $programmation = $pdo->query("SELECT
        programmation.id,
        programmation.cours AS code,
        programmation.date,
        programmation.heure,
        programmation.description,
        cours.nom AS cours,
        cours.credits,
        professeurs.nom AS nomProfesseur,
        professeurs.prenom AS nomProfesseur
    FROM programmation
    JOIN cours ON programmation.cours = cours.id
    JOIN professeurs ON cours.professeur = professeurs.id   
    ORDER BY programmation.id DESC LIMIT 5");
    $CoursProgrammes = $programmation->fetchAll(); 
}

function timeLeft($id) { // La fonction pour calculer la durée depuis  la programmation d'un cours.
    if (isset($_SESSION['time-left'][$id])) {
        $tempsEcoule = time() - $_SESSION['time-left'][$id];
        
        if ($tempsEcoule < 60) {
            return "(programmé il y'a $tempsEcoule s)";
        } elseif ($tempsEcoule < 3600) {
            $minutes = floor($tempsEcoule / 60);
            return "(programmé il y'a $minutes m)";
        } elseif ($tempsEcoule < 86400) {
            $heures = floor($tempsEcoule / 3600);
            return "(programmé il y'a $heures h)";
        } else {
            $jours = floor($tempsEcoule / 86400);
            return "(programmé il y'a $jours jour)";
        }
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
    function displayDetails(id) {
        // Sélectionne la ligne de détails correspondante avec l'ID correspondante
        const detailsRow = document.querySelector(`#details-${id}`);

        let XMLHttp = new XMLHttpRequest();
        XMLHttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                detailsRow.innerHTML = this.responseText;

                // Cache toutes les autres lignes de détails
                document.querySelectorAll('.details-row').forEach(row => {
                    if (row !== detailsRow) {
                        row.style.display = 'none'; // Cache les autres lignes de détails
                    }
                });

                // Alterne l'affichage de la ligne de détails cliquée
                if (detailsRow.style.display === 'table-row') {
                    detailsRow.style.display = 'none'; // Cache si elle est déjà affichée
                } else {
                    detailsRow.style.display = 'table-row'; // Affiche si elle est cachée
                    detailsRow.classList.add('fade-in'); // Ceci nous permet d'afficher le détail avec une animation
                }

                console.log(this.responseText); // JUSTE POUR LE DEBOGAGE : Affiche la réponse dans la console
            }
        };

        XMLHttp.open("GET", "HttpRequest.php?id=" + id, true);
        XMLHttp.send();
    }
    </script>
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
        timer: 3000,
        showClass: {
            popup: `
                animate__animated
                animate__fadeInUp
                animate__faster
                `
        },
        hideClass: {
            popup: `
                animate__animated
                animate__fadeOutDown
                animate__faster
            `
        }
    });
    </script>
    <?php unset($_SESSION['message']); // Détruire le message apprès affichage pour eviter qu'elle n'arrête de s'afficher à chaque fois qu'on actualise la page
        endif;
    ?>
    <?php if ($supprimer): ?>
    <script>
    Swal.fire({
        position: 'top-end',
        icon: 'success',
        text: <?php echo json_encode($supprimer); ?>,
        customClass: 'custom-swal',
        showConfirmButton: false,
        timer: 3000,
        showClass: {
            popup: `
                animate__animated
                animate__fadeInUp
                animate__faster
                `
        },
        hideClass: {
            popup: `
                animate__animated
                animate__fadeOutDown
                animate__faster
            `
        }
    });
    </script>
    <?php unset($_SESSION['deprogrammer']); // Détruire le message apprès affichage pour eviter qu'elle n'arrête de s'afficher à chaque fois qu'on actualise la page
        endif;
    ?>
    <div style="min-height: 50vh !important;"
        class="custom-container d-flex align-items-start justify-content-center mt-5">
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
                                class='btn btn-outline-primary btn-xs rounded-0' href="./Programmer_Un_Cours.php"> <i
                                    class="fas fa-calendar-plus" title="Programmer"></i> Programmer un nouveau cours</a>

                            <?php endif;?>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($programmation->rowCount() > 0): ?>
                    <?php foreach( $CoursProgrammes as $CoursProgramme): ?>
                    <tr style="position:relative; z-index:1;">
                        <td><?= $CoursProgramme['code'] ?></td>
                        <td>
                            <?php
                                echo $CoursProgramme['cours'];
                                echo " <small style='color: green;'>" . timeLeft($CoursProgramme['id']) . "</small>";
                            ?>
                        </td>
                        <td><?= $CoursProgramme['credits'] ?> Crédits / <?= $CoursProgramme['credits'] ?>0H</td>
                        <td><?= $CoursProgramme['date'] ?></td>
                        <td class="options d-flex justify-content-end">
                            <button type="button" class='btn btn-outline-primary btn-xs rounded-0 me-1'
                                id="display-details" onclick="displayDetails(<?= $CoursProgramme['id'] ?>);"><i
                                    class="fas fa-eye" title="Voir les détails"></i> Détails</button>
                            <?php if(isset($_SESSION['role']) && $_SESSION['role'] == 'admin'): ?>
                            <a class='btn btn-warning btn-xs rounded-0 me-1' id="modifier"
                                href="./Modifier_Un_Cours.php?id=<?= $CoursProgramme['id'] ?>"><i
                                    class="fas fa-pencil-alt" title="Modifier"></i> Modifier</a>
                            <button class='btn btn-danger btn-xs rounded-0 me-1' onclick="
                                Swal.fire({
                                    title: 'Êtes-vous sûr ?',
                                    text: 'Action irréversible!',
                                    icon: 'warning',
                                    customClass: 'custom-swal',
                                    showCancelButton: true,
                                    confirmButtonColor: '#d33',
                                    cancelButtonColor: '#3085d6',
                                    confirmButtonText: 'Confirmer',
                                    cancelButtonText: 'Annuler'
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        window.location.href = './Deprogrammer_Un_Cours.php?id=<?=$CoursProgramme['id']?>';
                                    }
                                });
                            ">
                                <i class="fas fa-trash-alt" title="Supprimer"></i> Déprogrammer</button>
                            <?php endif;?>
                        </td>

                    </tr>
                    <tr class="details-row" id="details-<?= $CoursProgramme['id'] ?>"></tr>
                    <?php endforeach;?>
                    <?php else: ?>
                    <tr>
                        <td colspan="5" style="text-align: center;">
                            <b>Aucun cours programmé pour l' instant...</b>
                        </td>
                    </tr>
                    <?php endif;?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="./bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>