<?php include 'header.php';?>

<?php include 'banner.html';?>

<link rel="stylesheet" href="release/side-comments.css" />
<link rel="stylesheet" href="release/themes/default-theme.css" />
<link rel="stylesheet" href="support/css/basics.css" />

<script src="release/side-comments.js"></script>
<script src="support/test_data.js"></script>
<script>
    $(document).ready(function(){
      var SideComments = require('side-comments');
      window.sideComments = new SideComments('#commentable-container', currentUser, existingComments);
      window.sideComments.on('commentPosted', function( comment ) {
        comment.id = parseInt(Math.random() * (100000 - 1) + 1);
        sideComments.insertComment(comment);
      });
      window.sideComments.on('commentDeleted', function( comment ) {
        sideComments.removeComment(comment.sectionId, comment.id);
      });
    });
</script>
<div id="information" class="spacer reserve-info ">
	<div class="container">

       	<h1 class="title" id="introduction">Introductie</h1>
	<div class="row" id="nl_introduction">
		<div id="commentable-container" class="container commentable-container">
		<p data-section-id="1" class="commentable-section">
		We bieden Bed and Breakfast aan, maar het verblijf kan ook als groepsaccommodatie fungeren voor bijvoorbeeld vergaderingen, bedrijfsuitjes, teambuilding, workshops, feest, bruiloft, tuinfeest, proeverijen...! Christine, uw gastvrouw organiseert zelf ook regelmatig cursussen Frans voor bedrijven en particulieren.</p>
		<p data-section-id="2" class="commentable-section">
		In onze boerderij is een van de voormalige koestallen omgetoverd in een vakantiehuis met 4 luxe slaapkamers, een grote woonkamer en een open keuken. Bij de ingang van ons gastenverblijf is een groot  terras op het zuiden waar het in de zomer heerlijk genieten is.</p>
		<p data-section-id="3" class="commentable-section">
		Wanneer u via de brede pui naar binnen loopt, komt u in een sfeervolle eetzaal met tafeltjes, een bar en een open keuken. De parketvloer en de houten wanden met koeienraampjes  in landelijke stijl stralen de sfeer van authentieke boerenkamers uit. Het prachtige vierkante rieten dak met de mooie originele ronde schoorsteen staat er weer netjes bij.</p>
		</div>
              <div class="col-sm-6"><p>“La Normande” biedt een bijzondere locatie aan, met een weidse uitzicht en zee aan ruimte en rust. Ideale plek voor comfortabele  vergaderingen, workshops en  reünies voor familie-uitjes en bedrijven. Onze mooie lichte en sfeervolle vergaderruimte biedt een intieme, huiselijke  en ontspannen sfeer aan groepen van 6 tot 20 personen.Moet je een familieuitje organiseren? Daar helpen we u graag mee: Workshop Sushis' maken, een Golf clinic samen uitproberen op de prachtig West-Friese Golfbaan om de hoek, of lekker op de sloten varen zoals vroeger met ijzeren schuiten...</p></div>
              <div class="col-sm-6"><p>Tussen Hoorn, Enkhuizen en Medemblik, op 40 km afstand van Amsterdam-Noord, bieden we een knus en rustgevend accommodatie midden inde polders, op enkele kilometers van het Ijsselmeer, prachtig ingericht voor uw feestje, uitje, vergadering of workshop. In de prachtige woonkamer kunt u met een groep tot 20 personen  zitten, vergaderen, lekker eten, enz. We hebben ook 4 luxe slaapkamers voor 2  tot 4 personen met eigen badkamer, internetaansluiting en televisie en ook, heel comfortabele bedden.</p></div>
              <div class="col-sm-6"><p>
Het ontbijt kan zowel binnen als op het terras worden geserveerd.  Alle ruimtes liggen gelijkvloers, om iedereen te kunnen verwelkomen, ook mensen die moeilijk ter been zijn en rolstoelgebruikers. De landelijke sfeer zal vooral mensen aanspreken die van de natuur houden of even tot rust willen komen. Ook gasten die hier voor zakelijke doeleinden komen, kunnen hier een prachtige, rustige plek vinden om te verblijven.</p></div>
	</div> <!-- row -->

	<div class="row" id="fr_introduction">
              <div class="col-sm-6"><p>La Normande :
