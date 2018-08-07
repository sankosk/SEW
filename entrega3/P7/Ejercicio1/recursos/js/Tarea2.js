$(document).ready(function(){
    $("#modificar").click(function(){
        ['p', 'h1', 'h2', 'h3', 'h4', 'li'].forEach(function (e) {
            $('body').find(e).each(function () {
                $(this).text("Se ha modificado la etiqueta: " + e)
            })
        })

    });
});