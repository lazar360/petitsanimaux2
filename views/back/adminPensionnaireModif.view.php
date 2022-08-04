<?php
ob_start();

echo (styleTitreNiveau2("Modification d'un petit animal", COLOR_ASSO));

?>
    

<?php
$contentAdminAction = ob_get_clean();

?>