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

              'Pilot Vessel':'cyan',                'Sailing':'magenta',
              'Search and Rescue vessel':'cyan',    'Pleasure Craft':'magenta',
              'Tug':'cyan',
              'Port Tender':'cyan',                 'Fishing':'NavajoWhite',
              'Anti-pollution equipment':'cyan',
              'Law Enforcement':'cyan',             'unespecified':'gray',
              'Spare - Local Vessel':'cyan',
              'Medical Transport':'cyan',
              'Noncombatant ship according to RR Resolution':'cyan',
              'Towing':'cyan',
              'Towing: length exceeds 200m or breadth exceed':'cyan',
              'Dredging or underwater ops':'cyan',
              'Diving ops':'cyan',
              'Military ops':'cyan',
              'Reserved':'cyan',};


var circuloss=[];
var NumCirculos=5;
var mmsi;
var nmmsi=[];
var Tabla2=[];

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
 MarkerInterval = setInterval(function(){ActualizarId_Barcos()},5000);

 function ActualizarId_Barcos(){

   $.post("MySQL/mmsi.php").done(  function( data ) {

     Tabla = JSON.parse(data);

     for (i in Tabla){      nmmsi[i] = Tabla[i]['mmsi'];     }
     console.log(nmmsi.sort());
     //for (i in Tabla){ Tabla2[i]}


     for (i in Tabla){ MMSII(i);    Markers(i);    }
     console.log("----------");

     Entro=1;
 });

  }
function MMSII(p){

  mmsi = Tabla[p]['mmsi'];
}
function Markers(k){

  dateNow = new Date().getTime();
  // Latitud[k]=Tabla[k]['latitud'];
  // Longitud[k]=Tabla[k]['longitud'];

  LatLng[mmsi]=new google.maps.LatLng(parseFloat(Tabla[k]['latitud']),parseFloat(Tabla[k]['longitud']));

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

console.log(mmsi);


MensajeInfo = "Nombre: "+Tabla[k]['nombre']+"<br>"+
              "mmsi: "+mmsi+"<br>"+
              "Tipo: "+Tabla[k]['tipo']+"<br>"+
              "Calado: "+Tabla[k]['calado']+"<br>"+
              "Status: "+Tabla[k]['status']+"<br>"+
              "Latitud: "+Tabla[k]['latitud']+"°<br>"+
              "Longitud: "+Tabla[k]['longitud']+"°<br>"+
              "Velocidad: "+Tabla[k]['velocidad']+" knots<br>"+
              "Curso: "+Tabla[k]['curso']+"°<br>"+
              "Fecha: "+Tabla[k]['fecha']+"<br>"+
              "Tiempo Transcurrido: "+Ht+"horas"+Mt+"minutos"+St+"segundos";



  // MensajeInfo =
  // '<div style="width:auto;height:auto" id="content">'+
  // '<div style="width:auto;height:auto"  ><h1 style="font: bold 50px Arial;color:red;background-color:black;width:auto;height:auto;text-align:left" >Nombre</h1></div>'+
  // '<div style="width:auto;height:auto"  ><h1 style="font: bold 50px Arial;color:red;background-color:black;width:auto;height:auto;text-align:left" >Nombreee</h1></div>'+
  // '</div>';

  if (Marker_Real[mmsi]){
    //Marker_Real[mmsi].setPosition(LatLng[mmsi]);
    //infowindow[mmsi].setContent(MensajeInfo);

  }else{
        if (Dt<1){
          console.log("Entra a crear1");
          if(Colores[Tabla[k]['tipo']]==undefined)          {Tabla[k]['tipo']='unespecified';}

          var icono = {
                    path: google.maps.SymbolPath.FORWARD_CLOSED_ARROW,
                    fillColor: Colores[Tabla[k]['tipo']],    fillOpacity: 1, scale: 4,
                    strokeColor: Colores[Tabla[k]['tipo']],  strokeWeight: 1,
                    rotation: Tabla[k]['curso']-360*-1
                  };

            Marker_Real[mmsi] = new google.maps.Marker({ position: LatLng[mmsi],  map: map, icon: icono });

            infowindow[mmsi] = new google.maps.InfoWindow({   content:  MensajeInfo, strokeColor: 'red' });

            Marker_Real[mmsi].addListener('click', function()
            {
            //Circulos(k);
            infowindow[mmsi].open(map,Marker_Real[mmsi]);
            });
        }
  }

// if (k==1){infowindow[k].open(map,Marker_Real[k]);  }
}

function CerrarTodo(){

  for (var o in Tabla){

    if (infowindow[Tabla[o]['mmsi']]) {infowindow[Tabla[o]['mmsi']].close();}
        if(MarkersCirculos[Tabla[o]['mmsi']]){
              for (var l=1;l<=NumCirculos;l++){
                MarkersCirculos[Tabla[o]['mmsi']][l-1].setMap(null);
              }
            MarkersCirculos[Tabla[o]['mmsi']]=undefined;
          }
  }

}
function Circulos(j){

 for (var o in Tabla){

   if (o!=j && infowindow[Tabla[o]['mmsi']]) {infowindow[Tabla[o]['mmsi']].close();}
       if(MarkersCirculos[Tabla[o]['mmsi']]){
             for (var l=1;l<=NumCirculos;l++){
               MarkersCirculos[Tabla[o]['mmsi']][l-1].setMap(null);
             }
         MarkersCirculos[Tabla[o]['mmsi']]=undefined;
       }
 }

  for (var l=1;l<=NumCirculos;l++){
    circuloss[l-1] = new google.maps.Circle({ center: LatLng[Tabla[j]['mmsi']], radius: l*1000,
                                              strokeColor: Colores[Tabla[j]['tipo']],  strokeWeight: 1,
                                              fillOpacity: 0, map: map       });
    MarkersCirculos[Tabla[j]['mmsi']]=circuloss;
  }
}
