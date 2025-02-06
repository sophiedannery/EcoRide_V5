<?php
require_once 'templates/header.php';
require_once 'lib/user.php';
require_once 'lib/pdo.php';
require_once 'lib/lib_covoiturages.php';
require_once 'lib/lib_ajout_vehicule.php';

//Rediriger quelqu'un s'il n'est pas connecté
if (!isset($_SESSION["user"])) {
    header('Location: connexion.php');
    exit();
}

$user_id = $_SESSION["user"]["id"];
$trajets = getUserCovoiturages($pdo, $user_id);

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

$user_id = $_SESSION["user"]["id"];
$vehicules = getUserVehicule($pdo, $user_id);



?>


<div class="bgimage_bis mb-5">
    <h1 class="text-white text-center py-5">Hello <?= $_SESSION["user"]["pseudo"] ?></h1>
</div>

<div class="container text-center">
    <button type="button" class="btn btn-primary"><a href="/ajout_covoiturage.php">Ajouter un trajet</a></button>
</div>
<div class="container text-center mt-3">
    <button type="button" class="btn btn-primary"><a href="/ajout_vehicule.php">Ajouter un véhicule</a></button>
</div>

<h1 class="text-center py-5"><?= $_SESSION["user"]["credits"] ?> crédits</h1>


<h1 class="text-center py-5"> Ma note : <?= $_SESSION["user"]["note"] ?></h1>

<div class="container">
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

    <?php else: ?>
        <button type="button" class="btn btn-primary"><a href="/ajout_vehicule.php">Enregistre toon véhicule</a></button>
    <?php endif; ?>
</div>


<div class="container">
    <h1 class="mt-4">Mes trajets à venir</h1>
    <?php if (count($trajets_a_venir) > 0): ?>
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
        <p>Pas de trajets à venir</p>
        <button type="button" class="btn btn-primary"><a href="/ajout_covoiturage.php">Ajouter un trajet</a></button>
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