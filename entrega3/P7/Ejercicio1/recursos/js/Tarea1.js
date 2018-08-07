$(document).ready(function(){
    $("#ocultar").click(function(){
        $('body > :not(#mostrar)').hide();
    });

    $("#mostrar").click(function () {
        $('body').find(":hidden").show();
    })
});