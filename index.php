<?php

require_once "controllers/frontend.controller.php";

   if (isset($_GET['page']) && !empty($_GET['page'])) {
       if ($_GET['page'] === 'accueil') getAccueil();
       if ($_GET['page'] === 'pensionnaire') getPensionnaire();
       if ($_GET['page'] === 'partenaires') getPartenaires();
       if ($_GET['page'] === 'association') getAssociation();
   }else{
      getAccueil();
 }




