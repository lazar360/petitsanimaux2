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
          Asso
        </a>
        <div class="dropdown-menu " aria-labelledby="navbarDropdown">
          <a class="dropdown-item perso_ColorRoseMenu" href="<?= URL ?>association">Qui sommes-nous ?</a>
          <a class="dropdown-item perso_ColorRoseMenu" href="<?= URL ?>partenaires">Partenaires</a>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle perso_ColorOrangeMenu" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
          Pensionnaires
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item perso_ColorOrangeMenu" href="<?= URL ?>pensionnaire&idstatut=<?=ID_STATUT_A_L_ADOPTION ?>">Ils cherchent une famille</a>
          <a class="dropdown-item perso_ColorOrangeMenu" href="<?= URL ?>pensionnaire&idstatut=<?=ID_STATUT_FALD ?>">Famille d'accueil longue durée</a>
          <a class="dropdown-item perso_ColorOrangeMenu" href="<?= URL ?>pensionnaire&idstatut=<?=ID_STATUT_ADOPTE ?>">Les anciens</a>
          <?php if(isset($_SESSION['access']) && !empty($_SESSION['access'])) :?>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item perso_ColorVertMenu" href="<?= URL ?>genererPensionnaireAdmin">Gestion des pensionnaires</a>
          <?php endif ?>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle perso_ColorVertMenu" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
          Actus
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <a class="dropdown-item perso_ColorVertMenu" href="<?= URL ?>actus&type=<?= TYPE_NEWS ?>">Nouvelles des adoptés</a>
        <a class="dropdown-item perso_ColorVertMenu" href="<?= URL ?>actus&type=<?= TYPE_EVENTS ?>">Evènements</a>
        <a class="dropdown-item perso_ColorVertMenu" href="<?= URL ?>actus&type=<?= TYPE_ACTIONS ?>">Nos actions au quotidien</a>
        
        <?php if(isset($_SESSION['access']) && !empty($_SESSION['access'])) :?>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item perso_ColorOrangeMenu" href="<?= URL ?>genererNewsAdmin">Gestion des News</a>
        <?php endif ?>

      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle perso_ColorRougeMenu" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
          Conseils
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item perso_ColorRougeMenu" href="<?= URL ?>temperatures">Températures</a>
          <a class="dropdown-item perso_ColorRougeMenu" href="<?= URL ?>chocolat">Le Chocolat</a>
          <a class="dropdown-item perso_ColorRougeMenu" href="<?= URL ?>plantes">Les plantes toxiques</a>
          <a class="dropdown-item perso_ColorRougeMenu" href="<?= URL ?>sterilisation">Stérilisation</a>
          <a class="dropdown-item perso_ColorRougeMenu" href="<?= URL ?>educateur">Educateur canin</a>

      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle perso_ColorBleuMenu" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
          Contacts
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item perso_ColorBleuMenu" href="<?= URL ?>contact">Contact</a>
          <a class="dropdown-item perso_ColorBleuMenu" href="<?= URL ?>don">Dons</a>
          <a class="dropdown-item perso_ColorBleuMenu" href="<?= URL ?>mentions">Mentions Légales</a>
      </li>

    
    </ul>
  </div>
</nav>