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

              'Pilot Vessel':'cyan',                                      'Sailing':'magenta',
              'Search and Rescue vessel':'cyan',                          'Pleasure Craft':'magenta',
              'Tug':'cyan',
              'Port Tender':'cyan',                                       'Fishing':'NavajoWhite',
              'Anti-pollution equipment':'cyan',
              'Law Enforcement':'cyan',                                   'unespecified':'gray',
              'Spare - Local Vessel':'cyan',
              'Medical Transport':'cyan',                                 'Estacion':'red',
              'Noncombatant ship according to RR Resolution':'cyan',
              'Towing':'cyan',
              'Towing: length exceeds 200m or breadth exceed':'cyan',
              'Dredging or underwater ops':'cyan',
              'Diving ops':'cyan',
              'Military ops':'cyan',
              'Reserved':'cyan',};


var circuloss=[];
var NumCirculos=5;
var icono;

var mapOptions ={
                mapTypeId: google.maps.MapTypeId.ROADMAP,
                center : myCenter,
                zoom : 10,
                disableDefaultUI: false    };

map=new google.maps.Map(document.getElementById("googleMap"),mapOptions);

map.controls[google.maps.ControlPosition.RIGHT_TOP].push(  document.getElementById('coordenadas'));
map.controls[google.maps.ControlPosition.LEFT_BOTTOM].push(  document.getElementById('colores'));
map.controls[google.maps.ControlPosition.LEFT_BOTTOM].push(  document.getElementById('BotonColores'));


// google.maps.event.addListenerOnce(map, 'idle', function(){
//     jQuery('.gm-style-iw').prev().remove();
// });




map.addListener('click', function() { CerrarTodo(); });
map.addListener('mousemove', function(e) {
  // console.log("move");
  var lat = ""+e.latLng.lat(); lat = lat.substr(0,8);
  var lng = ""+e.latLng.lng(); lng = lng.substr(0,9);
  document.getElementById('coordenadas').innerHTML    =  "Latitud: "+lat+" - Longitud: "+lng;
});

console.log("nojoda");
ActualizarId_Barcos();
MarkerInterval = setInterval(function(){ActualizarId_Barcos()},1000);

function ActualizarId_Barcos(){

  $.post("MySQL/mmsi.php").done(  function( data ) {

    Tabla = JSON.parse(data);
    for (i in Tabla){    Markers(i);    }

    Entro=1;
 });
 }
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

 // console.log(Tabla[k]['mmsi']);

 if(Colores[Tabla[k]['tipo']]==undefined){Tabla[k]['tipo']='unespecified';}

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



   MensajeInfo = '<div id="iw-container">' +
                    '<div class="iw-title">Porcelain Factory of Vista Alegre</div>' +
                    '<div class="iw-content">' +
                      '<div class="iw-subTitle">History</div>' +
                      '<img src="http://maps.marnoto.com/en/5wayscustomizeinfowindow/images/vistalegre.jpg" alt="Porcelain Factory of Vista Alegre" height="115" width="83">' +
                      '<p>Founded in 1824, the Porcelain Factory of Vista Alegre was the first industrial unit dedicated to porcelain production in Portugal. For the foundation and success of this risky industrial development was crucial the spirit of persistence of its founder, José Ferreira Pinto Basto. Leading figure in Portuguese society of the nineteenth century farm owner, daring dealer, wisely incorporated the liberal ideas of the century, having become "the first example of free enterprise" in Portugal.</p>' +
                      '<div class="iw-subTitle">Contacts</div>' +
                      '<p>VISTA ALEGRE ATLANTIS, SA<br>3830-292 Ílhavo - Portugal<br>'+
                      '<br>Phone. +351 234 320 600<br>e-mail: geral@vaa.pt<br>www: www.myvistaalegre.com</p>'+
                    '</div>' +
                    '<div class="iw-bottom-gradient"></div>' +
                  '</div>';

  // MensajeInfo =
  // '<div id="iw-container" ><h5 style="text-align:right;color:red;">NOMBREEEE</h5></br></div>';



            icono = {
                        path: google.maps.SymbolPath.FORWARD_CLOSED_ARROW,
                        fillColor: Colores[Tabla[k]['tipo']],
                        fillOpacity: 1,
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
          // console.log("local5");

          if (Tabla[k]['tipo']=='Estacion'){

            Marker_Real[k] = new google.maps.Marker({ position: LatLng[k],   map: map, icon: 'http://aisproject.ddns.net/images/estacionmarker.png' });
          }else{
            Marker_Real[k] = new google.maps.Marker({ position: LatLng[k],    map: map, icon: icono });
}
            infowindow[k] = new google.maps.InfoWindow({   content:  MensajeInfo, strokeColor: 'red' });

            google.maps.event.addListener(infowindow[k], 'domready', function() {

              var iwOuter = $('.gm-style-iw');
              var iwBackground = iwOuter.prev();
              iwBackground.children(':nth-child(2)').css({'display' : 'none'});
              iwBackground.children(':nth-child(4)').css({'display' : 'none'});
              iwOuter.parent().parent().css({left: '115px'});
              iwBackground.children(':nth-child(1)').attr('style', function(i,s){ return s + 'left: 76px !important;'});
              iwBackground.children(':nth-child(3)').attr('style', function(i,s){ return s + 'left: 76px !important;'});
              iwBackground.children(':nth-child(3)').find('div').children().css({'box-shadow': 'rgba(72, 181, 233, 0.6) 0px 1px 6px', 'z-index' : '1'});
              var iwCloseBtn = iwOuter.next();
              iwCloseBtn.css({opacity: '1', right: '38px', top: '3px', border: '7px solid #48b5e9', 'border-radius': '13px', 'box-shadow': '0 0 5px #3990B9'});
              if($('.iw-content').height() < 140){
                $('.iw-bottom-gradient').css({display: 'none'});
              }
              // The API automatically applies 0.7 opacity to the button after the mouseout event. This function reverses this event to the desired value.
              iwCloseBtn.mouseout(function(){      $(this).css({opacity: '1'});    });
            });





            Marker_Real[k].addListener('click', function() {Circulos(k); /*jQuery('.gm-style-iw').prev('div').remove();*/   infowindow[k].open(map,Marker_Real[k]);       });
        }
  }

 // if (k==1 && unavez){ jQuery('.gm-style-iw').prev('div').remove(); infowindow[k].open(map,Marker_Real[k]); unavez=0;  }
 }
var unavez=1;
function CerrarTodo(){

  document.getElementById('BotonColores').style.display='inline-block';
  document.getElementById('colores').style.display='none';

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

function MostrarColores(){

 document.getElementById('BotonColores').style.display='none';
 document.getElementById('colores').style.display='inline-block';
}
