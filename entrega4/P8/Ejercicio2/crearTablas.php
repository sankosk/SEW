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

  <section>
    <?php
      error_reporting(0); // Si estamos en producción, hacer un display de errores nos expone a ataques (File Path Include)

      require("GestorBD.php");
      $gestor = new Gestor("localhost", "pepito", "password2017");
      $connectionState = $gestor->connect("gestor");

      if($connectionState->connect_error){
        $html = '
        <section>
          <p>Compruebe que la base de datos exista o que tenga el servidor MySQL ejecutandose antes de hacer nada...</p>
          <form action="Ejercicio2.php">
            <input type="submit" value ="Volver al formulario de eliminación"/>
          </form>
        </section>
        ';
        echo $html;
        exit();
      }

      //queries
      $tProovedor = "
        CREATE TABLE IF NOT EXISTS proovedor (idProovedor INT NOT NULL AUTO_INCREMENT,
        direccion VARCHAR(255) NOT NULL,
        PRIMARY KEY (idProovedor))
      ";

      $tPedido = "
        CREATE TABLE IF NOT EXISTS pedido (
          idPedido INT NOT NULL AUTO_INCREMENT,
          fecha VARCHAR(255) NOT NULL,
          idProovedor INT,
          PRIMARY KEY (idPedido),
          FOREIGN KEY (idProovedor) REFERENCES proovedor(idProovedor)
        )
      ";

      /*
      $tArticulo = "
        CREATE TABLE IF NOT EXISTS articulo (idArticulo INT NOT NULL AUTO_INCREMENT,
        nombreArticulo VARCHAR(255) NOT NULL,
        PRIMARY KEY (idArticulo))
      ";

      $tPedidoArticulo = "
        CREATE TABLE IF NOT EXISTS pedidoarticulo (
          idArticulo INT NOT NULL,
          idPedido INT NOT NULL,
          PRIMARY KEY (idArticulo, idPedido)
        )
      ";
      */

      $tCaca = "
        CREAdadaTE TAwdwadwadwaBLE IF NOT EXISTS pewdadawdwarsona (id INT NOT NULL AUTO_INCREMENT,
        dni VARCHdadAR(9) NOT NULL,
        nombre VAddRCHAR(255) NOT NULL,
        apellidos VARdadadaCHAR(255) NOT NULL,
        PRIMARY KEdadaY (id))
      ";

      $queries = [
        "Proovedor" => $tProovedor,
        "Pedido" => $tPedido,
        //"Articulo" => $tArticulo,
        //"PedidoArticulo" => $tPedidoArticulo,
        "TablaMalFormada" => $tCaca
      ];


      foreach ($queries as $name => $query) {
        if($gestor->createTable($query) === TRUE){
          echo sprintf("<p>La tabla: %s se ha creado correctamente.</p>", $name);
        }else{
          echo sprintf("<p>La tabla: %s no se ha podido crear correctamente</p>", $name);
        }
      }


      $gestor->closeConnection();
    ?>
  </section>

  <section>
    <form action="Ejercicio2.php">
      <input type="submit" value ="Volver a la página principal"/>
    </form>
  </section>

  <footer>
    <p>&copy; Esteban Montes Morales - 2017</p>
  </footer>

</body>
</html>
