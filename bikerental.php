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
        var path = font.getPath(tr('bikerental'), 0, 50, 36);
        path.draw(ctx);
    }
});
</script>

<div id="information" class="spacer reserve-info ">
	<div class="container">

	<canvas id="canvas" width="500" height="75" class="text"></canvas>

 	<img src="images/large/fietsverhuur.jpg" height="190" width="445">

	</div> <!-- container -->
</div> <!-- information -->

<?php include 'footer.php';?>
