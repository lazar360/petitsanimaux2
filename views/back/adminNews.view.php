<?php
ob_start();

echo (styleTitreNiveau1("Page de gestion des news", COLOR_ASSO))
?>

<form action="" method="POST" enctype="multipart/form-data">
    <div class="form-row">
        <div class="form-group col-6">
            <label for="titreActu">Titre de l'actualité :</label>
            <input type="text" class="form-control" name="titreActu" id="titreActu" required>
        </div>
        <div class="form-group col-6">
            <label for="typeActu">Titre de l'actualité :</label>
            <select name="typeActu" id="typeActu" class="form-control">
                <option value=""></option>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label for="contenuActu">Titre de l'actualité :</label>
        <textarea class="form-control" name="contenuActu" id="contenuActu" rows="5" required></textarea>
    </div>
    <div class="form-group">
        <label for="imageActu">Image : </label>
        <input type="file" class="form-control-file" name="imageActu" id="imageActu">
    </div>

    <div class="row no-guters">
        <input type="submit" value="Valider" class="btn btn-primary col">
    </div>
</form>


<?php
$content = ob_get_clean();
require "views/commons/template.php"
?>