- 5 pièces spacieuses dans un corps de ferme entièrement rénové
- une cuisine à l'américaine donnant sur une vaste salle à manger
- 4 chambres d'hôtes comprenant chacune une salle de bain et un WC
- 2 autres WC sont disponibles
- un parking collectif, une importante terrasse, une cour et un jardin
- tout en rez-de-chaussée sur une surface totale de 180 mètres carrés
</p></div>
              <div class="col-sm-6"><p>La Normande offre trois possibilités de logement : bed&breakfast, hôtel ou salle de conférence. Cf les prix pour plus de renseignements. La Normande offre une large salle à manger dans laquelle vous pourrez passer des heures agréables. Des fauteuils en rotin y sont installés ainsi qu'un canapé. Un coin salon avec télévision et dvd a été aménagé pour vous divertir. Vous y trouverez également une installation hifi pour écouter de la musique et danser, à vos souhaits.
De grandes portes fenêtres donnent accès sur une très large terrasse où il fait bon d'organiser une fête champêtre et éventuellement un barbecue.
</p></div>
              <div class="col-sm-6"><p>Installée dans une ferme hollandaise authentique du 19ème siècle, à quelques kilomètres d’Amsterdam, notre maison de vacances La Normande vous offre de merveilleux instants au coeur de la Hollande du Nord. Entre champs de tulipes et pâturages, vous pourrez profiter de la tranquilité de Westwoud, sans oublier l’athmosphère conviviale et familiale.
Dans ce gîte de charme, vous aurez le plaisir de vous reposer sur la terrasse ou d’y faire un barbecue, comme bon vous semble, en groupe ou en famille. La vaste salle à manger, au caractère fermier, vous permettra de passer d’agréables moments.
Vous avez la possiblité de réserver en chambre d’hôtes, en gîte ou en Bed &Breakfast.</p></div>
	      <div class="col-sm-6"><p>La Normande vous offre :
Un cadre exceptionnel au coeur de la Hollande traditionnelle.
Unelocation aménagée pour vous sur 180m²de plein pied :     
Avec cuisine américaine, 4chambres  avec salle de bain et WCprivatifs Grande terrasse aveccour et jardin fleurissant Parkingcollectif.
</p></div>
              <div class="col-sm-6"><p>
De nombreuxservices et équipements luxueux: Accessibleaux personnes à mobilité réduite
Cuisineéquipée, lave-linge et sèche linge TV,connexion Internet, chaîne hifi.
Salonde jardin, table de ping-pong et trampoline pour les enfants, location devélos.
Locationde linge. Animauxacceptés. Si vous avez des demandes spéciales, n’hésitez-pas !
Des activitésproches pour tous : Baladesà vélo, randonnées pédestres Voile,ballade en bateau, baignades Golf,pêche Tennis,équitation, patinoire Bowling,discothèque Gareà 2 km Villede Hoorn à 7 km Capitaled’Amsterdam à 40 minutes
</p></div>
              <div class="col-sm-6"><p>
Nous mettons touten oeuvre pour que vous vous sentiez chez vous ! »
Le Bed&Breakfast La Normande est une maison de vacances de luxe pouvant accueillir jusqu'à 14 personnes. Cet adorable corps de ferme rénové est une maison spacieuse et confortable.</p></div>
		<table class="table voffset4" width="647">
    			<thead>
    			<tr>
    			<th>Equipement:</th>
    			</tr>
    			</thead>
    			<tbody>
    			<tr class="info">
    			<td>Cuisine équipée : réfrigérateur, congélateur, four, plaques et micro-ondes</td>
    			</tr>
    			<tr class="info">
    			<td>Lave vaisselle, lave linge, sèche linge, aspirateur, fer à repasser</td>
    			</tr>
    			<tr class="info">
    			<td>Salon : TV, internet, lecteur DVD, chaîne hifi, chauffage central</td>
    			</tr>
    			<tr class="info">
    			<td>Extérieur : salon de jardin, barbecue, chaises longues et table de ping-pong</td>
    			</tr>
    			<tr class="info">
    			<td>Services : draps, location de linge, ménage non inclus</td>
    			</tr>
    			</tbody>
		</table>
		<table class="table voffset4" width="647">
    			<thead>
    			<tr>
    			<th>Activités de proximité:</th>
    			</tr>
    			</thead>
    			<tbody>
    			<tr class="info">
    			<td>Vélo, voile, marche à pied, barques, golf</td>
    			</tr>
    			<tr class="info">
    			<td>Tennis, pêche, équitation, patinoire, bowling</td>
    			</tr>
    			<tr class="info">
    			<td>Randonnées, baignades, discothèque etc.</td>
    			</tr>
    			</tbody>
		</table>
		<table class="table voffset4" width="647">
    			<thead>
    			<tr>
    			<th>Particularités:</th>
    			</tr>
    			</thead>
    			<tbody>
    			<tr class="info">
    			<td>Vue dégagée sur campagne</td>
    			</tr>
    			<tr class="info">
    			<td>Véhicule conseillé (train à proximité et vélos à votre disposition)</td>
    			</tr>
    			<tr class="info">
    			<td>Accès handicapés, animaux acceptés</td>
    			</tr>
    			<tr class="info">
    			<td>Hôtel 4 étoiles, prestations luxueuses</td>
    			</tr>
    			<tr class="info">
    			<td>Propriété référencés sur de nombreux sites et sur le guide Michelin</td>
    			</tr>
    			</tbody>
		</table>
	</div> <!-- row -->

	<div class="row" id="de_introduction">
              <div class="col-sm-6"><p>Willkommen in unserem Bed & Breakfast “La Normande”, zwischen Land und Meer !
