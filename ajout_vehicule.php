<?php
require_once 'templates/header.php';
require_once 'lib/user.php';
require_once 'lib/pdo.php';
require_once 'lib/lib_ajout_vehicule.php';

//session est start dans le header

//Rediriger quelqu'un s'il n'est pas connecté
if (!isset($_SESSION["user"])) {
    header('Location: connexion.php');
    exit();
}

$error = null;
$success = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $marque = trim($_POST["marque"]);
    $modele = trim($_POST["modele"]);
    $couleur = trim($_POST["couleur"]);
    $plaque_immatriculation = trim($_POST["plaque_immatriculation"]);
    $date_premiere_immatriculation = trim($_POST["date_premiere_immatriculation"]);
    $est_ecologique = isset($_POST["est_ecologique"]) && $_POST["est_ecologique"] === 'on';
    $user_id = $_SESSION["user"]["id"];

    if ($marque && $modele && $couleur && $plaque_immatriculation && $date_premiere_immatriculation && isset($est_ecologique)) {
        if (addVehicule($pdo, $marque, $modele, $couleur, $plaque_immatriculation, $date_premiere_immatriculation, $est_ecologique, $user_id)) {
            $success = "Véhicule ajouté avec succès";
        } else {
            $error = "Une erreur est survenur lors de l'ajout du véhicule.";
        }
    } else {
        $error = "Tous les champs sont obligatoires.";
    }
}



?>


<div class="bgimage_bis mb-5">
    <h1 class="text-white text-center py-5">Ajoute ton véhicule</h1>
</div>




<div class="container">
    <div class="text-center">

        <?php if ($error): ?>
            <div class="alert alert-danger">
                <?= htmlspecialchars($error) ?>
            </div>
        <?php endif; ?>

        <?php if ($success): ?>
            <div class="alert alert-success">
                <?= htmlspecialchars($success) ?>
            </div>
        <?php endif; ?>





        <form method="post" class="p-4 p-md-4 border rounded-3 bg-body-tertiary">

            <div class="form-floating mb-3 position-relative">
                <input type="text" class="form-control" id="marque" name="marque" value="<?= htmlspecialchars($_POST['marque'] ?? '') ?>">
                <label for="marque">Marque</label>
            </div>

            <div class="row g-3 mb-3">
                <div class="col-md-6">
                    <div class="form-floating position-relative">
                        <input type="text" class="form-control" id="modele" name="modele" value="<?= htmlspecialchars($_POST['modele'] ?? '') ?>">
                        <label for="modele">Modèle</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating position-relative">
                        <input type="text" class="form-control" id="couleur" name="couleur" value="<?= htmlspecialchars($_POST['couleur'] ?? '') ?>">
                        <label for="couleur">Couleur</label>
                    </div>
                </div>
            </div>

            <div class="row g-3 mb-3">
                <div class="col-md-6">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="plaque_immatriculation" name="plaque_immatriculation" min="0" value="<?= htmlspecialchars($_POST['plaque_immatriculation'] ?? '') ?>">
                        <label for="plaque_immatriculation">Plaque d'immatriculation</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating mb-3">
                        <input type="date" class="form-control" id="date_premiere_immatriculation" name="date_premiere_immatriculation" value="<?= htmlspecialchars($_POST['date_premiere_immatriculation'] ?? '') ?>">
                        <label for="date_premiere_immatriculation">Date de la première immatriculation</label>
                    </div>
                </div>
            </div>

            <div class="checkbox mb-3">
                <label>
                    <input type="checkbox" value="ecologique"> Véhicule éléctrique
                </label>
            </div>

            <button class="w-100 btn btn-lg btn-primary" type="submit">Enregistrer</button>
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