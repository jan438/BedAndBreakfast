<?php include 'header.php';?>

<?php include 'banner.html';?>

<script src="json/sample-geojson.js" type="text/javascript"></script>
<script src="json/netherlands_borders.js" type="text/javascript"></script>
<script src="json/cuba_borders.js" type="text/javascript"></script>
<script src="json/province_borders.js" type="text/javascript"></script>
<script src="json/BAGLigplaats.js" type="text/javascript"></script>
<script src="json/BAGVerblijfsplaats.js" type="text/javascript"></script>
<script src="json/BAGStandplaats.js" type="text/javascript"></script>
<script src="json/BAGPand.js" type="text/javascript"></script>
<script src="json/BAGAlbertHeijn.js" type="text/javascript"></script>

<div id="information" class="spacer reserve-info ">
<div class="container">
	<div class="row-fluid">
		<div class="col-md-offset-2 col-md-8">
			<h1 class="title" id="location">Locatie</h1>
   			<div class="row">
			<div id="map" class="map" style="width:500px; height:500px;"></div>
			<script>
			var myTimeOut;
			var overlayMaps = {};
			var stadiums = [
				[52.314167, 4.941944],
				[51.893603, 4.522933],
				[51.441667, 5.466944],
				[52.236667, 6.8375],
				[52.958611, 5.936111],
				[51.9625, 5.893056],
				[52.078333, 5.145833],
				[53.205833, 6.591667],
				[51.595556, 4.750278],
				[50.856944, 6.005833],
				[52.6125, 4.741667]
			];
			var planes = [
				["Sprookjeswonderland", 52.712633, 5.289446],
				["Zuiderzeemuseum", 52.708104, 5.300642],
				["Westfries Museum", 52.639083, 5.058917],
				["Museum van de Twintigste Eeuw", 52.638352, 5.061395],
				["Kasteel Radboud", 52.7725, 5.113139]
			];
			var steamtram_hoorn_medemblik = [
				[52.64556, 5.05464],
				[52.64764, 5.07322],
				[52.64928, 5.07434],
				[52.65443, 5.06914],
				[52.65961, 5.06314],
				[52.66749, 5.05885],
				[52.66835, 5.05815],
				[52.68132, 5.03377],
				[52.71073, 5.03177],
				[52.71685, 5.02687],
				[52.71812, 5.02755],
				[52.71858, 5.02865],
				[52.72353, 5.05275],
				[52.72779, 5.07468],
				[52.72928, 5.07625],
				[52.75506, 5.07024],
				[52.75959, 5.07217],
				[52.76185, 5.07703],
				[52.76548, 5.08665],
				[52.76723, 5.09269],
				[52.77312, 5.10091],
				[52.77401, 5.10562]
			];
			var boat_medemblik_enkhuizen = [
				[52.77484, 5.10636],
				[52.76495, 5.24355],
				[52.75295, 5.29724],
				[52.71215, 5.32059],
				[52.69899, 5.29015]
			];
			var train_enkhuizen_hoorn = [
				[52.69957, 5.28819],
				[52.69816, 5.27488],
				[52.69603, 5.25319],
				[52.69529, 5.24598],
				[52.69502, 5.23607],
				[52.69534, 5.21135],
				[52.69031, 5.18274],
				[52.68553, 5.15879],
				[52.66766, 5.11078],
				[52.65345, 5.08511],
				[52.64812, 5.07509],
				[52.64458, 5.05996],
				[52.64554, 5.05458]
			];
			var tramicon = L.icon({
				iconUrl: 'images/tram.png',
    				iconSize: [32, 32]
			});
			var boaticon = L.icon({
				iconUrl: 'images/boat.png',
    				iconSize: [32, 32]
			});
			var trainicon = L.icon({
				iconUrl: 'images/train.png',
    				iconSize: [32, 32]
			});
			var tr = $.tr.translator();
			var pause_text = tr("pause_text");
			var start_text = tr("start_text");
			var end_text_medemblik = tr("Welcome in &1!", "Medemblik");
			var end_text_enkhuizen = tr("Welcome in &1!", "Enkhuizen");
			var end_text_hoorn     = tr("Welcome in &1!", "Hoorn");
			var data = BAG_Alberheijn_Placemarks;
			var map,
			cm,
			ll = new L.LatLng(52.4893, 4.75898),
			ll2 = new L.LatLng(52.46914, 4.7427);
			function showCoordinates (e) {
				alert(e.latlng);
			}
			function centerMap (e) {
				map.panTo(e.latlng);
			}
			function zoomIn (e) {
				map.zoomIn();
			}
			function zoomOut (e) {
				map.zoomOut();
			}
			var osmLink = '<a href="http://openstreetmap.org">OpenStreetMap</a>',
			thunLink = '<a href="http://thunderforest.com/">Thunderforest</a>';        
			var osmUrl = 'http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
			osmAttrib = '&copy; ' + osmLink + ' Contributors',
			landUrl = 'http://{s}.tile.thunderforest.com/landscape/{z}/{x}/{y}.png',
			transportUrl = 'http://{s}.tile.thunderforest.com/transport/{z}/{x}/{y}.png',
			thunAttrib = '&copy; '+osmLink+' Contributors & '+thunLink;
			var osmMap = L.tileLayer(osmUrl, {attribution: osmAttrib}),
			landMap = L.tileLayer(landUrl, {attribution: thunAttrib}),
			transportMap = L.tileLayer(transportUrl, {attribution: thunAttrib});
			map = L.map('map', {
				zoom: 15,
				contextmenu: true,
				contextmenuWidth: 140,
				contextmenuItems: [{
					text: 'Show coordinates',
					callback: showCoordinates
				}, {
					text: 'Center map here',
					callback: centerMap
				}, '-', {
					text: 'Zoom in',
					icon: 'images/zoom-in.png',
					callback: zoomIn
				}, {
					text: 'Zoom out',
					icon: 'images/zoom-out.png',
					callback: zoomOut
				}],
				detectRetina: true,     
				fullscreenControl: true,
				layers: [osmMap] // only add one!
			})
			.setView([52.681599, 5.150296], 14);
			var baseLayers = {
				"OSM Mapnik": osmMap,
				"Landscape": landMap,
				"Transport": transportMap
			};
			L.control.layers(baseLayers, overlayMaps, {position: 'topleft'}).addTo(map);
			L.Map = L.Map.extend({
				openPopup: function(popup) {
					//        this.closePopup();  // just comment this
					this._popup = popup;
					return this.addLayer(popup).fire('popupopen', {
					popup: this._popup
					});
				}
			});
			var popup = L.popup();
			var marker_tram = L.Marker.movingMarker(steamtram_hoorn_medemblik,[1276,198,672,705,924,107,2189,3277,757,149,90,1716,1553,197,2898,521,413,764,451,858,332], 
				{autostart: false});
			marker_tram.setIcon(tramicon);
			marker_tram.addTo(map);
			marker_tram.once('click', function () {
				marker_tram.start();
				marker_tram.closePopup();
				marker_tram.unbindPopup();
				marker_tram.on('click', function() {
					if (marker_tram.isRunning()) {
						marker_tram.closePopup();
						marker_tram.unbindPopup();
						clearTimeout(myTimeOut);
						marker_tram.pause();
					} else {
						marker_tram.closePopup();
						marker_tram.unbindPopup();
						clearTimeout(myTimeOut);
						marker_tram.start();
					}
    				});
				myTimeOut = setTimeout(function() {
					marker_tram.bindPopup(pause_text).openPopup();
					setTimeout(function() {
						marker_tram.closePopup();
					}, 2000);
				}, 2000);
			});
			var marker_boat = L.Marker.movingMarker(boat_medemblik_enkhuizen,
    				[3000, 3000, 3000, 3000], 
				{autostart: false});
			marker_boat.setIcon(boaticon);
			marker_boat.addTo(map);
			marker_boat.once('click', function () {
				marker_boat.start();
				marker_boat.closePopup();
				marker_boat.unbindPopup();
				marker_boat.on('click', function() {
					if (marker_boat.isRunning()) {
						marker_boat.closePopup();
						marker_boat.unbindPopup();
						clearTimeout(myTimeOut);
						marker_boat.pause();
					} else {
						marker_boat.closePopup();
						marker_boat.unbindPopup();
						clearTimeout(myTimeOut);
						marker_boat.start();
					}
    				});
				myTimeOut = setTimeout(function() {
					marker_boat.bindPopup(pause_text).openPopup();
					setTimeout(function() {
						marker_boat.closePopup();
					}, 2000);
				}, 2000);
			});
			var marker_train = L.Marker.movingMarker(train_enkhuizen_hoorn,
    				[912,1482,493,669,1668,2010,1701,3802,2347,900,1095,379],
				{autostart: false});
			marker_train.setIcon(trainicon);
			marker_train.addTo(map);
			marker_train.once('click', function () {
				marker_train.start();
				marker_train.closePopup();
				marker_train.unbindPopup();
				marker_train.on('click', function() {
					if (marker_train.isRunning()) {
						marker_train.closePopup();
						marker_train.unbindPopup();
						clearTimeout(myTimeOut);
						marker_train.pause();
					} else {
						marker_train.closePopup();
						marker_train.unbindPopup();
						clearTimeout(myTimeOut);
						marker_train.start();
					}
    				});
				myTimeOut = setTimeout(function() {
					marker_train.bindPopup(pause_text).openPopup();
					setTimeout(function() {
						marker_train.closePopup();
					}, 2000);
				}, 2000);
			});
			marker_tram.bindPopup(start_text, {closeOnClick: false}).openPopup();
			setTimeout(function() {
				marker_tram.closePopup();
			}, 10000);
			L.polyline(steamtram_hoorn_medemblik, {color: 'green'}).addTo(map);
			marker_boat.bindPopup(start_text, {closeOnClick: false}).openPopup();
			setTimeout(function() {
				marker_boat.closePopup();
			}, 10000);	
			L.polyline(boat_medemblik_enkhuizen, {color: 'blue'}).addTo(map);
			marker_train.bindPopup(start_text, {closeOnClick: false}).openPopup();
			setTimeout(function() {
				marker_train.closePopup();
			}, 10000);	
			L.polyline(train_enkhuizen_hoorn, {color: 'gray'}).addTo(map);
			marker_tram.on('end', function() {
    				marker_tram.bindPopup(end_text_medemblik, {closeOnClick: false}).openPopup();
				setTimeout(function() {
					marker_tram.closePopup();
				}, 2000);
				marker_boat.closePopup();
				marker_boat.unbindPopup();
				marker_boat.start();
			});
			marker_boat.on('end', function() {
    				marker_boat.bindPopup(end_text_enkhuizen, {closeOnClick: false}).openPopup();
				setTimeout(function() {
					marker_boat.closePopup();
				}, 2000);
				marker_train.closePopup();
				marker_train.unbindPopup();
				marker_train.start();
			});
			marker_train.on('end', function() {
    				marker_train.bindPopup(end_text_hoorn, {closeOnClick: false}).openPopup();
				setTimeout(function() {
					marker_train.closePopup();
				}, 2000);
				marker_tram.closePopup();
				marker_tram.unbindPopup();
				marker_tram.start();
			});
			for (var i = 0; i < planes.length; i++) {
				marker = new L.marker([planes[i][1],planes[i][2]])
					.bindPopup(planes[i][0])
					.addTo(map);
			}
			L.Routing.control({
				waypoints: [
					L.latLng(52.6816, 5.1503),
					L.latLng(52.4895, 4.7423)
				],
				routeWhileDragging: true,
				geocoder: L.Control.Geocoder.nominatim({
//					serviceUrl: "http://192.168.1.31/nominatim/"
					serviceUrl: 'http://nominatim.openstreetmap.org/'
				}),
				language: $.cookie('language'),
				router: L.Routing.osrm({
//					serviceUrl: 'http://192.168.1.31/viaroute'
					serviceUrl: 'http://router.project-osrm.org/viaroute'
				})
			}).addTo(map);
			L.control.weather({
				units: "metric",
				lang: $.cookie('language'),
				template: '<div class="weatherIcon"><img src=":iconurl"></div><div>T: :temperature°C</div><div>H: :humidity%</div><div>W: :winddirection :windspeed m/s</div>',
			}).addTo(map);
			var geocoder = L.Control.Geocoder.nominatim({
//				serviceUrl: "http://192.168.1.31/nominatim/"
				serviceUrl: 'http://nominatim.openstreetmap.org/'
			});
			var osm2 = new L.TileLayer(osmUrl, {minZoom: 0, maxZoom: 13, attribution: osmAttrib });
			var miniMap = new L.Control.MiniMap(osm2, { toggleDisplay: true }).addTo(map);
			var magnifyingGlass = L.magnifyingGlass({
				zoomOffset: 3,
				layers: [
					L.tileLayer(osmUrl, osmAttrib)
    				]
			});
			L.control.magnifyingglass(magnifyingGlass, {
				forceSeparateButton: true
			}).addTo(map);
			var southwest = L.latLng(51.56597, 3.77655);
			var northeast = L.latLng(51.56683, 3.77792);		
			var imageUrl = 'images/tile1_botercartoons.jpg',
    				imageBounds = [southwest, northeast];
			L.imageOverlay(imageUrl, imageBounds).addTo(map);
			map.on('click', function(e) {
				console.log(e.latlng);
				geocoder.reverse(e.latlng, map.options.crs.scale(map.getZoom()), function(results) {
					var r = results[0];
					if (r) {
						if (marker) {
							marker.
							setLatLng(r.center).
							setPopupContent(r.html || r.name).
							openPopup();
						} else {
							marker = L.marker(r.center).bindPopup(r.name).addTo(map).openPopup();
						}
					}
				})
			});
			var resultIcon = L.icon({
				iconUrl: 'images/road.png',
    				iconSize: [32, 32]
			});
			L.marker(ll, {
				contextmenu: true,
				contextmenuItems: [{
				text: 'Marker item',
					index: 0
				}, {
					separator: true,
					index: 1
				}]
			}).addTo(map);
			L.marker(ll2, {
				contextmenu: true,
				contextmenuInheritItems: false,
				contextmenuItems: [{
					text: 'Marker item'
				}]
			}).addTo(map);
			function onEachFeature(feature, layer) {
				var popupContent = "";
				if (feature.properties && feature.properties.popupContent) {
					popupContent += feature.properties.popupContent;
				}
				layer.bindPopup(popupContent);
			}
			L.geoJson([ferry], {
				style: function (feature) {
					return feature.properties && feature.properties.style;
				},
				onEachFeature: onEachFeature,
				pointToLayer: function (feature, latlng) {
					return L.circleMarker(latlng, {
						radius: 8,
						fillColor: "#ff7800",
						color: "#000",
						weight: 1,
						opacity: 1,
						fillOpacity: 0.8
					});
				}
			}).addTo(map);
			L.geoJson([university, campus], {
				style: function (feature) {
					return feature.properties && feature.properties.style;
				},
				onEachFeature: onEachFeature,
				pointToLayer: function (feature, latlng) {
					return L.circleMarker(latlng, {
						radius: 8,
						fillColor: "#ff7800",
						color: "#000",
						weight: 1,
						opacity: 1,
						fillOpacity: 0.8
					});
				}
			}).addTo(map);
			L.geoJson([BAGVerblijfsobject], {
				style: function (feature) {
					return feature.properties && feature.properties.style;
				},
				onEachFeature: onEachFeature,
				pointToLayer: function (feature, latlng) {
					return L.circleMarker(latlng, {
						radius: 8,
						fillColor: "#CCCC00",
						color: "#000",
						weight: 1,
						opacity: 1,
						fillOpacity: 0.8
					});
				}
			}).addTo(map);
			var countryStyle = {
				"color": "#ff7800",
				"weight": 5,
				"opacity": 0.65
			};
			var defaultProvinceStyle = {
				"color": "#2262CC",
				"weight": 2,
				"opacity": 0.6,
				"fillOpacity": 0.1,
				"fillColor": "#2262CC"
			};
			var highlightProvinceStyle = {
				"color": '#2262CC', 
				"weight": 3,
				"opacity": 0.6,
				"fillOpacity": 0.65,
				"fillColor": '#2262CC'
			};
			var defaultLigplaatsStyle = {
				"color": "#009999",
				"weight": 2,
				"opacity": 0.6,
				"fillOpacity": 0.1,
				"fillColor": "#009999"
			};
			var highlightLigplaatsStyle = {
				"color": '#009999', 
				"weight": 3,
				"opacity": 0.6,
				"fillOpacity": 0.65,
				"fillColor": '#009999'
			};
			var defaultStandplaatsStyle = {
				"color": "#CC6699",
				"weight": 2,
				"opacity": 0.6,
				"fillOpacity": 0.1,
				"fillColor": "#CC6699"
			};
			var highlightStandplaatsStyle = {
				"color": '#CC6699', 
				"weight": 3,
				"opacity": 0.6,
				"fillOpacity": 0.65,
				"fillColor": '#CC6699'
			};
			var defaultPandStyle = {
				"color": "#99FF66",
				"weight": 2,
				"opacity": 0.6,
				"fillOpacity": 0.1,
				"fillColor": "#99FF66"
			};
			var highlightPandStyle = {
				"color": '#99FF66', 
				"weight": 3,
				"opacity": 0.6,
				"fillOpacity": 0.65,
				"fillColor": '#99FF66'
			};
			var onEachProvince = function(feature, layer) {
				layer.setStyle(defaultProvinceStyle);
				(function(layer, properties) {
					layer.on("mouseover", function (e) {
						layer.setStyle(highlightProvinceStyle);
						var popup = $("<div></div>", {
							id: "popup-" + properties.DISTRICT,
							css: {
								position: "absolute",
								bottom: "85px",
								left: "50px",
								zIndex: 1002,
								backgroundColor: "white",
								padding: "8px",
								border: "1px solid #ccc"
							}
						});
						var hed = $("<div></div>", {
							text: "Province " + properties.DISTRICT + ": " + properties.REPRESENTATIVE,
							css: {
								fontSize: "16px", marginBottom: "3px"
							}
						}).appendTo(popup);
						popup.appendTo("#map");
					});
					layer.on("mouseout", function (e) {
						layer.setStyle(defaultProvinceStyle); 
						$("#popup-" + properties.DISTRICT).remove();
					});
				})(layer, feature.properties);
			};
			var provinceLayer = L.geoJson(province_borders, {
    				onEachFeature: onEachProvince
			});
			map.addLayer(provinceLayer);
			var onEachLigplaats = function(feature, layer) {
				var ligplaatsUUID = generateUUID();
				layer.setStyle(defaultLigplaatsStyle);
				(function(layer, properties) {
					layer.on("mouseover", function (e) {
						layer.setStyle(highlightLigplaatsStyle);
						var popup = $("<div></div>", {
							id: "popup-" + ligplaatsUUID,
							css: {
								position: "absolute",
								bottom: "85px",
								left: "50px",
								zIndex: 1002,
								backgroundColor: "white",
								padding: "8px",
								border: "1px solid #ccc"
							}
						});
						var hed = $("<div></div>", {
							text: "" + properties.POSTCODE + ": " + properties.HUISNUMMER + ": " + properties.WOONPLAATS,
							css: {
								fontSize: "16px", marginBottom: "3px"
							}
						}).appendTo(popup);
						popup.appendTo("#map");
					});
					layer.on("mouseout", function (e) {
						layer.setStyle(defaultLigplaatsStyle); 
						$("#popup-" + ligplaatsUUID).remove();
					});
				})(layer, feature.properties);
			};
			var BAGLigplaatsLayer = L.geoJson(BAG_Ligplaats_Placemarks, {
    				onEachFeature: onEachLigplaats
			});
			map.addLayer(BAGLigplaatsLayer);
			var onEachStandplaats = function(feature, layer) {
				var standplaatsUUID = generateUUID();
				layer.setStyle(defaultStandplaatsStyle);
				(function(layer, properties) {
					layer.on("mouseover", function (e) {
						layer.setStyle(highlightStandplaatsStyle);
						var popup = $("<div></div>", {
							id: "popup-" + standplaatsUUID,
							css: {
								position: "absolute",
								bottom: "85px",
								left: "50px",
								zIndex: 1002,
								backgroundColor: "white",
								padding: "8px",
								border: "1px solid #ccc"
							}
						});
						var hed = $("<div></div>", {
							text: "" + properties.POSTCODE + ": " + properties.HUISNUMMER + ": " + properties.WOONPLAATS,
							css: {
								fontSize: "16px", marginBottom: "3px"
							}
						}).appendTo(popup);
						popup.appendTo("#map");
					});
					layer.on("mouseout", function (e) {
						layer.setStyle(defaultStandplaatsStyle); 
						$("#popup-" + standplaatsUUID).remove();
					});
				})(layer, feature.properties);
			};
			var BAGStandplaatsLayer = L.geoJson(BAG_Standplaats_Placemarks, {
    				onEachFeature: onEachStandplaats
			});
			map.addLayer(BAGStandplaatsLayer);
			var onEachPand = function(feature, layer) {
				var pandUUID = generateUUID();
				layer.setStyle(defaultPandStyle);
				(function(layer, properties) {
					layer.on("mouseover", function (e) {
						layer.setStyle(highlightPandStyle);
						var popup = $("<div></div>", {
							id: "popup-" + pandUUID,
							css: {
								position: "absolute",
								bottom: "85px",
								left: "50px",
								zIndex: 1002,
								backgroundColor: "white",
								padding: "8px",
								border: "1px solid #ccc"
							}
						});
						var hed = $("<div></div>", {
							text: "" + properties.BOUWJAAR + ": " + properties.STATUS + ": " + properties.OPPERVLAKTE,
							css: {
								fontSize: "16px", marginBottom: "3px"
							}
						}).appendTo(popup);
						popup.appendTo("#map");
					});
					layer.on("mouseout", function (e) {
						layer.setStyle(defaultPandStyle); 
						$("#popup-" + pandUUID).remove();
					});
				})(layer, feature.properties);
			};
			var BAGPandLayer = L.geoJson(BAG_Pand_Placemarks, {
    				onEachFeature: onEachPand
			});
			map.addLayer(BAGPandLayer);
			L.geoJson(netherlands_borders, {
				style: countryStyle
			}).addTo(map);
			L.geoJson(cuba_borders, {
				style: countryStyle
			}).addTo(map);
			var featuresLayer = new L.GeoJSON(data, {
				style: function(feature) {
					return {color: feature.properties.color };
				},
				onEachFeature: function(feature, marker) {
					marker.bindPopup('<h4 style="color:' + feature.properties.color + '">AH ' + feature.properties.name +'</h4>\n<h6 style="color"="black">Oppervlakte: ' + feature.properties.oppervlakte + '</h6>');
				}
			});
			map.addLayer(featuresLayer);
			var searchControl = new L.Control.Search({layer: featuresLayer, propertyName: 'name', circleLocation:false});
			searchControl.on('search_locationfound', function(e) { e.layer.setStyle({fillColor: '#3f0', color: '#0f0'});
				if (e.layer._popup) e.layer.openPopup();
			}).on('search_collapsed', function(e) {
				featuresLayer.eachLayer(function(layer) {	//restore feature color
					featuresLayer.resetStyle(layer);
				});	
			});
			map.addControl(searchControl);  //inizialize search control
			BallIcon = L.Icon.extend({
				options: {
					iconUrl: 'images/ball.png',
					shadowUrl: 'images/ball-shadow.png',
					iconSize:     [35, 36],
					shadowSize:   [34, 10],
					iconAnchor:   [18, 36],
					shadowAnchor: [18, 5],
					popupAnchor:  [0, -46],
				}
    			});
			for (var i = 0; i < stadiums.length; i++) {
				var a = stadiums[i];
				var marker = new L.marker(a, {
						icon: new BallIcon()
					}).setBouncingOptions({
						bounceHeight: 40,
						contractHeight: 20,
						bounceSpeed: 60,
						contractSpeed: 30,
						shadowAngle: null
					}).on('click', function() {
					this.bounce(3);
				}).addTo(map);
			}
			L.marker([52.4771158,4.8017678], {icon: L.VectorMarkers.icon({icon: 'spinner', prefix: 'fa', markerColor: '#cb4b16', spin: true}) }).addTo(map);
			L.marker([52.4540541,4.8362956], {icon: L.VectorMarkers.icon({icon: 'rocket', prefix: 'fa', markerColor: '#002b36', iconColor: '#eee8d5'}) }).addTo(map);
			L.marker([52.46649466761527,4.745426774134103], {icon: L.VectorMarkers.icon({icon: 'rocket', prefix: 'fa', markerColor: '#eee8d5', iconColor: '#002b36'}) }).addTo(map);
			var marker = new L.marker([0,0], {icon: resultIcon})
					.bindPopup("center")
					.addTo(map);
			L.marker([52.681599, 5.150296]).addTo(map).bindPopup('La Normande<br />BedAndBreakfast').openPopup();
			</script>
			</div>
			<div class="row" id="fr_location">
			<br>
			<br>
			<p>Entre campagne et lac d'Ijssel
