<?php
require_once 'templates/header.php';
require_once 'lib/pdo.php';
require_once 'lib/lib_covoiturages.php';
require_once 'lib/lib_ajout_covoiturage.php';




// $covoiturages = getCovoiturages($pdo);
$covoiturages = getAllCovoiturages($pdo);

?>

<div class="bgimage_bis mb-5">
    <h1 class="text-white text-center py-5">Recherchez un covoiturage</h1>
</div>

<div class="container">
    <div class="text-center">
        <form class="p-4 p-md-4 border rounded-3 bg-body-tertiary">
            <div class="form-floating mb-3 ">
                <input type="text" class="form-control" id="depart" placeholder="">
                <label for="depart">Départ</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="arrivee" placeholder="">
                <label for="arrivee">Arrivée</label>
            </div>
            <div class="row g-3 mb-3">
                <div class="col-md-6">
                    <div class="form-floating position-relative">
                        <input type="date" class="form-control ps-5" id="aller" placeholder="">
                        <label for="aller">Aller</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating position-relative">
                        <input type="date" class="form-control ps-5" id="retour" placeholder="">
                        <label for="retour">Retour</label>
                    </div>
                </div>
            </div>
            <div class="form-floating mb-3">
                <input type="number" class="form-control" id="passagers" placeholder="">
                <label for="passagers">Nombre de passagers</label>
            </div>
            <div class="checkbox mb-3">
                <label>
                    <input type="checkbox" value="ecologique"> Ecologique
                </label>
            </div>
            <button class="w-100 btn btn-lg btn-primary" type="submit">Rechercher</button>
            <hr class="my-4">
        </form>
    </div>




</div>

<div class="row mx-5">
    <h2 class="my-4 text-center">Les covoiturages</h2>

    <div class="row">

        <div class="col-md-3">
            <form action="" method="get">
                <h3>Filtres</h3>

                <div class="p-3 border-bottom">
                    <input type="text" name="search" id="search" class="form-control" placeholder="Rechercher">
                </div>

                <div class="p-3 border-bottom">
                    <label for="price">Prix</label>
                    <div class="input-group">
                        <input type="number" name="min_price" id="min_price" class="form-control" placeholder="Prix minimum" min="0" step="0.01">
                        <span class="input-group-text">€</span>
                    </div>
                    <div class="input-group">
                        <input type="number" name="max_price" id="max_price" class="form-control" placeholder="Prix maximum" min="0" step="0.01">
                        <span class="input-group-text">€</span>
                    </div>
                </div>

                <div class="checkbox p-3 border-bottom">
                    <label>
                        <input type="checkbox" value="ecologique"> Ecologique
                    </label>
                </div>

                <div class="p-3 border-bottom">
                    <label for="price">Durée</label>
                    <div class="input-group">
                        <input type="number" name="max_duree" id="max_duree" class="form-control" placeholder="Durée maximum" min="0" max="5" step="0.1">
                        <span class="input-group-text"><i class="bi bi-clock-fill"></i></span>
                    </div>
                </div>

                <div class="p-3 border-bottom">
                    <label for="price">Chauffeur</label>
                    <div class="input-group">
                        <input type="number" name="min_note" id="min_note" class="form-control" placeholder="Note minimum" min="0" max="5" step="0.1">
                        <span class="input-group-text"><i class="bi bi-star-fill"></i></span>
                    </div>
                </div>


                <div class="mt-3">
                    <button type="submit" class="btn btn-primary w-100">Filtrer</button>
                </div>


            </form>
        </div>

        <div class="col-md-9">
            <div class="row">
                <?php foreach ($covoiturages as $key => $covoiturage) {
                    require 'templates/covoiturages_part.php';
                } ?>
            </div>
        </div>

    </div>

</div>


<?php
require_once 'templates/footer.php'
?>