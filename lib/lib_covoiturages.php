<?php

function getCovoiturages(): array
{
    return [
        ["adresse_depart" => "Buis", "adresse_arrivee" => "Avignon", "date_depart" => "26 février", "heure_depart" => "9h", "heure_arrivee" => "10h", "prix" => 24, "place_disponible" => 2, "created_at" => "10/02/25", "image" => "image (2).jpg"],
        ["adresse_depart" => "Paris", "adresse_arrivee" => "Lille", "date_depart" => "12 mars", "heure_depart" => "10h15", "heure_arrivee" => "13h",  "prix" => 24, "place_disponible" => 1, "created_at" => "01/02/25",   "image" => "photo_Profil2.jpg"],
        ["adresse_depart" => "Lyon", "adresse_arrivee" => "Caen", "date_depart" => "14 février", "heure_depart" => "20h45", "heure_arrivee" => "23h45",  "prix" => 24, "place_disponible" => 3, "created_at" => "25/01/25",   "image" => "image (3).jpg"],
        ["adresse_depart" => "Bordeaux", "adresse_arrivee" => "Arcachon", "date_depart" => "19 février", "heure_depart" => "13h30",  "heure_arrivee" => "14h15", "prix" => 24, "place_disponible" => 2, "created_at" => "14/02/25",   "image" => "image (6).jpg"],
    ];
}

function getCovoituragesById(int $id): array
{
    $covoiturages = getCovoiturages();
    return $covoiturages[$id];
}
