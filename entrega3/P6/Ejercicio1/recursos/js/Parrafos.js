document.write("<p></p>");

var info = [cabecera.curso, cabecera.nombreEstudiante, cabecera.email];
for(var x in info){
    document.write("<p>" + info[x] + "</p>")
}