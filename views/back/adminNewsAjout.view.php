<?php
ob_start();

echo (styleTitreNiveau2("Ajout d'une News", COLOR_ASSO))
?>

<form action="" method="POST" enctype="multipart/form-data">
    <div class="form-row">
        <div class="form-group col-6">
            <label for="titreActu">Titre de l'actualité :</label>
            <input type="text" class="form-control" name="titreActu" id="titreActu" required>
        </div>
        <div class="form-group col-6">
            <label for="typeActu">Type d'actualité :</label>
            <select name="typeActu" id="typeActu" class="form-control">
            <?php foreach($typeActualites as $index => $type) : ?>    
                <option value="<?= $type ?>"><?= $type ?></option>
            <?php endforeach ?>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label for="contenuActu">Contenu de l'actualité :</label>
        <textarea class="form-control" name="contenuActu" id="contenuActu" rows="5" required></textarea>
    </div>
    
    <?php require "imagesNewsManager.view.php" ?>

    <div class="row no-guters">
        <input type="submit" value="Valider" class="btn btn-primary col">
    </div>
</form>


<?php
$contentAdminAction = ob_get_clean();

?>