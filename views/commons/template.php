

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/jpg" href="public/sources/images/Autres/logoNANA2.jpg"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link href="<?= URL ?>public/css/main.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Copse&family=Fredoka+One&display=swap" rel="stylesheet">
    <meta name="description" content="<?= $description ?>">
    <title><?= $title ?></title>
</head>

<body>
    <!-- Site Header -->
    <div class="container p-0 mt-2 rounded perso_shadow">
        <header class="bg-dark text-white rounded-top perso_policeTitre">
            <div class="row align-items-center m-0">
                <div class="col-2 p-2 text-center">
                    <a href="<?= URL ?>accueil" class="text-white">
                        <img src="<?= URL ?>public/sources/images/Autres/logoNANA2.jpg" alt="logo" class="rounded-circle img-fluid perso_logoSize" />
                    </a>
                </div>
                <div class="col-6 col-lg-8 m-0 p-0">
                    <?php include 'views/commons/menu.php'; ?>
                </div>

                <div class="col-4 col-lg-2 text-right pt-1 pr-4 ">
                   <a href="login" class="nav-link text-white text-center"> N.A.N.A <br> Clermont (09)</a>
                </div>
            </div>
        </header>

        <!-- Site Content -->
        <div class="border p-1 perso_minCorpSize px-5">

            <?= $content ?>

        </div>
    </div>

    <!-- Site footer -->
    <footer class="bg-dark text-center text-white rounded-bottom perso_shadow" style="margin-top: 105px;">
        <div class="p-2">&copy; Sur modèle Udemy / Matthieu GASTON <?php echo date("Y"); ?> </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
</body>

</html>