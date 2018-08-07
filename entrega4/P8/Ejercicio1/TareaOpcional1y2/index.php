<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css?family=Arimo" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Quicksand:300,400" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="recursos/css/style.css"/>
    <title>MovieFinder</title>
</head>
<body>

    <header>
        <h1>MovieFinder busca información de peliculas</h1>
    </header>

    <div id="banner">
        <form action="index.php" method="post">
            <input type="text" name="movieText"/>
            <input id="searchMovie" type="submit" value="Search movie"/>
        </form>
    </div>
    <div id="moviesContainer">
        <ul id="movies">
          <?php
            require("api.php");
            $imgURL = "http://image.tmdb.org/t/p/w185/";
            $html = "";
            if(isset($_POST["movieText"])){
              $movieFinder = new MovieFinder();
              $jsonData = $movieFinder->getMovies($_POST["movieText"]);
              foreach ($jsonData["results"] as $movie) {
                if($movie["poster_path"] != null){
                  $html = "
                    <li>
                      <img src='%s'>
                      <p>%s</p>
                      <form action='movieDetails.php' method='post'>
                        <input type='hidden' name='movieID' value='%s'/>
                        <input id='vermas' type='submit' value='Ver más'/>
                      </form>
                    </li>
                  ";
                  echo sprintf($html, $imgURL . $movie["poster_path"], $movie["title"], $movie["id"]);  
                }
              }
            }
          ?>
        </ul>
    </div>

    <footer>
        <h4>&copy; Esteban Montes Morales 2017</h4>
    </footer>

</body>
</html>
