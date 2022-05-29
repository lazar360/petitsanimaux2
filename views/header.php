<?php require_once"../../utile/formatage.php"; ?>
<?php require_once"../../utile/config.php"; ?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
  <link href="../../css/main.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Copse&family=Fredoka+One&display=swap" rel="stylesheet">
  <title>Les Petits Animaux</title>
</head>

<body>
  <!-- Site Header -->
  <div class="container p-0 mt-2 rounded perso_shadow">
    <header class="bg-dark text-white rounded-top perso_policeTitre">
      <div class="row align-items-center m-0">
        <div class="col-2 p-2 text-center">
          <a href="../Global/index.php" class="text-white">
            <img src="../../sources/images/Autres/logoNANA2.jpg" alt="logo" class="rounded-circle img-fluid perso_logoSize" />
          </a>
        </div>
        <div class="col-6 col-lg-8 m-0 p-0">
          <?php include '../Commons/menu.php'; ?>
        </div>

        <div class="col-4 col-lg-2 text-right pt-1 pr-4 ">
          N.A.N.A <br> Clermont (09)
        </div>
      </div>
    </header>

    <!-- Site Content -->
    <div class="border p-1 perso_minCorpSize px-5">