


//Initialisation des variables
var dossiers = new listeDossiers();
var Images = new listeImages();
var niveauAfficher = -1;
var selectionner = null;
var ajoutImage = false;

//Recuperation de la BD
recuperrerDossiers();

$('DOMContentLoaded', function() {
    ajouterEvents();
});

function ajouterEvents(){
    $("#Dossier_Back").click(function (){
        if($("#Dossier_Back").css("opacity") != "0.3")
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
        if($("#Dossier_Home").css("opacity") != "0.3")
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
        if(ajoutImage) {
            ajoutImage = false;
            toBase64($("#Dossier_Add_Picture_Input").get(0).files[0]);
        }
    });

    $("#Dossier_Add_Picture").click(function (){
        ajoutImage = true;
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

function supprimerDossiersAPI_Dossier(id){
    var idTemps = id;
    var doss = new Array();
    var i = 0;

    doss.push(dossiers.filtrer(dossiers => dossiers.parent == idTemps));

    while(doss[i++].length > 0){
      idTemps = doss.at(doss.length-1)[0].id;
      doss.push(dossiers.filtrer(dossiers => dossiers.parent == idTemps));
    }

    for (var doss1 of doss) {
        for (var doss2 of doss1) {
            dossiers.remove(doss2.id);
            supprimerDossierAPI_Dossier(doss2.id);
        }
    }
    dossiers.remove(id);
    supprimerDossierAPI_Dossier(id);
};

//function

function supprimerDossierAPI_Dossier(id){
    $.ajax({
        type: "POST",
        url: "./api/controleur_requetes_bd.php?module=dossiers&action=delFolder",
        data: {id: id},
        dataType: "json"
    }).done(function(retour) {
        if (retour){
            //
        }
        else
            console.log("erreur de suppresion");
    });
}

function supprimerImageAPI_Image(id){
    $.ajax({
        type: "POST",
        url: "./api/controleur_requetes_bd.php?module=images&action=delImage",
        data: {id: id},
        dataType: "json"
    }).done(function(retour) {
        if (retour){
            //
        }
        else
            console.log("erreur de suppresion");
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
    fichier.onerror = error => reject(error);
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

function renomerDossierAPI_Images(id, nom){
    $.ajax({
        type: "POST",
        url: "./api/controleur_requetes_bd.php?module=dossiers&action=rename",
        //processData: false,
        data: {id: id, nom: nom},
        dataType: "json"
    }).done(function(retour) {
        if(retour)
            dossiers.filtrer(t => t.id == id)[0].renomer(nom);
    });
}

function renomerImageAPI_Images(id, nom){
    $.ajax({
        type: "POST",
        url: "./api/controleur_requetes_bd.php?module=images&action=rename",
        //processData: false,
        data: {id: id, nom: nom},
        dataType: "json"
    }).done(function(retour) {
        if(retour)
            Images.filtrer(t => t.id == id)[0].renomer(nom);
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
    this.filtrer = function (filtre){
        return this.Images.filter(filtre);
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
function Image(id, nom, parent, img) {
    this.id = id;
    this.nom = nom;
    this.parent = parent;
    this.imageEncoder = img;
    this.vue = "<div id='image_" + this.id + "' class='divImageApiImages' class='divContenu'> <img id='vueImage_" + this.id + "'class='vueImageApiImages' src='" + this.imageEncoder + "'/> <p id='titre_Images_" + this.id + "' class='titreImages'>" + this.nom + "</p> <input id='renomer_Image_" + this.id + "' class='renomer' type='text' placeholder='" + this.nom + "' required minlength='1' maxlength='55' size='10'> </div>";
    this.afficher = function () {
        $("#image_" + this.id).css("display", "block");
    }
    this.renomer = function (nom) {
        this.nom = nom;
        $("#titre_Images_" + id).text(nom);
    }
    this.cacher = function () {
        $("#image_" + this.id).css("display", "none");
    }
    this.detruire = function () {
        $("#image_" + this.id).remove();
    }
    this.toString = function () {
        console.log("Affichage du dossier " + this.id + "\nnom: " + this.nom + "\nparent: " + this.parent + "\n");
    }

    $("#divImagesHome").append(this.vue);

    $("#image_" + this.id).click(function () {
        if (selectionner != "#image_" + id)
            selection("#image_" + id);
        else
            return;
    });
    $("#image_" + this.id).contextmenu(function (event) {
        selection("#image_" + id);
        var x = event.clientX;
        var y = event.clientY;
        console.log("X=" + event.clientX + ", Y=" + event.clientY);
        $("#Dossier_Contextuel_Menu").css("display", "block");
        $("#Dossier_Contextuel_Menu").css("top", y - 93);
        $("#Dossier_Contextuel_Menu").css("left", x - 702);

        $("#Dossier_delete_Div").click(function () {
            $("#image_" + id).css("display", "none");
            $("#Dossier_Contextuel_Menu").mouseleave();
            $("#image_" + id).remove();
            supprimerImageAPI_Image(id);
        });
        $("#Dossier_download_Div").click(function () {
            console.log("nous devons telecharger");
        });
        $("#Dossier_rename_Div").click(function () {
            $("#Dossier_Contextuel_Menu").mouseleave();
            $("#renomer_Image_" + id).css("display", "block");
            $("#renomer_Image_" + id).focus();
            $("#titre_Images_" + id).css("display", "none");
            $("#renomer_Image_" + id).focusout(function () {
                $("#renomer_Image_" + id).text("");
                $("#renomer_Image_" + id).css("display", "none");
                $("#titre_Images_" + id).css("display", "block");
                $("#renomer_Image_" + id).off();

            });
            $("#renomer_Image_"+id).keyup(function(e){
                if (e.keyCode == 13){
                    $("#renomer_Image_"+id).css("display", "none");
                    $("#titre_Images_" + id).css("display", "block");
                    $("#renomer_Image_"+id).off();
                    console.log("inséron le nom: "+$("#renomer_Image_"+id).val()+" dans la BD");
                    renomerImageAPI_Images(id, $("#renomer_Image_"+id).val());
                }
            });
        });

        $("#Dossier_Contextuel_Menu").mouseleave(function () {
            $("#Dossier_Contextuel_Menu").css("display", "none");
            $("#image_" + id).mouseleave();
            $("#Dossier_Contextuel_Menu").off();
        });
        return false;
    });
    $("#image_" + this.id).mouseenter(function () {
        $("#titre_Images_" + id).css("font-weight", "600");
        if ($("#image_" + id).css("border") != "1px solid rgb(153, 209, 255)") {
            $("#vueImage_" + id).css("height", "97");
            $("#vueImage_" + id).css("width", "100");
            $("#vueImage_" + id).css("margin-left", "10px");
            $("#vueImage_" + id).css("border-radius", "10px");
            $("#image_" + id).css("background-color", "#e5f3ff");
        }
    });
    $("#image_" + this.id).mouseleave(function () {
        $("#titre_Images_" + id).css("font-weight", "normal");
        $("#vueImage_" + id).css("height", "67");
        $("#vueImage_" + id).css("width", "70");
        $("#vueImage_" + id).css("margin-left", "25px");
        $("#vueImage_" + id).css("border-radius", "20px");
        if ($("#image_" + id).css("border") != "1px solid rgb(153, 209, 255)") {
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
    this.removeByIndex = function (position){
        this.dossiers.splice(position, 1);
    }
    this.getElementById = function (id){
      var dossier = this.filtrer(dossier => dossier.id == id);
      if(dossier.length != 1)
          return null;
      return dossier[0];
    }
    this.remove = function (id){
        var dossier;
        for (var i=0; i<this.dossiers.length; i++) {
            dossier = this.get(i);
            if(dossier.id == id){
                this.removeByIndex(i);
                dossier.cacher();
                dossier.detruire();
            }
        }
    };
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
            console.log("Impossible de retrouver le dossier précédent ... ");
            return;
        }
        var id = dossier[0].parent;
        this.afficher(id);
    };
    this.cacher = function (){
        if (niveauAfficher != -1) {
            var dossierFiltrer = this.filtrer(t => t.parent == niveauAfficher);
            for (var dossier of dossierFiltrer) {
                dossier.cacher();
            }
        }else {
            console.log("le niveau actuelle n'est pas encore définit");
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
    this.vue = "<div id='dossier_" + this.id + "' class='divDossierApiImages' class='divContenu'> <img id ='vueDossier_" + this.id + "' class='vueDossierApiImages' src=\"resources/images/api_images/dossier.png\"/> <p id='titre_Dossier_" + this.id + "' class='titreDossiers'>" + this.nom + "</p> <input id='renomer_Dossier_" + this.id + "' class='renomer' type='text' placeholder='" + this.nom + "' required minlength='1' maxlength='55' size='10'> </div>";
    this.afficher = function (){
        $("#dossier_" + this.id).css("display", "block");
    }
    this.renomer = function (nom){
        this.nom = nom;
        $("#titre_Dossier_"+id).text(nom);
    }
    this.cacher = function (){
        $("#dossier_" + this.id).css("display", "none");
    }
    this.detruire = function (){
        $("#dossier_" + this.id).off();
        $("#dossier_" + this.id).remove();
    }
    this.toString = function (){
        console.log("Affichage du dossier " + this.id + "\nnom: " + this.nom + "\nparent: " + this.parent + "\n");
    }
    $("#divImagesHome").append(this.vue);
    this.cacher();
    $("#dossier_" + this.id).click(function (){
        if($("#titre_Dossier_" + id).css("display") != "none")
            if(selectionner != "#dossier_" + id)
                selection("#dossier_" + id);
            else
                dossiers.afficher(id);
    });
    $("#dossier_" + this.id).contextmenu(function (event){
        selection("#dossier_" + id);
        var x = event.clientX;
        var y = event.clientY;
        console.log("X=" + event.clientX + ", Y=" + event.clientY);
        $("#Dossier_Contextuel_Menu").css("display", "block");
        $("#Dossier_Contextuel_Menu").css("top", y-93);
        $("#Dossier_Contextuel_Menu").css("left", x-702);

        $("#Dossier_delete_Div").click(function (){
            $("#Dossier_Contextuel_Menu").mouseleave();
            $("#dossier_" + id).css("display", "none");
            $("#dossier_" + id).remove();
            supprimerDossiersAPI_Dossier(id);
        });
        $("#Dossier_download_Div").click(function (){
            console.log("nous devons telecharger");
        });
        $("#Dossier_rename_Div").click(function (){
            $("#Dossier_Contextuel_Menu").mouseleave();
            $("#renomer_Dossier_"+id).css("display", "block");
            $("#renomer_Dossier_"+id).focus();
            $("#titre_Dossier_" + id).css("display", "none");
            $("#renomer_Dossier_"+id).focusout(function (){
                $("#renomer_Dossier_"+id).text("");
                $("#renomer_Dossier_"+id).css("display", "none");
                $("#titre_Dossier_" + id).css("display", "block");
                $("#renomer_Dossier_"+id).off();
            });
            $("#renomer_Dossier_"+id).keyup(function(e){
                if (e.keyCode == 13){
                    $("#renomer_Dossier_"+id).css("display", "none");
                    $("#titre_Dossier_" + id).css("display", "block");
                    $("#renomer_Dossier_"+id).off();
                    console.log("inséron le nom: "+$("#renomer_Dossier_"+id).val()+" dans la BD");
                    renomerDossierAPI_Images(id, $("#renomer_Dossier_"+id).val());
                }
            });

            console.log("renomon le");
        });

        $("#Dossier_Contextuel_Menu").mouseleave(function (){
            $("#Dossier_Contextuel_Menu").css("display", "none");
            $("#Dossier_Contextuel_Menu").off();
        });
        return false;
    });
    $("#dossier_" + this.id).mouseenter(function (){
        $("#titre_Dossier_" + id).css("font-weight", "600");
        if($("#dossier_" + id).css("border") != "1px solid rgb(153, 209, 255)"){
            $("#dossier_" + id).css("background-color", "#e5f3ff");//#EBF5FB
        }

    });
    $("#dossier_" + this.id).mouseleave(function (){
        $("#titre_Dossier_" + id).css("font-weight", "normal");
        //$("#Dossier_Contextuel_Menu").mouseleave();
        if($("#dossier_" + id).css("border") != "1px solid rgb(153, 209, 255)"){
            $("#dossier_" + id).css("background-color", "unset");
        }
        //$("#Dossier_Contextuel_Menu").off();

    });

}




