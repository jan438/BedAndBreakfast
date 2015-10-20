<?php include 'header.php';?>

<?php include 'banner.html';?>

<script src="js/id3-minimized.js"></script>
<script src="js/id3index.js"></script>
<script src="js/angular-clipboard.js"></script>

<!-- reservation-information -->
<div id="information" class="spacer reserve-info" >
	<div class="container">
		<div class="row">
			<div id="contact_form">
				<h1 class="title" id="reserve">Reserveren</h1>
				<form role="form" id="feedbackForm" class="wowload fadeInRight">    
					<div class="form-group has-feedback">
					<h3 class="title" id="form_name">Uw naam</h3>
					<input type="text" class="form-control input-sm" id="name" name="name" />
					<span class="help-block" style="display: none;" id="form_help_name">Uw naam a.u.b.</span>
					</div>
					<br>
					<div class="form-group has-feedback">
					<h3 class="title" id="form_phone">Uw telefoonnummer</h3>
					<input type="tel" class="form-control input-sm optional" id="phone" name="phone" />
					<span class="help-block" style="display: none;" id="form_help_phone">Uw telefoonnummer a.u.b.</span>
					</div>
					<br>
					<div class="form-group has-feedback">
					<h3 class="title" id="form_email">Uw email adres</h3>
					<input type="email" class="form-control input-sm" id="email" name="email" />
					<span class="help-block" style="display: none;" id="form_help_email">Uw email adres a.u.b.</span>
					</div> 
					<br>
					<div class="form-group has-feedback">
						<div class="row">
						<div class="col-xs-3 col-sm-3">
						<h3 class="title" id="form_room">Gewenste kamer</h3>
						<select class="form-control" id="rooms" name="rooms">
						<option>Winter kamer</option>
						<option>Lente kamer</option>
						<option>Zomer kamer</option>
						<option>Herfst kamer</option>
						<option>Vakantiehuis</option>
						</select>
						</div>		   
						<div class="col-xs-3 col-sm-3">
						<h3 class="title" id="form_adults">Aantal volwassenen</h3>
						<select class="form-control" id="adults" name="adults">
						<option>1</option>
						<option>2</option>
						<option>3</option>
						<option>4</option>
						<option>5 of meer</option>
						</select>
						</div>
						<div class="col-xs-3 col-sm-3">
						<h3 class="title" id="form_days">Aantal dagen</h3>
						<select class="form-control" id="days" name="days">
						<option>1</option>
						<option>2</option>
						<option>3</option>
						<option>4</option>
						<option>5 of meer</option>
						</select>
						</div>
						</div>
					</div>
					<br>
					<div class="form-group has-feedback">
						<h3 class="title" id="form_arrival">Datum van aankomst</h3>
						<input type="text" class="form-control" readonly="true" id="datepicker" name="datepicker" />
						<span class="help-block" style="display: none;" id="form_help_date">Datum van aankomst binnen een jaar vanaf nu.</span>
					</div>
					<br>
					<div class="form-group has-feedback">
						<h3 class="title" id="form_info">Aanvullende informatie</h3>
						<textarea rows="5" cols="30" class="form-control input-sm" id="remessage" name="message" ></textarea>
						<span class="help-block" style="display: none;" id="form_help_info">Aanvullende informatie a.u.b.</span>
					</div>
					<br>
					<img id="captcha" src="library/vender/securimage/securimage_show.php" alt="CAPTCHA Image" />
					<a href="#" onclick="document.getElementById('captcha').src = 'library/vender/securimage/securimage_show.php?sid=' + Math.random(); return false" class="btn btn-default" id="form_other_image">Toon een andere afbeeling</a><br/>
					<div class="form-group has-feedback" style="margin-top: 10px;">
						<h3 id="form_security_code">Veiligheids code</h3>
						<input type="text" class="form-control input-sm" name="captcha_code" id="captcha_code" />
						<span class="help-block" style="display: none;" id="form_help_security">De veiligheids code in de afbeeling a.u.b.</span>
					</div>
            				<button type="submit" id="feedbackSubmit" class="btn btn-default" data-loading-text="Sending..." style="display: block; margin-top: 10px;">Verstuur reservering</button>
					<br>
          			</form>
				<div>
					<audio controls>
					<source src="http://192.168.1.31/music/1050f49223064225a8b3a0fe9f38677f.ogg" type="audio/ogg"/>
					<source src="http://192.168.1.31/music/1050f49223064225a8b3a0fe9f38677f.mp3" type="audio/mpeg"/>
					</audio>
				</div>
				<br>
				<li>Click to read the ID3 info from the following music files:
				<ul id="songs">
				<li><img src="assets/images/loader.gif"><a href="http://192.168.1.31/music/1050f49223064225a8b3a0fe9f38677f.mp3" onclick="load(this); return false;">Song</a></li>
				</ul>
				</li>
				<dl>
				<dt>Artist</dt>
				<dd id="artist"></dd>
				<dt>Title</dt>
				<dd id="title"></dd>
				<dt>Album</dt>
				<dd id="album"></dd>
				<dt>Year</dt>
				<dd id="year"></dd>
				<dt>Comment</dt>
				<dd id="comment"></dd>
				<dt>Genre</dt>
				<dd id="genre"></dd>
				<dt>Track</dt>
				<dd id="track"></dd>
				<dt>Lyrics</dt>
				<dd id="lyrics"></dd>
				<dt>Cover Art</dt>
				<dd><img id="art" src="images/sing.png"></dd>
				</dl>

				<div ng-app="lanormande" ng-controller="ClipBoardController">
					<p>
					<input ng-model="textToCopy" id="phonenumber" value="+1 541-754-3010">
