<?php

// rajouter un véhicule à la bdd
// ajout_vehicule.php
function addVehicule(PDO $pdo, string $marque, string $modele, string $couleur, string $plaque_immatriculation,  string $date_premiere_immatriculation, bool $est_ecologique, int $user_id): bool
{
    $query = $pdo->prepare("
    INSERT INTO vehicule (marque, modele, couleur, plaque_immatriculation, date_premiere_immatriculation, est_ecologique, user_id) 
    VALUES (:marque, :modele, :couleur, :plaque_immatriculation, :date_premiere_immatriculation, :est_ecologique, :user_id)
    ");

    return $query->execute([
        ":marque" => $marque,
        ":modele" => $modele,
        ":couleur" => $couleur,
        ":plaque_immatriculation" => $plaque_immatriculation,
        ":date_premiere_immatriculation" => $date_premiere_immatriculation,
        ":est_ecologique" => $est_ecologique,
        ":user_id" => $user_id
    ]);
}




// Récupérer les  véhicules de l'utilisateur connecté 
// mon_compte.php
// ajout_covoiturage.php
function getUserVehicule(PDO $pdo, int $user_id): array
{
    $query = $pdo->prepare("
    SELECT
    id, 
    marque,
    modele,
    couleur,
    plaque_immatriculation,
    date_premiere_immatriculation,
    est_ecologique,
    user_id
    FROM vehicule
    WHERE user_id = :user_id
    ");
    $query->bindValue(":user_id", $user_id);
    $query->execute();

    return $query->fetchAll(PDO::FETCH_ASSOC);
}
