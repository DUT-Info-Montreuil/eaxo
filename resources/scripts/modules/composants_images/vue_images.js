


//Initialisation des variables
var dossiers = new listeDossiers();
var listeImages;

//Recuperation de la BD
recuperrerDossiers();
recuperrerImages();



$('DOMContentLoaded', function() {

    $("#Dossier_Back").click(function (){
        dossiers.afficherPrecedent();
    });

    $("#ouvertureVolet").click(function(){
        dossiers.afficher(null);
        });


});

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

function indexerDossiers(dossierIMG){
    for (var racineElement of dossierIMG) {
        dossiers.add(new Dossier(racineElement["id"], racineElement["pName"], racineElement["folderParent"]));
    }
}

function actualiserBoutonBack(id){
    if(id == null)
        $("#Dossier_Back").css("opacity", 0.3);
    else
        $("#Dossier_Back").css("opacity", 1);
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
        console.log("Affichons le niveau " + niveau + "\n");
        console.log(dossierFiltrer);
        for (var dossier of dossierFiltrer) {
            dossier.afficher();
        }
        this.niveauAfficher = niveau;
        actualiserBoutonBack(this.niveauAfficher);
    }
    this.afficherPrecedent = function (){
        var id = this.filtrer(y => y.parent == this.niveauAfficher).id;
        this.afficher(id);
        this.actualiserBoutonBack(id);
    };
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
    this.vue = "<div id='dossier_" + this.id + "' class='divDossierApiImages'> <img class='vueDossierApiImages' src= \"resources/images/api_images/dossier.png\"/> <p class='titreDossiers'>" + this.nom + "</p> </div>";
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
    console.log("creation du dossier avec id = " + this.id);
    $(this.vueId).click(function (){
        console.log("Click sur id = " + this.id.substr(8));
        dossiers.afficher(this.id.substr(8));
    });
}


