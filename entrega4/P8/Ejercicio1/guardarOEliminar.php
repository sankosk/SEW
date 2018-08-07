<?php
  error_reporting(0); // Si estamos en producción, hacer un display de errores nos expone a ataques (File Path Include)

  require("moduloArchivo.php");
  $archivo = new ArchivoTexto("files/" . htmlentities(trim($_POST["archivo"])));

  if(isset($_POST["eliminar"])){
    $archivo->eliminarFichero();
    header('Location: formListarFicheros.php');
  }

  if(isset($_POST["guardar"])){
    $archivo->modificarArchivo($_POST["contenidoFichero"]);

    echo sprintf("
    <form id='hiddenForm' action='formDetallesFichero.php' method='post'>
    <input type='hidden' name='file' value='%s'/>
    <input type='hidden' name='guardadoCorrecto' value='%s'/>
    </form>
    <script type='text/javascript'>
      document.getElementById('hiddenForm').submit();
    </script>
    ", htmlentities(trim($_POST["archivo"])), "<p>El archivo se ha guardado correctamente</p>");
  }

?>
