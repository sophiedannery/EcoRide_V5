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





function getCovoituragesById(PDO $pdo, int $id): array|bool
{
    $sql = "SELECT trajet.id, trajet.adresse_depart, trajet.adresse_arrivee, trajet.date_depart, trajet.heure_depart, trajet.heure_arrivee, trajet.prix, trajet.place_disponible, trajet.created_at
            FROM trajet
            WHERE trajet.id = :id";

    $query = $pdo->prepare($sql);
    $query->bindValue(":id", $id, PDO::PARAM_INT);
    $query->execute();
    return $query->fetch(PDO::FETCH_ASSOC);
}
