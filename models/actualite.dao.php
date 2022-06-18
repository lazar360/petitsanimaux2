<?php
require_once("pdo.php");

function getActualitesFromBD() {
    $bdd = connexionPDO();
    $req = 'SELECT * 
            FROM actualite';

    
    $stmt = $bdd->prepare($req);
    $stmt->execute();
    $actualites = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();

    return $actualites;
}

function getImageActualiteFromBD($idImage){

    $bdd = connexionPDO();
    $req = 'SELECT * 
            FROM image
            WHERE id_image = :idImage
            ';

    $stmt = $bdd->prepare($req);
    $stmt->bindValue(':idImage', $idImage, PDO::PARAM_INT);
    //$stmt->bindValue(":idStatut", $_GET["idstatut"]);
    $stmt->execute();
    $image = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();

    return $image;

}