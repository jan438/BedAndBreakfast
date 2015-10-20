<?php include 'header.php';?>

<?php include 'banner.html';?>

<script src="js/clipboard.min.js"></script>
<script>
var clipboard = new Clipboard('.btn');
clipboard.on('success', function(e) {
    console.info('Action:', e.action);
    console.info('Text:', e.text);
    console.info('Trigger:', e.trigger);
    e.clearSelection();
});
clipboard.on('error', function(e) {
    console.error('Action:', e.action);
    console.error('Trigger:', e.trigger);
});
(function(angular) {
  'use strict';
angular.module('includeExample', ['ngAnimate'])
  .controller('IncludeController', ['$scope', function($scope) {
    $scope.templates =
      [ { name: 'Winter kamer', url: 'template1.html'},
	{ name: 'Lente kamer', url: 'template2.html'},
	{ name: 'Zomer kamer', url: 'template3.html'},
        { name: 'Herfst kamer', url: 'template4.html'} ];
    $scope.template = $scope.templates[0];
  }]);
angular.element(document).ready(function() {
  angular.bootstrap(form_include1, ["includeExample"]);
});
})(window.angular);
</script>

<!-- reservation-information -->
<div id="information" class="spacer reserve-info" >
	<div class="container">
		<div class="row">
			<div id="contact_form">
				<h1 class="title" id="contact">Contact</h1>
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
  					<div id="form_include1" ng-controller="IncludeController">
						<h3 class="title" id="form_room">Gewenste kamer</h3>
  						<select ng-model="template" ng-options="t.name for t in templates" id="rooms" name="rooms">
   						<option value="">(blank)</option>
  						</select>
  						<hr/>
  						<div class="slide-animate-container">
    							<div class="slide-animate" ng-include="template.url"></div>
  						</div>
					</div>
					<div class="form-group has-feedback voffset4">
						<h3 class="title" id="form_info">Aanvullende informatie</h3>
						<textarea rows="5" cols="30" class="form-control input-sm" id="message" name="message" ></textarea>
						<span class="help-block" style="display: none;" id="form_help_info">Aanvullende informatie a.u.b.</span>
					</div>
					<br>
					<div class="form-group has-feedback" style="margin-top: 10px;">
						<h3 id="form_security_code">Veiligheids code</h3>
						<?php
      						// show captcha HTML using Securimage::getCaptchaHtml()
						require_once 'library/vender/securimage/securimage.php';
						$options = array();
						$options['input_name']	= 'captcha_code'; // change name of input element for form post
						$options['input_text']	= '';

						echo Securimage::getCaptchaHtml($options);
						?>
						<span class="help-block" style="display: none;" id="form_help_security">De veiligheids code in de afbeeling a.u.b.</span>

					</div>
					<br>
					<button type="submit" id="feedbackSubmit" class="btn btn-default" data-loading-text="Sending..." style="display: block; margin-top: 10px;">Verstuur</button>
				</form>
				<br>
				<input id="phonenumber" value="+1 541-754-3011">
				<button class="btn" data-clipboard-target="#phonenumber">
    					<img src="assets/images/clipboard.png" alt="Copy to clipboard">
				</button>
				<br>
      			</div>
		</div>
	</div>  
</div>

<!-- <======= UP TO HERE -->
<script src="assets/vender/intl-tel-input/js/intlTelInput.min.js"></script>
<script src="assets/js/contact-form.js"></script>

<!-- services -->
<div class="spacer services wowload fadeInUp">
<div class="container-fluid" >
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
