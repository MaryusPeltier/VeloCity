$("#formLogin").on("submit", function(event){
    event.preventDefault();
    const serializeFormLogin = $(this).serialize();
    // Ajax request (checkUser.php)
    $.ajax({
        type: "post",
        url: `${urlAPI}/checkUser.php`,
        data: serializeFormLogin,
        success: function(data){
            console.log(data);
            data = JSON.parse(data);
            console.log(data);
            
            user = data;

            if(data.username && data.password){
                $("#formLogin").hide();
                $("#formSignup").hide();
                $("button").hide();
                $('#navbarVelo').show();
                $("#map").show();
                $("#profilUsername").append(data.name).css("text-transform", "uppercase");
                
                var mapDiv = $("#map");
                var canvasMap = $(".mapboxgl-canvas");
    
                mapDiv.css("width", "100%");
                canvasMap.css("width", "100%");
                map.resize();
            }

        }
    })
})
var user ="2";