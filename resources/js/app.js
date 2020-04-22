
// richiediamo Jquery
const $ = require('jquery');


$(document).ready(function(){
    
    require('./bootstrap');
    
    require('./coordinate_search');

    require('./apartments_filter');

    require('./maps_tomtom');

    /* --↓script per cambiare focus degli input con il tasto Enter-- */
    $('form input').on('keydown', function (event) {
        if (event.which == 13) {
            var inputs = $(this).parents("form").find(":input");
            if (inputs[inputs.index(this) + 1] != null) {
                inputs[inputs.index(this) + 1].focus();
            }
            event.preventDefault();
        }
    });

    
    //     // FX: funzione per calcolare la distanza in km tra due coordinate (utile per selezionare appartamenti in funzione di un dato raggio)
    //     function getDistanceBetweenTwoCoordinatePoints(lat1, lon1, lat2, lon2) {
    //     var p = 0.017453292519943295;    // Math.PI / 180
    //     var c = Math.cos;
    //     var a = 0.5 - c((lat2 - lat1) * p)/2 +
    //             c(lat1 * p) * c(lat2 * p) *
    //             (1 - c((lon2 - lon1) * p))/2;
    //     return 12742 * Math.asin(Math.sqrt(a)); // 2 * R; R = 6371 km
    //   }
});
