<?php
ob_start();

echo (styleTitreNiveau1("Page de gestion des news", COLOR_ASSO))
?>

<a href="genererNewsAdminAjout" class="btn btn-primary">Ajouter</a>
<a href="genererNewsAdminModif" class="btn btn-primary">Modifier</a>
<a href="genererNewsAdminSup" class="btn btn-primary">Supprimer</a>


<?= $contentAdminAction ?>

<?php if($alert !==""){
     echo afficherAlert($alert, $alertType);
  } ?>

<?php
$content = ob_get_clean();
require "views/commons/template.php"
?>