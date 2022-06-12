<?php 
require_once"config/config.php";
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark perso_size20">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle perso_ColorRoseMenu" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
          L'asso
        </a>
        <div class="dropdown-menu " aria-labelledby="navbarDropdown">
          <a class="dropdown-item perso_ColorRoseMenu" href="association">Qui sommes-nous ?</a>
          <a class="dropdown-item perso_ColorRoseMenu" href="partenaires">Partenaires</a>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle perso_ColorOrangeMenu" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
          Pensionnaires
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item perso_ColorOrangeMenu" href="pensionnaire&idstatut=<?=ID_STATUT_A_L_ADOPTION ?>">Ils cherchent une famille</a>
          <a class="dropdown-item perso_ColorOrangeMenu" href="pensionnaire&idstatut=<?=ID_STATUT_FALD ?>">Famille d'accueil longue durée</a>
          <a class="dropdown-item perso_ColorOrangeMenu" href="pensionnaire&idstatut=<?=ID_STATUT_ADOPTE ?>">Les anciens</a>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle perso_ColorVertMenu" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
          Actus
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <a class="dropdown-item perso_ColorVertMenu" href="nouvelles">Nouvelles des adoptés</a>
        <!--<a class="dropdown-item perso_ColorVertMenu" href="#">Evènements</a>
        <a class="dropdown-item perso_ColorVertMenu" href="../Global/actus.php">Nos actions au quotidien</a>-->
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle perso_ColorRougeMenu" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
          Conseils
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item perso_ColorRougeMenu" href="temperatures">Températures</a>
          <a class="dropdown-item perso_ColorRougeMenu" href="chocolat">Le Chocolat</a>
          <a class="dropdown-item perso_ColorRougeMenu" href="plantes">Les plantes toxiques</a>
          <a class="dropdown-item perso_ColorRougeMenu" href="sterilisation">Stérilisation</a>
          <a class="dropdown-item perso_ColorRougeMenu" href="educateur">Educateur canin</a>

      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle perso_ColorBleuMenu" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
          Contacts
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item perso_ColorBleuMenu" href="contact">Contact</a>
          <a class="dropdown-item perso_ColorBleuMenu" href="don">Dons</a>
          <a class="dropdown-item perso_ColorBleuMenu" href="mentions">Mentions Légales</a>
      </li>

    
    </ul>
  </div>
</nav>