<!--					<textarea ng-model="textToCopy" rows="5" cols="30"></textarea><br /> -->
					<button clipboard text="textToCopy" on-copied="success()" on-error="fail(err)">
						<img src="assets/images/clipboard.png" alt="Copy to clipboard">
					</button>
					</p>
				</div>
      			</div>
		</div>
	</div>  
</div>

<!-- <======= UP TO HERE -->
<script src="assets/vender/intl-tel-input/js/intlTelInput.min.js"></script>
<script src="assets/js/reservation-form.js"></script>

<script>
	var demoApp = angular.module('lanormande', ['angular-clipboard']);
	demoApp.controller('ClipBoardController', ['$scope', function ($scope) {
		$scope.textToCopy = "+1 541-754-3010";
		$scope.success = function () {
			console.log('Copied!');
		};
		$scope.fail = function (err) {
			console.error('Error!', err);
		};
	}]);
</script>

<!-- services -->
<div class="spacer services wowload fadeInUp">
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-4">
            <!-- RoomCarousel -->
            <div id="RoomCarousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
		<div class="item active"><img src="images/photos/rooms/1-winter.jpg" class="img-responsive" alt="slide"></div>                
		<div class="item  height-full"><img src="images/photos/rooms/4-lente.jpg"  class="img-responsive" alt="slide"></div>
		<div class="item  height-full"><img src="images/photos/rooms/5-zomer.jpg"  class="img-responsive" alt="slide"></div>
		<div class="item  height-full"><img src="images/photos/rooms/6-herfst.jpg"  class="img-responsive" alt="slide"></div>
                </div>
                <!-- Controls -->
                <a class="left carousel-control" href="#RoomCarousel" role="button" data-slide="prev"><i class="fa fa-angle-left"></i></a>
                <a class="right carousel-control" href="#RoomCarousel" role="button" data-slide="next"><i class="fa fa-angle-right"></i></a>
            </div>
            <!-- RoomCarousel-->
            <div class="caption">Kamers<a href="rooms-tariff.php" class="pull-right"><i class="fa fa-edit"></i></a></div>
        </div>


        <div class="col-sm-4">
            <!-- RoomCarousel -->
            <div id="TourCarousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
		<div class="item active"><img src="images/photos/bedandbreakfast/bedbreakfast.jpg" class="img-responsive" alt="slide"></div>
		<div class="item  height-full"><img src="images/large/fietsverhuur.jpg"  class="img-responsive" alt="slide"></div>
		<div class="item  height-full"><img src="images/photos/bedandbreakfast/home.jpg" class="img-responsive" alt="slide"></div>
		<div class="item  height-full"><img src="images/photos/bedandbreakfast/omgeving.jpg" class="img-responsive" alt="slide"></div>
		<div class="item  height-full"><img src="images/photos/bedandbreakfast/prijzen.jpg" class="img-responsive" alt="slide"></div>
		<div class="item  height-full"><img src="images/photos/bedandbreakfast/barbecue.jpg" class="img-responsive" alt="slide"></div>
