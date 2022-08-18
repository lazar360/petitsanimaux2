<?php
ob_start();

echo (styleTitreNiveau2("Modification d'une News", COLOR_ASSO));
echo (styleTitreNiveau3("Choix", COLOR_ASSO));

?>
    <!-- Etape 2 -->
    
<form action="" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="etape" value="2"> <!--Astuce pour initialiser une variable incluse dans $_POST -->
    <label for="typeActu">Type d'actualité :</label>
    <select name="typeActu" id="typeActu" class="form-control" onchange="submit()">
        <option></option>
        <?php foreach($typeActualites as $type) : ?>    
            <option value="<?= $type ?>" 
                <?php if(isset($_POST['typeActu']))echo "selected" ?>>
                <?= $type ?>
            </option>
        <?php endforeach ?>
    </select>        
</form>

<!-- Etape 3 : vérifier avec condition et la variable étape est affectée à 3 -->

<?php if(isset($_POST['etape']) && (int) $_POST['etape'] >=2){ ?>
    
    <form action="" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="etape" value="3"><!--Astuce pour affecter une variable incluse dans $_POST -->
        <input type="hidden" name="typeActu" value="<?= $_POST['typeActu'] ?>"> 
        

        <label for="actualites">Actualités :</label>
        <select name="actualites" id="actualites" class="form-control" onchange="submit()">
            <option></option>
            <?php foreach($data['actualites'] as $actualite) : ?>    
                <option value="<?= $actualite['id_actualite'] ?>">
                    <?= $actualite['id_actualite']. " - " .$actualite['libelle_actualite'] ?>
                </option>
            <?php endforeach ?>
        </select>        
    </form>
<?php } ?>

<!-- Etape 4 : vérifier avec condition et la variable étape est affectée à 4 -->

<?php if(isset($_POST['etape']) && (int) $_POST['etape'] >=3){ ?>
    <?= styleTitreNiveau3("Les informations de l'actualité :", COLOR_ASSO)?>
    <form action="" method="POST" enctype="multipart/form-data">
        
    <input type="hidden" name="etape" value="4">
    <input type="hidden" name="typeActu" value="<?= $_POST['typeActu'] ?>"> 
    <input type="hidden" id="idActualite" name="actualites" value="<?= $_POST['actualites'] ?>">
    <div class="form-row">
        <div class="form-group col-6">
            <label for="titreActu">Titre de l'actualité :</label>
            <input type="text" class="form-control" name="titreActu" id="titreActu" value="<?= $data['actualite']['libelle_actualite']?> "required>
        </div>
        <div class="form-group col-6">
            <label for="typeActu">Type d'actualité :</label>
            <!-- <select name="typeActu" id="typeActu" class="form-control">
            <?php foreach($typeActualites as $index => $type) : ?>    
                <option value="<?= $type ?>"><?= $type ?></option>
            <?php endforeach ?>
            </select> -->
            <br>
            <input type="text" class="form-control" name="typeActu" value="<?= $data['actualite']['type_actualite'] ?>" disabled>
        </div>
    </div>
    <div class="form-group">
        <label for="contenuActu">Contenu de l'actualité :</label>
        <textarea class="form-control" name="contenuActu" id="contenuActu" rows="5" required><?= $data['actualite']['contenu_actualite'] ?></textarea>
    </div>
    <img src="public/sources/images/sites/<?= $data['actualite']['url_image'] ?>" alt="<?= $data['actualite']['libelle_image'] ?>" style="max-width:200px;">
    <div class="form-group">
        <label for="imageActu">Image : </label>
        <input type="file" class="form-control-file" name="imageActu" id="imageActu">
    </div>

    <div class="row no-guters">
        <input type="submit" value="Valider" class="btn btn-primary col">
        <button id="btnSup" class="btn btn-danger col">Supprimer</button>

    </div>
</form>
<script src="public/js/verificationSuppressionActualite.js"></script>
<?php } ?>



<?php
$contentAdminAction = ob_get_clean();

?>