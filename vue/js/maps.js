let map;
let geocoder;

function initMap() {
    let paris      = {lat: 48.864716, lng: 2.349014};
    let mapOptions = {
        center: paris,
        // mapTypeId: google.maps.MapTypeId.HYBRID,
        zoom: 12,
        minZoom: 5,
        maxZoom: 20
    };
    map            = new google.maps.Map(document.getElementById('carte'), mapOptions);
    geocoder       = new google.maps.Geocoder();
    /*let marker     = new google.maps.Marker({
        map: map,
        position: paris,
        title: "Titre",
        animation: google.maps.Animation.DROP,
        optimized: false
    });*/
}

document.getElementById('submit-address').addEventListener("click", function () {
    geocodeAddress(geocoder, map);
});

function getCoordinates(geocoder, map) {
    let address = document.getElementById('address').value;
    geocoder.geocode({'address': address}, function (results, status) {
        console.log(results[0]);
        if (status === "OK") {
            console.log(results[0].geometry.location);
        } else if (status === "REQUEST_DENIED") {
            console.log("Requête refusée");
        } else {
            console.log("Erreur geocode" + status);
        }
    })
}


function geocodeAddress(geocoder, resultsMap) {
    var address = document.getElementById('address').value;
    geocoder.geocode({'address': address}, function (results, status) {
        if (status === 'OK') {
            resultsMap.setCenter(results[0].geometry.location);
            var marker = new google.maps.Marker({
                map: resultsMap,
                position: results[0].geometry.location
            });
        } else if (status === "REQUEST_DENIED") {
            console.log(results[0]);
            console.log(status);
            alert("Requête refusée");
        } else {
            alert('Geocode was not successful for the following reason: ' + status);
        }
    });
}