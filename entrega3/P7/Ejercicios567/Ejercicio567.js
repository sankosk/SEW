
class MovieFinder {
    constructor(){
    }

    getMovies(movieToSearch){
        var imgURL = "http://image.tmdb.org/t/p/w185/";

        $('#movies').remove();
        $('#moviesContainer').append("<ul id='movies'></ul>");
        $.ajax({
            url: "https://api.themoviedb.org/3/search/movie?api_key=6fa1d70187e562db98a47273442a2e63&page=1&language=es-ES&query=" + movieToSearch,
            dataType: 'jsonp',
            type: 'GET',
            success:function (data) {
                var selectedID = "";
                for(var x in data.results){
                    if(data.results[x].poster_path != null){
                        $('#movies').append("<li>");
                        $('#movies').append("<img src='" + imgURL + data.results[x].poster_path + "'>");
                        $('#movies').append("<p>" + data.results[x].title + "</p>");
                        $('#movies').append("<a href='#' onclick=utils.movieSelected('" + data.results[x].id + "')>Saber más</a>");
                        $('#movies').append("</li>");
                    }
                }
            },
            error: function (data) {
                console.log(data);
            }
        })
    }


    getMovie(){
        var imgURL = "http://image.tmdb.org/t/p/w185/";

        $.ajax({
            url: "https://api.themoviedb.org/3/movie/"+ sessionStorage.getItem('movieID') +"?api_key=6fa1d70187e562db98a47273442a2e63&append_to_response=videos&language=es-ES",
            dataType: 'jsonp',
            type: 'GET',
            success:function (data) {

                $.ajax({
                    url: "http://www.omdbapi.com/?i="+ data.imdb_id +"&apikey=a5798028",
                    dataType: 'jsonp',
                    type: 'GET',
                    success:function (data2) {
                        $('#movieContainer').append("<h2>" + data.title + "</h2>");
                        $('#movieContainer').append("<img src='" + imgURL + data.poster_path + "'>");
                        $('#movieContainer').append("<p> <span style='font-weight: bold'>Publicada: </span>" + data.release_date + "</p>");
                        $('#movieContainer').append("<p> <span style='font-weight: bold'>Descripcion: </span>" + data.overview + "</p>");
                        $('#movieContainer').append("<p> <span style='font-weight: bold'>Calificación: </span>" + data2.imdbRating + "</p>");
                        $('#movieContainer').append("<p> <span style='font-weight: bold'>Director: </span>" + data2.Director + "</p>");
                        $('#movieContainer').append("<p> <span style='font-weight: bold'>Guionista: </span> " + data2.Writer + "</p>");
                        $('#movieContainer').append("<p> <span style='font-weight: bold'>Actores: </span>" + data2.Actors + "</p>");


                        if(data.videos.results.length != 0){
                            $('#movieContainer').append("<p>Trailer:</p>");
                            $('#movieContainer').append("<iframe width='750' height='500' src='https://www.youtube.com/embed/" + data.videos.results[0].key + "?controls=0'></iframe>")
                        }

                        $('#movieContainer').append("<a href='http://imdb.com/title/" + data.imdb_id + "' target='_blank'>Ver en IMDB</a>");
                        $('#movieContainer').append("<a href='index.html'>Volver al buscador</a>");

                    },
                    error: function (data2) {
                        console.log(data2);
                    }
                })
            },
            error: function (data) {
                console.log(data);
            }
        })
    }
}

var movieFinder = new MovieFinder();

$(document).ready(function(){
    var data = {
        msg : "Bienvenido a mi sitio web!",
        info : "Si tiene alguna sugerencia, no me la haga saber que estoy durmiendo...",
        greatings : "Gracias!"
    };

    Notification.requestPermission();
    var e = new Notification("Bienvenida", {
        body: data.msg + "\n" + data.info + "\n" + data.greatings,
        icon: "https://i.imgur.com/Jz9xmlb.png"
    });

    $("#searchMovie").click(function(){
        var movieToSearch = $("#movieText").val();
        movieFinder.getMovies(movieToSearch);
    });
});

class Utils {
    movieSelected(id){
        sessionStorage.setItem("movieID", id);
        window.location = "movieDetails.html";
        return false;
    }
}

var utils = new Utils();
