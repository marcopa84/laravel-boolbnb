require('./bootstrap');

// importiamo TomTom
import tt from '@tomtom-international/web-sdk-maps';

// richiediamo Jquery
const $ = require('jquery');


//richiamiamo HandleBars
const Handlebars = require("handlebars");

$(document).ready(function(){
    // ↓ creiamo mappa utilizzando TomTom, se esiste un elemento con id="map"
    if ($('#map').length > 0) {
        var coordinates = [$('#map').attr('data-long'), $('#map').attr('data-lat')];
        var map = tt.map({
            container: 'map',
            key: 'gFFCW4AFnFwAIM5ZWPG6Sew8JPYhCY0i',
            style: 'tomtom://vector/1/basic-main',
            center: coordinates,
            zoom: 15,
            pitch: 45
        });
        map.addControl(new tt.NavigationControl());

        // Puntature
        var element = document.createElement('div');
        element.id = 'marker';
        var marker = new tt.Marker({
            element: element,
        });
        marker.setLngLat(coordinates).addTo(map);
    }; // ↑ creiamo mappa utilizzando TomTom, se esiste un elemento con id="map"


    $('#search-address').on('click', function () {
        var address_value = $('#street').val()+' '+$('#number').val()+' '+$('#zip').val()+' '+$('#city').val()+' '+$('#province').val();
        getGeocode(address_value);
    });


    $('#address-form-group').find('input').on('focusin', function () {
        $(this).keydown (
            function(e) {
                if (event.which == 13) {
                    event.preventDefault();
                    var address_value = $('#street').val() + ' ' + $('#number').val() + ' ' + $('#city').val() + ' ' + $('#province').val();
                    getGeocode(address_value);
                }
            }
        )
    });

    $(document).on('click','#address-suggestions-item', function () {
        $('#address').val($(this).find('#address-suggestions-item-content').text());
        $('#latitude').val($(this).attr('data-latitude'));
        $('#longitude').val($(this).attr('data-longitude'));
        $('#address-suggestions').text('');
        console.log($(this).find('#address-suggestions-item-content').text());
    });



    //////////////////////////////////////////////////
    // F U N C T I O N S
    //////////////////////////////////////////////////

    // FX getGeocode: geolocalizzazione di un address che forniamo all'api TomTom tramite chiamata ajax
    function getGeocode(address_value) {
        var source = document.getElementById("address-template").innerHTML;
        var template = Handlebars.compile(source);
        $('#address-suggestions').text('');
        $.ajax({
            url: 'https://api.tomtom.com/search/2/geocode/' + address_value + '.json',
            data: {
                'key': 'gFFCW4AFnFwAIM5ZWPG6Sew8JPYhCY0i',
                'limit': '5',
            },
            method: 'GET',
            success: function (data) {
                var results = data.results;
                console.log(results);
                for (let index = 0; index < results.length; index++) {
                    var context = {
                        address: results[index].address.freeformAddress,
                        latitude: results[index].position.lat,
                        longitude: results[index].position.lon,
                    };
                    var html = template(context);
                    $('#address-suggestions').append(html);
                }

            },
            error: function (richiesta, stato, error) {
                alert('è avvenuto un errore di collegamento')
            }
        });
    };

    // FX: funzione per calcolare la distanza in km tra due coordinate (utile per selezionare appartamenti in funzione di un dato raggio)
    function getDistanceBetweenTwoCoordinatePoints(lat1, lon1, lat2, lon2) {
    var p = 0.017453292519943295;    // Math.PI / 180
    var c = Math.cos;
    var a = 0.5 - c((lat2 - lat1) * p)/2 +
            c(lat1 * p) * c(lat2 * p) *
            (1 - c((lon2 - lon1) * p))/2;
    return 12742 * Math.asin(Math.sqrt(a)); // 2 * R; R = 6371 km
  }
});
