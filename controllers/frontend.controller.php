<?php
require_once "public/utile/formatage.php";
require_once "models/animal.dao.php";
require_once "config/config.php";
require_once "controllers/frontend.controller.php";

function getAccueil(){

    $title = "Page d'accueil";
    $description = "C'est la page d'accueil";

    require_once "views/front/accueil.view.php";
}

function getPensionnaire(){
    
    $title = "Page des pensionnaires";
    $description = "C'est la page des pensionnaires";

    //$_GET['id_statut'] = 1; 
    
    $animaux = getAnimalFromStatus($_GET['idstatut']);

    $titreH1 = "";
    if ((int)$_GET['idstatut'] === ID_STATUT_A_L_ADOPTION)
    $titreH1 = "Ils cherchent une famille";
    else if ((int)$_GET['idstatut'] === ID_STATUT_ADOPTE)
    $titreH1 = "Les anciens";
    else if ((int)$_GET['idstatut'] === ID_STATUT_FALD)
    $titreH1 = "Famille d'accueil longue durée";

    foreach($animaux as $key => $animal){
        $image = getFirstImageAnimal($animal['id_animal']);
        $animaux[$key]['image'] = $image;

        $caracteres = getCaracteresFromAnimal($animal['id_animal']);
        $animaux[$key]['caracteres'] = $caracteres;
    }
    require_once "views/front/pensionnaire.view.php";
}

function getPartenaires(){

    $title = "Les partenaires";
    $description = "C'est la page des partenaires";

    require_once "views/front/association/partenaires.view.php";
}

function getAssociation(){

    $title = "L'association";
    $description = "C'est la page d'association";

    require_once "views/front/association/association.view.php";
}

function getTemperatures(){

    $title = "Article Températures";
    $description = "C'est la page traitant des risques liés aux températures";

    require_once "views/front/articles/temperatures.view.php";
}

function getPlantes(){

    $title = "Article plantes";
    $description = "C'est la page traitant des risques liés aux plantes";

    require_once "views/front/articles/plantes.view.php";
}

function getSterilisation(){

    $title = "Article stérilisation";
    $description = "C'est la page sensibilisant sur le sujet de la stérilisation";

    require_once "views/front/articles/sterilisation.view.php";
}

function getEducateur(){

    $title = "Article éducateur";
    $description = "C'est la page sensibilisant sur le sujet de l'éucation";

    require_once "views/front/articles/educateur.view.php";
}

function getChocolat(){

    $title = "Article chocolat";
    $description = "C'est la page traitant des risques liés au chocolat";

    require_once "views/front/articles/chocolat.view.php";
}

function getContact(){

    $title = "Contact";
    $description = "C'est la page des contacts";

    require_once "views/front/contact/contact.view.php";
}

function getDon(){

    $title = "Les dons";
    $description = "C'est la page des dons";

    require_once "views/front/contact/don.view.php";
}

function getMentions(){

    $title = "Les mentions";
    $description = "C'est la page des mentions légales";

    require_once "views/front/contact/mentions.view.php";
}

function getNouvelles(){

    $title = "Les nouvelles";
    $description = "C'est la page des des nouvelles des adoptés";

    require_once "views/front/actus/nouvelles.view.php";
}
