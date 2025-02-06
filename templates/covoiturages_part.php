<div class="col-md-4 my-2 d-flex">
    <div class="card w-100">
        <div class="card-body d-flex flex-column">
            <h5 class="card-title"><?= $covoiturage["adresse_depart"]; ?> - <?= $covoiturage["adresse_arrivee"]; ?></h5>

            <div class="text-start py-4">
                <p class="card-text"><i class="bi bi-calendar"></i> Date : <?= $covoiturage["date_depart"]; ?></p>
                <p class="card-text"><i class="bi bi-clock"></i> Départ : <?= $covoiturage["heure_depart"]; ?></p>
                <p class="card-text"><i class="bi bi-clock"></i> Arrivée : <?= $covoiturage["heure_arrivee"]; ?></p>
                <p class="card-text"><i class="bi bi-piggy-bank"></i> Prix : <?= $covoiturage["prix"]; ?> crédits</p>
                <p class="card-text"><i class="bi bi-people-fill"></i> Places disponibles : <?= $covoiturage["place_disponible"]; ?></p>
                <p class="card-text"><i class="bi bi-people-fill"></i> Chauffeur : <?= $covoiturage["pseudo"]; ?></p>
            </div>

            <div class="mt-auto">
                <!-- Ici le lien à modifier pour récupérer l'id et être amené sur la page du trajet en question -->
                <a href="covoiturage.php?id=<?= $covoiturage["id"]  ?>" class="btn btn-primary stretched-link w-100">Détails</a>
            </div>

            <div>
                <p class="card-text text-secondary pt-5 small text-end">Annonce publiée le <?= $covoiturage["created_at"]; ?></p>
            </div>

        </div>
    </div>
</div>