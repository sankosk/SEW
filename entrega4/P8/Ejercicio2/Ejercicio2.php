<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 2</title>
    <link href="https://fonts.googleapis.com/css?family=Arimo" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Quicksand:300,400" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="recursos/css/formulario.css"/>
</head>
<body>
  <header>
    <h1>Manejador MySQL</h1>
    <hr>
  </header>

  <nav>
    <form action="crearBD.php" method="post">
      <input type="submit" value="Crear base de datos"/>
    </form>
    <form action="crearTablas.php" method="post">
      <input type="submit" value="Crear tablas"/>
    </form>
    <form action="formInsertarDatosEnTablas.php" method="post">
      <input type="submit" value="Insertar datos en una tabla"/>
    </form>
    <form action="formBuscarDatosEnTablas.php" method="post">
      <input type="submit" value="Buscar datos en una tabla"/>
    </form>
    <form action="formEliminarDatosEnTablas.php" method="post">
      <input type="submit" value="Eliminar datos de una tabla"/>
    </form>
  </nav>

  <section>
    <?php
      error_reporting(0); // Si estamos en producción, hacer un display de errores nos expone a ataques (File Path Include)

      if(isset($_POST["error"])){
        echo sprintf("<p>%s</p>", $_POST["error"]);
      }

      if(isset($_POST["ok"])){
        echo sprintf("<p>%s</p>", $_POST["ok"]);
      }
    ?>
  </section>

  <footer>
    <p>&copy; Esteban Montes Morales - 2017</p>
  </footer>

</body>
</html>
