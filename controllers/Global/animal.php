<?php
require_once("../Global/pdo.php");
include("../Commons/header.php");

$bdd = connexionPDO();
$req = '
SELECT * 
FROM animal 
WHERE id_animal =:idAnimal';

$stmt = $bdd->prepare($req);
$stmt->bindValue(":idAnimal", $_GET["idAnimal"]);
$stmt->execute();
$animal = $stmt->fetch(PDO::FETCH_ASSOC);
$stmt->closeCursor();
//echo"<pre>";
//print_r($animal);

$stmt = $bdd->prepare('SELECT i.id_image, libelle_image, url_image, description_image 
FROM image i 
INNER JOIN contient c ON i.id_image = c.id_image
INNER JOIN animal a ON a.id_animal = c.id_animal
WHERE a.id_animal = :idAnimal
');
$stmt->bindValue(":idAnimal", $_GET["idAnimal"]);
$stmt->execute();
$images = $stmt->fetchAll(PDO::FETCH_ASSOC);
$stmt->closeCursor();

?>

<?= (styleTitreNiveau1($animal['nom_animal'], COLOR_PENSIONNAIRE)) ?>


<div class="row border-dark rounded-lg m-2 align-items-center <?= ($animal['sexe']) ? ' perso_bgBleu' : ' perso_bgRose'  ?>">
    <div class="col p-2 text-center">
        <img src="../../sources/images/Animaux/<?= $animal['type_animal'] ?>/<?= $images[0]['url_image'] ?>" class="img-thumbnail" alt="<?= $images[0]['description_image'] ?>" style="max-height: 180px;">
    </div>
    <div class="col-2 col-md-1 border-left border-right border-dark text-center">
        <?php
        $iconeChien = "";
        $iconeChat = "";
        $iconeEnfant = "";

        if ($animal['ami_chien'] === "oui") $iconeChien = "chienOk";
        else if ($animal['ami_chien'] === "non") $iconeChien = "chienBar";
        else if ($animal['ami_chien'] === "N/A") $iconeChien = "chienQuest";

        if ($animal['ami_chat'] === "oui") $iconeChat = "chatOk";
        else if ($animal['ami_chat'] === "non") $iconeChat = "chatBar";
        else if ($animal['ami_chat'] === "N/A") $iconeChat = "chatQuest";

        if ($animal['ami_enfant'] === "oui") $iconeEnfant = "babyOk";
        else if ($animal['ami_enfant'] === "non") $iconeEnfant = "babyBar";
        else if ($animal['ami_enfant'] === "N/A") $iconeEnfant = "babyQuest";
        ?>

        <img src="../../sources/images/Autres/icones/<?= $iconeChien ?>.png" class="img-fluid" alt="chien ok" style="width: 50px;">
        <img src="../../sources/images/Autres/icones/<?= $iconeChat ?>.png" class="img-fluid" alt="chat ok" style="width: 50px;">
        <img src="../../sources/images/Autres/icones/<?= $iconeEnfant ?>.png" class="img-fluid" alt="bébé ok" style="width: 50px;">

    </div>
    <div class="col-6 col-md-4 text-center">
        <div class="mb-2">Puce : <?php $text = (!empty($animal['puce'])) ? $animal['puce'] : 'Non renseignée';
                                    echo $text; ?></div>
        <div class="mb-2">Né(e) : <?php $text = (!empty($animal['date_naissance_animal'])) ? $animal['date_naissance_animal'] : 'Date de naissance non renseignée';
                                    echo $text; ?></div>

        
                    <?php
                        $stmt = $bdd->prepare( 'SELECT c.libelle_caractere_m, c.libelle_caractere_f 
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
                        <span class="badge badge-warning m-1 p-2 d-none d-sm-inline">
                            <?= ($animal['sexe']) ? $caractere['libelle_caractere_m'] : $caractere['libelle_caractere_f']   ?></span>
                        <?php endforeach; ?>
                    </div>
    </div>
    <div class="col-12 col-md-4">
        Frais d'adoption : 60 € <br>
        Lorem, ipsum dolor sit amet consectetur adipisicing elit.
    </div>
</div>

<div class="row no-gutters align-items-center">

    <div class="col-12 col-lg-6">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <?php foreach ($images as $key => $image) : ?>
                    <li data-target="#carouselExampleIndicators" data-slide-to="<?= $key ?>" class="<?php ($key === 0) ? "active" : "" ?>"></li>
                <?php endforeach; ?>
            </ol>
            <div class="carousel-inner text-center">
                <?php foreach ($images as $key => $image) : ?>
                    <div class="carousel-item <?php echo ($key === 0) ? "active" : "" ?>">
                        <img src="../../sources/images/Animaux/<?= $animal['type_animal'] ?>/<?= $image['url_image'] ?>" class="img-thumbail" style="height: 500px;" alt="<?= $image['description_image'] ?>">
                    </div>
                <?php endforeach;  ?>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>

    <div class="col-12 col-lg-6">
        <div>
            <?= (styleTitreNiveau2("Qui suis-je ?", COLOR_PENSIONNAIRE)) ?>
            <?= $animal['description_animal'] ?>
        </div>
        <hr>
        <div>
            <img src="../../sources/images/Autres/icones/IconeAdopt.png" alt="icone adoption" width="50" height="50" class="d-block">
            <?= $animal['adoption_description_animal'] ?>
        </div>
        <hr>
        <div>
            <img src="../../sources/images/Autres/icones/iconeContrat.png" alt="icone adoption" width="50" height="50" class="d-block">
            <?= $animal['engagemet_description_animal'] ?>
        </div>
        <hr>
        <div>
            <img src="../../sources/images/Autres/icones/oeil.jpg" alt="icone adoption" width="50" height="50" class="d-block">
            <?= $animal['localisation_description_animal'] ?>
        </div>

    </div>
</div>

<?php include("../Commons/footer.php") ?>