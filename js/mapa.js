var map;
 
function initialize() {
    var latlng = new google.maps.LatLng(-20.458030, -54.587594);
 
    var options = {
        zoom: 5,
        center: latlng,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };
 
    map = new google.maps.Map(document.getElementById("mapa"), options);
}
 
initialize();
