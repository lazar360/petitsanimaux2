<?php
require_once("../Global/pdo.php");
require_once("../Global/animal.dao.php");
require_once("../../utile/config.php");

$animaux = getAnimalFromStatus($_GET['id_statut']);

$titreH1 = "";
if ($_GET["id_statut"] == ID_STATUT_A_L_ADOPTION) $titreH1 = "Ils cherchent une famille";
else if ($_GET["id_statut"] == ID_STATUT_ADOPTE) $titreH1 = "Les anciens";
else if ($_GET["id_statut"] == ID_STATUT_FALD) $titreH1 = "famille d'accueil longue durée";

foreach($animaux as $key => $animal){
    $image = getFirstImageAnimal($animal['id_animal']); 
    $animaux[$key]['image'] = $image;
    $animaux[$key]['caracteres'] = getCaracteresFromAnimal($animal['id_animal']);
}

require_once "pensionnaire.view.php";
