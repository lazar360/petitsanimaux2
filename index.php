<?php

require_once "controllers/frontend.controller.php";

   if (isset($_GET['page']) && !empty($_GET['page'])) {
       if ($_GET['page'] === 'accueil') getAccueil();
       if ($_GET['page'] === 'pensionnaire') getPensionnaire();
       if ($_GET['page'] === 'partenaires') getPartenaires();
       if ($_GET['page'] === 'association') getAssociation();
       if ($_GET['page'] === 'temperatures') getTemperatures();
       if ($_GET['page'] === 'plantes') getPlantes();
       if ($_GET['page'] === 'sterilisation') getSterilisation();
       if ($_GET['page'] === 'educateur') getEducateur();
       if ($_GET['page'] === 'chocolat') getChocolat();
       if ($_GET['page'] === 'contact') getContact();
       if ($_GET['page'] === 'don') getDon();
       if ($_GET['page'] === 'mentions') getMentions();
       if ($_GET['page'] === 'nouvelles') getNouvelles();
       if ($_GET['page'] === 'animal') getAnimal();
   }else{
      getAccueil();
 }




