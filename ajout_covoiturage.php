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
                <input type="text" class="form-control" id="adresse_depart" name="adresse_depart">
                <label for="adresse_depart">Ville de départ</label>
            </div>
            <div class="form-floating mb-3 ">
                <input type="text" class="form-control" id="adresse_arrivee" name="adresse_arrivee">
                <label for="adresse_arrivee">Ville d'arrivée'</label>
            </div>
            <div class="row g-3 mb-3">
                <div class="col-md-6">
                    <div class="form-floating position-relative">
                        <input type="date" class="form-control ps-5" id="date_depart" name="date_depart">
                        <label for="date_depart">Date</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating position-relative">
                        <input type="time" class="form-control ps-5" id="heure_depart" name="heure_depart">
                        <label for="heure_depart">Heure</label>
                    </div>
                </div>
            </div>
            <div class="row g-3 mb-3">
                <div class="col-md-6">
                    <div class="form-floating mb-3">
                        <input type="number" class="form-control" id="place_disponible" name="place_disponible" min="0">
                        <label for="place_disponible">Nombre de passagers</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating mb-3">
                        <input type="number" class="form-control" id="prix" name="prix" min="0" step="0.01">
                        <label for="prix">Prix</label>
                    </div>
                </div>
            </div>

            <select class="form-select mb-3" aria-label="Default select example">
                <option selected>Véhicule</option>
                <option value="1">Fiat 500</option>
                <option value="2">Peugeot Expert</option>
            </select>

            <button class="w-100 btn btn-lg btn-primary" type="submit">Rechercher</button>
            <hr class="my-4">


        </form>

        <div class="text-center my-4">
            <a class="text-decoration-underline" href="mon_compte.php">Retour à mon compte</a>
        </div>
    </div>






</div>


<?php
require_once 'templates/footer.php'
?>