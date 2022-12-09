


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

function zoomer(){

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

function actualiserBoutonBack(id){
    if(id == null)
        $("#Dossier_Back").css("opacity", 0.3);
    else
        $("#Dossier_Back").css("opacity", 1);
}

function listeImages(){
    this.Images = new Array();
    this.add = function (image){
        this.Images.push(image);
    }
    this.afficher = function (niveau){
        var dossierFiltrer = this.filtrer(dossier => dossier.parent == niveau);
        for (var dossier of dossierFiltrer) {
            dossier.afficher();
        }
        niveauAfficher = niveau;
        actualiserBoutonBack(niveauAfficher);
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
    //this.cacher();
}

function listeDossiers(){
    this.dossiers = new Array();
    this.add = function (dossier){
        this.dossiers.push(dossier);
    }
    this.get = function (numero){
        return this.dossiers.at(numero);
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
        actualiserBoutonBack(niveau);
        if(niveau != null)
            $("#Dossier_Home").css("opacity", 1);
        else
            $("#Dossier_Home").css("opacity", 0.3);
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
        actualiserBoutonBack(id);
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
    this.vue = "<div id='dossier_" + this.id + "' class='divDossierApiImages' class='divContenu'> <img class='vueDossierApiImages' src=\"resources/images/api_images/dossier.png\"/> <p class='titreDossiers'>" + this.nom + "</p> </div>";
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
    $(this.vueId).click(function (){
        dossiers.afficher(id);
    });
    $(this.vueId).mouseenter(function (){
        console.log("fucus in");
       $(this.vueId).css("zoom", "1.6");
    });
    $(this.vueId).mouseout(function (){
        $(this.vueId).css("zoom", "1");
    });

}


