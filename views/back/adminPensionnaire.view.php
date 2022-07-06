<?php
ob_start();

echo (styleTitreNiveau1("Page de gestion des pensionnaires", COLOR_ASSO))
?>




<?php
$content = ob_get_clean();
require "views/commons/template.php"
?>