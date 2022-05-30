<?php

function getPensionnaire(){
    require_once "public/utile/formatage.php"; 
    require_once "models/animal.dao.php";
    require_once "config/config.php";

    $title = "Page des pensionnaires";
    $description = "C'est la page des pensionnaires";

    $_GET['id_statut'] = 1; //à supprimer
    $animaux = getAnimalFromStatus($_GET['id_statut']);

    $titreH1 = "";
    if ($_GET["id_statut"] == ID_STATUT_A_L_ADOPTION) $titreH1 = "Ils cherchent une famille";
    else if ($_GET["id_statut"] == ID_STATUT_ADOPTE) $titreH1 = "Les anciens";
    else if ($_GET["id_statut"] == ID_STATUT_FALD) $titreH1 = "famille d'accueil longue durée";

    foreach ($animaux as $key => $animal) {
        $image = getFirstImageAnimal($animal['id_animal']);
        $animaux[$key]['image'] = $image;
        $animaux[$key]['caracteres'] = getCaracteresFromAnimal($animal['id_animal']);
    }
    require_once "views/pensionnaire.view.php";
}

