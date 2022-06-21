<?php
ob_start();

echo (styleTitreNiveau1("Ils ont besoin de vous !", COLOR_ASSO));
?>

<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <?php for ($i = 0; $i < count($animaux); $i++) : ?>
      <li data-target="#carouselExampleIndicators" data-slide-to="<?= $i ?>" class="<?php echo ($i === 0) ? "active" : "" ?>active bg-dark"></li>
    <?php endfor; ?>
  </ol>
  <!-- Partie caroussel de la page (tout en haut) -->
  <div class="carousel-inner">
    <?php foreach ($animaux as $key => $animal) : ?>
      <div class="carousel-item <?php echo ($key === 0) ? "active" : "" ?> ">
        <div class="row no-gutters border rounded overflow-hidden mb-4 <?= ($animal['sexe']) ? 'perso_bgBleu' : 'perso_bgRose' ?>">
          <div class="col-12 col-md-auto text-center">
            <img src="<?= URL ?>public/sources/images/sites/<?= $animal['image']['url_image'] ?>" style="height: 250px;" alt="<?= $animal['image']['libelle_image'] ?>">
          </div>
          <div class="col-12 col-md">
            <div class="col p-4 d-flex flex-column position-static">
              <h3 class="mb-0 perso_policeTitre <?= ($animal['sexe']) ? 'perso_ColorBleuMenu' : 'perso_ColorRoseMenu' ?> perso_textShadow"><?= $animal['nom_animal'] ?></h3>
              <div class="text-muted mb-1"><?= date("d/m/Y", strtotime($animal['date_naissance_animal'])) ?></div>
              <p class="perso_policeTexte" style="margin-bottom: 70px;">
                  <?= $animal['description_animal']  ?>
              </p>
              <a href="animal&idAnimal=<?= $animal['id_animal'] ?>" class="btn btn-primary">Visiter ma page</a>
            </div>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>

<div class="row">
  <div class="col-6 mt-3">
    <?php
    $txt = "<img src='public/sources/images/Autres/icones/journal.png' alt='logo news'/> Nouvelles des adoptés";
    echo (styleTitreNiveau2($txt, COLOR_ACTUS));
    ?>
  </div>

  <div class="col-6 mt-3">
    <?php
    $txt = "<img src='public/sources/images/Autres/icones/action.png' alt='logo news' />Evènements et actions
    ";
    echo (styleTitreNiveau2($txt, COLOR_PENSIONNAIRE));
    ?>

  </div>
</div>

<div class="row">
  <!-- Partie en bas à gauche : rappel des actus -->
  <div class="col-6">
    <div class="row no-gutters border rounded mb-4">
      <div class="col-auto d-none d-lg-block">
        <img src="<?= URL ?>public/sources/images/sites/<?= $news['url_image'] ?>" style="height: 170px;" alt="<?= $news['libelle_image'] ?>" />
      </div>
      <div class="col p-3 d-flex flex-column position-static perso_bgGreen">
        <h3 class="mb-0 mb-0 perso_policeTitre perso_ColorVertMenu perso_textShadow"><?= $news['libelle_actualite'] ?></h3>
        <p class="perso_size12  mt-2">
            <?= $news['contenu_actualite'] ?>
        </p>
        <a href="<?= URL ?>actus&type=<?= TYPE_NEWS ?>" class="btn btn-primary">Voir les nouvelles des adoptés</a>
      </div>
    </div>
  </div>

  <!-- Partie en bas à droite Partie actions et évènements -->
  
  <div class="col-6">
    <div class="row no-gutters border rounded mb-4">
      <div class="col-auto d-none d-lg-block">
        <img src="<?= URL ?>public/sources/images/sites/<?= $actions['url_image'] ?>" style="height: 170px;" alt="<?= $actions['libelle_image'] ?>" />
      </div>
      <div class="col p-3 d-flex flex-column position-static perso_bgOrange">
        <h3 class="mb-0 mb-0 perso_policeTitre perso_ColorOrangeMenu perso_textShadow"><?=$actions['libelle_actualite'] ?></h3>
        <p class="perso_size12 mt-2">
            <?= $actions['contenu_actualite'] ?>
        </p>
        <span class="text-center">
        <a href="<?= URL ?>actus&type=<?= TYPE_EVENTS ?>" class="btn btn-primary">Les évènements</a>
        <a href="<?= URL ?>actus&type=<?= TYPE_ACTIONS ?>" class="btn btn-primary">Les actions</a>
        </span>
      </div>
    </div>

  </div>
</div>

<?php
$content = ob_get_clean();
require "views/commons/template.php"
?>