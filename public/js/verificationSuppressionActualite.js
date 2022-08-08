var btnSup= document.querySelector("#btnSup");

btnSup.addEventListener("click", function(){
    event.preventDefault();
    var idActualite = document.getElementById("idActualite").value;
    var libelleActualite = document.querySelector("#titreActu").value;

    if(confirm("Voulez-vous confirmer la suppression de l'actualité " + idActualite +" - "+libelleActualite+" ? ")){
        document.location.href = "genererNewsAdminSup&sup="+idActualite;
    }
});