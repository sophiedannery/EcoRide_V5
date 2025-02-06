<?php
require_once 'templates/header.php';
require_once 'lib/pdo.php';
require_once 'lib/user.php';
require_once 'lib/lib_ajout_covoiturage.php';
require_once 'lib/lib_covoiturages.php';



$covoiturages = getAllCovoiturages($pdo);




?>


<div class="container">
    <h1>Les trajets</h1>

    <?php if (count($covoiturages) > 0): ?>

        <table class="table">
            <thead>
                <tr>
                    <th>Départ</th>
                    <th>Arrivée</th>
                    <th>Chauffeur</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($covoiturages as $covoiturage): ?>
                    <tr>
                        <td><?= htmlspecialchars($covoiturage["adresse_depart"]) ?></td>
                        <td><?= htmlspecialchars($covoiturage["adresse_arrivee"]) ?></td>
                        <td><?= htmlspecialchars($covoiturage["pseudo"]) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    <?php else: ?>
        <div>
            <p>Aucun covoiturage disponible pour le moment</p>
        </div>
    <?php endif; ?>










    <br>
    <br>
    <a class="btn btn-secondary" href="/index.php">Retour</a>


</div>








<?php
require_once 'templates/footer.php';


?>