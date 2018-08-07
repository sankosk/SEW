<?php
error_reporting(0); // Si estamos en producción, hacer un display de errores nos expone a ataques (File Path Include)
require("moduloArchivo.php");

//prevenimos Cross Site Scripting
$nombreArchivo = htmlentities(trim($_POST["nombreFichero"]));
$archivo = new ArchivoTexto("files/" . $nombreArchivo);

$error = "
<!DOCTYPE html>
<html lang='es'>
<head>
    <meta charset='UTF-8'>
    <title>Ejercicio 1</title>
</head>
<body>
  <header>
    <h1>ERROR</h1>
  </header>

  <section>
    <p>Se ha producido un error creando el fichero: %s</p>
    <form action='formCrearFichero.php'>
      <input type='submit' value='Volver atras'/>
    </form>
  </section>

  <footer>
    <p>&copy; Esteban Montes Morales 2017</p>
  </footer>
</body>
</html>
";

$error2 = "
<!DOCTYPE html>
<html lang='es'>
<head>
    <meta charset='UTF-8'>
    <title>Ejercicio 1</title>
</head>
<body>
  <header>
    <h1>ERROR</h1>
  </header>

  <section>
    <p>Se ha producido un añadiendo contenido al fichero: %s</p>
    <form action='formCrearFichero.php'>
      <input type='submit' value='Volver atras'/>
    </form>
  </section>

  <footer>
    <p>&copy; Esteban Montes Morales 2017</p>
  </footer>
</body>
</html>
";

if($archivo->crearArchivo() ===false){
  echo sprintf($error, $nombreArchivo);
}
else{
  if($archivo->añadirInformacion($_POST["contenidoFichero"]) === false){
    echo sprintf($error2, $nombreArchivo);
  }else{
    header('Location: formListarFicheros.php');
  }
}


?>