La ferme traditionnelle "La Normande" se situe  au milieu des anciens polders de la Hollande septentrionnale, tout près de la mer fermée que l'on appelle de nos jours, le lac d'Ijssel. Westwoud vous offre donc les plaisirs de la campagne, mais aussi, du bord de l'eau. A quelques kilomètres, il fait bon longer la côte, à vélo et découvrir le spectacle des vieux grééments qui y déploient leurs voiles.
A 35 km, un peu plus à l'Ouest, vous découvrirez l'immensité des plages de sable fin sur la mer du Nord.
Les amoureux de la campagne, comme ceux attirés par le bord de l'eau, se délecteront dans notre paysage à multiples facettes.
La Normande est en plein centre de la Hollande Septentrionale. Au coeur du triangle du Nord qui rassemble les belles villes de Medemblik, Hoorn et Enkhuizen, La Normande vous permettra d’accéder à de nombreux sites exceptionnels en peu de temps. Voici une liste non-exhaustive de ces lieux, afin de découvrir pleinement les environs de Westwoud.</p>
  	    		<table class="table voffset4" width="647">
    				<thead>
    				<tr class="success">
    				</tr>
    				</thead>
    				<tbody>
    				<tr class="warning">
    				<td>Amsterdam</td>
    				<td>à 50 minutes en voiture et en train, la capitale vous ouvre grand les portes de ses musées renommés et de ses nombreuses activités ! Sillonnez les canaux, promenez-vous dans les parcs et emmenez vos enfants dans le plus vieux zoo d’Europe!</td>
    				</tr>
    				<tr class="warning">
    				<td>Hoorn</td>
    				<td>ville au centre pittoresque, de nombreux gréements sont amarrés dans son port et le bord de mer vous offrira une balade agréable, agrémentée de pauses shopping dans les magasins de la rue principale.</td>
    				</tr>
    				<tr class="warning">
    				<td>Enkhuizen</td>
    				<td>à seulement 15km, la cité aux 550 voiliers vous ouvre ses portes. Pour passer un agréable moment de divertissement, le Zuiderzee Museum retrace l’histoire de la Hollande du 20ème siècle grandeur nature. C’est une visite incontournable pour les familles.</td>
    				</tr>
    				<tr class="warning">
    				<td>Medemblik</td>
    				<td>cette petite ville vous charmera par ses nombreuses églises, son ancienne gare et son accès direct à la mer.</td>
    				</tr>
    				<tr class="warning">
    				<td>Alkmaar</td>
    				<td>la grande ville d’Alkmaar vous séduira par ses vieux monuments et  son marché au fromage qui se tient le Vendredi matin sur la grande place.</td>
    				</tr>
    				<tr class="warning">
    				<td>Volendam</td>
    				<td>de grande renommée dans le monde footballistique, Volendam est aussi un village portuaire authentique, où l’on peut flâner dans les nombreuses boutiques de souvenirs. Petit détail insolite : il est également possible de se faire prendre en photo en costume traditionnel!</td>
    				</tr>
    				<tr class="warning">
    				<td>Edam</td>
    				<td>lle village du fameux fromage ! Ces charmantes ruelles longeant les canaux font d’Edam la carte postale de la Hollande.</td>
    				</tr>
    				<tr class="warning">
    				<td>Marken</td>
    				<td>accessible par la route ou en bateau depuis Volendam, la presqu’île de Marken est un épisode immanquable de votre séjour. Petites maisons de pêcheurs en bois, fabrique de sabots et champs de mouton entre les habitations, Marken est un endroit propice aux balades.</td>
    				</tr>
    				<tr class="warning">
    				<td>Den Helder et les iles du Wadden</td>
    				<td>grand port d’Europe, Den Helder est la ville la plus au Nord de la Hollande Septentrionale. Avec des paysages très secs, cette ville animée est le point de départ pour visiter l’île de Texels, une des îles du Wadden réputée pour sa bière.</td>
    				</tr>
    				<tr class="warning">
    				<td>Callantsoog</td>
    				<td>à quelques kilomètres de Den Helder, Callantsoog est un village balnéaire situé entre dunes et mer. Elle vous offre également la possibilité d’être en contact avec la nature, par le biais de fabuleuses promenades dans le Zwanenwater, un parc naturel de 600 hectares où la nature est florissante et étonnante : orchidées, oiseaux migrateurs...</td>
    				</tr>
    				<tr class="warning">
    				<td>Lelystad</td>
    				<td>en passant par la digue qui commence à Enkhuizen, vous rejoindrez la ville de Lelystad. Lelystad qui abrite une reproduction taille réelle d’un bâteau de la Compagnie des Indes de Hollande du 17ème siècle. Une visite idéale pour les enfants !</td>
    				</tr>
    				</tbody>
    	    		</table>
			</div>
			<div class="row" id="en_location">
			<br>
			<br>
			<h3>Holland Waterland</h3>
