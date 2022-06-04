<?php 
ob_start();

echo(styleTitreNiveau1("Educateur", COLOR_CONSEILS))
 
?>

<div class="row no-gutters">
    <div class="card col-auto mx-auto mt-2" style="width: 40rem;">
        <img src="public/sources/images/Autres/Articles/imageEduc.jpg" class="card-img-top p-1" alt="Educateur">
        <div class="card-body text-center">
            <?= (styleTitreNiveau2("Educateur", COLOR_CONSEILS)) ?>
            <p class="card-text">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Id itaque cumque possimus temporibus! </p>
            <a href="#" class="btn btn-primary">En savoir plus</a>
        </div>
    </div>
</div>

<?php 
$content = ob_get_clean();
require "views/template.php" 
?>