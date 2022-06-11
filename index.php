<?php

require_once "controllers/frontend.controller.php";
try{

    if (isset($_GET['page']) && !empty($_GET['page'])) {
        switch ($_GET['page']) {
            case 'accueil': 
                getPageAccueil();
                break;
            case 'pensionnaire':
                getPagePensionnaire();
                break;
            case 'partenaires':
                getPagePartenaires();        
                break;
            case 'association':
                getPageAssociation();        
                break;   
            case 'temperatures':
                getPageTemperatures();        
                break;   
            case 'plantes':
                getPagePlantes();        
                break;   
            case 'sterilisation':
                getPageSterilisation();        
                break; 
            case 'educateur':
                getPageEducateur();        
                break;      
            case 'chocolat':
                getPageChocolat();        
                break;      
            case 'contact':
                getPageContact();        
                break;      
            case 'don':
                getPageDon();        
                break;      
            case 'mentions':
                getPageMentions();        
                break;      
            case 'nouvelles':
                getPageNouvelles();        
                break;
            case 'animal':
                getPageAnimal();        
                break; 
            default:
                throw new Exception("Page introuvable");
                break;
            }          
        }else{
            getPageAccueil();
       }
} catch (Exception $e) {
    $title = "Erreur";
    $description = "C'est la page de gestion des erreur";
    $errorMessage = $e->getMessage();
    require "views/commons/erreur.view.php";
}



    



