<?php
require_once 'templates/header.php';
require_once 'lib/user.php';
require_once 'lib/pdo.php';



//Rediriger quelqu'un s'il n'est pas connecté
if (!isset($_SESSION["user"])) {
    header('Location: connexion.php');
    exit();
}

$countAvisReçus = 0;
$countAvisLaisses = 0;

?>


<div class="bgimage_bis">
    <h1 class="text-white text-center py-5">Vos avis</h1>
</div>

<?php
require_once 'templates/header_mon_compte.php';
?>

<div class="container text-center d-flex flex-column mt-3">
    <div class="mt-3">
        <h2>Vos avis reçus</h2>
        <?php if ($countAvisReçus > 0): ?>

        <?php else: ?>
            <p>Vous n'avez pas encore reçu d'avis.</p>
        <?php endif; ?>
    </div>

    <div class="mt-3">
        <h2>Vos avis laissés</h2>
        <?php if ($countAvisLaisses > 0): ?>

        <?php else: ?>
            <p>Vous n'avez pas encore laissé d'avis.</p>
            <img src="/assets/images/image_avis_1.jpg" alt="Illustrations avis" width="300">
        <?php endif; ?>
    </div>
</div>












<?php
require_once 'templates/footer.php'
?>