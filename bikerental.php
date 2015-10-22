<?php include 'header.php';?>

<?php include 'banner.html';?>

<script type="text/javascript" src="js/opentype.min.js"></script>
<link rel="stylesheet" href="site.css">
<script type="text/javascript" src="js/jquery.elevatezoom.js"></script>
<link href="css/easelshared.css" rel="stylesheet" type="text/css"/>
<link href="css/easelexamples.css" rel="stylesheet" type="text/css"/>
<script src="js/easelexamples.js"></script>
<script src="js/easeljs-NEXT.min.js"></script>

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
		<div class="row">
		<header class="EaselJS">
		</header>
		<button id="nl_buttonbikerental" onclick="nl_init();">Click me</button>
		<button id="fr_buttonbikerental" onclick="fr_init();">Click me</button>
		<button id="en_buttonbikerental" onclick="en_init();">Click me</button>
		<div> 
			<canvas id="nl_Canvas" width="445" height="190"></canvas>
		</div>
		<div>
			<canvas id="fr_Canvas" width="445" height="190"></canvas>
		</div>
		<div>
			<canvas id="en_Canvas" width="445" height="190"></canvas>
		</div>
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
<script id="editable">
	var stage;
	var isDrawing;
	var drawingCanvas;
	var oldPt;
	var oldMidPt;
	var displayCanvas;
	var image;
	var bitmap;
	var maskFilter;
	var cursor;
	var text;
	var blur;
	var img;
	var bmp;
	var angle;
	var canvas;
	var range;
	var speed;
	var star;
	var scale;

	function nl_init() {
		examples.showDistractor();
		image = new Image();
		image.onload = handleComplete;
		image.src = "images/large/fietsverhuur.jpg";
		stage = new createjs.Stage("nl_Canvas");
		text = new createjs.Text("Loading...", "20px Arial", "#FFF");
		text.set({x: stage.canvas.width / 2, y: stage.canvas.height - 40});
		text.textAlign = "center";
	}

	
	function fr_init() {
		angle = 0;
		range = 30;
		speed = 0.02;
		img = new Image();
		img.onload = fr_handleImageLoad;
		img.src = "images/large/fietsverhuur.jpg";
	}

	function en_init() {
		examples.showDistractor();
		img = new Image();
		img.onload = en_handleImageLoad;
		img.src = "images/large/fietsverhuur.jpg";
		angle = 0;
	}

	function handleComplete() {
		examples.hideDistractor();
		createjs.Touch.enable(stage);
		stage.enableMouseOver();

		stage.addEventListener("stagemousedown", handleMouseDown);
		stage.addEventListener("stagemouseup", handleMouseUp);
		stage.addEventListener("stagemousemove", handleMouseMove);
		drawingCanvas = new createjs.Shape();
		bitmap = new createjs.Bitmap(image);

		blur = new createjs.Bitmap(image);
		blur.filters = [new createjs.BlurFilter(24, 24, 2), new createjs.ColorMatrixFilter(new createjs.ColorMatrix(60))];
		blur.cache(0, 0, 960, 400);

		text.text = "Click and Drag to Reveal the Image.";

		stage.addChild(blur, text, bitmap);
		updateCacheImage(false);

		cursor = new createjs.Shape(new createjs.Graphics().beginFill("#FFFFFF").drawCircle(0, 0, 25));
		cursor.cursor = "pointer";

		stage.addChild(cursor);
	}

	function handleMouseDown(event) {
		oldPt = new createjs.Point(stage.mouseX, stage.mouseY);
		oldMidPt = oldPt;
		isDrawing = true;
	}

	function handleMouseMove(event) {
		cursor.x = stage.mouseX;
		cursor.y = stage.mouseY;

		if (!isDrawing) {
			stage.update();
			return;
		}

		var midPoint = new createjs.Point(oldPt.x + stage.mouseX >> 1, oldPt.y + stage.mouseY >> 1);

		drawingCanvas.graphics.setStrokeStyle(40, "round", "round")
				.beginStroke("rgba(0,0,0,0.2)")
				.moveTo(midPoint.x, midPoint.y)
				.curveTo(oldPt.x, oldPt.y, oldMidPt.x, oldMidPt.y);

		oldPt.x = stage.mouseX;
		oldPt.y = stage.mouseY;

		oldMidPt.x = midPoint.x;
		oldMidPt.y = midPoint.y;

		updateCacheImage(true);
	}

	function handleMouseUp(event) {
		updateCacheImage(true);
		isDrawing = false;
	}

	function updateCacheImage(update) {
		if (update) {
			drawingCanvas.updateCache();
		} else {
			drawingCanvas.cache(0, 0, image.width, image.height);
		}

		maskFilter = new createjs.AlphaMaskFilter(drawingCanvas.cacheCanvas);

		bitmap.filters = [maskFilter];
		if (update) {
			bitmap.updateCache(0, 0, image.width, image.height);
		} else {
			bitmap.cache(0, 0, image.width, image.height);
		}

		stage.update();
	}


	function fr_handleImageLoad() {
		canvas = document.getElementById("fr_Canvas");
		stage = new createjs.Stage(canvas);

		bmp = new createjs.Bitmap(img).set({y: (canvas.height - img.height) / 2});
		bmp.cache(0, 0, img.width, img.height);

		stage.addChild(bmp);

		createjs.Ticker.addEventListener("tick", fr_tick);
	}

	function fr_tick(event) {
		angle += speed;

		var value = (Math.sin(angle) + 1) / 2 * range;
		bmp.updateCache();
		bmp.filters = [new createjs.BlurFilter(value, value, 2)];

		stage.update(event);
	}

	function en_handleImageLoad() {
		examples.hideDistractor();
		var canvas = document.getElementById("en_Canvas");
		stage = new createjs.Stage(canvas);
		star = new createjs.Shape();
		star.x = img.width / 2;
		star.y = img.height / 2;
		star.graphics.beginStroke("#FF0").setStrokeStyle(5).drawPolyStar(0, 0, img.height / 2 - 15, 5, 0.6).closePath();
		var bg = new createjs.Bitmap(img);
		bg.filters = [new createjs.BlurFilter(2, 2, 2), new createjs.ColorMatrixFilter(new createjs.ColorMatrix(0, 0, -100, 0))];
		bg.cache(0, 0, img.width, img.height);
		stage.addChild(bg);
		var bmp = new createjs.Bitmap(img);
		stage.addChild(bmp);
		bmp.mask = star;
		stage.addChild(star);
		createjs.Ticker.addEventListener("tick", en_tick);
	}

	function en_tick(event) {
		star.rotation += 5;
		star.scaleX = star.scaleY = 1.5 + Math.sin(angle) * 3;
		stage.update(event);
		angle += 0.025;
	}
</script>
<?php include 'footer.php';?>
