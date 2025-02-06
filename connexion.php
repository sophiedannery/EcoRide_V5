<?php
require_once 'templates/header.php';
require_once 'lib/user.php';
require_once 'lib/pdo.php';



//erreur vide, qui va se remplir en cas d'erreur; Pas un tableau car il n'y a qu'un seul cs d'erreur
$error = null;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    //appel de la fonction
    $user = verifyUserLoginPassword($pdo, $_POST["email"], $_POST["mot_de_passe"]);

    //si la connexion se passe bien, alors : 
    if ($user) {
        //régénérer un nouvel id de session (id unique)
        session_regenerate_id(true);

        // récupérer les crédits
        $query = $pdo->prepare("SELECT credits FROM user WHERE id = :id");
        $query->bindValue(":id", $user["id"]);
        $query->execute();
        $userCredits = $query->fetch(PDO::FETCH_ASSOC);

        //stocker les infos dans la session
        $_SESSION["user"] = [
            "id" => $user["id"],
            "pseudo" => $user["pseudo"],
            "credits" => $userCredits["credits"],
            "note" => $user["note"] ?? 0
        ];


        //relocation
        header("Location: mon_compte.php");
    } else {
        $error = "Email ou mot de passe incorrect";
    }
}


?>


<div class="bgimage_bis mb-5">
    <h1 class="text-white text-center py-5">Connexion</h1>
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

            <button class="w-100 btn btn-lg btn-primary" type="submit">Se connecter</button>
            <hr class="my-4">

        </form>
    </div>

    <div class="text-center my-3">
        <p>Pas encore de compte ? <a class="text-decoration-underline" href="/inscription.php">Inscris-toi ici !</a></p>
    </div>




</div>


<?php
require_once 'templates/footer.php'
?>