<?php
require_once 'templates/header.php';
require_once 'lib/user.php';
require_once 'lib/pdo.php';

if (isset($_SESSION["user"])) {
    $user = $_SESSION["user"];
    $role = $user["role"];

    if ($role == 'admin') {
        echo 'Bienvenue, Admin!';
    } else {
        echo 'Bienvenue, utilisateur!';
    }
} else {
    echo 'Veuillez vous connecter.';
}


?>




<?php
require_once 'templates/footer.php'
?>