<?php
require_once 'templates/header.php';
require_once 'lib/user.php';
require_once 'lib/pdo.php';

?>


<div class="bgimage_bis mb-5">
    <h1 class="text-white text-center py-5">Hello <?= $_SESSION["user"]["pseudo"] ?></h1>
</div>

<div class="container text-center">
    <button type="button" class="btn btn-primary"><a href="/ajout_covoiturage.php">Ajouter un trajet</a></button>
</div>

<h1 class="text-center py-5"><?= $_SESSION["user"]["credits"] ?> crédits</h1>




<?php
require_once 'templates/footer.php'
?>