
$('DOMContentLoaded', function() {

    var colorBoutonInscription = $("#bouton_send_incription").css("background-color");

    $("#motDePasse2").focusout(function (){verrifierMotDePasseEgal();});
    $("#motDePasse1").focusout(function (){verrifierMotDePasseEgalSaisie1();});

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

    function activerBoutonInscription(){
        $("#bouton_send_incription").enabled;
        $("#bouton_send_incription").css("background-color", colorBoutonInscription);
        $("#bouton_send_incription").css("opacity", "1");
    }

    function desactiverBoutonInscription() {
        $("#bouton_send_incription").disabled;
        $("#bouton_send_incription").css("background-color", "grey");
        $("#bouton_send_incription").css("opacity", "0.5");
    }

});