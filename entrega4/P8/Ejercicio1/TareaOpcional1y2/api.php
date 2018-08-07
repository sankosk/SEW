<?php
  class MovieFinder
  {
    protected $url = "https://api.themoviedb.org/3/search/movie?api_key=6fa1d70187e562db98a47273442a2e63&page=1&language=es-ES&query=";
    protected $url2 = "https://api.themoviedb.org/3/movie/";
    protected $url3 = "http://www.omdbapi.com/?apikey=a5798028&i=";

    public function getMovies($movieToSearch){
      return json_decode(file_get_contents($this->url . urlencode($movieToSearch)), true);
    }

    public function getMovieDetails($movieID){
      $this->url2 = $this->url2 . $movieID;
      return json_decode(file_get_contents($this->url2 . "?api_key=6fa1d70187e562db98a47273442a2e63"), true);
    }

    public function getExtraData($mdbID){
      return json_decode(file_get_contents($this->url3 . urlencode($mdbID)), true);
    }

  }
?>
