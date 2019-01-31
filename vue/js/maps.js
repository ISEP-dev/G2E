var platform = new H.service.Platform({
    'app_id': 'C2JakJ0NagYM7UBvk6bS',
    'app_code': 'GM0CrICCOZGodm8dwz3H0g',
    useHTTPS: true
});

let pixelRatio    = window.devicePixelRatio || 1;
let defaultLayers = platform.createDefaultLayers({
    tileSize: pixelRatio === 1 ? 256 : 512,
    ppi: pixelRatio === 1 ? undefined : 320
});

// Instantiate new Map
let map      = new H.Map(
    document.getElementById('carte'),
    defaultLayers.normal.map,
    {pixelRatio: pixelRatio}
);
let behavior = new H.mapevents.Behavior(new H.mapevents.MapEvents(map));

// Create the default UI components
let ui = H.ui.UI.createDefault(map, defaultLayers, 'fr-FR');

function moveMapToParis(map) {
    map.setCenter({lat: 48.8534, lng: 2.3488});
    map.setZoom(12);
}

moveMapToParis(map);
addInfoBubbleToMarker(map);

// addMarkersToMap(map);

function addMarkersToMap(group, coordinates, title, desc) {
    let parisMarker = new H.map.Marker(coordinates);
    parisMarker.setData("<h4>" + title + "</h4><div class='italic'>" + desc + "</div>");
    group.addObject(parisMarker);
}

function addInfoBubbleToMarker(map) {
    let group = new H.map.Group();
    map.addObject(group);

    group.addEventListener('tap', function (event) {
        let bubble = new H.ui.InfoBubble(event.target.getPosition(), {
            content: event.target.getData()
        });
        ui.addBubble(bubble);
    }, false);

    addMarkersToMap(group, {lat: 48.8567, lng: 2.3508}, "Paris", "Ville de paris");

    addMarkersToMap(group, {lat: 48.8245306, lng: 2.2743419}, "Issy Les Moulineaux", "Ville d'issy");
}


/**
 *
 * Autocompletion adresse
 *
 */

var AUTOCOMPLETION_URL = 'https://autocomplete.geocoder.api.here.com/6.2/suggest.json',
    ajaxRequest        = new XMLHttpRequest(),
    query              = '';

function autoCompleteListener(textBox, event) {

    if (query != textBox.value) {
        if (textBox.value.length >= 1) {
            var params = '?' +
                'query=' + encodeURIComponent(textBox.value) +   // The search text which is the basis of the query
                '&beginHighlight=' + encodeURIComponent('<mark>') + //  Mark the beginning of the match in a token.
                '&endHighlight=' + encodeURIComponent('</mark>') + //  Mark the end of the match in a token.
                '&maxresults=8' +  // The upper limit the for number of suggestions to be included
                // in the response.  Default is set to 5.
                '&app_id=' + 'C2JakJ0NagYM7UBvk6bS' +
                '&app_code=' + 'GM0CrICCOZGodm8dwz3H0g';
            ajaxRequest.open('GET', AUTOCOMPLETION_URL + params);
            ajaxRequest.send();
        }
    }
    query = textBox.value;
}

// Attach the event listeners to the XMLHttpRequest object
ajaxRequest.addEventListener("load", onAutoCompleteSuccess);
ajaxRequest.addEventListener("error", onAutoCompleteFailed);
ajaxRequest.responseType = "json";

function onAutoCompleteSuccess() {
    document.getElementById('result').innerHTML = JSON.stringify(this.response, null, ' ');
}

function onAutoCompleteFailed() {
    alert('Une erreur est survenue durant la recherche');
}
