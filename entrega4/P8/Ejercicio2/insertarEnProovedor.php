<?php
  error_reporting(0); // Si estamos en producción, hacer un display de errores nos expone a ataques (File Path Include)

  require("GestorBD.php");
  $gestor = new Gestor("localhost", "pepito", "password2017");
  $db = $gestor->connect("gestor");

  if($db->connect_error){
    $html = "
      <form id='formError' action='formInsertarDatosEnTablas.php' method='post'>
        <input type='hidden' name='connectError' value='Compruebe que la base de datos exista o que tenga el servidor MySQL ejecutandose antes de hacer nada...'/>
      </form>
      <script>
        document.getElementById('formError').submit();
      </script>
    ";
    echo $html;
    exit();
  }


  $consultaPre = $db->prepare("INSERT INTO proovedor (direccion) VALUES (?)");
  $consultaPre->bind_param('s', $_POST["direccion"]);

  if(!$consultaPre->execute()){
    $html = "
      <form id='formError' action='formInsertarDatosEnTablas.php' method='post'>
        <input type='hidden' name='error' value='Se ha producido un error insertando los datos.'/>
      </form>
      <script>
        document.getElementById('formError').submit();
      </script>
    ";
    echo $html;
  }else{
    $html = "
    <form id='formOK' action='formInsertarDatosEnTablas.php' method='post'>
      <input type='hidden' name='ok' value='Los datos se han insertado correctamente.'/>
    </form>
    <script>
      document.getElementById('formOK').submit();
    </script>
    ";
    echo $html;
  }



  $consultaPre->close();
  $gestor->closeConnection();
?>
