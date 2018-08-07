class Meteo {
    constructor(){
        this.apikey = "47b790fd0fc41878c80c57c9846132cb";
        this.ciudad = "Oviedo";
        this.codigoPais = "ES";
        this.unidades = "&units=metric";
        this.idioma = "&lang=es";
        this.url = "http://api.openweathermap.org/data/2.5/weather?q=" + this.ciudad + "," + this.codigoPais + this.unidades + this.idioma + "&APPID=" + this.apikey;
    }
    cargarDatos(){
        $.ajax({
            dataType: "json",
            url: this.url,
            method: 'GET',
            success: function(datos){
                    $("pre").text(JSON.stringify(datos, null, 2));
                
                    
                    var stringDatos = "<p>Ciudad: " + datos.name + "</p>";
                        stringDatos += "<p>País: " + datos.sys.country + "</p>";
                        stringDatos += "<p>Latitud: " + datos.coord.lat + " grados</p>";
                        stringDatos += "<p>Longitud: " + datos.coord.lon + " grados</li>";
                        stringDatos += "<p>Temperatura: " + datos.main.temp + " grados Celsius</p>";
                        stringDatos += "<p>Temperatura máxima: " + datos.main.temp_max + " grados Celsius</p>";
                        stringDatos += "<p>Temperatura mínima: " + datos.main.temp_min + " grados Celsius</p>";
                        stringDatos += "<p>Presión: " + datos.main.pressure + " milibares</p>";
                        stringDatos += "<p>Humedad: " + datos.main.humidity + " %</p>";
                        stringDatos += "<p>Amanece a las: " + new Date(datos.sys.sunrise *1000).toLocaleTimeString() + "</p>";
                        stringDatos += "<p>Oscurece a las: " + new Date(datos.sys.sunset *1000).toLocaleTimeString() + "</p>";
                        stringDatos += "<p>Dirección del viento: " + datos.wind.deg + " grados</p>";
                        stringDatos += "<p>Velocidad del viento: " + datos.wind.speed + " metros/segundo</p>";
                        stringDatos += "<p>Hora de la medida: " + new Date(datos.dt *1000).toLocaleTimeString() + "</p>";
                        stringDatos += "<p>Fecha de la medida: " + new Date(datos.dt *1000).toLocaleDateString() + "</p>";
                        stringDatos += "<p>Descripción: " + datos.weather[0].description + "</p>";
                        stringDatos += "<p>Visibilidad: " + datos.visibility + " metros</p>";
                        stringDatos += "<p>Nubosidad: " + datos.clouds.all + "%</p>"
                    
                    $("p").html(stringDatos);
                },
            error:function(){
                $("h3").html("ERROR -> No puedo obtener JSON de <a href='http://openweathermap.org'>OpenWeatherMap</a>"); 
                $("h4").remove();
                $("pre").remove();
                $("p").remove();
                }
        });
    }
    crearElemento(tipoElemento, texto, insertarAntesDe){
        
        var elemento = document.createElement(tipoElemento); 
        elemento.innerHTML = texto;
        $(insertarAntesDe).before(elemento);
    }
    verJSON(){
        this.crearElemento("h4","-----------------------------","footer"); 
        this.crearElemento("p","","footer"); 
        this.cargarDatos();
        $("button").attr("disabled","disabled");
    }
}
var meteo = new Meteo();