<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<title>Bed and Breakfast | La Normande</title>
<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css" />
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
<link rel="icon" href="favicon.ico" type="image/x-icon">

<!-- font awesome -->
<link href="assets/font-awesome/css/font-awesome.min.css" rel="stylesheet">
<!-- uniform -->
<link type="text/css" rel="stylesheet" href="assets/uniform/css/uniform.default.min.css" />
<!-- animate.css -->
<link rel="stylesheet" href="assets/wow/animate.css" />
<!-- gallery -->
<link rel="stylesheet" href="assets/gallery/blueimp-gallery.min.css">
<link rel="stylesheet" href="assets/themes/smoothness/jquery-ui.css">
<link rel="stylesheet" href="assets/vender/intl-tel-input/css/intlTelInput.css">
<link rel="stylesheet" href="assets/style.css">
<link href="css/animations.css" rel="stylesheet" type="text/css">
<link id="bsdp-css" href="css/datepicker3.css" rel="stylesheet">
<link href='assets/fullcalendar.css' rel='stylesheet' />
<link href='assets/fullcalendar.print.css' rel='stylesheet' media='print' />
<script src='assets/js/moment.min.js'></script>
<script src="assets/js/jquery-1.11.3.min.js"></script>
<script src="js/bootstrap-datepicker.js"></script>
<script src="js/locales/bootstrap-datepicker.nl.js" charset="UTF-8"></script>
<script src="js/locales/bootstrap-datepicker.de.js" charset="UTF-8"></script>
<script src="js/locales/bootstrap-datepicker.en.js" charset="UTF-8"></script>
<script src="js/locales/bootstrap-datepicker.fr.js" charset="UTF-8"></script>
<script src='js/fullcalendar.min.js'></script>
<script src='js/lang/nl.js'></script>
<script src='js/lang/de.js'></script>
<script src='js/lang/fr.js'></script>
<script src='js/lang/en.js'></script>
<script src='assets/js/jquery.cookie.js'></script>
<script src='js/jquery.tr.min.js'></script>
<script src='js/angular.min.js'></script>
<script src="js/angular-route.min.js"></script>
<script src="js/angular-animate.min.js"></script>
<link rel="stylesheet" href="assets/leaflet/leaflet.css" />
<script src="assets/leaflet/leaflet.js"></script>
<link rel="stylesheet" href="assets/leaflet/leaflet-routing-machine.css" />
<script src="assets/leaflet/leaflet-routing-machine.min.js"></script>
<link rel="stylesheet" href="assets/leaflet/Control.Geocoder.css" />
<script src="assets/leaflet/Control.Geocoder.js"></script>
<script src="assets/leaflet/L.Routing.Localization.js"></script>
<link rel="stylesheet" href="assets/leaflet/Control.MiniMap.min.css" />
<script src="assets/leaflet/Control.MiniMap.min.js"></script>
<link rel="stylesheet" href="assets/leaflet/leaflet.magnifyingglass.css" />
<link rel="stylesheet" href="assets/leaflet/Control.MagnifyingGlass.css" />
<script src="assets/leaflet/leaflet.magnifyingglass.js"></script>
<script src="assets/leaflet/magnifying_button.js"></script>
<link rel="stylesheet" href="assets/leaflet/leaflet.fullscreen.css" />
<script src="assets/leaflet/Leaflet.fullscreen.min.js"></script>
<script src="assets/leaflet/MovingMarker.js"></script>
<link rel="stylesheet" href="assets/leaflet/leaflet.draw.css" />
<script src="assets/leaflet/leaflet.draw.js"></script>
<link rel="stylesheet" href="assets/leaflet/MarkerCluster.Default.css" />
<link rel="stylesheet" href="assets/leaflet/MarkerCluster.css" />
<script src="assets/leaflet/leaflet.markercluster.js"></script>
<script src="assets/leaflet/leaflet.smoothmarkerbouncing.js"></script>
<link rel="stylesheet" href="assets/leaflet/leaflet.contextmenu.css" />
<script src="assets/leaflet/leaflet.contextmenu.js"></script>
<script src="assets/leaflet/leaflet.utfgrid.js"></script>
<script src="assets/leaflet/leaflet.label.js"></script>
<link rel="stylesheet" href="assets/leaflet/leaflet.label.css" />
<script src="assets/leaflet/leaflet.awesome-markers.min.js"></script>
<link rel="stylesheet" href="assets/leaflet/leaflet.awesome-markers.css" />
<script src="assets/leaflet/leaflet.extra-markers.js"></script>
<link rel="stylesheet" href="assets/leaflet/leaflet.extra-markers.css" />
<script src="assets/leaflet/Leaflet.MakiMarkers.js"></script>
<script src="assets/leaflet/leaflet-search.min.js"></script>
<link rel="stylesheet" href="assets/leaflet/leaflet-search.min.css" />
<script src="js/underscore-min.js"></script>
<link rel="stylesheet" href="assets/leaflet/Leaflet.vector-markers.css" />
<script src="assets/leaflet/Leaflet.vector-markers.js"></script>

