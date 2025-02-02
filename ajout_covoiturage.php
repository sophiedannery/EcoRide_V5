<?php
require_once 'templates/header.php';
require_once 'lib/user.php';
require_once 'lib/pdo.php';


?>


<div class="bgimage_bis mb-5">
    <h1 class="text-white text-center py-5">Ajoute un trajet</h1>
</div>


<div class="container">
    <div class="text-center">
        <form method="post" class="p-4 p-md-4 border rounded-3 bg-body-tertiary">

            <div class="form-floating mb-3 ">
                <input type="email" name="email" class="form-control" id="email" placeholder="" value="<?= htmlspecialchars($_POST['email'] ?? '') ?>">
                <label for="email">Email</label>
            </div>

            <div class="form-floating mb-3">
                <input type="password" name="mot_de_passe" class="form-control" id="mot_de_passe" placeholder="">
                <label for="mot_de_passe">Mot de passe</label>
            </div>

            <?php if ($error): ?>
                <div class="alert alert-danger" role="alert">
                    <?= $error ?>
                </div>
            <?php endif; ?>

            <button class="w-100 btn btn-lg btn-primary" type="submit">C'est parti</button>
            <hr class="my-4">

        </form>
    </div>






</div>


<?php
require_once 'templates/footer.php'
?>