<p>This province surrounded by water on three sides has so much to offer for a varied short or long holiday. In fact, North Holland is Holland in a nutshell. All those elements that are so typical of the Netherlands you will here. 
Beautiful beaches, dunes, polder landscapes, historic towns and villages with exciting museums and cosy restaurants, water everywhere, miles and miles of foot and cycling paths, blooming bulb-fields each spring and much much more. 
Den Helder, at the tip of North Holland, is the Netherlands most important naval base and home to its Royal Naval College. During the summer months, you can take a pleasant thirty minutes car-ferry trip from Den Helder to Texel, a quiet family-oriented resort island in the Waddenzee.
La Normande is in the center of North Holland. In the heart of the North triangle which brings the beautiful cities as Medemblik, Hoorn and Enkhuizen, La Normande will permit to have access to many exceptional sites in a few time. This is a non-exhaustive list of these places, to fully explore the Westwoud’s surrounding.</p>
  	    		<table class="table voffset4" width="647">
    				<thead>
    				<tr class="success">
    				</tr>
    				</thead>
    				<tbody>
    				<tr class="warning">
    				<td>Amsterdam</td>
    				<td>30 minutes by car and train, the capital opens the doors of its famous museums and its many activities ! Furrow canals, stroll through parks and take your children to the oldest zoo in Europe !</td>
    				</tr>
    				<tr class="warning">
    				<td>Hoorn</td>
    				<td>city with a picturesque city-center, many old ships are moored in the port and the seaside offer a nice walk, enliven with shopping-breaks in the stores on the main street.</td>
    				</tr>
    				<tr class="warning">
    				<td>Enkhuizen</td>
    				<td>from 15 km, Enkhuizen is the city of the 550 old ships. To spend a pleasant moment of entertainment, the Zuiderzee Museum traces the Holland’s history of 20th century. This is a must visit for families.</td>
    				</tr>
    				<tr class="warning">
    				<td>Medemblik</td>
    				<td>this little city will enjoy you with its many churches, its old station and its direct access to the sea.</td>
    				</tr>
    				<tr class="warning">
    				<td>Alkmaar</td>
    				<td>the great city of Alkmaar will seduce you by its ancient monuments and its cheese market held on Friday morning on the square.</td>
    				</tr>
    				<tr class="warning">
    				<td>Volendam</td>
    				<td>renowned in the footballing world, is also an authentic port town, where you can stroll through the many souvenir shops. Unusual small detail : it’s also possible to have a picture taken in traditional costume !</td>
    				</tr>
    				<tr class="warning">
    				<td>Edam</td>
    				<td>the village’s famous cheese ! These charming streets along the canals make Edam the postcard of Holland.</td>
    				</tr>
    				<tr class="warning">
    				<td>Marken</td>
    				<td>accessible by road or by boat from Volendam, Marken peninsula is an unmissable episode of your stay. Small fishermen’s houses in wood, a clog factory and fields of sheep between houses, Marken is a good place to stroll.</td>
    				</tr>
    				<tr class="warning">
    				<td>Den Helder et les iles du Wadden</td>
    				<td>largest port in Europe, Den Helder is the big city of North Holland. With very dry landscapes, this bustling city is the starting point to visit the island of Texels, an island famous for its beer.</td>
    				</tr>
    				<tr class="warning">
    				<td>Callantsoog</td>
    				<td>a few kilometers from Den Helder, Callantsoog is a seaside village located between dunes and sea. It also offers the opportunity to be in complete contact with nature, through Zwanenwater fabulous walks in a nature park of 600 ares, where fauna and flora are thriving and amazing : orchids, migratory birds, lakes, forests...</td>
    				</tr>
    				<tr class="warning">
    				<td>Lelystad</td>
    				<td>through the dike from Enkhuizen, you will reach the city of Lelystad. This city propose a reproduction of a « pirate »’s boat of the Dutch Company (VOC) of the 17th century. An ideal visit for children, prepare to board !!</td>
    				</tr>
    				</tbody>
    	    		</table>
			</div>
			<div class="row" id="de_location">
			<br>
			<br>
			<h3>Zwischen Polderlandschaft und IJsselmeer</h3>
			<p>Westwoud ist ein wesfriesisches Dorf in einer wunderschönen Polderlandschaft mit Haubergen, Weideland und Wassergraben. Die Umgebung ist super geeignet zum Spazieren gehen oder Fahrrad fahren. In der Umgebung ist ein Golfplatz. Museumliebhaber können Museen in den Nachbarsorten besuchen. Westwoud liegt zwischen Hoorn (7 kilometer), Enkhuizen (12 kilometer) und Medemblik (12 kilometer): drei schöne Hafenstädte am IJsselmeer.