<?php
session_start(); // this MUST be called prior to any output including whitespaces and line breaks!
function echoActiveClassIfRequestMatches($requestUri) {
    $current_file_name = basename($_SERVER['REQUEST_URI'], ".php");
    if (0 === strpos($current_file_name, $requestUri)) 
         echo 'class="active"';
}
?>
<script src="assets/translation.js"></script>
<script>
	function getTileURL(lat, lon, zoom) {
	    var xtile = parseInt(Math.floor( (lon + 180) / 360 * (1<<zoom) ));
	    var ytile = parseInt(Math.floor( (1 - Math.log(Math.tan(lat.toRad()) + 1 / Math.cos(lat.toRad())) / Math.PI) / 2 * (1<<zoom) ));
	    return "" + zoom + "/" + xtile + "/" + ytile;
	}
	function generateUUID() {
		var d = new Date().getTime();
		var uuid = 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function(c) {
			var r = (d + Math.random()*16)%16 | 0;
			d = Math.floor(d/16);
			return (c=='x' ? r : (r&0x3|0x8)).toString(16);
		});
		return uuid;
	};
	function renderCalendar() {
		$('#calendar1').fullCalendar({
			contentHeight: 400,
//			defaultDate: '2015-03-01',
			lang: currentLangCode,
			editable: true,
			eventLimit: true, // allow "more" link when too many events
			events: {
				url: 'php/events1.php'
			},
			loading: function(bool) {
				$('#loading').toggle(bool);
			}
		});
		$('#calendar2').fullCalendar({
			contentHeight: 400,
//			defaultDate: '2015-03-01',
			lang: currentLangCode,
			editable: true,
			eventLimit: true, // allow "more" link when too many events
			events: {
				url: 'php/events2.php'
			},
			loading: function(bool) {
				$('#loading').toggle(bool);
			}
		});
		$('#calendar3').fullCalendar({
			contentHeight: 400,
//			defaultDate: '2015-03-01',
			lang: currentLangCode,
			editable: true,
			eventLimit: true, // allow "more" link when too many events
			events: {
				url: 'php/events3.php'
			},
			loading: function(bool) {
				$('#loading').toggle(bool);
			}
		});
		$('#calendar4').fullCalendar({
			contentHeight: 400,
//			defaultDate: '2015-03-01',
			lang: currentLangCode,
			editable: true,
			eventLimit: true, // allow "more" link when too many events
			events: {
				url: 'php/events4.php'
			},
			loading: function(bool) {
				$('#loading').toggle(bool);
			}
		});
	}
	$(document).ready(function() {
		var l = $.cookie('language');
		if (l) {
		    currentLangCode = l;
		    myFunction(currentLangCode);
		    $('[id^="en_"]').hide();
		    $('[id^="fr_"]').hide();
		    $('[id^="de_"]').hide();
		    $('[id^="nl_"]').hide();
		    if ("en" == l) $('[id^="en_"]').show();
		    if ("fr" == l) $('[id^="fr_"]').show();
		    if ("de" == l) $('[id^="de_"]').show();
		    if ("nl" == l) $('[id^="nl_"]').show();
		}
		else {
		    myFunction(currentLangCode);
		    $('[id^="en_"]').hide();
		    $('[id^="fr_"]').hide();
		    $('[id^="de_"]').hide();
		    $('[id^="nl_"]').hide();
		    if ("en" == currentLangCode) $('[id^="en_"]').show();
		    if ("fr" == currentLangCode) $('[id^="fr_"]').show();
		    if ("de" == currentLangCode) $('[id^="de_"]').show();
		    if ("nl" == currentLangCode) $('[id^="nl_"]').show();	
		}
		renderCalendar();
		$('#datepicker').datepicker({
                    format: "dd-mm-yyyy",
                    todayHighlight: true,
                    todayBtn: true,
                    language: currentLangCode
		});
		if (typeof(Number.prototype.toRad) === "undefined") {
	  		Number.prototype.toRad = function() {
	    			return this * Math.PI / 180;
	  		}
		}
	});
</script>

<!-- EXTRACT ADDITIONAL STYLING HERE =======> -->
<style>
   .container {
      width:         auto;
      max-width:     800px;
      padding-left:  30px;
      padding-right: 30px;
   }
   .form-group {
      margin-bottom: 8px;
   }
   #feedbackForm {
      font-size: 12px;
   }
   .red {
     border-radius: 120px;
     opacity: .75;
     background-color: #FF0000;
   }
   .blue {
     border-radius: 120px;
     opacity: .75;
     background-color: #0000FF;
   }
   .lime {
     border-radius: 120px;
     opacity: .75;
     background-color: #00FF00;
   }
   .iconclass {
      width:         50px;
      height:        50px;
   }   
</style>

</head>

<body id="home">

<?php include("navbar.html"); ?> 
