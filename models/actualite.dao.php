<?php
require_once("pdo.php");

function getActualitesFromBD($type) {
    $bdd = connexionPDO();
    $req = 'SELECT * 
            FROM actualite
            WHERE type_actualite = :type  
            ORDER BY date_publication_actualite DESC
            ';

    
    $stmt = $bdd->prepare($req);
    $stmt->bindValue(':type', $type, PDO::PARAM_STR);
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
    $stmt->execute();
    $image = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();

    return $image;

}

function getLastNews(){

    $bdd = connexionPDO();
    $req = 'SELECT id_actualite, libelle_actualite, contenu_actualite, date_publication_actualite, type_actualite, a.id_image, i.libelle_image, i.url_image, i.description_image 
            FROM actualite a 
            INNER JOIN image i ON a.id_image = i.id_image 
            WHERE type_actualite = :type 
            ORDER BY date_publication_actualite DESC 
            LIMIT 1;
            ';

    
    $stmt = $bdd->prepare($req);
    $stmt->bindValue(':type', TYPE_NEWS, PDO::PARAM_STR);
    $stmt->execute();
    $actualite = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
   
    return $actualite;

}

function getLastActionsOrEvents(){

    $bdd = connexionPDO();
    $req = 'SELECT id_actualite, libelle_actualite, contenu_actualite, date_publication_actualite, type_actualite, a.id_image, i.libelle_image, i.url_image, i.description_image 
            FROM actualite a 
            INNER JOIN image i ON a.id_image = i.id_image 
            WHERE type_actualite = :typeEvent OR type_actualite = :typeAction
            ORDER BY date_publication_actualite DESC
            LIMIT 1;
            ';

    
    $stmt = $bdd->prepare($req);
    $stmt->bindValue(':typeEvent', TYPE_EVENTS, PDO::PARAM_STR);
    $stmt->bindValue(':typeAction', TYPE_ACTIONS, PDO::PARAM_STR);
    $stmt->execute();
    $actualite = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();

    return $actualite;


}

function getTypesActualite(){

    $bdd = connexionPDO();
    $req = 'SELECT DISTINCT a.type_actualite 
            FROM actualite a 
            ORDER BY a.type_actualite ASC;
            ';
    $stmt = $bdd->prepare($req);
    $stmt->execute();
    $typeActualites2D = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();

    $typeActualites = array_map('current', $typeActualites2D); //Le truc pour passer de tableau 2D à tableau 1D

    return $typeActualites;

}

function insertActualiteIntoBD($titreActu, $typeActu, $contenuActu, $dateActu, $image){

    $bdd = connexionPDO();
    $req = '
    INSERT INTO actualite(libelle_actualite, contenu_actualite, date_publication_actualite, id_image, type_actualite) 
    VALUES (:titre, :contenu, :date, :image, :type);
    ';
    $stmt = $bdd->prepare($req);
    $stmt->bindValue(':titre', $titreActu, PDO::PARAM_STR);
    $stmt->bindValue(':contenu', $contenuActu, PDO::PARAM_STR);
    $stmt->bindValue(':date', $dateActu, PDO::PARAM_STR);
    $stmt->bindValue(':image', $image, PDO::PARAM_INT);
    $stmt->bindValue(':type', $typeActu, PDO::PARAM_STR);
    $resultat = $stmt->execute();
    $stmt->closeCursor();
    if($resultat > 0) return true;
    else return false;

}