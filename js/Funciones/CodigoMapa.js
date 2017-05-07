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
var Latitud=[];
var Longitud=[];
var LatitudAux=[];
var LongitudAux=[];
var MensajeInfo;
var apiKey = 'AIzaSyCF6NfbnvzeseQoQPP5Bh6iSHA3_fcHu1g';
var icono;
var myCenter=new google.maps.LatLng(parseFloat("11.232691"),parseFloat("-74.736413"));
var MarkersCirculos= [];
var Colores={ 'Cargo':'green',                            'Tanker':'red',
              'Cargo - Hazardous category A':'green',     'Tanker - Hazardous category A':'red',
              'Cargo - Hazardous category B':'green',     'Tanker - Hazardous category B':'red',
              'Cargo - Hazardous category C':'green',     'Tanker - Hazardous category C':'red',
              'Cargo - Hazardous category D':'green',     'Tanker - Hazardous category D':'red',
              'Cargo - RFU':'green',                      'Tanker - RFU':'red',

              'High speed craft':'yellow',                            'Passenger':'darkblue',
              'High speed craft - Hazardous category A':'yellow',     'Passenger - Hazardous category A':'darkblue',
              'High speed craft - Hazardous category B':'yellow',     'Passenger - Hazardous category B':'darkblue',
              'High speed craft - Hazardous category C':'yellow',     'Passenger - Hazardous category C':'darkblue',
              'High speed craft - Hazardous category D':'yellow',     'Passenger - Hazardous category D':'darkblue',
              'High speed craft - RFU':'yellow',                      'Passenger - RFU':'darkblue',

              'Pilot Vessel':'yellow',                'Sailing':'darkblue',
              'Search and Rescue vessel':'yellow',    'Pleasure Craft':'darkblue',
              'Tug':'yellow',
              'Port Tender':'yellow',                 'Fishing':'darkblue',
              'Anti-pollution equipment':'yellow',
              'Law Enforcement':'yellow',             'unespecified':'gray',
              'Spare - Local Vessel':'yellow',
              'Medical Transport':'yellow',
              'Noncombatant ship according to RR Resolution':'yellow',
              'Towing':'yellow',
              'Towing: length exceeds 200m or breadth exceed':'yellow',
              'Dredging or underwater ops':'yellow',
              'Diving ops':'yellow',
              'Military ops':'yellow',
              'Reserved':'yellow',};


var circuloss=[];
var NumCirculos=5;


var mapOptions ={
                mapTypeId: google.maps.MapTypeId.ROADMAP,
                center : myCenter,
                zoom : 10,
                disableDefaultUI: false    };

map=new google.maps.Map(document.getElementById("googleMap"),mapOptions);

map.controls[google.maps.ControlPosition.RIGHT_TOP].push(  document.getElementById('coordenadas'));

google.maps.event.addListenerOnce(map, 'idle', function(){
    jQuery('.gm-style-iw').prev().remove();
});

map.addListener('click', function() { CerrarTodo(); });
map.addListener('mousemove', function(e) {
  // console.log("move");
  var lat = ""+e.latLng.lat(); lat = lat.substr(0,8);
  var lng = ""+e.latLng.lng(); lng = lng.substr(0,9);
  document.getElementById('coordenadas').innerHTML    =  "Latitud: "+lat+" - Longitud: "+lng;
});


ActualizarId_Barcos();
 MarkerInterval = setInterval(function(){ActualizarId_Barcos()},10000);

