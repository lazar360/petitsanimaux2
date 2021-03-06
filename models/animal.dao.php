<?php
require_once("pdo.php");

function getAnimalFromStatus($idStatut){
    $bdd = connexionPDO();
    $req = '
    SELECT * 
    FROM animal 
    where id_statut = :idStatut';
    if($idStatut === ID_STATUT_ADOPTE){
        $req .= ' or id_statut = '.ID_STATUT_MORT;
    }
    $stmt = $bdd->prepare($req);
    $stmt->bindValue(":idStatut",$idStatut,PDO::PARAM_INT);
    $stmt->execute();
    $animaux = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $animaux;
}

function getFirstImageAnimal($idAnimal) {
    $bdd = connexionPDO();
    $stmt = $bdd->prepare('SELECT i.id_image, libelle_image, url_image, description_image 
                            FROM image i 
                            INNER JOIN contient c ON i.id_image = c.id_image
                            INNER JOIN animal a ON a.id_animal = c.id_animal
                            WHERE a.id_animal = :idAnimal
                            LIMIT 1');
    $stmt->bindValue(":idAnimal", $idAnimal);
    $stmt->execute();
    $image = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();

    return $image;
}

function getCaracteresFromAnimal($idAnimal){
    $bdd = connexionPDO();
    $stmt = $bdd->prepare( 
        'SELECT c.libelle_caractere_m, c.libelle_caractere_f 
        FROM caractere c 
        INNER JOIN dispose d ON c.id_caractere = d.id_caractere
        INNER JOIN animal a ON a.id_animal = d.id_animal
        WHERE a.id_animal = :idAnimal');
        $stmt->bindValue(":idAnimal", $idAnimal);
        $stmt->execute();
        $caracteres = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        
        return $caracteres;
}

function getAnimalFromIdAnimalBD($idAnimal){
    $bdd = connexionPDO();
    $req = '
    SELECT * 
    FROM animal 
    where id_animal = :idAnimal';
    $stmt = $bdd->prepare($req);
    $stmt->bindValue(":idAnimal",$idAnimal);
    $stmt->execute();
    $animal = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $animal;
}

function getImagesFromAnimal($idAnimal){
    $bdd = connexionPDO();
    $stmt = $bdd->prepare('
    select i.id_image,libelle_image,url_image,description_image
    from image i
    inner join contient c on i.id_image = c.id_image
    inner join animal a on a.id_animal = c.id_animal
    where a.id_animal= :idAnimal
    ');
    $stmt->bindValue(":idAnimal",$idAnimal);
    $stmt->execute();
    $images = $stmt->fetchALL(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $images;
}

