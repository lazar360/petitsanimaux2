<?php include("../Commons/header.php");
echo (styleTitreNiveau1("Ils ont besoin de vous !", COLOR_ASSO));
?>

<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active bg-dark"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1" class="bg-dark"></li>
    <!-- <li data-target="#carouselExampleIndicators" data-slide-to="2" class="bg-dark"></li> -->
  </ol>

  <div class="carousel-inner">
    <!-- Début d'un item -->
    <div class="carousel-item active">
      <div class="row no-gutters border rounded overflow-hidden mb-4 perso_bgRose">
        <div class="col-12 col-md-auto text-center">
          <img src="../../sources/images/Animaux/chat/framboise/framboise.jpg" style="height: 250px;" alt="Photo de Framboise">
        </div>
        <div class="col-12 col-md">
          <div class="col p-4 d-flex flex-column position-static">
            <h3 class="mb-0 perso_policeTitre perso_ColorRoseMenu perso_textShadow">Framboise</h3>
            <div class="text-muted mb-1">02/2019</div>
            <p class="perso_policeTexte" style="margin-bottom: 70px;">
              Description de Framboise
            </p>
            <a href="#" class="btn btn-primary">Visiter ma page</a>

          </div>
        </div>
      </div>
    </div>
    <!-- Fin d'un item -->

    <!-- Début d'un item -->
    <div class="carousel-item">
      <div class="row no-gutters border rounded overflow-hidden mb-4 perso_bgRose">
        <div class="col-12 col-md-auto text-center">
          <img src="../../sources/images/animaux/chat/framboise/framboise.jpg" style="height: 250px;" alt="Photo de Framboise">
        </div>
        <div class="col-12 col-md">
          <div class="col p-4 d-flex flex-column position-static">
            <h3 class="mb-0 perso_policeTitre perso_ColorRoseMenu perso_textShadow">Framboise</h3>
            <div>02/2019</div>
            <p class="perso_policeTexte" style="margin-bottom: 70px;">
              Description de Framboise
            </p>
            <a href="#" class="btn btn-primary">Visiter ma page</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Fin d'un item -->
  </div>
</div>

<div class="row">
  <div class="col-6 mt-3">
    <?php
    $txt = "<img src='../../sources/images/Autres/icones/journal.png' alt='logo news'/> Nouvelles des adoptés";
    echo (styleTitreNiveau2($txt, COLOR_ACTUS));
    ?>
  </div>

  <div class="col-6 mt-3">
    <?php
    $txt = "<img src='../../sources/images/Autres/icones/action.png' alt='logo news' />Evènements et actions
    ";
    echo (styleTitreNiveau2($txt, COLOR_PENSIONNAIRE));
    ?>

  </div>
</div>

<div class="row">
  <div class="col-6">
    <div class="row no-gutters border rounded mb-4">
      <div class="col-auto d-none d-lg-block">
        <img src="../../sources/images/Animaux/chat/framboise/framboise.jpg" style="height: 170px;" alt="photo de framboise" />
      </div>
      <div class="col p-3 d-flex flex-column position-static perso_bgGreen">
        <h3 class="mb-0 mb-0 perso_policeTitre perso_ColorVertMenu perso_textShadow">Doyenne Chipie</h3>
        <p class="perso_size12  mt-2">
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit saepe quidem ipsam repudiandae culpa cumque doloremque, modi quam magni corporis sed, voluptatibus nihil eveniet ad perspiciatis asperiores, hic vero molestias!
        </p>
        <a href="#" class="btn btn-primary">Visiter ma page</a>
      </div>
    </div>
  </div>

  <div class="col-6">
    <div class="row no-gutters border rounded mb-4">
      <div class="col-auto d-none d-lg-block">
        <img src="../../sources/images/Animaux/chat/framboise/framboise.jpg" style="height: 170px;" alt="photo de framboise" />
      </div>
      <div class="col p-3 d-flex flex-column position-static perso_bgOrange">
        <h3 class="mb-0 mb-0 perso_policeTitre perso_ColorOrangeMenu perso_textShadow">Doyenne Chipie</h3>
        <p class="perso_size12 mt-2">
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit saepe quidem ipsam repudiandae culpa cumque doloremque, modi quam magni corporis sed, voluptatibus nihil eveniet ad perspiciatis asperiores, hic vero molestias!
        </p>
        <a href="#" class="btn btn-primary">Visiter ma page</a>
      </div>
    </div>

  </div>
</div>

<?php include("../Commons/footer.php") ?>