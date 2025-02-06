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
    <h1 class="text-white text-center py-5">Vos trajets</h1>
</div>

<?php
require_once 'templates/header_mon_compte.php';
?>









<!-- Afficher les trajets de l'utilisateur connecté  -->
<div class="container text-center">
    <h1 class="mt-4">Mes trajets à venir</h1>
    <?php if (count($trajets_a_venir) > 0): ?>
        <div class="container text-center">
            <button type="button" class="btn btn-primary"><a href="/ajout_covoiturage.php">Ajouter un trajet</a></button>
        </div>
        <div class="row">
            <?php foreach ($trajets_a_venir as $trajet) { ?>
                <div class="col-md-4 my-2 d-flex">
                    <div class="card w-100">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title"><?= $trajet["adresse_depart"]; ?> - <?= $trajet["adresse_arrivee"]; ?></h5>
                            <div class="text-start py-4">
                                <p class="card-text"><i class="bi bi-calendar"></i> Date : <?= $trajet["date_depart"]; ?></p>
                                <p class="card-text"><i class="bi bi-clock"></i> Départ : <?= $trajet["heure_depart"]; ?></p>
                                <p class="card-text"><i class="bi bi-clock"></i> Arrivée : <?= $trajet["heure_arrivee"]; ?></p>
                                <p class="card-text"><i class="bi bi-piggy-bank"></i> Prix : <?= $trajet["prix"]; ?> crédits</p>
                            </div>
                            <div>
                                <p class="card-text text-secondary pt-5 small text-end">Annonce publiée le <?= $trajet["created_at"]; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>

    <?php else: ?>
        <div class=" container d-flex flex-column text-center">
            <div>
                <p>Vous n'avez pas de trajets à venir</p>
            </div>
            <div>
                <img src="/assets/images/Vecteur.jpg" alt="" width="400">
            </div>
            <div>
                <button type="button" class="btn btn-primary"><a href="/ajout_covoiturage.php">Ajouter un trajet</a></button>
            </div>
        </div>
    <?php endif; ?>

    <?php if (count($trajets_passes) > 0): ?>
        <h2 class="mt-5">Historique de mes trajets</h2>
        <div class="col-md-4 my-2 d-flex">
            <div class="card w-100">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title"><?= $trajet["adresse_depart"]; ?> - <?= $trajet["adresse_arrivee"]; ?></h5>
                    <div class="text-start py-4">
                        <p class="card-text"><i class="bi bi-calendar"></i> Date : <?= $trajet["date_depart"]; ?></p>
                        <p class="card-text"><i class="bi bi-clock"></i> Départ : <?= $trajet["heure_depart"]; ?></p>
                        <p class="card-text"><i class="bi bi-clock"></i> Arrivée : <?= $trajet["heure_arrivee"]; ?></p>
                        <p class="card-text"><i class="bi bi-piggy-bank"></i> Prix : <?= $trajet["prix"]; ?> €</p>
                    </div>
                    <div>
                        <p class="card-text text-secondary pt-5 small text-end">Annonce publié le <?= $trajet["created_at"]; ?></p>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>





<?php
require_once 'templates/footer.php'
?>