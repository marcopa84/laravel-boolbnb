//richiamiamo HandleBars
const Handlebars = require("handlebars");

//RICERCA COORDINATE IN HOME
$('#search-address-home').on('click', function () {
    var address_value = $('#address').val();
    getGeocode(address_value);
});
$(document).on('click', '#address-suggestions-item', function () {
    $('#address').val($(this).find('#address-suggestions-item-content').text());
    $('#latitude').val($(this).attr('data-latitude'));
    $('#longitude').val($(this).attr('data-longitude'));
    $('#address-suggestions').text('');
    console.log($(this).find('#address-suggestions-item-content').text());
});
//RICERCA COORDINATE IN HOME


// RICERCA COORDINATE CREATE
$('#search-address').on('click', function () {
    var address_value = $('#street').val() + ' ' + $('#number').val() + ' ' + $('#zip').val() + ' ' + $('#city').val() + ' ' + $('#province').val();
    getGeocode(address_value);
});

$('#address-form-group').find('input').on('focusin', function () {
    $(this).keydown(
        function (e) {
            if (event.which == 13) {
                event.preventDefault();
                var address_value = $('#street').val() + ' ' + $('#number').val() + ' ' + $('#zip').val() + ' ' + $('#city').val() + ' ' + $('#province').val();
                getGeocode(address_value);
            }
        }
    )
});

$(document).on('click', '#address-suggestions-item', function () {
    $('#address').val($(this).find('#address-suggestions-item-content').text());
    $('#latitude').val($(this).attr('data-latitude'));
    $('#longitude').val($(this).attr('data-longitude'));
    $('#address-suggestions').text('');
    console.log($(this).find('#address-suggestions-item-content').text());
});
// RICERCA COORDINATE CREATE



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