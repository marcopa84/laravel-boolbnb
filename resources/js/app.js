
// richiediamo Jquery
const $ = require('jquery');


$(document).ready(function(){

    require('./bootstrap');

    require('./apartments_pages');

    require('./coordinate_search');

    require('./apartments_filter');

    require('./maps_tomtom');

    require('./hamburger-menu');

    // require('popper.js/dist/umd/popper');

    var chart = require('chart.js');

});
