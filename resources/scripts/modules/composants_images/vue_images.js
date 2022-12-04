


//variables BD
var dossierIMG;
recuperrerDossiers();
var listeImages;
recuperrerImages();

var dossierObj = new listeDossiers();


//variables affichage



$('DOMContentLoaded', function() {

    $("#ouvertureVolet").click(function(){
        afficherDossier(null);
        });


});

function afficherDossier(racine){
    //console.log(dossierObj.filtrer(g => g.parent == null));
    dossierObj.afficher(racine);
}

function recuperrerDossiers(){
    $.ajax({
        type: "POST",
        url: "./api/controleur_requetes_bd.php?module=dossiers&action=architecture",
        data: {},
        dataType: "json"
    }).done(function(retour) {
        console.log("Fin de recuperation des dossier\n");
        dossierIMG = retour;
        indexerDossiers();
    });
}

function recuperrerImages(){
    $.ajax({
        type: "POST",
        url: "./api/controleur_requetes_bd.php?module=images&action=images",
        data: {},
        dataType: "json"
    }).done(function(retour) {
        listeImages = retour;
    });
}

function indexerDossiers(){
    for (var racineElement of dossierIMG) {
        dossierObj.add(new Dossier(racineElement["id"], racineElement["pName"], racineElement["folderParent"]));
    }
}

function listeDossiers(){
    this.dossiers = new Array();
    this.niveauAfficher = -1;
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
        var dossierFiltrer = this.filtrer(dossier => dossier.parent == niveau);
        for (var dossier of dossierFiltrer) {
            console.log("Affichon le niveau " + niveau + " :" + dossierFiltrer + "\n");
            dossier.afficher();
        }
        this.niveauAfficher = niveau;
    }
    this.cacher = function (){
        if (this.niveauAfficher != -1) {
            var dossierFiltrer = this.filtrer(t => t.parent == this.niveauAfficher);
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
    this.vue = "<div id='dossier_'" + this.id + " class='divDossierApiImages'> <img class='vueDossierApiImages' src= \"resources/images/api_images/dossier.png\"/> <p class='titreDossiers'>" + this.nom + "</p> </div>";
    this.afficher = function (){
        var idBaliseVue = "dossier_" + this.id;
        $.idBaliseVue.css("display", "block");
    }
    this.cacher = function (){
        var idBaliseVue = "dossier_"+this.id;
        idBaliseVue.style.setProperty("display", "none");
    }
    this.toString = function (){
        console.log("Affichage du dossier " + this.id + "\nnom: " + this.nom + "\nparent: " + this.parent + "\n");
    }


    $("#divImagesHome").append(this.vue);
    this.cacher();

}


