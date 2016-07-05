/**
 * @description JS file for Starter Theme
 * @author Nick Harberg
 *
 */

var windowState = 'large';

var iPhoneFlag = false;
if( navigator.userAgent.match(/iPhone|iPod/) ) {
    iPhoneFlag = true;
}

// Avoid `console` errors in browsers that lack a console.
(function() {
    var method;
    var noop = function () {};
    var methods = [
        'assert', 'clear', 'count', 'debug', 'dir', 'dirxml', 'error',
        'exception', 'group', 'groupCollapsed', 'groupEnd', 'info', 'log',
        'markTimeline', 'profile', 'profileEnd', 'table', 'time', 'timeEnd',
        'timeline', 'timelineEnd', 'timeStamp', 'trace', 'warn'
    ];
    var length = methods.length;
    var console = (window.console = window.console || {});

    while (length--) {
        method = methods[length];

        // Only stub undefined methods.
        if (!console[method]) {
            console[method] = noop;
        }
    }
}());

$(document).ready(function() {

    // Adds responsive container around iframes - aka YouTube
    $('.entry iframe').wrap('<div class="embedContainer" />');

    //This checks if device is an iPhone and will change out the google maps link
    if( iPhoneFlag ) {
        var example_url = "comgooglemaps://?center=47.275274,-122.307792&zoom=14&views=traffic";
        $('#example_map').attr("href", example_url);
        $('#example_directions').attr("href", example_url);
    }

    /**
     * @description Call different functions based on screen width
     */
    //variable to hold the current window state - small, medium, or large

    //check initial width of the screen
    var sw = document.body.clientWidth;
    if (sw < 501){
        windowState = 'small';
        smPage();
    }else if (sw >= 501 && sw <= 900){
        windowState = 'medium';
        medPage();
    }else {
        windowState = 'large';
        lgPage();
    }
    // Calls Google Maps API - add gps info into loadScript()
    if($('#map_canvas').length) {
        loadScript();
    }

    // Calls Slidebars - set width in px to turn Slidebars off
    $.slidebars({
        disableOver : 1024,
    });

    console.log('connected?');

}); // end document.ready

//take care of window resizing
$(window).resize(function(){
    var sw = document.body.clientWidth;

    if(sw < 601 && windowState != 'small'){
        smPage();
    }
    if(sw >= 601 && sw <= 1024 && windowState != 'medium'){
        medPage();
    }
    if(sw >= 1025 && windowState != 'large'){
        lgPage();
    }
});

/**
 *@description Calls smPage() on screen width less than 37.5625em
 *
 */
function smPage() {
    windowState = 'small';
}

/**
 * @description Calls medPage() on screen width greater than 37.5625em and less than 64em
 *
 */
function medPage() {
    windowState = 'medium';
}
 /**
  * @description Calls lgPage() on screen width greater than 64.0625em.
  *
  */
function lgPage() {
    windowState = 'large';
}

/**
 * @description loading the google maps api
 *  - use with the div id '#map_canvas'
 */

function initialize(lat, lng) {
    var myLat = new google.maps.LatLng(47.619067, -122.320837);
    var mapOptions = {
        zoom: 16,
        center: myLat,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    }
    map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);

    var marker = new google.maps.Marker ({
        position: myLat,
        map: map,
        title: "Phoenix Comics & Games"
    });
}

function loadScript() {
    var script = document.createElement("script");
    script.type = "text/javascript";
    script.src = "https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&callback=initialize";
    document.body.appendChild(script);
}


