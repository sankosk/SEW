document.write("<p>El nombre del código     : " + navigator.appCodeName + "</p>");
document.write("<p>La versión del navegador : " + navigator.appVersion + "</p>");
document.write("<p>Está Java activo         : " + navigator.javaEnabled() + "</p>");
document.write("<p>Cookies activas          : " + navigator.cookieEnabled + "</p>");
document.write("<p>Plataforma               : " + navigator.platform + "</p>");
document.write("<p>Número de plugins        : " + navigator.plugins.length + "</p>");

for (i=0; i<navigator.plugins.length;i++)
    document.write("<p>Plugin["+i+"]= "+navigator.plugins[i].name+"</p>");

document.write("<p>UserAgent                : " + navigator.userAgent + "</p>");
document.write("<p>Vendedor                 : " + navigator.vendor + "</p>");
document.write("<p>On Line                  : " + navigator.onLine + "</p>");
document.write("<p>Product                  : " + navigator.product + "</p>");