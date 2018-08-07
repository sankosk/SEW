class Mapa {
    obtener(){
        navigator.geolocation.getCurrentPosition(this.initMap,this.errores);
    }
    initMap(posicion){
        var latt= posicion.coords.latitude;
        var long = posicion.coords.longitude;

        var uluru = {lat: latt, lng: long};
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 4,
            center: uluru
        });
        var marker = new google.maps.Marker({
            position: uluru,
            map: map
        });


    }
    errores(error){
        alert('Error: '+error.code+' '+error.message);
    }
}




window.onload(new Mapa().obtener())
