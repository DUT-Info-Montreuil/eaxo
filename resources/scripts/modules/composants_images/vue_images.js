


//Initialisation des variables
var dossiers = new listeDossiers();
var Images = new listeImages();
var niveauAfficher = -1;
var selectionner = null;

//Recuperation de la BD
recuperrerDossiers();

$('DOMContentLoaded', function() {
    ajouterEvents();
});

function ajouterEvents(){
    $("#Dossier_Back").click(function (){
        dossiers.afficherPrecedent();
    });
    $("#Dossier_Back").mouseenter(function (){
        if($("#Dossier_Back").css("opacity") == 1) {
            $("#Dossier_Back").css("width", "45px");
            $("#Dossier_Back").css("height", "45px");
            $("#Dossier_Back").css("background-color", "#F8C471");
        }
    });
    $("#Dossier_Back").mouseleave(function (){
        $("#Dossier_Back").css("width", "40px");
        $("#Dossier_Back").css("height", "40px");
        $("#Dossier_Back").css("background-color", "unset");
    });

    $("#Dossier_Home").click(function (){
        dossiers.afficher(0);
    });
    $("#Dossier_Home").mouseenter(function (){
        if($("#Dossier_Home").css("opacity") == 1) {
            $("#Dossier_Home").css("width", "45px");
            $("#Dossier_Home").css("height", "45px");
            $("#Dossier_Home").css("background-color", "#F8C471");
        }
    });
    $("#Dossier_Home").mouseleave(function (){
        $("#Dossier_Home").css("width", "40px");
        $("#Dossier_Home").css("height", "40px");
        $("#Dossier_Home").css("background-color", "unset");
    });

    $("#Dossier_Add_Folder").click(function (){
        ajouterDossierAPI_Dossier("Default");
    });
    $("#Dossier_Add_Folder").mouseenter(function (){
        if($("#Dossier_Add_Folder").css("opacity") == 1) {
            $("#Dossier_Add_Folder").css("width", "45px");
            $("#Dossier_Add_Folder").css("height", "45px");
            $("#Dossier_Add_Folder").css("background-color", "#F8C471");
        }
    });
    $("#Dossier_Add_Folder").mouseleave(function (){
        $("#Dossier_Add_Folder").css("width", "40px");
        $("#Dossier_Add_Folder").css("height", "40px");
        $("#Dossier_Add_Folder").css("background-color", "unset");
    });

    $("#Dossier_Add_Picture_Input").change(function (){
        toBase64($("#Dossier_Add_Picture_Input").get(0).files[0]);
    });

    $("#Dossier_Add_Picture").click(function (){
        $("#Dossier_Add_Picture_Input").click();
    });

    $("#Dossier_Add_Picture").mouseenter(function (){
        if($("#Dossier_Add_Picture").css("opacity") == 1) {
            $("#Dossier_Add_Picture").css("width", "45px");
            $("#Dossier_Add_Picture").css("height", "45px");
            $("#Dossier_Add_Picture").css("background-color", "#F8C471");
        }
    });
    $("#Dossier_Add_Picture").mouseleave(function (){
        $("#Dossier_Add_Picture").css("width", "40px");
        $("#Dossier_Add_Picture").css("height", "40px");
        $("#Dossier_Add_Picture").css("background-color", "unset");
    });

    $("#Dossier_rename_Div").mouseenter(function (){
        $("#Dossier_rename_text").css("font-size", 15);
        $("#Dossier_rename").css("width", 20);
        $("#Dossier_rename").css("height", 20);
    });
    $("#Dossier_rename_Div").mouseleave(function (){
        $("#Dossier_rename_text").css("font-size", 12);
        $("#Dossier_rename").css("width", 15);
        $("#Dossier_rename").css("height", 15);
    })

    $("#Dossier_download_Div").mouseenter(function (){
        $("#Dossier_download_text").css("font-size", 14);
        $("#Dossier_download").css("width", 20);
        $("#Dossier_download").css("height", 20);
    });
    $("#Dossier_download_Div").mouseleave(function (){
        $("#Dossier_download_text").css("font-size", 12);
        $("#Dossier_download").css("width", 15);
        $("#Dossier_download").css("height", 15);
    });

    $("#Dossier_delete_Div").mouseenter(function (){
        $("#Dossier_delete_text").css("font-size", 14);
        $("#Dossier_delete").css("width", 20);
        $("#Dossier_delete").css("height", 20);
    });
    $("#Dossier_delete_Div").mouseleave(function (){
        $("#Dossier_delete_text").css("font-size", 12);
        $("#Dossier_delete").css("height", 15);
        $("#Dossier_delete").css("width", 15);
    })

    $("#Dossier_Contextuel_Menu").mouseleave(function (){
        $("#Dossier_Contextuel_Menu").css("display", "none");
    });

    $("#ouvertureVolet").click(function(){
        dossiers.afficher(0);
    });
}

