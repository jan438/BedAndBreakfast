<?php include 'header.php';?>

<?php include 'banner.html';?>
 
<script src="assets/leaflet/angular-leaflet-directive.min.js"></script>

<style>
.f32 .flag{display:inline-block;height:32px;width:128px;text-align:right;line-height:32px;background:url(assets/leaflet/flags32.png) no-repeat;}
.flag:hover
{
background-color:#FFFF99;
}
</style>

<link rel="stylesheet" href="assets/leaflet/flags32.css" />

<!-- reservation-information -->
<div id="information" class="spacer reserve-info ">
<div class="container">
	<div class="row-fluid">
		<div class="col-md-offset-2 col-md-8">
			<h1 class="title" id="surroundings">Omgeving</h1>
   			<div id="form_links" ng-app="lanormande" ng-controller="MapController" class="row">
				<script>
				var current_tram_position = 0;
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
				var app = angular.module("lanormande", ["leaflet-directive"]);
				var openstreetmap = {
					name: 'OpenStreetMap',
					type: 'xyz',
					url: 'http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
					layerOptions: {
						attribution: '&copy; <a href="http://openstreetmap.org">OpenStreetMap</a> Contributors'
					}										
				};
				var mapboxlight = {
					name: 'Mapbox Light',
					url: 'http://api.tiles.mapbox.com/v4/{mapid}/{z}/{x}/{y}.png?access_token={apikey}',
					type: 'xyz',
					layerOptions: {
						apikey: 'pk.eyJ1IjoiYnVmYW51dm9scyIsImEiOiJLSURpX0pnIn0.2_9NrLz1U9bpwMQBhVk97Q',
						attribution: '&copy; <a href="http://openstreetmap.org">OpenStreetMap</a> Contributors',
              					minZoom: 6,

						mapid: 'bufanuvols.lia22g09'
					}
				};
				var thunderforest = {
					name: 'Thunderforest',
					url: 'http://{s}.tile.thunderforest.com/transport/{z}/{x}/{y}.png',
					type: 'xyz',
					layerOptions: {
						attribution: '&copy; <a href="http://openstreetmap.org">OpenStreetMap</a> Contributors & <a href="http://thunderforest.com/">Thunderforest</a>'
					}
				};
				var countries = {
					name: 'Countries',
					type: 'xyz',
					url: 'http://{s}.tiles.mapbox.com/v3/milkator.press_freedom/{z}/{x}/{y}.png',
					visible: true,
					layerOptions: {
//						attribution: 'Map data &copy; 2013 Natural Earth | Data &copy; 2013 <a href="http://www.reporter-ohne-grenzen.de/ranglisten/rangliste-2013/">ROG/RSF</a>',
              					maxZoom: 5
					}
				};
				var utfGrid = {
					name: 'UTFGrid Interactivity',
					type: 'utfGrid',
					url: 'http://{s}.tiles.mapbox.com/v3/mapbox.geography-class/{z}/{x}/{y}.grid.json?callback={cb}',
					visible: true,
					layerOptions: {
              					maxZoom: 5
					}				
				};
				var group = {
					name: 'Group Layer',
					type: 'group',
					visible: true,
					layerOptions: {
						layers: [ mapboxlight, countries, utfGrid ]
					}
				};
				app.controller('MapController', [ '$scope', 'leafletEvents', '$http', '$interval', 'leafletData', 'leafletBoundsHelpers', '$location', function($scope, leafletEvents, $http, $interval, leafletData, leafletBoundsHelpers, $location) {
					$scope.clicked = 0;
					$scope.definedLayers = {
						openStreetMap: openstreetmap,
						thunderForest: thunderforest,
						mapboxLight: mapboxlight,
						mapboxcountries: group
					}
					var addressPointsToMarkers = function(points) {
						return points.map(function(ap) {
							return {
								layer: ap[2],
								icon: icons[ap[3]],
								lat: ap[0],
								lng: ap[1],
								label: {
									message: ap[4],
									options: {
										noHide: ap[5]
									}
								}
							}
						})
					};
					var bounds = leafletBoundsHelpers.createBoundsFromArray([
						[ 0, 0 ],
						[ 0, 0 ]
					]);
					var refreshIntervalInSeconds = 600;
					var actualSeconds = 0;
					$interval(function() {
						if (actualSeconds === refreshIntervalInSeconds) {
							$scope.layers.overlays.traffic.doRefresh = true;
//							console.log("Overlay refreshed.")
							actualSeconds = 0;
						} else {
//							console.log("Next update of overlay in " + (refreshIntervalInSeconds - actualSeconds) + " seconds.");
							actualSeconds += 1;
						}
					}, 1000);
					var specialPlaces = {
						BoterCartoons: {
							lat: 52.4895,
							lng: 4.7423
						},
						LaNormande: {
							lat: 52.6816,
							lng: 5.1503
						},
						Vader: {
							lat: 52.4893,
							lng: 4.75898
						}
					};
					var pathsDict = {
						circleMarker1: {
							type: "circleMarker",
							radius: 50,
							latlngs: specialPlaces.BoterCartoons
						},
						circleMarker2: {
							type: "circleMarker",
							radius: 50,
							latlngs: specialPlaces.LaNormande
						},
						circleMarker3: {
							type: "circleMarker",
							radius: 50,
							latlngs: specialPlaces.Vader
						}
					};
					var icons = [
						{type:'div',iconSize:[10, 10],className:'blue',iconAnchor:[5, 5]},
						{type:'div',iconSize:[10, 10],className:'red',iconAnchor:[5, 5]},
						{type:'div',iconSize:[10, 10],className:'lime',iconAnchor:[5, 5]},
						{iconUrl:'img/leaf-green.png',shadowUrl:'img/leaf-shadow.png',iconSize:[38,95],shadowSize:[50,64],iconAnchor:[22,94],shadowAnchor:[4,62],popupAnchor:[-3,-76]},
						{iconUrl:'img/leaf-orange.png',shadowUrl:'img/leaf-shadow.png',iconSize:[38, 95],shadowSize:[50, 64],iconAnchor:[22,94],shadowAnchor: [4, 62],popupAnchor:[-3,-76]},
						{type:'awesomeMarker',icon:'tag',markerColor:'red'},
						{type:'makiMarker',icon:'car',color:'#f00',size:"l"},
						{type:'extraMarker',icon:'fa-star',markerColor:'#f00',prefix:'fa',shape: 'circle'},
						{iconUrl:'images/tent.png',className:'iconclass',iconSize:[50,50]},
						{iconUrl:'images/tram.png',className:'iconclass',iconSize:[50,50]}
					];
					leafletData.getGeoJSON().then(function(lObjs) {
						window.leafletDataGeoJSON = lObjs;
					});
					angular.extend($scope, {
						lanormande: {
							lat: 52.681599,
							lng: 5.150296,
							zoom: 14
						},
						defaults: {
							scrollWheelZoom: false
						},
						geojson:{},
						layers: {
							baselayers: {
								openStreetMap: openstreetmap,
								thunderForest: thunderforest,
								mapboxLight: mapboxlight,
								mapboxcountries: group
							},
							overlays: {
								companies: {
									name: "Companies",
									type: "markercluster",
									visible: true
								},
								schools: {
									name: "Schools",
									type: "markercluster",
									visible: true
								},
								houses: {
									name: "Houses",
									type: "markercluster",
									visible: true
								},
								volunteers: {
									name: "Volunteers",
									type: "markercluster",
									visible: true
								},
								circuits: {
									name: "Circuits",
									type: "markercluster",
									visible: true
								},
								campings: {
									name: "Campings",
									type: "markercluster",
									visible: true
								},
								shapes: {
									name: 'Shapes',
									type: 'group',
									visible: false
								},
								traffic: {
									name: "Traffic Jams",
									type: "xyz",
									url: "http://map.be-mobile.be/customer/mobileninja/nl/los/{z}/{x}/{y}.png",
									visible: 1,
									doRefresh: false
								},
								trams: {
									name: 'Trams',
									type: 'markercluster',
									visible: true
								},
								draw: {
									name: 'draw',
									type: 'group',
									visible: true,
									layerParams: {
										showOnSelector: false
									}
								}
							}
						},
						controls: {},
						markers: {},
						paths: {                    
							r1: {
								latlngs: [ [ 51.56597, 3.77655 ], [ 51.56683, 3.77792 ] ],
								type: 'rectangle',
								layer: 'shapes'
							},
							p1: {
								color: 'green',
								weight: 8,
								latlngs: steamtram_hoorn_medemblik,
								label: {message: "<h3>Stoomtram Hoorn - Medemblik</h3><p>Afstand 21,5 km</p>"}
							},
							c1: {
								type: "circleMarker",
								latlngs: [ 52.51897564344599, 4.68872308752907 ],
								stroke: false,
								fillColor: "#00FFFF",
								fillOpacity: 0.7,
								radius: 10,
								clickable: true
							}
						},
						events: {
							map: {
								enable: ['click', 'drag', 'blur', 'touchstart'],
								logic: 'emit'
							},
							marker: {
								enable: [ 'click', 'mouseover' ]
							},
							path: {
								enable: [ 'click', 'mouseover' ]
							}
						}
					});
					leafletData.getMap().then(function(map) {
						leafletData.getLayers().then(function(baselayers) {
							var drawnItems = baselayers.overlays.draw;
							map.on('draw:created', function (e) {
								var layer = e.layer;
								drawnItems.addLayer(layer);
								console.log(JSON.stringify(layer.toGeoJSON()));
							});
						});
					});
					$scope.$on('leafletDirectivePath.click', function (event) {
						$scope.clicked++;
					});
					$scope.$on('leafletDirectivePath.mouseover', function (event, path) {
						$scope.mouseover = path.modelName;
					});
					$scope.addShape = function(shape) {
						$scope.paths[shape] = pathsDict[shape];
					};
					$scope.interactivity = "";
					$scope.flag = "";
					$scope.$on('leafletDirectiveMap.utfgridMouseover', function(event, leafletEvent) {
						// the UTFGrid information is on leafletEvent.data
						$scope.interactivity = leafletEvent.data.admin;
						$scope.flag = "data:image/png;base64," + leafletEvent.data.flag_png;
					});
					$scope.$on('leafletDirectiveMap.utfgridMouseout', function(event, leafletEvent) {
						$scope.interactivity = "";
						$scope.flag = "";
					});
					$scope.regions = {
						australia: leafletBoundsHelpers.createBoundsFromArray([
							[ -37.846663, 144.97284 ], [ -37.848833, 144.970092 ]
						]),
						malaysia: leafletBoundsHelpers.createBoundsFromArray([
							[ 2.761992, 101.738892 ], [ 2.759247, 101.736145 ]
						]),
						china: leafletBoundsHelpers.createBoundsFromArray([
							[ 31.339563, 121.223145 ], [ 31.337216, 121.220397 ]
						]),
						bahrein: leafletBoundsHelpers.createBoundsFromArray([
							[ 26.032107, 50.515137 ], [ 26.029638, 50.51239 ]
						]),
						spain: leafletBoundsHelpers.createBoundsFromArray([
							[ 41.570252, 2.260438 ], [ 41.568196, 2.25769 ]
						]),
						monaco: leafletBoundsHelpers.createBoundsFromArray([
							[ 43.735384, 7.421265 ], [ 43.733398, 7.418518 ]
						]),
						canada: leafletBoundsHelpers.createBoundsFromArray([
							[ 45.502497, -73.520507 ], [ 45.500571, -73.523255 ]
						]),
						austria: leafletBoundsHelpers.createBoundsFromArray([
							[ 47.221434, 14.765626 ], [ 47.219568, 14.762878 ]
						]),
						unitedkingdom: leafletBoundsHelpers.createBoundsFromArray([ 
							[ 52.079507, -1.016235 ], [ 52.077818, -1.018982 ]
						]),
						hungary: leafletBoundsHelpers.createBoundsFromArray([
							[ 47.583937, 19.253541 ], [ 47.582083, 19.250793 ]
						]),
						belgium: leafletBoundsHelpers.createBoundsFromArray([
							[ 50.445263, 5.965577 ], [ 50.443513, 5.962829 ]
						]),
						italy: leafletBoundsHelpers.createBoundsFromArray([
							[ 45.61788, 9.283448 ], [ 45.615958, 9.2807 ]
						]),
						singapore: leafletBoundsHelpers.createBoundsFromArray([
							[ 1.293531, 103.864747 ], [ 1.290784, 103.861999 ]
						]),
						japan: leafletBoundsHelpers.createBoundsFromArray([
							[ 34.843113, 136.540833 ], [ 34.8679, 136.51611 ]
						]),
						russia: leafletBoundsHelpers.createBoundsFromArray([
							[ 43.409039, 39.968262 ], [ 43.407042, 39.965515 ]
						]),
						america: leafletBoundsHelpers.createBoundsFromArray([
							[ 30.133251, -97.638244 ], [ 30.130875, -97.640992 ]
						]),
						mexico: leafletBoundsHelpers.createBoundsFromArray([
							[ 19.404431, -99.088439 ], [ 19.401839, -99.091187 ]
						]),
						brazil: leafletBoundsHelpers.createBoundsFromArray([
							[ -23.699864, -46.694641 ], [ -23.70238, -46.697388 ]
						]),
						abudhabi: leafletBoundsHelpers.createBoundsFromArray([
							[ 24.497147, 54.604798 ], [ 24.494646, 54.60205 ]
						])
					};
					$scope.$on("centerUrlHash", function(event, centerHash) {
						console.log("url1", centerHash);
						$location.search({ c: centerHash });
					});
					$http.get("json/realworld.10000.json").success(function(data) {
//						console.log(data);
						$scope.markers = addressPointsToMarkers(data);
					});
					$http.get("json/all.json").success(function(data) {
						$scope.countries = {};
						for (var i=0; i<data.length; i++) {
							var country = data[i];
							$scope.countries[country['alpha-3']] = country;
//							console.log(country);
						}
					});
					var geojsonMouseover = function (feature, leafletEvent) {
						var layer = leafletEvent.target;
						layer.setStyle({
							weight: 2,
							color: '#666',
							fillColor: 'white'
						});
						layer.bringToFront();
					};
					$scope.$on("leafletDirectiveGeoJson.mouseover", function(ev, leafletPayload) {
						geojsonMouseover(leafletPayload.leafletObject.feature, leafletPayload.leafletEvent);
					});
					$scope.move = function() {
						current_tram_position = current_tram_position + 1;
						if (current_tram_position == steamtram_hoorn_medemblik.length) {
							current_tram_position = 0;
						}
						$scope.markers[38].lat = steamtram_hoorn_medemblik[current_tram_position][0];
						$scope.markers[38].lng = steamtram_hoorn_medemblik[current_tram_position][1];
					};
					$scope.centerJSON = function(name) {
						leafletData.getMap().then(function(map) {
							window.leafletMap = map;
							var latlngs = [];
							for (var i in $scope.geojson[name].data.features[0].geometry.coordinates) {
								var coord = $scope.geojson[name].data.features[0].geometry.coordinates[i];
								for (var j in coord) {
									var points = coord[j];
									for (var k in points) {
										latlngs.push(L.GeoJSON.coordsToLatLng(points[k]));
									}
								}
							}
							map.fitBounds(latlngs);
						});
					};
					$http.get("json/family.geo.json").success(function(data, status) {
						angular.extend($scope.geojson, {
							family: {
								data: data,
								resetStyleOnMouseout: true,
								style: {
									fillColor: "green",
									weight: 2,
									opacity: 1,
									color: 'white',
									dashArray: '3',
									fillOpacity: 0.7
								}
							}
						});
					});
					$http.get("json/albertheijn.geo.json").success(function(data, status) {
						angular.extend($scope.geojson, {
							albertheijn:{
								data: data,
								resetStyleOnMouseout: true,
								style: {
									fillColor: "blue",
									weight: 2,
									opacity: 1,
									color: 'white',
									dashArray: '3',
									fillOpacity: 0.7
								}
							}
						});
					});
					$http.get("json/botercartoons.geo.json").success(function(data, status) {
						angular.extend($scope.geojson, {
							botercartoons:{
								data: data
							}
						});
					});
					$http.get("json/golfbaan.geo.json").success(function(data, status) {
						angular.extend($scope.geojson, {
							golfbaan:{
								data: data
							}
						});
					});
					$http.get("json/karting.geo.json").success(function(data, status) {
						angular.extend($scope.geojson, {
							karting:{
								data: data
							}
						});
					});
					$scope.$on('leafletDirectivePath.mouseover', function (event, path) {
						console.log("Mouseover:" + path.modelName);
					});
					$scope.$on("leafletDirectiveMarker.mouseover", function(event, args){
						console.log(args.layerName,args.modelName);
					});
					$scope.$on("leafletDirectiveMap.click", function(event, args){
						var leafEvent = args.leafletEvent;
						console.log(leafEvent.latlng.lat,leafEvent.latlng.lng);
					});
					// Wait for center to be stablished
					leafletData.getMap().then(function() {
						angular.extend($scope.controls, {
							fullscreen: {
								position: 'topleft'
							},
							scale: {
								position: 'bottomleft'
							},
							draw: {
								position: 'topleft'
							},
							search: {
								url: 'http://nominatim.openstreetmap.org/search?format=json&q={s}',
								jsonpParam: 'json_callback',
								propertyName: 'display_name',
								propertyLoc: ['lat','lon']
							},
							minimap: {
								type: 'minimap',
								layer: openstreetmap,
								toggleDisplay: true
							}
						});

					});
				}]);
				</script>
				<leaflet maxbounds="maxbounds" bounds="bounds" center="lanormande" markers="markers" layers="layers" paths="paths" controls="controls" event-broadcast="events" geojson="geojson" geojson-nested="true" url-hash-center="yes" style="width:500px; height:500px;"></leaflet>
				<ul class="voffset4">
				<li><a href="" ng-click="centerJSON('golfbaan')">Golfbaan Westwoud</a><img src="images/golf.png" style="width:75px;height:75px;border:0"></li>
				<li><a href="" ng-click="centerJSON('karting')">HappyDays Noord-Holland</a><img src="images/kart.png" style="width:75px;height:75px;border:0"></li>
				<li><a href="" ng-click="centerJSON('botercartoons')">BoterCartoons</a><img src="images/tile1_botercartoons.jpg" style="width:75px;height:75px;border:0"></li>
				</ul>
				<div class="voffset4">
					<button type="button" ng-click="addShape('circleMarker1')" class="btn btn-default">BoterCartoons</button>
					<button type="button" ng-click="addShape('circleMarker2')" class="btn btn-default">La Normande</button>
					<button type="button" ng-click="addShape('circleMarker3')" class="btn btn-default">Vader</button>
				</div>
				<div class="voffset4" id="flag_interactivity">
					<h5>{{interactivity}}</h5>
					<p><img ng-src="{{flag}}"></p>
				</div>
				<form class="voffset4 f32">
					<button class="flag au" ng-click="maxbounds=regions.australia"><font face="verdana" color="#337ab7" size="2">australia</font></button>
					<button class="flag my" ng-click="maxbounds=regions.malaysia"><font face="verdana" color="#337ab7" size="2">malaysia</font></button>
					<button class="flag cn" ng-click="maxbounds=regions.china"><font face="verdana" color="#337ab7" size="2">china</font></button>
					<button class="flag bh" ng-click="maxbounds=regions.bahrein"><font face="verdana" color="#337ab7" size="2">bahrein</font></button>
					<button class="flag es" ng-click="maxbounds=regions.spain"><font face="verdana" color="#337ab7" size="2">spain</font></button>
					<button class="flag mc" ng-click="maxbounds=regions.monaco"><font face="verdana" color="#337ab7" size="2">monaco</font></button>
					<button class="flag ca" ng-click="maxbounds=regions.canada"><font face="verdana" color="#337ab7" size="2">canada</font></button>
					<button class="flag at" ng-click="maxbounds=regions.austria"><font face="verdana" color="#337ab7" size="2">austria</font></button>
					<button class="flag gb" ng-click="maxbounds=regions.unitedkingdom"><font face="verdana" color="#337ab7" size="2">great britain</font></button>
					<button class="flag hu" ng-click="maxbounds=regions.hungary"><font face="verdana" color="#337ab7" size="2">hungary</font></button>
					<button class="flag be" ng-click="maxbounds=regions.belgium"><font face="verdana" color="#337ab7" size="2">belgium</font></button>
					<button class="flag it" ng-click="maxbounds=regions.italy"><font face="verdana" color="#337ab7" size="2">italy</font></button>
					<button class="flag sg" ng-click="maxbounds=regions.singapore"><font face="verdana" color="#337ab7" size="2">singapore</font></button>
					<button class="flag jp" ng-click="maxbounds=regions.japan"><font face="verdana" color="#337ab7" size="2">japan</font></button>
					<button class="flag ru" ng-click="maxbounds=regions.russia"><font face="verdana" color="#337ab7" size="2">russia</font></button>
					<button class="flag us" ng-click="maxbounds=regions.america"><font face="verdana" color="#337ab7" size="2">america</font></button>
					<button class="flag mx" ng-click="maxbounds=regions.mexico"><font face="verdana" color="#337ab7" size="2">mexico</font></button>
					<button class="flag br" ng-click="maxbounds=regions.brazil"><font face="verdana" color="#337ab7" size="2">brazil</font></button>
					<button class="flag ae" ng-click="maxbounds=regions.abudhabi"><font face="verdana" color="#337ab7" size="2">abu-dhabi</font></button>
					<button class="btn btn-default btn-sm" id="id_unset" ng-click="maxbounds={}"><font face="verdana" color="white" size="2">Unset maxbounds</font></button>
				</form>
				<button ng-click="move()" class="voffset4 btn btn-default btn-sm">Move the tram!</button>
				<div class="voffset4">
					<button ng-click="centerJSON('family')" class="btn btn-default btn-sm">Center the family</button>
					<button ng-click="centerJSON('albertheijn')" class="btn btn-default btn-sm">Center Albert Heijn</button>
				</div>
				<div class="voffset4">
					<button ng-click="bounds.address='Assendelft, Netherlands'" class="btn btn-default btn-sm">Assendelft, Netherlands</button>
					<button ng-click="bounds.address='Volendam, Netherlands'" class="btn btn-default btn-sm">Volendam, Netherlands</button>
				</div>
			</div>
		</div>
	</div>  
</div>
</div>

<?php include 'footer.php';?>
