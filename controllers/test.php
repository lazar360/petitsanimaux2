<?php
require_once("../Global/pdo.php");
include("../Commons/header.php");
?>

<?php
$bdd = connexionPDO();
$stmt = $bdd->prepare("SELECT * FROM animal");
$stmt->execute();
$animaux = $stmt->fetchAll(PDO::FETCH_ASSOC);
$stmt->closeCursor();
?>

<?= (styleTitreNiveau1("Ils cherchent une famille", COLOR_PENSIONNAIRE)) ?>

<div class="row no-gutters">
    <?php foreach ($animaux as $animal) : ?>
        <?php
            $stmt = $bdd->prepare('SELECT i.id_image, libelle_image, url_image, description_image 
                    FROM image i 
                    INNER JOIN contient c ON i.id_image = c.id_image
                    INNER JOIN animal a ON a.id_animal = c.id_animal
                    WHERE a.id_animal = :idAnimal
                    LIMIT 1');
            $stmt->bindValue(":idAnimal", $animal['id_animal']);
            $stmt->execute();
            $image = $stmt->fetch(PDO::FETCH_ASSOC);
            $stmt->closeCursor();
        ?>
        
        <div class="col-12 col-lg-6">
            <div class="row border-dark rounded-lg m-2 align-items-center perso_bgRose" style="height: 200px;">
                <div class="col p-2 text-center">
                    <img src="../../sources/images/Animaux/<?= $animal['type_animal'] ?>/<?= $image['url_image'] ?>" class="img-thumbnail" alt="<?= $image['description_image'] ?>" style="max-height: 180px;">
                </div>
                <div class="col-2 border-left border-right border-dark text-center">
                <?php 
                $iconeChien = "";
                $iconeChat = "";
                $iconeEnfant = "";
                
                if($animal['ami_chien'] === "oui") $iconeChien = "chienOk";
                else if($animal['ami_chien'] === "non") $iconeChien = "chienBar";
                else if ($animal['ami_chien'] === "N/A") $iconeChien = "chienQuest";
                    
                if($animal['ami_chat'] === "oui") $iconeChat = "chatOk";
                else if($animal['ami_chat'] === "non") $iconeChat = "chatBar";
                else if ($animal['ami_chat'] === "N/A") $iconeChat = "chatQuest";
                
                if($animal['ami_enfant'] === "oui") $iconeEnfant = "babyOk";
                else if($animal['ami_enfant'] === "non") $iconeEnfant = "babyBar";
                else if ($animal['ami_enfant'] === "N/A") $iconeEnfant = "babyQuest";                
                ?>

                <img src="../../sources/images/Autres/icones/<?=$iconeChien ?>.png" class="img-fluid" alt="chien ok" style="width: 50px;">
                <img src="../../sources/images/Autres/icones/<?=$iconeChat ?>.png" class="img-fluid" alt="chat ok" style="width: 50px;">
                <img src="../../sources/images/Autres/icones/<?=$iconeEnfant ?>.png" class="img-fluid" alt="bébé ok" style="width: 50px;">

                </div>
                <div class="col-6 text-center">
                    <div class="perso_policeTitre perso_size20 mb-3"><?= $animal['nom_animal'] ?></div>
                    <div class="mb-2">Née : <?= $animal['date_naissance_animal'] ?></div>
                    
                    <?php
                        $stmt = $bdd->prepare( 'SELECT c.libelle_caractere 
                        FROM caractere c 
                        INNER JOIN dispose d ON c.id_caractere = d.id_caractere
                        INNER JOIN animal a ON a.id_animal = d.id_animal
                        WHERE a.id_animal = :idAnimal');
                        $stmt->bindValue(":idAnimal", $animal['id_animal']);
                        $stmt->execute();
                        $caracteres = $stmt->fetchAll(PDO::FETCH_ASSOC);
                        $stmt->closeCursor();
                    ?>

                    <div class="my-3">
                        <?php foreach($caracteres as $caractere) : ?>
                        <span class="badge badge-pill badge-secondary"><?= $caractere['libelle_caractere'] ?></span>
                        <?php endforeach; ?>
                    </div>
                    <a href="animal.php?idAnimal=<?=$animal['id_animal']?>" class="btn btn-primary">Visiter ma page</a>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
<?php include("../Commons/footer.php") ?>