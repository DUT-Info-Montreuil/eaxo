
$('DOMContentLoaded', function() {
    $("#bouton_send").attr("disabled", true)
    var marginInscriptionDiv = $("#formulaire-saisie-inscription").css("margin-left");


    $("#motDePasse1").change(function (){
        verifierForceMotPasse();
    });
    $("#motDePasse1").keyup(function (){
        verifierForceMotPasse();
    });
    $("#motDePasse1").focusin(function (){
        verifierForceMotPasse();
        $("#forceMotPasseMinimal").css("display", "block");
        $("#formulaire-saisie-inscription").css("margin-left", "50px");
    });
    $("#motDePasse1").focusout(function (){
        if(verifierForceMotPasse()) {
            $("#forceMotPasseMinimal").css("display", "none");
            $("#formulaire-saisie-inscription").css("margin-left", marginInscriptionDiv);
            verrifierMotDePasseEgalSaisie1();
        }
    });

    $("#motDePasse2").focusout(function (){
        verrifierMotDePasseEgal();});

    $("#username").focusout(function(){
        verifierUtilisateurExistePas();
    });

    $("#email").focusout(function (){
        verifierMailExiste();
    })

    function verrifierMotDePasseEgalSaisie1() {
        if($("#motDePasse2").val() != ""){
            verrifierMotDePasseEgal();
        }
    }
    function verrifierMotDePasseEgal() {

        if ($("#motDePasse1").val() != $("#motDePasse2").val()) {
            desactiverBoutonInscription();
            $("#motDePassentCorrespondentPas").css('display', 'contents');
        }
        else{
            activerBoutonInscription();
            $('#motDePassentCorrespondentPas').css('display', 'none');
        }
        

    }
    function verifierForceMotPasse(){
        var parfait = true;
        //Taille
        if($("#motDePasse1").val().length >= 8){
            $("#characteresMDP").css("color", "green");
        }else{
            $("#characteresMDP").css("color", "red");
            parfait = false;
        }

        //Majuscule
        if(/^(?=.*[A-Z])/.test($("#motDePasse1").val())){
            $("#MajusculeMDP").css("color", "green");
        }else{
            $("#MajusculeMDP").css("color", "red");
            parfait = false;
        }

        //Minuscule
        if(/^(?=.*[a-z])/.test($("#motDePasse1").val())){
            $("#MinusculeMDP").css("color", "green");
        }else{
            $("#MinusculeMDP").css("color", "red");
            parfait = false;
        }

        //Chiffre
        if(/^(?=.*\d)/.test($("#motDePasse1").val())){
            $("#chifreMDP").css("color", "green");
        }else{
            $("#chifreMDP").css("color", "red");
            parfait = false;
        }

        //Charactere Special
        if(/^(?=.*[\$@%*+\-_!])/.test($("#motDePasse1").val())){
            $("#CharactereMDP").css("color", "green");
        }else{
            $("#CharactereMDP").css("color", "red");
            parfait = false;
        }

        if(parfait) {
            $("#bouton_send").attr("disabled", false)
        } else {
            $("#bouton_send").attr("disabled", true)

        }

        return parfait;
    }

    function verifierUtilisateurExistePas(){
        if($("#username").val() != "") {
            $.ajax({
                type: "POST",
                url: "./api/controleur_requetes_bd.php?module=connection&action=verifUtilisateurExiste",
                data: {username: $("#username").val()},
                dataType: "json"
            }).done(function(retour) {
                if (retour['username'] != "") {
                    desactiverBoutonInscription();
                    $("#UsernamePris").css("display", "block");
                }else {
                    activerBoutonInscription();
                    $("#UsernamePris").css("display", "none");
                }
            });
        }
    }

    function activerBoutonInscription(){
        $("#bouton_send_incription").enabled;
        $("#bouton_send_incription").css("opacity", "1");
    }

    function desactiverBoutonInscription() {
        $("#bouton_send_incription").disabled;
        $("#bouton_send_incription").css("opacity", "0.5");
    }

    function verifierMailExiste(){
        if($("#email").val() != "") {
            $.ajax({
                type: "POST",
                url: "./api/controleur_requetes_bd.php?module=connection&action=verifMailExiste",
                data: {mail: $("#email").val()},
                dataType: "json"
            }).done(function(retour) {
                if (retour['mail'] != "") {
                    desactiverBoutonInscription();
                    $("#eMailUtiliser").css("display", "block");
                }else{
                    activerBoutonInscription();
                    $("#eMailUtiliser").css("display", "none");
                }
            });
        }
    }
});

/*
Version 1.0 - 23/01/2023
GNU General Public License v3.0 2022-2032 
Initiated by SANTOS Philippe, FAURE Grégoire & OURZIK Kamel
*/