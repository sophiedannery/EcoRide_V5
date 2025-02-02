<?php
require_once 'templates/header.php';
require_once 'lib/user.php';
require_once 'lib/pdo.php';



?>


<div class="bgimage_bis mb-5">
    <h1 class="text-white text-center py-5">Hello <?= $_SESSION["user"]["pseudo"] ?></h1>
</div>




<?php
require_once 'templates/footer.php'
?>