
// richiediamo Jquery
const $ = require('jquery');


$(document).ready(function(){

    require('./bootstrap');

    require('./apartments_pages');

    require('./coordinate_search');

    require('./apartments_filter');

    require('./maps_tomtom');

    var chart = require('chart.js');
    
});
