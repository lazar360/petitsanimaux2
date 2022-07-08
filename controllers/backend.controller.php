<?php
require_once "public/utile/formatage.php";
require_once "models/animal.dao.php";
require_once "models/actualite.dao.php";
require_once "models/admin.dao.php";
require_once "config/config.php";
require_once "controllers/frontend.controller.php";
require_once "config/Securite.class.php";

function getPageLogin(){

    $title = "Page de login du site";
    $description = "Page de login";

    if(Securite::verificationAccess()){
      header("Location: admin");   
    }

    $alert ="";
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

function getPageNewsAdmin(){
  $alert ="";
  if(isset($_POST['titreActu']) && !empty($_POST['titreActu'])
  && isset($_POST['contenuActu']) && !empty($_POST['contenuActu'])
  ){

    $titreActu = Securite::secureHTML($_POST['titreActu']);
    $typeActu = Securite::secureHTML($_POST['typeActu']);
    $contenuActu = Securite::secureHTML($_POST['contenuActu']);
    $dateActu = date("Y-m-d H:i:s", time());
    if(insertActualiteIntoBD($titreActu, $typeActu, $contenuActu, $dateActu, 1)){
      $alert = "La création de l'actualité est effectuée";
    } else {
      $alert = "Il y a une erreur";
    }
  }
  
  
  if(Securite::verificationAccess()){
    Securite::genereCookiePassword();
    $title = "Page de gestion des news";
    $description = "Page de gestion des news";
    
    $typeActualites = getTypesActualite();

    require_once "views/back/adminNews.view.php";

  } else {
    throw new Exception("Vous n'avez pas le droit d'accéder à cette page !");
  }

}