function ajouterImageAPI_Images(image, nom) {
    $.ajax({
        type: "POST",
        url: "./api/controleur_requetes_bd.php?module=images&action=addImage",
        //processData: false,
        data: {folderParent:niveauAfficher, pName:nom, Img64:image},
        dataType: "json"
    }).done(function(retour){
        if(retour)
            dossiers.afficher(niveauAfficher);
        else
            alert("Erreur lors de l'insertion de l'image");
    });
}

function ajouterDossierAPI_Dossier(nom){
    $.ajax({
        type: "POST",
        url: "./api/controleur_requetes_bd.php?module=dossiers&action=addFolder",
        //processData: false,
        data: {folderParent:niveauAfficher, pName:nom},
        dataType: "json"
    }).done(function(retour){
        if(retour){
            dossiers.add(new Dossier(retour['id'], nom, niveauAfficher));
            dossiers.filtrer(dossier => dossier.id == retour['id'])[0].afficher();
        }
        else
            alert("Erreur lors de l'insertion de l'image");
    });
}

function toBase64(image){
    if(false){
        console.log("haa ba l'image est incorecte");
        return null;
    }
    var fichier = new FileReader();
    fichier.readAsDataURL(image);
    fichier.onload = () => ajouterImageAPI_Images(fichier.result, image.name.slice(0, (image.name.length-image.name.lastIndexOf("."))));
}


