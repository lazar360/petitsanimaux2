<?php 
ob_start();

echo(styleTitreNiveau1("Les partenaires", COLOR_ASSO)) 
?>

<div class="row no-gutters">
    <div class="card col-auto mx-auto mt-2" style="width: 18rem;">
        <img src="<?= URL ?>public/sources/images/Autres/updp-logo.png" class="card-img-top p-1" alt="updp-logo">
        <div class="card-body text-center">
            <h5 class="text-center mt-3 perso_ColorRoseMenu perso_policeTitre perso_textShadow">UPDP 09</h5>
            <p class="card-text">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Id itaque cumque possimus temporibus! </p>
            <a href="#" class="btn btn-primary">Visiter le site de l'éducatrice</a>
        </div>
    </div>

</div>

<?php 
$content = ob_get_clean();
require "views/commons/template.php" 
?>