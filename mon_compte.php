<?php
require_once 'templates/header.php';
require_once 'lib/user.php';
require_once 'lib/pdo.php';
require_once 'lib/lib_covoiturages.php';


//Rediriger quelqu'un s'il n'est pas connecté
if (!isset($_SESSION["user"])) {
    header('Location: connexion.php');
    exit();
}

// Récupérer les trajets de l'utilisateur connecté
$user_id = $_SESSION["user"]["id"];
$trajets = getUserCovoiturages($pdo, $user_id);
$countTrajets = count($trajets);



?>


<div class="bgimage_bis mb-5">
    <h1 class="text-white text-center py-5">Hello <?= $_SESSION["user"]["pseudo"] ?></h1>
</div>

<?php
require_once 'templates/header_mon_compte.php';
?>

<div class="container text-center mt-5 d-flex flex-column">
    <div>
        <img src="/assets/profils/image (2).jpg" class="bd-placeholder rounded-circle" style="object-fit: cover;" alt="Photo du chauffeur" width="150" height="150">
    </div>
    <div class="mt-4">
        <a class="btn btn-primary" href="">Modifier ma photo de profil</a>
    </div>
</div>




<div class="container px-4 py-5" id="featured-3">
    <h2 class="pb-2 border-bottom"></h2>
    <div class="row g-4 py-5 row-cols-1 row-cols-lg-3">

        <div class="feature col">
            <div class="feature-icon d-inline-flex align-items-center justify-content-center fs-2 mb-3">
                <i class="fa-solid fa-coins"></i>
            </div>
            <h3 class="fs-2 text-body-emphasis"><?= $_SESSION["user"]["credits"] ?> crédits</h3>
            <p>Garder vos crédits à jour pour réserver vos prochains trajets en toute tranquilité.</p>
            <a href="#" class="icon-link">
                Recharger mes crédits

            </a>
            <i class="fa-light fa-arrow-right"></i>
        </div>

        <div class="feature col">
            <div class="feature-icon d-inline-flex align-items-center justify-content-center fs-2 mb-3">
                <i class="fa-solid fa-car-side"></i>
            </div>
            <h3 class="fs-2 text-body-emphasis"><?= $countTrajets ?> trajets publiés</h3>
            <?php if ($countTrajets > 0): ?>
                <p>Consultez les retours de vos passagers pour améliorer vos tra</p>
            <?php else: ?>
                <p>Vous n'avez encore publié aucun trajet. Commencez dès maintenant pour partager vos déplacements.</p>
            <?php endif; ?>
            <a href="ajout_covoiturage.php" class="icon-link">
                Publier un nouveau trajet
                <svg class="bi">
                    <use xlink:href="#chevron-right"></use>
                </svg>
            </a>
        </div>

        <div class="feature col">
            <div class="feature-icon d-inline-flex align-items-center justify-content-center fs-2 mb-3">
                <i class="fa-solid fa-comment"></i>
            </div>
            <h3 class="fs-2 text-body-emphasis">avis</h3>
            <p>Consultez les retours de vos passagers pour améliorer vos trajets</p>
            <a href="#" class="icon-link">
                Voir mes avis
                <svg class="bi">
                    <use xlink:href="#chevron-right"></use>
                </svg>
            </a>
        </div>

    </div>
</div>






<?php
require_once 'templates/footer.php'
?>