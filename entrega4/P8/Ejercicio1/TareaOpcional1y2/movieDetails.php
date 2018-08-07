<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="Ejercicio567.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Arimo" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Quicksand:300,400" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="recursos/css/style.css"/>
    <title>MovieFinder</title>
</head>
<body>

    <header>
        <h1>MovieFinder search movies information</h1>
    </header>

    <div id="movieContainer">
      <?php
        require("api.php");
        if(isset($_POST["movieID"])){
          $movie = new MovieFinder();
          $imgURL = "http://image.tmdb.org/t/p/w185/";
          $jsonData = $movie->getMovieDetails($_POST["movieID"]);
          $imdb = $jsonData["imdb_id"];
          $extraData = $movie->getExtraData($imdb);
          $html = "
            <h2>%s</h2>
            <img src='%s'>
            <p><span style='font-weight: bold'>Fecha de publicación: </span>%s</p>
            <p><span style='font-weight: bold'>Descripcion: </span>%s</p>
            <p><span style='font-weight: bold'>Calificación: </span>%s</p>
            <p><span style='font-weight: bold'>Director: </span>%s</p>
            <p><span style='font-weight: bold'>Guionista: </span>%s</p>
            <p><span style='font-weight: bold'>Actores: </span>%s</p>
          ";
          echo sprintf($html, $jsonData["title"], $imgURL . $jsonData["poster_path"], $jsonData["release_date"], $jsonData["overview"], $extraData["imdbRating"], $extraData["Director"], $extraData["Writer"], $extraData["Actors"]);
        }
      ?>
    </div>

    <footer>
        <h4>&copy; Esteban Montes Morales 2017</h4>
    </footer>
</body>
</html>
