<?php


function addUSer(PDO $pdo, string $pseudo, string $email, string $mot_de_passe): bool
{
    $query = $pdo->prepare("INSERT INTO user (pseudo, email, mot_de_passe) VALUES (:pseudo, :email, :mot_de_passe)");

    // sécurises le mot de passe 
    $mot_de_passe = password_hash($mot_de_passe, PASSWORD_DEFAULT);

    // remplacer les paramètres par les vrais (cf prepare)
    $query->bindValue(':pseudo', $pseudo);
    $query->bindValue(':email', $email);
    $query->bindValue(':mot_de_passe', $mot_de_passe);

    return $query->execute();
}


//fonction pour d'abord vérifier que le tableau POST est bien complé et gérer les messages d'erreurs s'il manque des infos
// on vérifie d'abord tout ça avant d'envoyer un addUser sur la bdd
function verifyUser($user): array|bool
{

    $errors = [];

    //verif pseudo
    if (isset($user["pseudo"])) {
        if ($user["pseudo"] === "") {
            $errors["pseudo"] = "Le champ pseudo est obligatoire";
        }
    } else {
        $errors = "Le champ pseudo n'a pas été envoyé";
    }

    //verif email
    if (isset($user["email"])) {
        if ($user["email"] === "") {
            $errors["email"] = "Le champ email est obligatoire";
        } else {
            // si le champ n'est pas vide alors on vérifie le format
            //si le format n'est pas bon...
            if (!filter_var($user["email"], FILTER_VALIDATE_EMAIL)) {
                $errors["email"] = "Le format d'email n'est pas respecté";
            }
        }
    } else {
        $errors = "Le champ email n'a pas été envoyé";
    }

    //verif password
    if (isset($user["mot_de_passe"])) {
        //ici on vérifie la longueur du mot de passe
        if (strlen($user["mot_de_passe"]) < 8) {
            $errors["mot_de_passe"] = "Le mot de passe doit faire au moins 8 caractères";
        }
    } else {
        $errors = "Le champ mot de passe n'a pas été envoyé";
    }


    if (count($errors)) {
        return $errors;
    } else {
        return true;
    }
}
