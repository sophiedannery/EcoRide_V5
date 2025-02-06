<?php
require_once 'templates/header.php';
require_once 'lib/user.php';
require_once 'lib/pdo.php';
require_once 'lib/lib_covoiturages.php';
require_once 'lib/lib_vehicule.php';




//Rediriger quelqu'un s'il n'est pas connecté
if (!isset($_SESSION["user"])) {
    header('Location: connexion.php');
    exit();
}





// Récupérer les trajets de l'utilisateur connecté
$user_id = $_SESSION["user"]["id"];
$trajets = getUserCovoiturages($pdo, $user_id);
// cf. /lib_covoiturages.php

$trajets_a_venir = [];
$trajets_passes = [];
$current_date = date('Y-m-d H:i:s');

foreach ($trajets as $trajet) {
    $date_depart = $trajet["date_depart"] . ' ' . $trajet["heure_depart"];

    if ($date_depart >= $current_date) {
        $trajets_a_venir[] = $trajet;
    } else {
        $trajets_passes[] = $trajet;
    }
}





// Récupérer les véhicules de l'utilisateur connecté
$user_id = $_SESSION["user"]["id"];
$vehicules = getUserVehicule($pdo, $user_id);
// cf. lib_ajout_vehicule



?>




<div class="bgimage_bis">
    <h1 class="text-white text-center py-5">Vos véhicule</h1>
</div>

<?php
require_once 'templates/header_mon_compte.php';
?>







<!-- // Afficher les véhicules de l'utilisateur connecté -->
<div class="container text-center">
    <h1 class="mt-4">Mon véhicule</h1>
    <?php if (count($vehicules) > 0): ?>
        <div class="row">
            <?php foreach ($vehicules as $vehicule) { ?>
                <div class="col-md-4 my-2 d-flex">
                    <div class="card w-100">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title"><?= $vehicule["marque"]; ?> - <?= $vehicule["modele"]; ?></h5>
                            <div class="text-start py-4">
                                <p class="card-text"><i class="bi bi-calendar"></i> Couleur : <?= $vehicule["couleur"]; ?></p>
                                <p class="card-text"><i class="bi bi-clock"></i> Plaque d'immatriculation : <?= $vehicule["plaque_immatriculation"]; ?></p>
                                <p class="card-text"><i class="bi bi-clock"></i> Date première immatriculation : <?= $vehicule["date_premiere_immatriculation"]; ?></p>
                                <p class="card-text"><i class="bi bi-piggy-bank"></i> Est écologique : <?= $vehicule["est_ecologique"]; ?> </p>
                            </div>

                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
        <div class="container text-center mt-3">
            <button type="button" class="btn btn-primary"><a href="/ajout_vehicule.php">Ajouter un autre véhicule</a></button>
        </div>

    <?php else: ?>
        <div class=" container d-flex flex-column text-center">
            <div>
                <p>Vous n'avez pas de véhicule enregistré</p>
            </div>
            <div>
                <img src="/assets/images/image_voiture.jpg" alt="" width="400">
            </div>
            <div>
                <button type="button" class="btn btn-primary"><a href="/ajout_vehicule.php">Ajoute ton véhicule</a></button>
            </div>
        </div>
    <?php endif; ?>
</div>








<?php
require_once 'templates/footer.php'
?>