“Ruhe, Komfort, Gemütlichkeit und Gastfreundschaft” ist unser Motto.

“La Normande”? Das bin ich, Christine Bataille, Bauernstochter aus der Normandie, vor 20 Jahren in die Niederlande gekommen. 10 Jahre lang haben mein Mann, Leon van der Loo, ursprünglich Brabander und ich an unserem Bauernhof gearbeitet, um diesen wieder in Schwung zu bekommen. Das prächtige quadratische Strohdach mit seinem orginellem runden Schornstein ist wieder vollständig renoviert.
</p></div>
              <div class="col-sm-6"><p>Auf unserem Bauernhof ist ein ehemaliger Kuhstall in ein Ferienhaus mit 4 Luxusschlafzimmern verzaubert worden. Auch befindet sich hier ein grosser Aufenthaltsraum mit moderner Küche. Als Empfang erwartet Sie eine grosse Terrasse, südlich gelegen, auf der Sie die Natur herrlich geniessen können. Einmal das Ferienhaus betreten, kommen Sie in einen stimmungsvollen Aufenthaltsraum mit einer Bar und offener Küche. Der Parketboden und die Holzwände mit kleinen Kuhfenstern im ländlichem Stil erwecken eine authentische ländliche Umgebung. Das Frühstück kann sowohl drinnen als auch auf der Terrasse serviert werden. Alle Räumlichkeiten befinden sich eben, um jeden Gast empfangen zu können, auch Gäste, die gehbehindert oder Rollstuhlfahrer sind. Die ländliche Atmosphäre soll vor allem Gäste ansprechen, die mit der Natur verbunden sind oder einfach in Ruhe gelassen werden wollen. Auch Gäste, die wegen geschäftlicher Interessen verbleiben wollen, kommen hier auf Ihre Kosten.
</p></div>
              <div class="col-sm-6"><p>Wir bieten Bed and Breakfast an, aber der Aufenthalt kann auch in Gruppen stattfinden, wie z.B. Konferenzen, Teambuilding, Workshops, Feste, Hochzeiten, Gartenfeste,  ... Christine, Ihre Gastgeberin, gibt auch selbst regelmässig Kurse in Französisch für Betriebe und auch privat.

errasse aveccour et jardin fleurissant Parkingcollectif.
</p></div>
	</div> <!-- row -->

	<div class="row" id="en_introduction">
              <div class="col-sm-6"><p>TheFarmhouse " La Normande." You will enjoy walking, biking, visiting and just enjoying the beautiful landscape, the sea and the canals...Bed &Breakfast  " La Normande"  is a traditional West-Friese farmhouse builton the
Binnenwijzendin 1857. Thisdistinctive property is located in the Grootslag polder on the outskirts ofWestwoud, a picturesque WestFriesian village, and situated between the historical harbour towns of Hoorn,Enkhuizen and Medemblik.</p></div>
              <div class="col-sm-6"><p>The owner and your hostess, Christine Bataille, lives at the front of the house with her family, whilst to the rear the former animal quarters have been tastefully converted into the Bed & Breakfast accommodation. Adjoining the property are a large, sunny terrace and lawned area which border fields and meadows grazed by sheep and cows for as far as the eye can see. In springtime these fields are magnificently carpeted with the famous Dutch tulips!!</p></div>
       </div> <!-- row -->

	<div class="spacer">
		<div class="embed-responsive embed-responsive-16by9">
<!--<iframe  class="embed-responsive-item" src="https://www.youtube.com/embed/BQUL3z_JZo4" width="100%" height="400" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>-->
			<video controls>
			<source src="http://192.168.1.31/videos/B&B La Normande (Netherlands).mp4" type='video/mp4;codecs="avc1.42E01E, mp4a.40.2"'/>
			</video>
		</div>
	</div> <!-- spacer -->
	</div> <!-- container -->
</div> <!-- information -->
<?php include 'footer.php';?>
