<?php include 'header.php';?>

<?php include 'banner.html';?>

<!-- guestbook-information -->
<div id="information" class="spacer reserve-info ">
	<div class="container">
		<div class="row">
			<div class="col-xs-6 col-sm-6">
                   	<h2 id="guestbook" class="title">Gastenboek</h2>
			<?php include 'php/comments7.php';?>
			</div>
			<div id="contact_form" class="col-xs-6 col-sm-6">
				<form role="form" id="feedbackForm" class="wowload fadeInRight">    
					<div class="form-group has-feedback">
					<h3 class="title" id="form_name">Uw naam</h3>
					<input type="text" class="form-control input-sm" id="name" name="name" />
					<span class="help-block" style="display: none;" id="form_help_name">Uw naam a.u.b.</span>
					</div>
					<br>
					<div class="form-group has-feedback">
					<h3 class="title" id="form_email">Uw email adres</h3>
					<input type="email" class="form-control input-sm" id="email" name="email" />
					<span class="help-block" style="display: none;" id="form_help_email">Uw email adres a.u.b.</span>
					</div> 
					<br>
					<div class="form-group has-feedback">
						<h3 class="title" id="form_reaction">Uw reactie</h3>
						<textarea rows="5" cols="30" class="form-control input-sm" id="message" name="message" ></textarea>
						<span class="help-block" style="display: none;" id="form_help_feedback">Uw reactie a.u.b.</span>
					</div>
					<br>
					<img id="captcha" src="library/vender/securimage/securimage_show.php" alt="CAPTCHA Image" />
					<a href="#" onclick="document.getElementById('captcha').src = 'library/vender/securimage/securimage_show.php?sid=' + Math.random(); return false" class="btn btn-default" id="form_other_image">Toon een andere afbeeling</a><br/>
					<div class="form-group has-feedback" style="margin-top: 10px;">
						<h3 id="form_security_code">Veiligheids code</h3>
						<input type="text" class="form-control input-sm" name="captcha_code" id="captcha_code" />
						<span class="help-block" style="display: none;" id="form_help_security">De veiligheids code in de afbeeling a.u.b.</span>
					</div>
            				<button type="submit" id="feedbackSubmit" class="btn btn-default" data-loading-text="Sending..." style="display: block; margin-top: 10px;">Verstuur reactie</button>
          			</form>
      			</div>
                        <div class="text-center">
                     		<ul class="pagination">
				<li><a href="guestbook1.php">1</a></li>
                     		<li><a href="guestbook2.php">2</a></li>
                     		<li><a href="guestbook3.php">3</a></li>
                     		<li><a href="guestbook4.php">4</a></li>
                     		<li><a href="guestbook5.php">5</a></li>
                     		<li><a href="guestbook6.php">6</a></li>
                     		<li class="active"><a href="guestbook7.php">7</a></li>
                     		<li><a href="guestbook8.php">8</a></li>
                     		</ul>
                     	</div>
		</div>
	</div>  
</div>

<!-- <======= UP TO HERE -->
<script src="assets/vender/intl-tel-input/js/intlTelInput.min.js"></script>
<script src="assets/js/guestbook-form.js"></script>

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
                <div class="item  height-full"><img src="images/photos/bedandbreakfast/groepsontbijt.jpg" class="img-responsive" alt="slide"></div>

                </div>
                <!-- Controls -->
                <a class="left carousel-control" href="#TourCarousel" role="button" data-slide="prev"><i class="fa fa-angle-left"></i></a>
                <a class="right carousel-control" href="#TourCarousel" role="button" data-slide="next"><i class="fa fa-angle-right"></i></a>
            </div>
            <!-- RoomCarousel-->
            <div class="caption">Bed and breakfast<a href="gallery.php" class="pull-right"><i class="fa fa-edit"></i></a></div>
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
