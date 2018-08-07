
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
    <h1>Resultados de la eliminación</h1>
    <hr>
  </header>

  <section>
    <?php
      error_reporting(0); // Si estamos en producción, hacer un display de errores nos expone a ataques (File Path Include)

      require("GestorBD.php");
      $gestor = new Gestor("localhost", "pepito", "password2017");
      $db = $gestor->connect("gestor");

      if($db->connect_error){
        $html = "
          <form id='formError' action='formEliminarDatosEnTablas.php' method='post'>
            <input type='hidden' name='connectError' value='Compruebe que la base de datos exista o que tenga el servidor MySQL ejecutandose antes de hacer nada...'/>
          </form>
          <script>
            document.getElementById('formError').submit();
          </script>
        ";
        echo $html;
        exit();
      }

      $consultaPre = $db->prepare("SELECT * FROM pedido WHERE fecha = ?");

      $consultaPre->bind_param('s', $_POST["fecha"]);

      $consultaPre->execute();
      $resultado = $consultaPre->get_result();

      if ($resultado) {

          echo "<p>Los datos de los pedidos borrados son:</p> ";
          while($row = $resultado->fetch_assoc()) {
              $id = $row['idPedido'];
              echo sprintf("<p>ID del Pedido: %s, Fecha del pedido: %s, ID del Proovedor: %s", $row["idPedido"], $row["fecha"], $row["idProovedor"]);
          }

      } else {
          echo "Sin resultados";
      }

      //se realiza el borrado


      $consultaPre = $db->prepare("DELETE FROM pedido WHERE idPedido = ?");

      $consultaPre->bind_param('i', $id);

      $consultaPre->execute();


      $consultaPre->close();
      $gestor->closeConnection();
    ?>

  </section>

  <section>
    <form action="formEliminarDatosEnTablas.php">
      <input type="submit" value ="Volver al formulario de eliminación"/>
    </form>
  </section>

  <footer>
    <p>&copy; Esteban Montes Morales - 2017</p>
  </footer>

</body>
</html>
