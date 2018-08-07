$(document).ready(function(){
    $("#añadir").click(function(){
        $('body').append(document.getElementById('toadd').value)
    });
    $("#añadirLista").click(function(){
        var li = "<li>" + document.getElementById('textoLista').value+ "</li>";
        $('body').append("<ul>");
        for(var i=0; i<parseInt(document.getElementById('n').value); i++)
            $('body').append(li);

        $('body').append("</ul>");

    });

});