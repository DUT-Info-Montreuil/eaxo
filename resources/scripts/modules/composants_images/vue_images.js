


//Initialisation des variables
var dossiers = new listeDossiers();
var Images = new listeImages();
var niveauAfficher = -1;

//Recuperation de la BD
recuperrerDossiers();

$('DOMContentLoaded', function() {

    $("#Dossier_Back").click(function (){
        dossiers.afficherPrecedent();
    });

    $("#Dossier_Home").click(function (){
        dossiers.afficher(null);
    });

    $("#ouvertureVolet").click(function(){
        dossiers.afficher(null);
        });


});

function actualiserChemin(niveau){
    var chemin = "";
    var dossier;
    if(niveau != null) {
        while (niveau != null) {
            dossier = dossiers.getElementById(niveau);
            chemin = "/" + dossier.nom + chemin;
            niveau = dossier.parent;
        }
        $("#Dossiers_Chemin").text("Chemin: " + chemin);
    }else{
        $("#Dossiers_Chemin").text("Chemin: /");
    }
}

function recuperrerDossiers(){

    $.ajax({
        type: "POST",
        url: "./api/controleur_requetes_bd.php?module=dossiers&action=architecture",
        data: {},
        dataType: "json"
    }).done(function(retour) {
        console.log("Fin de recuperation des dossier\n");
        indexerDossiers(retour);
    });
}

function recuperrerImages(parent){
    Images.detruire();
    $.ajax({
        type: "POST",
        url: "./api/controleur_requetes_bd.php?module=images&action=getImages",
        //processData: false,
        data: {folderParent: parent},
        dataType: "json"
    }).done(function(retour) {
        console.log("Fin de récupération des images du niveau " + parent + ".");
        indexerImages(retour);
    });
}

function indexerDossiers(images){
    for (var racineElement of images) {
        dossiers.add(new Dossier(racineElement["id"], racineElement["pName"], racineElement["folderParent"]));
    }
}

function indexerImages(resultat){
    Images = new listeImages();
    for (var resultatElement of resultat) {
        Images.add(new Image(resultatElement["id"], resultatElement["pName"], resultatElement["folderParent"], resultatElement["Img64"]));
    }
}

function actualiserCommandes(id){
    actualiserChemin(id);
    if(id == null) {
        $("#Dossier_Back").css("opacity", 0.3);
        $("#Dossier_Back").css("background-color", "#F4F4F4");

        $("#Dossier_Home").css("opacity", 0.3);
        $("#Dossier_Home").css("background-color", "#F4F4F4");
    }
    else {
        $("#Dossier_Back").css("opacity", 1);
        $("#Dossier_Back").css("background-color", "unset");

        $("#Dossier_Home").css("opacity", 1);
        $("#Dossier_Home").css("background-color", "unset");
    }
    //#EBF5FB
}

function listeImages(){
    this.Images = new Array();
    this.add = function (image){
        this.Images.push(image);
    }
    this.cacher = function (){
        if (niveauAfficher != -1) {
            for (var img of this.Images) {
                img.cacher();
            }
        }
    }
     this.detruire = function (){
        this.cacher();
        for (var img of this.Images) {
            img.detruire();
        }
     }
}
function Image(id, nom, parent, img){
    this.id = id;
    this.nom = nom;
    this.parent = parent;
    this.vueId =  "image_" + this.id;
    this.imageEncoder = img;
    this.vue = "<div id='" + this.vueId + "' class='divImageApiImages' class='divContenu'> <img class='vueImageApiImages' src='data:image/jpeg;base64," + this.imageEncoder + "'/> <p class='titreImages'>" + this.nom + "</p> </div>";
    this.afficher = function (){
        $("#" + this.vueId).css("display", "block");
    }
    this.cacher = function (){
        $("#" + this.vueId).css("display", "none");
    }
    this.detruire = function (){
        $("#" + this.vueId).remove();
    }
    this.toString = function (){
        console.log("Affichage du dossier " + this.id + "\nnom: " + this.nom + "\nparent: " + this.parent + "\n");
    }

    $("#divImagesHome").append(this.vue);
}

function listeDossiers(){
    this.dossiers = new Array();
    this.add = function (dossier){
        this.dossiers.push(dossier);
    }
    this.get = function (numero){
        return this.dossiers.at(numero);
    }
    this.getElementById = function (id){
      var dossier = this.filtrer(dossier => dossier.id == id);
      if(dossier.length != 1)
          return null;
      return dossier[0];
    }
    this.remove = function (numero){
        this.dossiers.splice(0, numero);
    }
    this.filtrer = function (filtre){
        return this.dossiers.filter(filtre);
    }
    this.afficher = function (niveau){
        this.cacher();
        recuperrerImages(niveau);
        var dossierFiltrer = this.filtrer(dossier => dossier.parent == niveau);
        for (var dossier of dossierFiltrer) {
            dossier.afficher();
        }
        actualiserCommandes(niveau);
        niveauAfficher = niveau;
    }
    this.afficherPrecedent = function (){
        var dossier = this.filtrer(y => y.id == niveauAfficher);
        if(dossier.length != 1){
            console.log("Impossible de retrouver le dossier ...");
            return;
        }
        var id = dossier[0].parent;
        this.afficher(id);
        actualiserCommandes(id);
    };
    this.cacher = function (){
        if (niveauAfficher != -1) {
            var dossierFiltrer = this.filtrer(t => t.parent == niveauAfficher);
            for (var dossier of dossierFiltrer) {
                dossier.cacher();
            }
        }
    }
}

function Dossier(id, nom, parent){
    this.id = id;
    this.nom = nom;
    this.parent = parent;
    this.vue = "<div id='dossier_" + this.id + "' class='divDossierApiImages' class='divContenu'> <img id ='vueDossier_" + this.id + "' class='vueDossierApiImages' src=\"resources/images/api_images/dossier.png\"/> <p class='titreDossiers'>" + this.nom + "</p> </div>";
    this.vueId =  "#dossier_" + this.id;
    this.afficher = function (){
        $(this.vueId).css("display", "block");
    }
    this.cacher = function (){
        $(this.vueId).css("display", "none");
    }
    this.toString = function (){
        console.log("Affichage du dossier " + this.id + "\nnom: " + this.nom + "\nparent: " + this.parent + "\n");
    }
    $("#divImagesHome").append(this.vue);
    this.cacher();
    $("#dossier_" + this.id).click(function (){
        dossiers.afficher(id);
    });
    $("#dossier_" + this.id).mouseenter(function (){
        //console.log("fucus in");
       //$("#vueDossier_" + id).css("height", "97");
       //$("#vueDossier_" + id).css("width", "90");
    });
    $("#dossier_" + this.id).mouseout(function (){
        //console.log("mouse out");
        //$("#vueDossier_" + id).css("height", "67");
        //$("#vueDossier_" + id).css("width", "70");
    });

}


