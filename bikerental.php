<?php include 'header.php';?>

<?php include 'banner.html';?>

<script type="text/javascript" src="js/opentype.min.js"></script>
<link rel="stylesheet" href="site.css">
<script type="text/javascript" src="js/jquery.elevatezoom.js"></script>

<script type="text/javascript">
var tr = $.tr.translator();
opentype.load('http://192.168.1.31/fonts/FiraSansMedium.woff', function(err, font) {
    if (err) {
         alert('Font could not be loaded: ' + err);
    } else {
        var ctx = document.getElementById('canvas').getContext('2d');
        var path = font.getPath(tr('bikerental'), 0, 50, 36);
        path.draw(ctx);
    }
});
</script>

<div id="information" class="spacer reserve-info" >
	<div class="container">
		<div class="row">
		<canvas id="canvas" width="500" height="75" class="text"></canvas>
		</div> <!-- row -->
		<div class="row">
			<img id="zoom_01" src='images/small/fietsverhuur.png' data-zoom-image="images/large/fietsverhuur.jpg"/>
		</div> <!-- row -->
		<div class="row" id="de_bikerental">
			<br>
			<br>
			<p>Entre campagne et lac d'Ijssel
Zwischen Polderlandschaft und IJsselmeer


Westwoud ist ein wesfriesisches Dorf in einer wunderschönen Polderlandschaft mit Haubergen, Weideland und Wassergraben. Die Umgebung ist super geeignet zum Spazieren gehen oder Fahrrad fahren. In der Umgebung ist ein Golfplatz. Museumliebhaber können Museen in den Nachbarsorten besuchen. Westwoud liegt zwischen Hoorn (7 kilometer), Enkhuizen (12 kilometer) und Medemblik (12 kilometer): drei schöne Hafenstädte am IJsselmeer.</p>

		</div>	<!-- row -->
	</div> <!-- container -->
</div> <!-- information -->
<script>
    $('#zoom_01').elevateZoom({
	zoomType: "inner",
	cursor: "crosshair",
	zoomWindowFadeIn: 500,
	zoomWindowFadeOut: 750
   }); 
</script>
<?php include 'footer.php';?>
