
var id;
var nom;
var parent;
var images;
var vue;

function Dossier(numero, Dossiers){
    id = Dossiers[numero]["id"];
    nom = Dossiers[numero]["pName"];
    parent = Dossiers[numero]["folderParent"];
    vue = "<div id=" + id + " class='divDossierApiImages'> <img class='vueDossierApiImages' src= \"resources/images/api_images/dossier.png\"/> <p class='titreDossiers'>" + nom + "</p> </div>";
    //cacher();
    $("#divImagesHome").append(vue);
}

function afficher(){
    $("#" + id).css("display", "block");
}

function cacher(){
    $("#" + id).css("display", "none");
}

function entrer(){

}