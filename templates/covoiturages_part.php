<div class="col-md-4 my-2 d-flex">
    <div class="card w-100">
        <img src="/uploads/photo_de_profil/profils/<?= $covoiturage["image"]; ?>" class="card-img-top" alt="<?= $covoiturage["adresse_depart"]; ?> - <?= $covoiturage["adresse_arrivee"]; ?>">
        <div class="card-body">
            <h5 class="card-title"><?= $covoiturage["adresse_depart"]; ?> - <?= $covoiturage["adresse_arrivee"]; ?></h5>

            <div class="text-start py-4">
                <p class="card-text"><i class="bi bi-calendar"></i> Date : <?= $covoiturage["date_depart"]; ?></p>
                <p class="card-text"><i class="bi bi-clock"></i> Heure de départ : <?= $covoiturage["heure_depart"]; ?></p>
                <p class="card-text"><i class="bi bi-clock"></i> Heure d'arrivée' : <?= $covoiturage["heure_arrivee"]; ?></p>
                <p class="card-text"><i class="bi bi-piggy-bank"></i> Prix : <?= $covoiturage["prix"]; ?> €</p>
                <p class="card-text"><i class="bi bi-people-fill"></i> Places disponibles : <?= $covoiturage["place_disponible"]; ?></p>
            </div>

            <a href="#" class="btn btn-primary stretched-link w-100">Détails</a>

            <div>
                <p class="card-text text-secondary pt-5 small text-end">Annonce publié le <?= $covoiturage["created_at"]; ?></p>
            </div>

        </div>
    </div>
</div>