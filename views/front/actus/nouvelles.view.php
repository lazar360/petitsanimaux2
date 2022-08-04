<?php
ob_start();

echo (styleTitreNiveau1("Nouvelles", COLOR_ACTUS))
?>

<!-- Actualités en dynamique -->
<!-- ----------------  -->
<?php foreach ($actualites as $actualite) :
    echo(styleTitrePost("Posté le : <span class'" . COLOR_ACTUS . "'>" . date("d/m/Y", strtotime($actualite['date_publication_actualite'])) . "</span> : <span class = perso_ColorVertMenu> " . $actualite['libelle_actualite'] . "</span>"))
?>

    <div class="row no-gutters mt-3 align-items-center">
        <div class="p-12 col-lg-3 text-center">
            <img src="<?= URL ?>public/sources/images/sites/<?= $actualite["image"]["url_image"] ?>" alt="<?= $actualite["image"]["libelle_image"] ?>" style="max-height: 280px;" class="img-fluid p-2">
        </div>
        <div class="p-12 col-md-9">
            <p>
            <?= $actualite["contenu_actualite"] ?>    
            </p>
        </div>
    </div>

<?php endforeach ?>

<!-- Actualités en dur -->
<!-- ----------------  -->
<!-- <div class="row border-bottom">
    <?= styleTitrePost("Posté le : <span class'" . COLOR_ACTUS . "'>05/2018 </span> par <span class = perso_ColorVertMenu> Framboise</span>") ?>
</div>

<div class="row no-gutters mt-3 align-items-center" style="min-height: 300px;">
    <div class="p-12 col-md-3 text-center">
        <img src="<?= URL ?>public/sources/images/Animaux/chat/Framboise/Framboise.jpg" alt="framboise" style="max-height: 280px;">
    </div>
    <div class="p-12 col-md-9">
        <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut ut numquam cumque non nulla minus quidem repellat dolorum blanditiis enim, totam minima voluptatibus quas quos ipsa iusto. Deleniti, ea reiciendis!
        </p>
        <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut ut numquam cumque non nulla minus quidem repellat dolorum blanditiis enim.
        </p>
    </div>
</div>
<div class="row border-bottom">
    <?= (styleTitreNiveau2("Posté le :&nbsp", COLOR_GRIS)) ?>
    <?= (styleTitreNiveau2("05/2018", COLOR_ACTUS)) ?>
    <?= (styleTitreNiveau2("&nbsp par", COLOR_GRIS)) ?>
    <?= (styleTitreNiveau2("&nbsp Nova", COLOR_ACTUS)) ?>
</div>
<div class="row" style="margin-left: 185px;">
    <p>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut ut numquam cumque non nulla minus quidem repellat dolorum blanditiis enim, totam minima voluptatibus quas quos ipsa iusto. Deleniti, ea reiciendis!
    </p>
    <p>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut ut numquam cumque non nulla minus quidem repellat dolorum blanditiis enim.
    </p>
</div> -->



<?php
$content = ob_get_clean();
require "views/commons/template.php"
?>