function Markers(k){

  dateNow = new Date().getTime();
  Latitud[k]=Tabla[k]['latitud'];
  Longitud[k]=Tabla[k]['longitud'];

  LatLng[k]=new google.maps.LatLng(parseFloat(Latitud[k]),parseFloat(Longitud[k]));

  dateBefore=new Date(Tabla[k]['fecha']).getTime();

  SegundosDiferencia = (dateNow - dateBefore)/1000;

  FechaDiferencia= new Date(0);
  FechaDiferencia.setSeconds(FechaDiferencia.getSeconds()+18000+SegundosDiferencia);

  var Yt = FechaDiferencia.getFullYear()-1970;
  var Mt = FechaDiferencia.getMonth();
  var Dt = FechaDiferencia.getDate()-1;
  var Ht = FechaDiferencia.getHours();
  var Mt = FechaDiferencia.getMinutes();
  var St = FechaDiferencia.getSeconds();
console.log(Tabla[k]['mmsi']);
MensajeInfo = "Nombre: "+Tabla[k]['nombre']+"<br>"+
              "mmsi: "+Tabla[k]['mmsi']+"<br>"+
              "Tipo: "+Tabla[k]['tipo']+"<br>"+
              "Calado: "+Tabla[k]['calado']+"<br>"+
              "Status: "+Tabla[k]['status']+"<br>"+
              "Latitud: "+Tabla[k]['latitud']+"°<br>"+
              "Longitud: "+Tabla[k]['longitud']+"°<br>"+
              "Velocidad: "+Tabla[k]['velocidad']+" knots<br>"+
              "Curso: "+Tabla[k]['curso']+"°<br>"+
              "Fecha: "+Tabla[k]['fecha']+"<br>"+
              "Tiempo Transcurrido: "+Ht+"horas"+Mt+"minutos"+St+"segundos";

              if(Colores[Tabla[k]['tipo']]==undefined)
              {Tabla[k]['tipo']='unespecified';}

  // MensajeInfo =
  // '<div style="width:auto;height:auto" id="content">'+
  // '<div style="width:auto;height:auto"  ><h1 style="font: bold 50px Arial;color:red;background-color:black;width:auto;height:auto;text-align:left" >Nombre</h1></div>'+
  // '<div style="width:auto;height:auto"  ><h1 style="font: bold 50px Arial;color:red;background-color:black;width:auto;height:auto;text-align:left" >Nombreee</h1></div>'+
  // '</div>';



              var icono = {
                        path: google.maps.SymbolPath.FORWARD_CLOSED_ARROW,
                        fillColor: Colores[Tabla[k]['tipo']],
                        fillOpacity: 0.2,
                        scale: 4,
                        strokeColor: Colores[Tabla[k]['tipo']],
                        strokeWeight: 1,
                        rotation: Tabla[k]['curso']-360*-1
                      };

  if (Marker_Real[k]){
    Marker_Real[k].setPosition(LatLng[k]);
    infowindow[k].setContent(MensajeInfo);

  }else{
        if (Dt<1){
          console.log("local5");
            Marker_Real[k] = new google.maps.Marker({ position: LatLng[k], center: LatLng[k] ,   map: map, icon: icono });

            infowindow[k] = new google.maps.InfoWindow({   content:  MensajeInfo, strokeColor: 'red' });
            Marker_Real[k].addListener('click', function() {Circulos(k);  infowindow[k].open(map,Marker_Real[k]); /*  jQuery('.gm-style-iw').prev('div').remove(); */     });
        }
  }

// if (k==1){infowindow[k].open(map,Marker_Real[k]);  }
}

function CerrarTodo(){

  for (var o in Tabla){

    if (infowindow[o]) {infowindow[o].close();}
    if(MarkersCirculos[o]){for (var l=1;l<=NumCirculos;l++){MarkersCirculos[o][l-1].setMap(null);}MarkersCirculos[o]=undefined;}
  }

}
function Circulos(j){
 for (var o in Tabla){

   if (o!=j && infowindow[o]) {infowindow[o].close();}
   if(MarkersCirculos[o]){for (var l=1;l<=NumCirculos;l++){MarkersCirculos[o][l-1].setMap(null);}MarkersCirculos[o]=undefined;}
 }

  for (var l=1;l<=NumCirculos;l++){
    circuloss[l-1] = new google.maps.Circle({ center: LatLng[j], radius: l*1000,
                                              strokeColor: Colores[Tabla[j]['tipo']],  strokeWeight: 1,
                                              fillOpacity: 0, map: map       });
                                          MarkersCirculos[j]=circuloss;
  }


}

function ActualizarId_Barcos(){

  $.post("MySQL/mmsi.php").done(  function( data ) {

    Tabla = JSON.parse(data);


    for (i in Tabla){    Markers(i);    }

    Entro=1;
});


 }
