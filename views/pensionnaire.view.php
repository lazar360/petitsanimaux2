<?php include("../Commons/header.php"); ?>

<?= styleTitreNiveau1($titreH1, COLOR_PENSIONNAIRE) ?>

<div class="row no-gutters">
    <?php foreach ($animaux as $animal) : ?>
        
        <div class="col-12 col-lg-6">
            <div class="row border-dark rounded-lg m-2 align-items-center <?= ($animal['sexe']) ? "perso_bgBleu" : "perso_bgRose" ?>" style="height: 200px;">
                <div class="col p-2 text-center">
                    <img src="../../sources/images/Animaux/<?= $animal['type_animal'] ?>/<?= $animal["image"]['url_image'] ?>" class="img-thumbnail" alt="<?= $animal["image"]['libelle_image'] ?>" style="max-height: 180px;">
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
                    <div class="my-3">
                        <?php foreach($animal['caracteres'] as $caractere) : ?>
                        <span class="badge badge-pill badge-warning">
                            <?= ($animal['sexe']) ? $caractere['libelle_caractere_m'] : $caractere['libelle_caractere_f']   ?></span>
                        <?php endforeach; ?>
                    </div>
                    <a href="animal.php?idAnimal=<?=$animal['id_animal']?>" class="btn btn-primary">Visiter ma page</a>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
<?php include"../Commons/footer.php" ?>