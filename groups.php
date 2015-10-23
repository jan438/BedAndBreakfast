<?php include 'header.php';?>

<?php include 'banner.html';?>

<link href='http://fonts.googleapis.com/css?family=Roboto+Slab|Calligraffitti|Inconsolata|Dancing+Script|Handlee|Allerta+Stencil' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="css/index.css" />
<script type="text/javascript" src="js/opentype.min.js"></script>
<script type="text/javascript" src="js/lining.min.js"></script>
<script type="text/javascript" src="js/lining.effect.min.js"></script>

<script type="text/javascript">
var tr = $.tr.translator();
opentype.load('http://192.168.1.31/fonts/FiraSansMedium.woff', function(err, font) {
    if (err) {
         alert('Font could not be loaded: ' + err);
    } else {
        var ctx = document.getElementById('canvas').getContext('2d');
        var path = font.getPath(tr('groups'), 0, 50, 36);
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
			<img src="images/photos/gallery/51-Oosterblokker op terras.jpg" alt="Groups" height="483" width="644">
		</div> <!-- row -->

            <div data-lining class="poem preview">
                Reünie of Teamwork. De sfeervolle eetzaal biedt ruimte voor 20 personen. De comfortabele armstoelen geven de mogelijkheid om uren lang te vergaderen of gewoon gezellig samen zitten.<br/>Uw gastvrouw kan voor koffie en hapjes zorgen, van gewoon kopje koffie, tot uitgebreide buffet en luxe toastjes.<br/>Tv, dvd en muziekinstallatie zijn er aanwezig. Op aanvraag kunt u van een flipover gebruik maken..<br/>De pui van de eetzaal kan volledig open gaan en het  100m2 groot terras die er aansluit biedt ruimte voor ongeveer 50 mensen.<br/>Bij mooi weer is er de gelegenheid om een tuinfeest en BBQ te organiseren.<br/>
            </div>
	</div> <!-- container -->
</div> <!-- information -->
<?php include 'footer.php';?>