<!--        <div class="item  height-full"><img src="images/photos/bedandbreakfast/groepsontbijt.jpg" class="img-responsive" alt="slide"></div> -->
                </div>
                <!-- Controls -->
                <a class="left carousel-control" href="#TourCarousel" role="button" data-slide="prev"><i class="fa fa-angle-left"></i></a>
                <a class="right carousel-control" href="#TourCarousel" role="button" data-slide="next"><i class="fa fa-angle-right"></i></a>
            </div>
            <!-- RoomCarousel-->
            <div class="caption">Bed and Breakfast<a href="gallery.php" class="pull-right"><i class="fa fa-edit"></i></a></div>
        </div>


        <div class="col-sm-4">
            <!-- RoomCarousel -->
            <div id="FoodCarousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
<!--            <div class="item active"><img src="images/photos/omgeving/6-100px-Golfball.jpg" class="img-responsive" alt="slide"></div> -->
                <div class="item  active"><img src="images/photos/omgeving/7-karting1.jpg"  class="img-responsive" alt="slide"></div>
<!--            <div class="item  height-full"><img src="images/photos/omgeving/8-Batavia-01.jpg"  class="img-responsive" alt="slide"></div>
                <div class="item  height-full"><img src="images/photos/omgeving/9-Auto-verhuur-01.jpg"  class="img-responsive" alt="slide"></div>
                <div class="item  height-full"><img src="images/photos/omgeving/10-NS-diensten-03.jpg"  class="img-responsive" alt="slide"></div>
                <div class="item  height-full"><img src="images/photos/omgeving/12-survival.jpg"  class="img-responsive" alt="slide"></div> -->
                <div class="item  height-full"><img src="images/photos/omgeving/13-uitgaan & omgeving-01.jpg"  class="img-responsive" alt="slide"></div>
                <div class="item  height-full"><img src="images/photos/omgeving/14-Flower show-01.jpg"  class="img-responsive" alt="slide"></div>
<!--            <div class="item  height-full"><img src="images/photos/omgeving/15-Catering-01.jpg"  class="img-responsive" alt="slide"></div>
                <div class="item  height-full"><img src="images/photos/omgeving/16-Zeilen_open Zee-01.jpg"  class="img-responsive" alt="slide"></div> -->
                <div class="item  height-full"><img src="images/photos/omgeving/17-Arrangementen_Westfriesse_uitjes-02.jpg"  class="img-responsive" alt="slide"></div>
                <div class="item  height-full"><img src="images/photos/omgeving/18-workshop-dansen-02.jpg"  class="img-responsive" alt="slide"></div>
                <div class="item  height-full"><img src="images/photos/omgeving/21-troubadourtheo-01.jpg"  class="img-responsive" alt="slide"></div>
                <div class="item  height-full"><img src="images/photos/omgeving/22-TOURS through Holland-01.jpg"  class="img-responsive" alt="slide"></div>
                <div class="item  height-full"><img src="images/photos/omgeving/24-waterhoorn-foto-04.jpg"  class="img-responsive" alt="slide"></div>
<!--            <div class="item  height-full"><img src="images/photos/omgeving/25-Cultural_connection-01.jpg"  class="img-responsive" alt="slide"></div>
                <div class="item  height-full"><img src="images/photos/omgeving/26-Sauna-Suomi_thermen-01.jpg"  class="img-responsive" alt="slide"></div>
                <div class="item  height-full"><img src="images/photos/omgeving/27-Hoorn-stad-01.jpg"  class="img-responsive" alt="slide"></div>
                <div class="item  height-full"><img src="images/photos/omgeving/Polders bij het Ijsselmeer.jpg"  class="img-responsive" alt="slide"></div> -->
                </div>
                <!-- Controls -->
                <a class="left carousel-control" href="#FoodCarousel" role="button" data-slide="prev"><i class="fa fa-angle-left"></i></a>
                <a class="right carousel-control" href="#FoodCarousel" role="button" data-slide="next"><i class="fa fa-angle-right"></i></a>
            </div>
            <!-- RoomCarousel-->
            <div class="caption">Omgeving<a href="gallery.php" class="pull-right"><i class="fa fa-edit"></i></a></div>
        </div>
    </div>
</div>
</div>
<!-- services -->

<?php include 'footer.php';?>
