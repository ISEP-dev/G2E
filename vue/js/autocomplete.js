function initializeAutocomplete(id) {
    var element = document.getElementById(id);
    if (element) {
        var autocomplete = new google.maps.places.Autocomplete(element, { types: ['geocode'] });
        google.maps.event.addListener(autocomplete, 'place_changed', onPlaceChanged);
    }
}

function onPlaceChanged() {
    var place = this.getPlace();

    // console.log(place);  // Uncomment this line to view the full object returned by Google API.

    for (var i in place.address_components) {
        var component = place.address_components[i];
        for (var j in component.types) {  // Some types are ["country", "political"]
            var type_element = document.getElementById(component.types[j]);
            if (type_element) {
                type_element.value = component.long_name;
            }
        }
    }
}

google.maps.event.addDomListener(window, 'load', function() {
    initializeAutocomplete('adresse-autocomplete');
});
// Empèche l'envoi du formulaire quand on appuie sur la touche entrée
function refuserToucheEntree(event) {
    // Compatibilité IE / Firefox
    if (!event && window.event) {
        event = window.event;
    }
    // IE
    if (event.keyCode === 13) {
        event.returnValue  = false;
        event.cancelBubble = true;
    }
    // DOM
    if (event.which === 13) {
        event.preventDefault();
        event.stopPropagation();
    }
}