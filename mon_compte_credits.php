<?php
require_once 'templates/header.php';
require_once 'lib/user.php';
require_once 'lib/pdo.php';



//Rediriger quelqu'un s'il n'est pas connecté
if (!isset($_SESSION["user"])) {
    header('Location: connexion.php');
    exit();
}


?>


<div class="bgimage_bis">
    <h1 class="text-white text-center py-5">Vos crédits</h1>
</div>

<?php
require_once 'templates/header_mon_compte.php';
?>

<div class="container text-center mt3">
    <div>
        <h1><?= $_SESSION["user"]["credits"] ?> crédits</h1>
    </div>
    <div>
        <img src="/assets/images/tirelire.jpg" alt="tirelire" width="300">
    </div>
    <div>
        <button type="button" class="btn btn-primary"><a href="#">Recharger mes crédits</a></button>
    </div>

</div>













<?php
require_once 'templates/footer.php'
?>