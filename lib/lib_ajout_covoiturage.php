<?php

function validateAndAddTrip(PDO $pdo, int $user_id, array $tripData): bool|array
{
    $errors = [];


    //On vérifie d'abord si les infos envoyés sont valides. SInon, un message d'erreur
    if (empty($tripData["adresse_depart"])) {
        $errors["adresse_depart"] = "L'adresse de départ est obligatoire";
    }

    if (empty($tripData["adresse_arrivee"])) {
        $errors["adresse_arrivee"] = "L'adresse d'arrivée est obligatoire";
    }

    if (empty($tripData["date_depart"])) {
        $errors["date_depart"] = "La date de départ est obligatoire";
    }

    if (empty($tripData["heure_depart"])) {
        $errors["heure_depart"] = "L'heure de départ est obligatoire";
    }

    if (empty($tripData["heure_arrivee"])) {
        $errors["heure_arrivee"] = "L'heure d'arrivée' est obligatoire";
    }

    //On vérifie si le prix est vide et si le prix est valide : on vérifie s'il s'agit bien d'un nombre
    if (empty($tripData['prix']) || !filter_var($tripData['prix'], FILTER_VALIDATE_FLOAT)) {
        $errors["prix"] = "Le prix n'est pas valide";
    }

    //ici aussi on vérifie si champ est vide et si le nombre est valide, et que ce soit supérieur à 0
    if (empty($tripData['place_disponible']) || !filter_var($tripData['place_disponible'], FILTER_VALIDATE_INT) || $tripData['place_disponible'] <= 0) {
        $errors["place_disponible"] = "Le nombre de places disponibles n'est pas valide";
    }

    if (count($errors) > 0) {
        return $errors;
    }

    //Si il n'y a pas d'erreur, alors on peut rajouter le trajet
    $query = $pdo->prepare("
    INSERT INTO trajet (user_id, adresse_depart, adresse_arrivee, date_depart, heure_depart, heure_arrivee, prix, place_disponible) VALUES (:user_id, :adresse_depart, :adresse_arrivee, :date_depart, :heure_depart, :heure_arrivee, :prix, :place_disponible)
    ");

    $query->bindValue(":user_id", $user_id);
    $query->bindValue(":adresse_depart", $tripData["adresse_depart"]);
    $query->bindValue(":adresse_arrivee", $tripData["adresse_arrivee"]);
    $query->bindValue(":date_depart", $tripData["date_depart"]);
    $query->bindValue(":heure_depart", $tripData["heure_depart"]);
    $query->bindValue(":heure_arrivee", $tripData["heure_arrivee"]);
    $query->bindValue(":prix", $tripData["prix"]);
    $query->bindValue(":place_disponible", $tripData["place_disponible"]);

    return $query->execute();
}
