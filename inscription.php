<?php
require_once 'templates/header.php'
?>


<div class="bgimage_bis mb-5">
    <h1 class="text-white text-center py-5">Inscription</h1>
</div>


<div class="container">
    <div class="text-center">
        <form class="p-4 p-md-4 border rounded-3 bg-body-tertiary">

            <div class="form-floating mb-3 ">
                <input type="text" class="form-control" id="inscription_pseudo" placeholder="">
                <label for="inscription_pseudo">Pseudo</label>
            </div>

            <div class="form-floating mb-3 ">
                <input type="email" class="form-control" id="connexion_email" placeholder="">
                <label for="connexion_email">Email</label>
            </div>

            <div class="form-floating mb-3">
                <input type="password" class="form-control" id="connexion_mot_de_passe" placeholder="">
                <label for="connexion_mot_de_passe">Mot de passe</label>
            </div>



            <button class="w-100 btn btn-lg btn-primary" type="submit">S'inscrire</button>
            <hr class="my-4">

        </form>
    </div>

    <div class="text-center my-3">
        <p>Déjà inscrit ? <a class="text-decoration-underline" href="/connexion.php">Connecte-toi ici !</a></p>
    </div>




</div>


<?php
require_once 'templates/footer.php'
?>