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
    <h1>Formulario creación de ficheros</h1>
    <hr>
  </header>

  <section>
    <form action="crearArchivo.php" method="post">
        <label>Nombre del fichero</label>
        <input name="nombreFichero" type="text"/>
        <label>Contenido del archivo</label>
        <textarea name="contenidoFichero"></textarea>
        <input type="submit" value="Crear fichero"/>
    </form>
  </section>

  <section>
    <form action="Ejercicio1.html">
      <input type="submit" value="Volver al menú principal"/>
    </form>
  </section>

  <footer>
    <p>&copy; Esteban Montes Morales - 2017</p>
  </footer>

</body>
</html>
