<?php
require_once 'templates/header.php';
require_once 'lib/pdo.php';
require_once 'lib/user.php';
require_once 'lib/lib_covoiturages.php';
require_once 'lib/lib_vehicule.php';

//session est start dans le header

//Rediriger quelqu'un s'il n'est pas connecté
if (!isset($_SESSION["user"])) {
    header('Location: connexion.php');
    exit();
}

//logique ajout trajet
$errors = [];
$messages = [];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $tripData = [
        //trim permet d'enlever les espaces blancs inutiles
        // ?? '' permet de garantir que si un champ n'est pas rempli, une valeur vide sera utilisée à la place
        'adresse_depart' => trim($_POST["adresse_depart"] ?? ''),
        'adresse_arrivee' => trim($_POST["adresse_arrivee"] ?? ''),
        'date_depart' => trim($_POST["date_depart"] ?? ''),
        'heure_depart' => trim($_POST["heure_depart"] ?? ''),
        'heure_arrivee' => trim($_POST["heure_arrivee"] ?? ''),
        'prix' => trim($_POST["prix"] ?? ''),
        'place_disponible' => trim($_POST["place_disponible"] ?? ''),
    ];

    //ajout à la bdd grâce à la fonction
    $res = validateAndAddTrip($pdo, $_SESSION["user"]["id"], $tripData);
    // cf. covoiturage.php

    //message de succès ou d'erreur 
    if ($res === true) {
        $messages[] = "Trajet ajouté avec succès !";
    } else {
        $errors = $res;
    }
}



// Récupérer les véhicules de l'utilisateur connecté pour le formulaire 
$user_id = $_SESSION["user"]["id"];
$vehicules = getUserVehicule($pdo, $user_id);
//lib_vehicule.php

?>


<div class="bgimage_bis mb-5">
    <h1 class="text-white text-center py-5">Ajoute un trajet</h1>
</div>


<div class="container">
    <div class="text-center">

        <?php if ($messages): ?>
            <div class="alert alert-success">
                <?= implode("<br>", $messages) ?>
            </div>
        <?php endif; ?>

        <?php if ($errors): ?>
            <div class="alert alert-danger">
                <?= implode("<br>", $errors) ?>
            </div>
        <?php endif; ?>



        <form method="post" class="p-4 p-md-4 border rounded-3 bg-body-tertiary">
            <div class="form-floating mb-3 ">
                <input type="text" class="form-control" id="adresse_depart" name="adresse_depart" value="<?= htmlspecialchars($_POST['adresse_depart'] ?? '') ?>">
                <label for="adresse_depart">Ville de départ</label>
            </div>
            <div class="form-floating mb-3 ">
                <input type="text" class="form-control" id="adresse_arrivee" name="adresse_arrivee" value="<?= htmlspecialchars($_POST['adresse_arrivee'] ?? '') ?>">
                <label for="adresse_arrivee">Ville d'arrivée'</label>
            </div>
            <div class="form-floating mb-3">
                <input type="date" class="form-control" id="date_depart" name="date_depart" value="<?= htmlspecialchars($_POST['date_depart'] ?? '') ?>">
                <label for="date_depart">Date</label>
            </div>
            <div class="row g-3 mb-3">
                <div class="col-md-6">
                    <div class="form-floating position-relative">
                        <input type="time" class="form-control ps-5" id="heure_depart" name="heure_depart" value="<?= htmlspecialchars($_POST['heure_depart'] ?? '') ?>">
                        <label for="heure_depart">Heure de départ</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating position-relative">
                        <input type="time" class="form-control ps-5" id="heure_arrivee" name="heure_arrivee" value="<?= htmlspecialchars($_POST['heure_arrivee'] ?? '') ?>">
                        <label for="heure_arrivee">Heure d'arrivée</label>
                    </div>
                </div>
            </div>
            <div class="row g-3 mb-3">
                <div class="col-md-6">
                    <div class="form-floating mb-3">
                        <input type="number" class="form-control" id="place_disponible" name="place_disponible" min="0" value="<?= htmlspecialchars($_POST['place_disponible'] ?? '') ?>">
                        <label for="place_disponible">Nombre de passagers</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating mb-3">
                        <input type="number" class="form-control" id="prix" name="prix" min="0" step="0.01" value="<?= htmlspecialchars($_POST['prix'] ?? '') ?>">
                        <label for="prix">Prix</label>
                    </div>
                </div>
            </div>

            <select class="form-select mb-3" aria-label="Default select example" name="vehicule_id">
                <option selected>Véhicule</option>
                <?php foreach ($vehicules as $vehicule): ?>
                    <option value="<?= $vehicule['id'] ?>"> <?= $vehicule['marque'] ?> - <?= $vehicule['modele'] ?> </option>
                <?php endforeach; ?>
            </select>

            <button class="w-100 btn btn-lg btn-primary" type="submit">C'est parti</button>
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