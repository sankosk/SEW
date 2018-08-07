<?php
  error_reporting(0); // Si estamos en producción, hacer un display de errores nos expone a ataques (File Path Include)

  require("GestorBD.php");
  $gestor = new Gestor("localhost", "pepito", "password2017");
  $connectionState = $gestor->connect();

  if($gestor->createDB() === TRUE){
    $html = "
    <form id='formOK' action='Ejercicio2.php' method='post'>
      <input type='hidden' name='ok' value='La base de datos se ha creado correctamente'/>
    </form>
    <script>
      document.getElementById('formOK').submit();
    </script>
    ";
    echo $html;
  }else{
    $html = "
      <form id='formError' action='Ejercicio2.php' method='post'>
        <input type='hidden' name='error' value='Se ha producido un error creando la base de datos'/>
      </form>
      <script>
        document.getElementById('formError').submit();
      </script>
    ";
    echo $html;
  }

  $gestor->closeConnection();

?>
