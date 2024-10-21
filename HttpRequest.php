<?php
require_once "./Base_De_Donnees.php";

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = intval($_GET['id']);

    $programmation = $pdo->query("SELECT 
        programmation.heure,
        programmation.type,
        programmation.description,
        professeurs.nom AS nomProfesseur,
        professeurs.prenom AS prenomProfesseur
    FROM programmation
    JOIN cours ON programmation.cours = cours.id
    JOIN professeurs ON cours.professeur = professeurs.id
    WHERE programmation.id = $id;
    ");

    $DetailsCoursProgramme = $programmation->fetch();

    // Formatter l'heure pour afficher par exemple 07H00 au lieu de 07:00:00
    list($h, $m, $s) = explode(":", $DetailsCoursProgramme['heure']);
    
?>

<td colspan="1" style="background-color:#8cd1ff;">
    <div class="details-block">
        Enseignant: <br> <span class="details-text-color">Dr.
            <?= $DetailsCoursProgramme['nomProfesseur'] ?></span>
    </div>
</td>
<td colspan="1" style="background-color:#8cd1ff;">
    <div class="details-block">
        Heure de cours: <br> <span class="details-text-color"><?=$h?>H<?=$m?></span>
    </div>
</td>
<td colspan="1" style="background-color:#8cd1ff;">
    <div class="details-block">
        Type: <br> <span
            class="details-text-color"><?php if($DetailsCoursProgramme['type'] == 'P'){echo "Présentiel";}elseif($DetailsCoursProgramme['type'] == 'L'){echo "En Ligne";} ?></span>
    </div>
</td>
<td colspan="2" style="background-color:#8cd1ff;">
    <div class="details-block">
        Description: <br> <span class="details-text-color"><?= $DetailsCoursProgramme['description'] ?></span>
    </div>
</td>

<?php
}