Nordholland ist perfekt für den Familienurlaub, denn die Provinz bietet bezaubernde Kontraste und Abwechslung: hundert Kilometer Küste mit endlosen Stränden und einzigartigen Dünengebieten zum Spazieren und Toben. Bezaubernd sind im Frühjahr die lang gestreckten Blumenfelder.
Die kilometerlange Sandstrände sind ideal für entspannende Spaziergängen und Sonnenbäder in Badeorten wie Egmond aan Zee, Callantsoog oder Julianadorp. Im modernen Zandvoort pulsiert das Leben: Flanieren Sie auf dem Boulevard, besuchen Sie das Kasino oder verfolgen Sie im Circuit gebannt ein internationales Autorennen. Am Hafen von IJmuiden können Sie bei einem "kopje koffie" die schicken Hochseeyachten bestaunen. Die reiche Geschichte Nordhollands lässt sich bis heute vielerorts finden.
Malerische Städte wie Volendam, Muiden und Medemblik erzählen von einer Zeit als das IJsselmeer noch Zuiderzee hieß und einen offenen Zugang zur Nordsee besaß.
In den Städten Hoorn und Enkhuizen befinden sich bis zum heutigen Tag Zeugnisse der Vereinigten Ostindischen Handelskompanie (VOC). Die Anlegestellen jener Zeit sind heute verträumte Häfen für Segel- und Motorjachten. In den Innenstädten prägen verzierte Patrizierhäuser das Bild und zeugen vom Reichtum vergangener Tage.</p>
			</div>
			<div class="row" id="nl_location">
			<br>
			<br>
			<h3>Westwoud en haar omgeving</h3>
  	    		<table class="table voffset4" width="647">
    				<thead>
    				<tr class="success">
    				<th colspan="3" align="center">Top 10 Nederlandse musea</th>
     				</tr>
    				</thead>
    				<tbody>
    				<tr class="warning">
    				<td>1</td>
    				<td>Zuiderzeemuseum (Noord-Holland): 8.61</td>
    				</tr>
    				<tr class="warning">
    				<td>2</td>
    				<td>Oorlogsmuseum (Noord-Brabant): 8.57</td>
    				</tr>
    				<tr class="warning">
    				<td>3</td>
    				<td>Nederlands Openluchtmuseum (Gelderland): 8.56</td>
    				</tr>
    				<tr class="warning">
    				<td>4</td>
    				<td>Marinemuseum (Noord-Holland): 8.52</td>
    				</tr>
    				<tr class="warning">
    				<td>5</td>
    				<td>Het gevangenismuseum (Drenthe): 8.51</td>
    				</tr>
    				<tr class="warning">
    				<td>6</td>
    				<td>Kröller-Müller Museum (Gelderland): 8.50</td>
    				</tr>
    				<tr class="warning">
    				<td>7</td>
    				<td>Paleis Het Loo (Gelderland): 8.31</td>
    				</tr>
    				<tr class="warning">
    				<td>8</td>
    				<td>Kaap Skil Museum van Jutters & Zeelui (Noord-Holland): 8.20</td>
    				</tr>
    				<tr class="warning">
    				<td>9</td>
    				<td>Herinneringscentrum Kamp Westerbork (Drenthe): 8.17</td>
    				</tr>
    				<tr class="warning">
    				<td>10</td>
    				<td>Het Spoorwegmuseum (Utrecht): 8.06</td>
    				</tr>
    				</tbody>
    	    		</table>
			<p>De Kop van Noord-Holland is een rustig gebied met veel water, uitgestrekte poldergebieden en mooie stranden. De kuststrook is maar liefst 30 km lang, met badplaatsen als Julianadorp, Groote Keten, Callantsoog en Petten. Diverse kanalen, sloten en binnenwateren trekken vele visliefhebbers aan. En een netwerk van kilometers lange goede fietspaden zorgt ervoor, dat overal prachtige fietstochten kunnen worden gemaakt. Vanuit Den Helder bereikt u het Noord-Hollandse waddeneiland Texel. "Het Zwanenwater" geniet bekendheid om zijn lepelaar kolonie en 2 grote duinmeren in de buurt van Callantsoog.
De zuidelijker gelegen dorpen Bergen en Bergen aan Zee worden begrensd door duinen, bos, polder en Noordzeestrand. Alkmaar is een oude stad met ruim 400 monumenten. Met het verleden als decor heeft de stad een modern winkelbestand met een breed aanbod. Het is de grootste stad in de regio en daardoor ook het uitgaanscentrum.</p>
			</div>
		</div>
	</div>
</div>
</div>

<br>
<br>
<br>
<?php include 'footer.php';?>
