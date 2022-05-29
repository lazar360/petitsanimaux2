<?php include("../Commons/header.php"); ?>

<?= styleTitreNiveau3("Suivez-nous :", COLOR_CONTACT);?>
<p class="pl-5">
    <a href="https://www.facebook.com/nosamisnosanimaux/" target=_blank><img src="../../sources/images/Autres/icones/facebook.png" width="30px" alt="Facebook"/></a>
    Suivez-nous sur facebook et participez à l'aventure de Nos Amis Nos Animaux : 
    <a href="https://www.facebook.com/nosamisnosanimaux/" target=_blank><span class="badge badge-pill badge-primary">Notre facebook</span></a>
</p>

<?= styleTitreNiveau3("Contactez-nous :", COLOR_CONTACT) ?>
<div class="pl-5">
    <p>
        <img src="../../sources/images/Autres/icones/courrier.png" width="30px" alt="courrier"/>
        Par courrier : Hameau de la Souleille - 09420 Clermont, Midi-Pyrenees, France
    </p>
    <p>
        <img src="../../sources/images/Autres/icones/mail.png" width="30px" alt="mail"/>
        Par mail : <a href="mailto:associationnosamisnosanimaux@gmail.com">associationnosamisnosanimaux@gmail.com</a>
    </p>
    <p>
        <img src="../../sources/images/Autres/icones/tel.png" width="30px" alt="tel"/>
        Par téléphone : 06 10 59 94 71
    </p>
    <p>
        <span class="badge badge-pill badge-danger">Ou</span> par notre <span class="badge badge-pill badge-warning">formulaire</span> de contact :
    </p>
</div>

<?= styleTitreNiveau3("Formulaire de contact :", COLOR_CONTACT) ?>
<form method="POST" action="#" class="pl-5">
    <div class="form-group row no-gutters align-items-center">
        <label for="nom" class="col-auto pr-3 pt-1">Nom :</label>
        <input type="text" name="nom" id="nom" placeholder="nom" class="form-control col">
    </div>

    <div class="form-group row no-gutters align-items-center">
        <label for="mail" class="col-auto pr-3 pt-1">Email :</label>
        <input type="email" name="mail" id="mail" placeholder="nom@exemple.com" class="form-control col" required>
    </div>

    <div class="form-group row no-gutters align-items-center">
        <label for="objet" class="col-auto pr-3 pt-1">Objet :</label>
        <select class="form-control col" id="objet" name="objet">
            <option value="question">Question</option>
            <option value="Adoption">Adoption</option>
            <option value="Don">Don</option>
        </select>
    </div>

    <div class="form-group">
    <label for="message">Message :</label>
    <textarea class="form-control" name="message" id="message" cols="30" rows="3" required></textarea>
    </div>


    <div class="form-group row no-gutters align-items-center">
    <label for="message" class="col-auto pr-3 pt-1">Combien font 3 + 5 ?</label>
    <input type="number" name="captcha" id="captcha" class="form-control col">
    </div>

<input type="submit" class="btn btn-primary mx-auto d-block" value="Valider">
</form>

<?php 
if(isset($_POST["nom"]) && !empty($_POST["nom"])
&& isset($_POST["mail"]) && !empty($_POST["mail"])
&& isset($_POST["objet"]) && !empty($_POST["objet"])
&& isset($_POST["message"]) && !empty($_POST["message"])
&& isset($_POST["captcha"]) && !empty($_POST["captcha"])){

    $captcha = (int)$_POST["captcha"];
    if ($captcha == 8) {
        $nom = htmlentities($_POST["nom"]);
        $mail = htmlentities($_POST["mail"]);
        $objet = htmlentities($_POST["objet"]);
        $message = htmlentities($_POST["message"]);
        $destinataire = "associationnosamisnosanimaux@gmail.com";
        mail($destinataire, $objet, $message, "From: $nom <$mail>");
        echo "<div class='alert alert-success'>Votre message a bien été envoyé !</div>";
    } else {
        echo("<div class='alert alert-danger mt=2' role='alert'>Erreur ! Le captcha est incorrect.</div>");
    }
} 

?>

<?php include("../Commons/footer.php") ?>