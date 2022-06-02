<?php

require_once "controllers/frontend.controller.php";

   if ($_GET['page'] !== []) {
       if ($_GET['page'] === 'accueil') getAccueil();
       if ($_GET['page'] === 'pensionnaire') getPensionnaire();
   }else{
      getAccueil();
 }




