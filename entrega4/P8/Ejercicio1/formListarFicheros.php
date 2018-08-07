<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="recursos/css/listado.css"/>
    <link href="https://fonts.googleapis.com/css?family=Arimo" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Quicksand:300,400" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400" rel="stylesheet">
    <title>Title</title>
</head>
<body>

  <header>
    <h1>Listado de archivos</h1>
    <hr>
  </header>

  <section>
    <ul>
      <?php
        error_reporting(0); // Si estamos en producción, hacer un display de errores nos expone a ataques (File Path Include)

        $directorio = opendir("files/");
        while($archivo = readdir($directorio)){
          if(!is_dir($archivo)){
            $archivo = htmlentities(trim($archivo));
            $html = "
              <li>
                <p>%s</p>
                <form action='formDetallesFichero.php' method='post'>
                  <input type='hidden' name='archivo' value='%s'/>
                  <input type='submit' value='Editar'/>
                </form>
                <form action='guardarOEliminar.php' method='post'>
                  <input type='hidden' name='archivo' value='%s'/>
                  <input type='submit' name='eliminar' value='Eliminar'/>
                </form>
              </li>
            ";
            echo sprintf($html, $archivo, $archivo, $archivo);
          }
        }
       ?>
     </form>
    </ul>
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
