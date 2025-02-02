<?php
require_once 'templates/header.php';
require_once 'lib/lib_covoiturages.php';
require_once 'lib/pdo.php';


//préparation, en cas de mauvais url, ou id non présent dans l'url, va devenir true
$error404 = false;

// Récupérer l'ID dans l'url (quand on clique sur une annonce, ça ouvre la page de la bonne annonce grâce à l'ID récupérer dans le GET)
if (isset($_GET["id"])) {
    $id = (int)$_GET["id"];
    //fonction pour récupérer le tableau des trajets et les stocker dans la variable (fonciton créée sur lib_covoiturage.php)
    $covoiturage = getCovoituragesById($pdo, $id);

    if (!$covoiturage) {
        $error404 = true;
    }
} else {
    $error404 = true;
}
// maintenant faut amener ça sur les liens des trajets (voir dans templates/covoiturage_part)



?>



<?php if (isset($covoiturage) && $covoiturage): ?>
    <div class="bgimage_bis mb-5">
        <h1 class="text-white text-center py-5">Détails</h1>
    </div>


    <div class="container my-5">
        <div class="row p-4 pb-0 pe-lg-0 pt-lg-5 align-items-start rounded-3 border shadow-lg">

            <!-- Colonne gauche : Infos sur le covoiturage -->
            <div class="col-lg-6 p-3 p-lg-5 pt-lg-3">

                <h1 class="display-4 fw-bold lh-1 text-body-emphasis pb-5"><?= $covoiturage["adresse_depart"]; ?> - <?= $covoiturage["adresse_arrivee"]; ?></h1>
                <h3 class="pb-3"><?= $covoiturage["prix"]; ?> crédits</h3>

                <div class="py-4">
                    <p><i class="bi bi-calendar"></i> Date : <strong><?= $covoiturage["date_depart"]; ?></strong></p>
                    <p><i class="bi bi-clock"></i> Départ : <strong><?= $covoiturage["heure_depart"]; ?></strong></p>
                    <p><i class="bi bi-clock"></i> Arrivée : <strong><?= $covoiturage["heure_arrivee"]; ?></strong></p>
                    <p><i class="bi bi-people-fill"></i> Places disponibles : <strong><?= $covoiturage["place_disponible"]; ?></strong></p>
                </div>

                <div class="d-grid gap-2 d-md-flex justify-content-md-start mb-4 mb-lg-3">
                    <button type="button" class="btn btn-primary btn-lg px-4 me-md-2 fw-bold">Reserver une place</button>
                    <button type="button" class="btn btn-outline-secondary btn-lg px-4"><a href="/covoiturages.php">Retour</a></button>
                </div>
            </div>

            <!-- Colonne droite : Avis sur le chauffeur -->
            <div class="col-lg-6 p-3">

                <div class="row py-5 d-flex align-items-center">
                    <div class="col-lg-6">
                        <h2 class="fw-bold">Emma - <i class="bi bi-star-fill"></i> 5</h2>
                    </div>
                    <div class="col-lg-6">
                        <img src="/assets/profils/image (2).jpg" class="bd-placeholder rounded-circle" style="object-fit: cover;" alt="Photo du chauffeur" width="100" height="100">
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6">
                        <h3 class="pb-3">Préférences</h3>
                        <p><i class="fa-solid fa-paw"></i> Pas d'animaux</p>
                        <p><i class="fa-solid fa-ban-smoking"></i> Trajet non fumeur</p>
                        <p><i class="fa-solid fa-music"></i></i> Trajet en musique</p>
                    </div>
                    <div class="col-lg-6">
                        <h3 class="pb-3">Véhicule</h3>
                        <p><i class="fa-solid fa-car-side"></i> Fiat 500</p>
                        <p><i class="fa-solid fa-palette"></i> Rouge</p>
                        <p><i class="fa-solid fa-calendar-days"></i> 2005</p>
                        <p><i class="fa-solid fa-gas-pump"></i> Essence</p>
                        <p><i class="fa-solid fa-charging-station"></i>Electrique</p>
                    </div>
                </div>


                <!-- Exemple d'avis-->
                <h3>Avis</h3>
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Jean Dupont</h5>
                        <p class="card-text">Excellente conduite, très sympathique !</p>
                        <p class="card-text"><small class="text-muted">Note : 4.8/5</small></p>
                    </div>
                </div>

                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Marie Curie</h5>
                        <p class="card-text">Chauffeur ponctuel, mais un peu bavard.</p>
                        <p class="card-text"><small class="text-muted">Note : 4.2/5</small></p>
                    </div>
                </div>

                <div class="d-grid gap-2 d-md-flex justify-content-md-start mb-4 mb-lg-3">
                    <button type="button" class="btn btn-outline-secondary btn-lg px-4 w-100">Voir plus d'avis</button>
                </div>
                <!-- Ajouter d'autres avis dynamiquement -->
            </div>
        </div>

    <?php else: ?>

        <div class="d-flex flex-column align-items-center">
            <h1 class="my-5">Le trajet est introuvable</h1>
            <button type="button" class="btn btn-outline-secondary btn-lg px-4"><a href="/covoiturages.php">Retour</a></button>
        </div>



    <?php endif; ?>
    </div>


    <?php
    require_once 'templates/footer.php'
    ?>