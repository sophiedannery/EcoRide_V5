<?php
require_once 'templates/header.php';
require_once 'lib/pdo.php';
require_once 'lib/user.php';


$errors = [];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $verif = verifyUser($_POST);
    if ($verif === true) {

        //verif si mails déjà utilisé
        if (isEmailAlreadyUsed($pdo, $_POST["email"])) {
            $errors["email"] = "Cette adresse email est déjà utilisée";
        } else {
            $resAdd = addUSer($pdo, $_POST["pseudo"], $_POST["email"], $_POST["mot_de_passe"]);
            //si inscription s'est bien passé, on redirige vers la page de connexion
            header("Location: connexion.php");
        }
    } else {
        $errors = $verif;
    }
}



?>


<div class="bgimage_bis mb-5">
    <h1 class="text-white text-center py-5">Inscription</h1>
</div>


<div class="container">
    <div class="text-center">
        <form method="post" class="p-4 p-md-4 border rounded-3 bg-body-tertiary">

            <div class="form-floating mb-3 ">
                <input name="pseudo" type="text" class="form-control" id="pseudo" placeholder="" value="<?= htmlspecialchars($_POST['pseudo'] ?? '') ?>">
                <label for="pseudo">Pseudo</label>

                <?php if (isset($errors["pseudo"])) { ?>
                    <div class="alert alert-danger" role="alert">
                        <?= $errors["pseudo"] ?>
                    </div>
                <?php } ?>

            </div>

            <div class="form-floating mb-3 ">
                <input name="email" type="email" class="form-control" id="email" placeholder="" value="<?= htmlspecialchars($_POST['email'] ?? '') ?>">
                <label for="email">Email</label>

                <?php if (isset($errors["email"])) { ?>
                    <div class="alert alert-danger" role="alert">
                        <?= $errors["email"] ?>
                    </div>
                <?php } ?>

            </div>

            <div class="form-floating mb-3">
                <input name="mot_de_passe" type="password" class="form-control" id="mot_de_passe" placeholder="">
                <label for="mot_de_passe">Mot de passe</label>

                <?php if (isset($errors["mot_de_passe"])) { ?>
                    <div class="alert alert-danger" role="alert">
                        <?= $errors["mot_de_passe"] ?>
                    </div>
                <?php } ?>

            </div>

            <input class="w-100 btn btn-lg btn-primary" type="submit" value="S'inscrire" name=add_user>
            <hr class="my-4">

        </form>
    </div>

    <div class="text-center my-3">
        <p>Déjà inscrit ? <a class="text-decoration-underline" href="/connexion.php">Connecte-toi ici !</a></p>
    </div>




</div>


<?php
require_once 'templates/footer.php';
?>