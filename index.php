<?php

require_once "controllers/frontend.controller.php";

   if (isset($_GET['page']) && !empty($_GET['page'])) {
       if ($_GET['page'] === 'accueil') getPageAccueil();
       if ($_GET['page'] === 'pensionnaire') getPagePensionnaire();
       if ($_GET['page'] === 'partenaires') getPagePartenaires();
       if ($_GET['page'] === 'association') getPageAssociation();
       if ($_GET['page'] === 'temperatures') getPageTemperatures();
       if ($_GET['page'] === 'plantes') getPagePlantes();
       if ($_GET['page'] === 'sterilisation') getPageSterilisation();
       if ($_GET['page'] === 'educateur') getPageEducateur();
       if ($_GET['page'] === 'chocolat') getPageChocolat();
       if ($_GET['page'] === 'contact') getPageContact();
       if ($_GET['page'] === 'don') getPageDon();
       if ($_GET['page'] === 'mentions') getPageMentions();
       if ($_GET['page'] === 'nouvelles') getPageNouvelles();
       if ($_GET['page'] === 'animal') getPageAnimal();
   }else{
      getPageAccueil();
 }




