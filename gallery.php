<?php include 'header.php';?>

<?php include 'banner.html';?>

<script type="text/javascript" src="js/opentype.min.js"></script>
<link rel="stylesheet" href="site.css">

<script type="text/javascript">
var tr = $.tr.translator();
opentype.load('http://192.168.1.31/fonts/FiraSansMedium.woff', function(err, font) {
    if (err) {
         alert('Font could not be loaded: ' + err);
    } else {
        var ctx = document.getElementById('canvas').getContext('2d');
        var path = font.getPath(tr('Leisure activities'), 0, 50, 36);
        path.draw(ctx);
    }
});
</script>

<div id="information" class="spacer reserve-info" >
<div class="container">

       <h1 class="title" id="gallery">Gallerij</h1>
       <div class="row gallery">
              <div class="col-sm-4 wowload fadeInUp"><a href="images/photos/gallery/34-P0834_01-02-12.jpg" title="Foods" class="gallery-image" data-gallery><img src="images/photos/gallery/34-P0834_01-02-12.jpg" class="img-responsive"></a></div>
              <div class="col-sm-4 wowload fadeInUp"><a href="images/photos/gallery/35-a trier 080.jpg" title="Coffee" class="gallery-image" data-gallery><img src="images/photos/gallery/35-a trier 080.jpg" class="img-responsive"></a></div>
              <div class="col-sm-4 wowload fadeInUp"><a href="images/photos/gallery/37-DSC00369.JPG" title="Travel" class="gallery-image" data-gallery><img src="images/photos/gallery/37-DSC00369.JPG" class="img-responsive"></a></div>
              <div class="col-sm-4 wowload fadeInUp"><a href="images/photos/gallery/38-fot 032.jpg" title="Adventure" class="gallery-image" data-gallery><img src="images/photos/gallery/38-fot 032.jpg" class="img-responsive"></a></div>
              <div class="col-sm-4 wowload fadeInUp"><a href="images/photos/gallery/39-DSC00587.JPG" title="Summer" class="gallery-image" data-gallery><img src="images/photos/gallery/39-DSC00587.JPG" class="img-responsive"></a></div>
              <div class="col-sm-4 wowload fadeInUp"><a href="images/photos/gallery/41-Michelin 2011 025.jpg" title="Bathroom" class="gallery-image" data-gallery><img src="images/photos/gallery/41-Michelin 2011 025.jpg" class="img-responsive"></a></div>
              <div class="col-sm-4 wowload fadeInUp"><a href="images/photos/gallery/42-100_1169.jpg" title="Big Room" class="gallery-image" data-gallery><img src="images/photos/gallery/42-100_1169.jpg" class="img-responsive"></a></div>
              <div class="col-sm-4 wowload fadeInUp"><a href="images/photos/gallery/45-Michelin 2011 193.jpg" title="Living Room" class="gallery-image" data-gallery><img src="images/photos/gallery/45-Michelin 2011 193.jpg" class="img-responsive"></a></div>
              <div class="col-sm-4 wowload fadeInUp"><a href="images/photos/gallery/47-Michelin 2011 390.jpg" title="Travel" class="gallery-image" data-gallery><img src="images/photos/gallery/47-Michelin 2011 390.jpg" class="img-responsive"></a></div>
              <div class="col-sm-4 wowload fadeInUp"><a href="images/photos/gallery/48-Michelin 2011 195.jpg" title="Travel" class="gallery-image" data-gallery><img src="images/photos/gallery/48-Michelin 2011 195.jpg" class="img-responsive"></a></div>
              <div class="col-sm-4 wowload fadeInUp"><a href="images/photos/gallery/49-DSC00581.JPG" title="Travel" class="gallery-image" data-gallery><img src="images/photos/gallery/49-DSC00581.JPG" class="img-responsive"></a></div>
              <div class="col-sm-4 wowload fadeInUp"><a href="images/photos/gallery/51-Oosterblokker op terras.jpg" title="Travel" class="gallery-image" data-gallery><img src="images/photos/gallery/51-Oosterblokker op terras.jpg" class="img-responsive"></a></div>
              <div class="col-sm-4 wowload fadeInUp"><a href="images/photos/gallery/62-Kopie van B&B klaar 008.jpg" title="Travel" class="gallery-image" data-gallery><img src="images/photos/gallery/62-Kopie van B&B klaar 008.jpg" class="img-responsive"></a></div>
              <div class="col-sm-4 wowload fadeInUp"><a href="images/photos/gallery/66-Christine web.jpg" title="Travel" class="gallery-image" data-gallery><img src="images/photos/gallery/66-Christine web.jpg" class="img-responsive"></a></div>
              <div class="col-sm-4 wowload fadeInUp"><a href="images/photos/gallery/67-image.jpg" title="Travel" class="gallery-image" data-gallery><img src="images/photos/gallery/67-image.jpg" class="img-responsive"></a></div>
       </div>
       <h1 class="title" id="location">Locatie</h1>
       <div class="row gallery">
              <div class="col-sm-4 wowload fadeInUp"><a href="images/osmtiles/la_normande_8_878531594216175121.png" title="Travel" class="gallery-image" data-gallery><img src="images/osmtiles/la_normande_8_878531594216175121.png" class="img-responsive"></a></div>
              <div class="col-sm-4 wowload fadeInUp"><a href="images/osmtiles/la_normande_9_194430774646902841.png" title="Travel" class="gallery-image" data-gallery><img src="images/osmtiles/la_normande_9_194430774646902841.png" class="img-responsive"></a></div>
              <div class="col-sm-4 wowload fadeInUp"><a href="images/osmtiles/la_normande_10_5516823767611271719.png" title="Travel" class="gallery-image" data-gallery><img src="images/osmtiles/la_normande_10_5516823767611271719.png" class="img-responsive"></a></div>
              <div class="col-sm-4 wowload fadeInUp"><a href="images/osmtiles/la_normande_11_5898951437099408066.png" title="Travel" class="gallery-image" data-gallery><img src="images/osmtiles/la_normande_11_5898951437099408066.png" class="img-responsive"></a></div>
              <div class="col-sm-4 wowload fadeInUp"><a href="images/osmtiles/la_normande_12_6476550616369612218.png" title="Travel" class="gallery-image" data-gallery><img src="images/osmtiles/la_normande_12_6476550616369612218.png" class="img-responsive"></a></div>
              <div class="col-sm-4 wowload fadeInUp"><a href="images/osmtiles/la_normande_13_8846815656947799238.png" title="Travel" class="gallery-image" data-gallery><img src="images/osmtiles/la_normande_13_8846815656947799238.png" class="img-responsive"></a></div>
              <div class="col-sm-4 wowload fadeInUp"><a href="images/osmtiles/la_normande_14_5409678569509710846.png" title="Travel" class="gallery-image" data-gallery><img src="images/osmtiles/la_normande_14_5409678569509710846.png" class="img-responsive"></a></div>
              <div class="col-sm-4 wowload fadeInUp"><a href="images/osmtiles/la_normande_15_4280323408971411836.png" title="Travel" class="gallery-image" data-gallery><img src="images/osmtiles/la_normande_15_4280323408971411836.png" class="img-responsive"></a></div>
              <div class="col-sm-4 wowload fadeInUp"><a href="images/osmtiles/la_normande_16_201654479386665168.png" title="Travel" class="gallery-image" data-gallery><img src="images/osmtiles/la_normande_16_201654479386665168.png" class="img-responsive"></a></div>
              <div class="col-sm-4 wowload fadeInUp"><a href="images/osmtiles/la_normande_17_4591495560777109893.png" title="Travel" class="gallery-image" data-gallery><img src="images/osmtiles/la_normande_17_4591495560777109893.png" class="img-responsive"></a></div>
              <div class="col-sm-4 wowload fadeInUp"><a href="images/osmtiles/la_normande_18_7201560306373162715.png" title="Travel" class="gallery-image" data-gallery><img src="images/osmtiles/la_normande_18_7201560306373162715.png" class="img-responsive"></a></div>
       </div>

	<canvas id="canvas" width="500" height="75" class="text"></canvas>

	<div class="voffset4">
		<div id="target1" data-rotation="0" class="box">
			Wandelen, Fietsen
		</div>
		<div id="target2" data-rotation="0" class="box">
			Bezoeken, Ontspannen
		</div>
		<div id="target3" data-rotation="0" class="box">
			Lekker Eten....
		</div>
	</div>
