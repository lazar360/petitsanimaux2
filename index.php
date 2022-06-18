<?php

require_once "controllers/frontend.controller.php";
require_once "config/Securite.class.php";
try{

    if (isset($_GET['page']) && !empty($_GET['page'])) {
        $page = Securite::secureHTML($_GET['page']); 
        
        switch ($page) {
            
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
            case 'actus':
                getPageActus();        
                break;
            case 'animal':
                getPageAnimal();        
                break; 
            case 'error301':   
            case 'error302':         
            case 'error400':
            case 'error402':
            case 'error405':
            case 'error500':
            case 'error505':
                throw new Exception("Erreur de type : ". $page);
                break;
            case 'error403':
                throw new Exception("Accès refusé : Erreur 403");
                break; 
            case 'error404': 
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



    



