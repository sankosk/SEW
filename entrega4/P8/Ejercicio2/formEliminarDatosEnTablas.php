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
    <h1>Borra datos de las tablas</h1>
    <hr>
  </header>

  <section>
    <form action="eliminarDatosEnProovedor.php" method="post">
      <label for="direccionProovedor">Dirección del proovedor</label>
      <input type="text" id="direccionProovedor" name="direccion"/>
      <input type="submit" value="Eliminar en proovedor"/>
    </form>
    <form action="eliminarDatosEnPedido.php" method="post">
      <label for="fechaPedido">Fecha del pedido</label>
      <input type="text" id="fechaPedido" name="fecha"/>
      <input type="submit" value="Eliminar en pedido"/>
    </form>
  </section>

  <section>
    <?php
      error_reporting(0); // Si estamos en producción, hacer un display de errores nos expone a ataques (File Path Include)

      if(isset($_POST["connectError"])){
        echo sprintf("<p>%s</p>", $_POST["connectError"]);
      }
      if(isset($_POST["ok"])){
        echo sprintf("<p>%s</p>", $_POST["ok"]);
      }

      if(isset($_POST["error"])){
        echo sprintf("<p>%s</p>", $_POST["error"]);
      }

    ?>
  </section>

  <section id="atras">
    <form action="Ejercicio2.php">
      <input type="submit" value ="Volver a la página principal"/>
    </form>
  </section>

  <footer>
    <p>&copy; Esteban Montes Morales - 2017</p>
  </footer>

</body>
</html>
