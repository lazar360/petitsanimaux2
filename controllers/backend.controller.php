<?php
require_once "public/utile/formatage.php";
require_once "public/utile/gestionImage.php";
require_once "models/animal.dao.php";
require_once "models/actualite.dao.php";
require_once "models/admin.dao.php";
require_once "config/config.php";
require_once "controllers/frontend.controller.php";
require_once "config/Securite.class.php";

function getPageLogin(){

    $title = "Page de login du site";
    $description = "Page de login";
    $alert ="";
    
    if(Securite::verificationAccess()){
      header("Location: admin");   
    }

    
    if(isset($_POST['login']) && !empty($_POST['login']) && isset($_POST['password']) && !empty($_POST['password'])){
      $login = Securite::secureHTML($_POST['login']);
      $password = Securite::secureHTML($_POST['password']);
 
      if(isConnexionValid($login, $password)){
        $_SESSION['access'] = "admin";
        Securite::genereCookiePassword();
        header("Location: admin");
      } else {

        $alert = "Mot de passe invalide !";
        
      }
    }

    require_once "views/back/login.view.php";

}

function getPageAdmin(){
  if (isset($_POST['deconnexion']) && $_POST['deconnexion'] === "true"){
      session_destroy();
      header("Location: accueil");
  }

  if(Securite::verificationAccess()){
    Securite::genereCookiePassword();
    $title = "Page admin du site";
    $description = "Page admin";
    
    require_once "views/back/adminAccueil.view.php";

  } else {
    throw new Exception("Vous n'avez pas le droit d'accéder à cette page !");
  }
}

function getPagePensionnaireAdmin(){

  if(Securite::verificationAccess()){
    Securite::genereCookiePassword();
    $title = "Page de gestion des pensionnaires";
    $description = "Page de gestion des pensionnaires";
    
    require_once "views/back/adminPensionnaire.view.php";

  } else {
    throw new Exception("Vous n'avez pas le droit d'accéder à cette page !");
  }

}

function getPageNewsAdmin($require ="", $alert="",$alertType="", $data=""){
    
  if(Securite::verificationAccess()){
      Securite::genereCookiePassword();
      $title = "Page de gestion des news";
      $description = "Page de gestion des news";

      $typeActualites = getTypesActualite();

      $contentAdminAction="";
      if($require !=="") require_once $require;
      require_once "views/back/adminNews.view.php";
  } else {
      throw new Exception("Vous n'avez pas le droit d'accéder à cette page");
  }
}

function getPageNewsAdminAjout(){
  $alert = "" ;
  $alertType="";
  if(isset($_POST['titreActu']) && !empty($_POST['titreActu']) &&
  isset($_POST['typeActu']) && !empty($_POST['typeActu']) &&
  isset($_POST['contenuActu']) && !empty($_POST['contenuActu'])
  ) {
      $alertType = 0;
      $titreActu = Securite::secureHTML($_POST['titreActu']);
      $typeActu = Securite::secureHTML($_POST['typeActu']);
      $contenuActu = Securite::secureHTML($_POST['contenuActu']);
      $fileImage = $_FILES['imageActu'];
      $repertoire = "public/sources/images/sites/news/";
      $date = date("Y-m-d H:i:s", time());
      try{
          $nomImage = ajoutImage($fileImage, $repertoire, $titreActu);
          $idImage=insertImageNewsIntoBD($nomImage, "news/".$nomImage);

          if(insertActualiteIntoBD($titreActu,$typeActu,$contenuActu,$date,$idImage)){
              $alert = "La création de l'actualité est effectuée";
              $alertType = ALERT_SUCCESS;
          } else {
             throw new Exception("L'insertion en BD n'a pas fonctionné");
          }
      } catch(Exception $e){
          $alert = "La création de l'actualité na pas fonctionnée <br />". $e->getMessage();
          $alertType = ALERT_DANGER;
      }
  }
  getPageNewsAdmin("views/back/adminNewsAjout.view.php",$alert,$alertType);
}

function getPageNewsAdminModif(){
  $alert = "" ;
  $alertType="";
  $data = [];
  if (isset($_POST['etape']) 
  && !empty($_POST['typeActu']) 
  && (int)$_POST['etape']>=2){
      $typeActu = Securite::secureHTML($_POST['typeActu']);
      $data['actualites'] = getActualitesFromBD($typeActu); //Attention je n'ai pas suivi le tuto ici ; j'envoie un string du type de l'actu et pas un int 
    } 

    if (isset($_POST['etape']) 
   // && !empty($_POST['typeActu']) 
    && (int)$_POST['etape']>=3){

        $actualite = Securite::secureHTML($_POST['actualites']);
        $data['actualite'] = getActualiteFromBD($actualite); //Attention je n'ai pas suivi le tuto ici ; j'envoie un string du type de l'actu et pas un int 
 
      } 
    
    if (isset($_POST['etape'])  
    && (int)$_POST['etape']>=4){
      //print_r($data['actualites']); exit();
      //print_r($data['actualites'][0]); exit();

      $titreActu = Securite::secureHTML($_POST['titreActu']);
      $typeActu = Securite::secureHTML($_POST['typeActu']);
      $contenuActu = Securite::secureHTML($_POST['contenuActu']);
      $idImage = $data['actualites'][0]['id_image'];
      $idActualite = $data['actualites'][0]['id_actualite'];
      
      try{
        // A compléter :
        if($_FILES['imageActu']['size'] > 0) {
          $fileImage = $_FILES['imageActu'];
          $repertoire = "public/sources/images/sites/news/";
          $nomImage = ajoutImage($fileImage, $repertoire, $titreActu);
          $idImage=insertImageNewsIntoBD($nomImage, "news/".$nomImage);
        }
        
        if(updateActualiteIntoBD($idActualite, $titreActu,$typeActu,$contenuActu,$idImage)){
            $alert = "La modification de l'actualité est effectuée";
            $alertType = ALERT_SUCCESS;
        } else {
           throw new Exception("La modification en BD n'a pas fonctionné");
        }
    } catch(Exception $e){
        $alert = "La modification de l'actualité na pas fonctionnée <br />". $e->getMessage();
        $alertType = ALERT_DANGER;
    }

    $data['actualite'] = getActualiteFromBD($actualite);
    $data['actualites'] = getActualitesFromBD($typeActu);
    }
  
  getPageNewsAdmin("views/back/adminNewsModif.view.php", $alert, $alertType, $data); 
}

function getPageNewsAdminSup(){
  $alert = "";
  $alertType = "";
  
  if(isset($_GET['sup'])){
    try{
      deleteActuFromBD(Securite::secureHTML($_GET['sup']));
        $alert = "La suppression de l'actualité a  fonctionné";
        $alertType = ALERT_SUCCESS;

    } catch(exception $e){
        $alert = "La suppression de l'actualité n'a pas fonctionné";
        $alertType = ALERT_DANGER;
    }
  }
  getPageNewsAdmin("", $alert, $alertType); 
}