</div>
</div>

<script src="js/Tween.js"></script>
<script src="js/RequestAnimationFrame.js"></script>

<script>
	init();
	animate();
	function init() {
		var target1 = document.getElementById( 'target1' ),
			tween1 = new TWEEN.Tween( target1.dataset )
				.to( { rotation: 360 }, 2000 )
				.repeat( 1 )
				.delay( 1000 )
				.onUpdate( function() {
					updateBox( target1, this );
				})
				.start(),
		target2 = document.getElementById( 'target2' ),
			tween2 = new TWEEN.Tween( target2.dataset )
				.to( { rotation: 360 }, 2000 )
				.repeat( 5 )
				.delay( 1000 )
				.onUpdate( function() {
					updateBox( target2, this );
				})
				.start(),
		target3 = document.getElementById( 'target3' ),
			tween3 = new TWEEN.Tween( target3.dataset )
				.to( { rotation: 360 }, 2000 )
				.repeat( Infinity )
				.delay( 1000 )
				.onUpdate( function() {
					updateBox( target3, this );
				})
				.start();
	}
	function animate( time ) {
		requestAnimationFrame( animate );
		TWEEN.update( time );
	}
	function updateBox( box, params ) {
		var s = box.style,
			transform = 'rotate(' + Math.floor( params.rotation ) + 'deg)';
		s.webkitTransform = transform;
		s.mozTransform = transform;
		s.transform = transform;
	}
</script>
<style type="text/css">
	.box {
		width: 150px;
		height: 150px;
		margin: 10px;
		padding: 10px;
		display: inline-block;
		float: left;
	}
	#target1 {
		background: #fcc;
	}
	#target2 {
		background: #cfc;
	}
	#target3 {
		background: #ccf;
	}
</style>

<?php include 'footer.php';?>
