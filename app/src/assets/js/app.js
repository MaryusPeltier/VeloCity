mapboxgl.accessToken = 'pk.eyJ1IjoibWFyeXVzMzMiLCJhIjoiY2pzNGxpbGZrMDVzOTN5cGZ0Z3BxcTBlMSJ9.28m4YEQTF9M9I0hmCf2fyg';
var map = new mapboxgl.Map({
    container: 'map',
    style: 'mapbox://styles/mapbox/light-v9',
    center: [4.8320114, 45.7578137],
    zoom: 15,
});
var urlAPI = "http://192.168.64.2/projects/Talis-front/jcdecaux/api" ;
var user;

$.ajax({
    type: "GET",
    //dataType: "JSON",
    url: "https://api.jcdecaux.com/vls/v1/stations?contract=Lyon&apiKey=746c2436efd2e5b5f11781719551f0ae0f420594",
    
    success: function(data){
        data.forEach(function(marker) {
 
            marker_bikes= marker.available_bikes;
            // create a DOM element for the marker
            if(marker.available_bikes!==0){
            var el = document.createElement('div');
            el.id = 'marker';

            marker_address= marker.address;
            marker_bikes= marker.available_bikes;
            marker_support= marker.bike_stands;
            marker_number= marker.number;

            var popup = new mapboxgl.Popup(
                {
                   anchor: 'top',   // To show popup on bottom
                }
            ).setHTML(`
            <div class="container">
             <div class="row">
                 <div class="col-6">
                    <div class="imageVelo"></div>
                 </div>
                 <div class="col-6">
                     <h2>${marker.number}</h2>
                     <p>${marker.available_bikes} / ${marker.bike_stands}</p>
                 </div>
             </div>
             <form onSubmit="formSubmitPopup(event, ${marker.number},${marker.available_bikes})">
                 <input id="reserveButton" type="submit" value="RESERVER">
            </form>
            </div>
            `)
            // add marker to map
            

            new mapboxgl.Marker(el)
                .setLngLat(marker.position)
                .setPopup(popup)
                .addTo(map); 
            }else if(marker.available_bikes===0){
                var el = document.createElement('div');
                el.id = 'marker2';
            
                marker_address= marker.address;
                marker_bikes= marker.available_bikes;
                marker_support= marker.bike_stands;
                marker_number= marker.number;

            var popup = new mapboxgl.Popup(
                {
                   anchor: 'top',   // To show popup on bottom
                }
            ).setHTML(`
            <div class="container">
             <div class="row">
                 <div class="col-6">
                    <div class="imageVelo"></div>
                 </div>
                 <div class="col-6">
                     <h2>${marker.number}</h2>
                     <p>${marker.available_bikes} / ${marker.bike_stands}</p>
                 </div>
                </div>
             </form onSubmit="formSubmitPopup(event)">
                 <input id="reserveButton" style="background-color:lightgray;" type="submit" value="Velo Indisponible">
            </form>
            </div>
            `)
            
            
            // add marker to map
            
            new mapboxgl.Marker(el)
                .setLngLat(marker.position)
                .setPopup(popup)
                .addTo(map); 
            }
        });
        
    },
    error: function(data){
        console.error();

    }
    
});



function formSubmitPopup(event,id_station, marker_bikes){
    event.preventDefault();
    const serializeFormReserve = $(this).serialize();
    // AJAX request
    var user_id = user.id;
    var data= {
        marker_bikes,
        id_station,
        user_id
    };
    console.log(data.marker_bikes);
    $.ajax({
        type: "POST",
        url: `${urlAPI}/bdd_station.php`,
        data,
        success: function(data,  serializeFormReserve){
            console.log(data,  serializeFormReserve);
        },
    })
};




$( "span" ).click(function() {
    $( "#mySidenav" ).toggleClass( "moveSidenav" );
    $("#main").toggleClass("moveMain");
    $(".mapboxgl-popup").toggleClass("movePopup");
  });

$("button").click(function(){
    $("#formLogin").toggleClass("moveFormLogin");
    $("#formSignup").toggleClass("moveFormSignup");
    
});

