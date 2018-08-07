<?php
  error_reporting(0); // Si estamos en producción, hacer un display de errores nos expone a ataques (File Path Include)

  require("moduloArchivo.php");
  $archivo = htmlentities(trim($_POST['archivo']));

  $html = '
  <!DOCTYPE html>
  <html lang="es">
  <head>
      <meta charset="UTF-8">
      <title>Ejercicio 1</title>
      <link rel="stylesheet" type="text/css" href="recursos/css/formulario.css"/>
      <link href="https://fonts.googleapis.com/css?family=Arimo" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css?family=Quicksand:300,400" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css?family=Raleway:300,400" rel="stylesheet">
  </head>
  <body>

    <header>
      <h1>%s</h1>
      <hr>
    </header>

    <form action="guardarOEliminar.php" method="post">
      <input type="hidden" name="archivo" value="%s"/>
      <label>Contenido del fichero:</label>
      <textarea name="contenidoFichero">%s</textarea>
      <input name="guardar" type="submit" value="Guardar"/>
      <input name="eliminar" type="submit" value="Eliminar"/>
    </form>

    %s

    <form action="formListarFicheros.php">
      <input type="submit" value="Volver al listado de ficheros"/>
    </form>

    <footer id="detalles">
      <p>&copy; Esteban Montes Morales - 2017</p>
    </footer>

  </body>
  </html>
  ';

  $contenido = new ArchivoTexto("files/" . $archivo);

  if(isset($_POST['guardadoCorrecto'])){
    echo sprintf($html, $archivo, $archivo, $contenido->visualizarContenido(), $_POST["guardadoCorrecto"]);
  }else{
    echo sprintf($html, $archivo, $archivo, $contenido->visualizarContenido(), "");
  }


?>
