
var dossierIMG;
var images;

$('DOMContentLoaded', function() {
    $("#ouvertureVolet").click(function(){
        dossierIMG = recuperrerDossiers();
        images = recuperrerImages();
    });

    function recuperrerDossiers(){
        $.ajax({
            type: "POST",
            url: "./api/controleur_requetes_bd.php?module=dossiers&action=architecture",
            data: {},
            dataType: "json"
        }).done(function(retour) {
            return retour;
            //for (var testElement of retour) {
            //    console.log(testElement["pName"]+"\n");
            //}
        });
    }

    function recuperrerImages(){
        $.ajax({
            type: "POST",
            url: "./api/controleur_requetes_bd.php?module=images&action=images",
            data: {},
            dataType: "json"
        }).done(function(retour) {
            return retour;
            //for (var testElement of retour) {
            //    console.log(testElement["pName"]+"\n");
            //}
        });
    }

});
