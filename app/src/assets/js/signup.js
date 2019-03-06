$("#formSignup").on("submit", function(event){
    event.preventDefault();
    const serializeFormLogin = $(this).serialize();
    
    // Ajax request (checkUser.php)
    $.ajax({
        type: "post",
        url: `${urlAPI}/checkSignup.php`,
        data: serializeFormLogin,
        success: function(data){
            console.log(data);
            data = JSON.parse(data);
            console.log(data);

            if(data.username, data.password){
                $("#formSignup").hide();
                $("#formLogin").hide();
                $('#navbarVelo').show();
                $("#map").show();
                
                
                var mapDiv = $("#map");
                var canvasMap = $(".mapboxgl-canvas");
    
                mapDiv.css("width", "100%");
                canvasMap.css("width", "100%");
                map.resize();
            }
        }
    })
})
