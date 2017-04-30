var LatLng=[];
var LatLngAux=[];
var infowindow=[];
var dateNow;
var dateBefore;
var SegundosDiferencia;
var FechaDiferencia;
var Marker_Real=[];
var Tabla;
var map;
var MarkerInterval;
var Entro=0;
var i;

var apiKey = 'AIzaSyCF6NfbnvzeseQoQPP5Bh6iSHA3_fcHu1g';

var myCenter=new google.maps.LatLng(parseFloat("11.232691"),parseFloat("-74.736413"));

var mapOptions ={
                mapTypeId: google.maps.MapTypeId.ROADMAP,
                center : myCenter,
                zoom : 10,
                disableDefaultUI: false    };

map=new google.maps.Map(document.getElementById("googleMap"),mapOptions);

// $.post("MySQL/Promedio_Peso.php", {Cargo: 'admin', Usuario:'JamesLlerena', Vehiculo: 'EUQ426'  }).done(  function( data ) {console.log(JSON.parse(data));});
MarkerInterval = setInterval(function(){ActualizarId_Barcos()},1000);

function ActualizarId_Barcos(){



  $.post("MySQL/mmsi.php").done(  function( data ) {

    Tabla = JSON.parse(data);

    dateNow = new Date().getTime();

     for (i in Tabla){


    LatLng[i]=new google.maps.LatLng(parseFloat(Tabla[i]['latitud']),parseFloat(Tabla[i]['longitud']));

    if (LatLng[i]!==LatLngAux[i] && Entro) {Marker_Real[i].setMap(null); console.log("entroo") }

    dateBefore=new Date(Tabla[i]['max(fecha)']).getTime();

    SegundosDiferencia = (dateNow - dateBefore)/1000;

    FechaDiferencia= new Date(0);
    FechaDiferencia.setSeconds(FechaDiferencia.getSeconds()+18000+SegundosDiferencia);

    var Yt = FechaDiferencia.getFullYear()-1970;
    var Mt = FechaDiferencia.getMonth();
    var Dt = FechaDiferencia.getDate()-1;
    var Ht = FechaDiferencia.getHours();
    var Mt = FechaDiferencia.getMinutes();
    var St = FechaDiferencia.getSeconds();


    infowindow[i] = new google.maps.InfoWindow({

      content:  "Nombre: "+Tabla[i]['nombre']+"<br>"+
                "mmsi: "+Tabla[i]['mmsi']+"<br>"+
                "Status: "+Tabla[i]['status']+"<br>"+
                "Latitud: "+Tabla[i]['latitud']+"<br>"+
                "Longitud: "+Tabla[i]['longitud']+"<br>"+
                "Velocidad: "+Tabla[i]['velocidad']+"<br>"+
                "Curso: "+Tabla[i]['curso']+"<br>"+
                "Fecha: "+Tabla[i]['max(fecha)']+"<br>"+
                "Tiempo Transcurrido: "+Ht+"horas"+Mt+"minutos"+St+"segundos"

                      });

    Marker_Real[i] = new google.maps.Marker({ position: LatLng[i],   map: map , infowindow: infowindow[i]     });

    google.maps.event.addListener(Marker_Real[i], 'click', function() {this.infowindow.open(map, this)});

    LatLngAux=LatLng;


}
Entro=1;
});
 }