function actualiserChemin(niveau){
    var chemin = "";
    var dossier;
    if(niveau != 0) {
        while (niveau != 0) {
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
        url: "./api/controleur_requetes_bd.php?module=dossiers&action=getArchitecture",
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
    if(id == 0) {
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
    this.imageEncoder = img;
    this.vue = "<div id='image_" + this.id + "' class='divImageApiImages' class='divContenu'> <img id='vueImage_" + this.id + "'class='vueImageApiImages' src='" + this.imageEncoder + "'/> <p id='titre_Images_" + this.id + "' class='titreImages'>" + this.nom + "</p> </div>";
    this.afficher = function (){
        $("#image_" + this.id).css("display", "block");
    }
    this.cacher = function (){
        $("#image_" + this.id).css("display", "none");
    }
    this.detruire = function (){
        $("#image_" + this.id).remove();
    }
    this.toString = function (){
        console.log("Affichage du dossier " + this.id + "\nnom: " + this.nom + "\nparent: " + this.parent + "\n");
    }

    $("#divImagesHome").append(this.vue);
    $("#image_" + this.id).click(function (){
        if(selectionner != "#image_" + id)
            selection("#image_" + id);
        else
            return;
    })

    $("#image_" + this.id).mouseenter(function (){
        $("#titre_Images_" + id).css("font-weight", "600");
        if($("#image_" + id).css("border") != "1px solid rgb(153, 209, 255)"){
            $("#vueImage_" + id).css("height", "97");
            $("#vueImage_" + id).css("width", "100");
            $("#vueImage_" + id).css("margin-left", "10px");
            $("#vueImage_" + id).css("border-radius", "10px");
            $("#image_" + id).css("background-color", "#e5f3ff");
        }
    });
    $("#image_" + this.id).mouseleave(function (){
        $("#titre_Images_" + id).css("font-weight", "normal");
        $("#vueImage_" + id).css("height", "67");
        $("#vueImage_" + id).css("width", "70");
        $("#vueImage_" + id).css("margin-left", "25px");
        $("#vueImage_" + id).css("border-radius", "20px");
        if($("#image_" + id).css("border") != "1px solid rgb(153, 209, 255)"){
            $("#image_" + id).css("background-color", "unset");
        }
    });

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
        niveauAfficher = niveau;
        recuperrerImages(niveau);
        var dossierFiltrer = this.filtrer(dossier => dossier.parent == niveau);
        for (var dossier of dossierFiltrer) {
            dossier.afficher();
        }
        actualiserCommandes(niveau);
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

function selection(id){
        if(selectionner != null){
            $(selectionner).css("border", "none");
            $(selectionner).css("background-color", "unset");
        }
        $(id).css("border", "1px solid");
        $(id).css("border-color", "#99d1ff");
        $(id).css("background-color", "#cce8ff");
        $(id).mouseleave();
        selectionner = id;
}

function Dossier(id, nom, parent){
    this.id = id;
    this.nom = nom;
    this.parent = parent;
    this.vue = "<div id='dossier_" + this.id + "' class='divDossierApiImages' class='divContenu'> <img id ='vueDossier_" + this.id + "' class='vueDossierApiImages' src=\"resources/images/api_images/dossier.png\"/> <p id='titre_Dossier_" + this.id + "' class='titreDossiers'>" + this.nom + "</p> </div>";
    this.afficher = function (){
        $("#dossier_" + this.id).css("display", "block");
    }
    this.cacher = function (){
        $("#dossier_" + this.id).css("display", "none");
    }
    this.toString = function (){
        console.log("Affichage du dossier " + this.id + "\nnom: " + this.nom + "\nparent: " + this.parent + "\n");
    }
    $("#divImagesHome").append(this.vue);
    this.cacher();
    $("#dossier_" + this.id).click(function (){
        if(selectionner != "#dossier_" + id)
            selection("#dossier_" + id);
        else
            dossiers.afficher(id);
    });
    $("#dossier_" + this.id).contextmenu(function (event){
        selection("#dossier_" + id);
        $("#Dossier_Contextuel_Menu").css("top", $("#dossier_" + id).css("top"));
        $("#Dossier_Contextuel_Menu").css("left", $("#dossier_" + id).css("left"));
        $("#Dossier_Contextuel_Menu").css("display", "block");

        $("#Dossier_Contextuel_Menu").mouseleave(function (){
            $("#dossier_" + id).mouseleave();
        });
        return false;
    });
    $("#dossier_" + this.id).mouseenter(function (){
        $("#titre_Dossier_" + id).css("font-weight", "600");
        if($("#dossier_" + id).css("border") != "1px solid rgb(153, 209, 255)"){
            $("#dossier_" + id).css("background-color", "#e5f3ff");//#EBF5FB
            //$("#vueDossier_" + id).css("height", "97");
            //$("#vueDossier_" + id).css("width", "90");
            //$("#titre_Dossier_" + id).css("color", "#AF7AC5");
            //$("#vueDossier_" + id).css("margin-left", "15px");
        }

    });
    $("#dossier_" + this.id).mouseleave(function (){
        //$("#vueDossier_" + id).css("height", "67");
        //$("#vueDossier_" + id).css("margin-left", "25px");
        $("#titre_Dossier_" + id).css("font-weight", "normal");
        //$("#titre_Dossier_" + id).css("color", "black");
        if($("#dossier_" + id).css("border") != "1px solid rgb(153, 209, 255)"){
            $("#dossier_" + id).css("background-color", "unset");
        }

    });

}



