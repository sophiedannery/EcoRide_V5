<?php

require_once 'lib/pdo.php';

function getCovoiturages(PDO $pdo): array
{
    $sql = "SELECT trajet.id, trajet.adresse_depart, trajet.adresse_arrivee, trajet.date_depart, trajet.heure_depart, trajet.heure_arrivee, trajet.prix, trajet.place_disponible
            FROM trajet";

    $query = $pdo->prepare($sql);
    $query->execute();
    return $query->fetchAll(PDO::FETCH_ASSOC);
}






// function getCovoituragesById(PDO $pdo, int $id): array|bool
// {
//     $sql = "SELECT trajet.id, trajet.adresse_depart, trajet.adresse_arrivee, trajet.date_depart, trajet.heure_depart, trajet.heure_arrivee, trajet.prix, trajet.place_disponible, trajet.created_at
//             FROM trajet
//             WHERE trajet.id = :id";

//     $query = $pdo->prepare($sql);
//     $query->bindValue(":id", $id, PDO::PARAM_INT);
//     $query->execute();
//     return $query->fetch(PDO::FETCH_ASSOC);
// }




function getCovoituragesById(PDO $pdo, int $id): array|bool
{
    $sql = "
    SELECT 
    trajet.id,
    trajet.adresse_depart, 
    trajet.adresse_arrivee, 
    trajet.date_depart, 
    trajet.heure_depart, 
    trajet.heure_arrivee, 
    trajet.prix, 
    trajet.place_disponible, 
    trajet.created_at,
    user.pseudo, 
    user.note,
    user.photo
    FROM trajet
    JOIN user ON trajet.user_id = user.id
            WHERE trajet.id = :id
            
            ";

    $query = $pdo->prepare($sql);
    $query->bindValue(":id", $id, PDO::PARAM_INT);
    $query->execute();
    return $query->fetch(PDO::FETCH_ASSOC);
}


function getUserCovoiturages(PDO $pdo, int $user_id): array
{
    $query = $pdo->prepare("
    SELECT
    id, 
    adresse_depart,
    adresse_arrivee,
    date_depart,
    heure_depart,
    heure_arrivee,
    prix,
    created_at
    FROM trajet
    WHERE user_id = :user_id
    ");
    $query->bindValue(":user_id", $user_id);
    $query->execute();

    return $query->fetchAll(PDO::FETCH_ASSOC);
}
