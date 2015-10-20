	var currentLangCode = 'nl';
	var myDictionary = {
		fr : {
			"Reserve"			: "Réserve",
			"Contact"			: "Contact",
			"Rooms & Prices"		: "Chambres & Tarifs",
			"Introduction"			: "Introduction",
			"Availability"			: "Disponibilités",
			"Guestbook"			: "Livre d'invité",
			"Gallery"			: "Galerie",
			"Location"			: "Localisation",
			"Surroundings"			: "Environs",
			"Contact"			: "Contact",
			"Play sound"			: "Jouer son",
			"Luxirious Suites"		: "Suites luxueuses",
			"Your name"			: "Votre nom",
			"Your phone number"		: "Votre numéro de téléphone",
			"Your email address"		: "Votre adresse e-mail",
			"Your desired room"		: "Votre chambre souhaitée",
			"Number of adults"		: "Nombre de adultes",
			"Number of days"		: "Nombre de journées",
			"Date of arrival"		: "Date de votre arrivée",
			"Additional info"		: "Additionnel info",
			"Show an other image"		: "Présente une autre image",
			"Your name please"		: "Votre nom s'il vous plaît",
			"Your phone number please"	: "Votre numéro de téléphone s'il vous plaît",
			"Your email address please"	: "Votre adresse e-mail s'il vous plaît",
			"Date of arrival within a year from now please"	: "Date de votre arrivée dans l'année à partir de maintenant s'il vous plaît",
			"Additional info please"	: "Additionnel info s'il vous plaît",
			"The code displayed in the image please": "Le code affichée dans l'image s'il vous plaît",
			"Your feedback please"		: "Votre réaction s'il vous plaît",
			"Fill in your name"		: "Inscrivez votre nom",
			"Fill in your phonenumber (optional)": "Entrez votre numéro de téléphone (en option)",
			"Fill in your email address"	: "Remplissez votre adresse e-mail",
			"Enter your date of arrival within a year from now": "Entrer votre date d'arrivée dans l'année à partir de maintenant",
			"Enter the security code displayed in the image": "Entrer le code de sécurité affichée dans l'image",
			"Enter your reaction"		: "Entrer votre réaction",
			"Enter additional info"		: "Entrer additional info",
			"Security code"			: "Code de sécurité",
			"Your reaction"			: "Votre réaction",
			"Submit"			: "Envoyer",
			"pause_text"			: "<b>Cliquez sur moi pour faire une pause !</b>",
			"start_text"			: "<b>Cliquez sur moi pour commencer !</b>",
			"Welcome in &1!"		: "<b>Bienvenue dans &1!</b>",
			"has written on"		: "écrit sur",
			"Winter room"			: "Chambre d'hiver, Dans les teintes délicieuses de gris et blanc, cette chambre offre deux lits confortables pour une nuit luxueuse et paisible. Dans cette chambre, vous trouverez une télé, l'accès internet et un bureau. La chambre est également équipée d'une grande armoire et d'un coffre-fort pour vos objets personnels.", 
			"Spring room"			: "Chambre de printemps, Dans les teintes vertes, cette chambre offre 2 lits jumeaux très confortables, une salle de bain spécialement aménagée pour accueillir aussi des personnes en fauteuil roulant. Télévision, connection internet, table et chaises. Une grande armoire pour ranger vos affaires, ainsi qu'un coffre, pour vos objets de valeur.",
			"Summer room"			: "Chambre d'été, Dans les teintes bleues, la chambre d'été offre fraîcheur et gaieté. Elle est confortable avec ses lits-jumeaux, un canapé-lit pour éventuellement 2 personnes supplémentaires, une table et des chaises. Télévision et connection internet.",
			"Autumn room"			: "Chambre d'automne, Dans les teintes marron, cette chambre à l'atmosphère romantique offre 2 lits jumeaux très confortables, une télévision, une connection internet, une table et des chaises, un placard pour pendre et poser ses affaires, ainsi qu'un coffre-fort pour vos objets personnels.",
			"Show Toast"			: "Montrer info",
			"Clear Toasts"			: "Vider info",
			"Clear Last Toast"		: "Vider dernièrement info",
			"Leisure activities"		: "Loisirs",
			"Walking, biking"		: "Marcher, Vélo",
			"Visit, relax"			: "Visite, Détendez",
			"Good food"			: "La bonne nourriture....",
			"bikerental"			: "Location de vélos"
		},
		en : {
			"Reserve"			: "Reserve",
			"Contact"			: "Contact",
			"Rooms & Prices"		: "Rooms & Prices",
			"Introduction"			: "Introduction",
			"Availability"			: "Availability",
			"Guestbook"			: "Guestbook",
			"Gallery"			: "Gallery",
			"Location"			: "Location",
			"Surroundings"			: "Surroundings",
			"Contact"			: "Contact",
			"Play sound"			: "Play sound",
			"Luxirious Suites"		: "Luxirious Suites",
			"Your name"			: "Your name",
			"Your phone number"		: "Your phone number",
			"Your email address"		: "Your email address",
			"Your desired room"		: "Your desired room",
			"Number of adults"		: "Number of adults",
			"Number of days"		: "Number of days",
			"Date of arrival"		: "Date of arrival",
			"Additional info"		: "Additional info",
			"Show an other image"		: "Show an other image",
			"Your name please"		: "Your name please",
			"Your phone number please"	: "Your phone number please",
			"Your email address please"	: "Your email address please",
			"Date of arrival within a year from now please": "Date of arrival within a year from now please",
			"Additional info please"	: "Additional info please",
			"The code displayed in the image please": "The code displayed in the image please",
			"Your feedback please"		: "Your feedback please",
			"Fill in your name"		: "Fill in your name",
			"Fill in your phonenumber (optional)": "Fill in your phonenumber (optional)",
			"Fill in your email address"	: "Fill in your email address",
			"Enter your date of arrival within a year from now": "Enter your date of arrival within a year from now",
			"Enter the security code displayed in the image": "Enter the security code displayed in the image",
			"Enter your reaction"		: "Enter your reaction",
			"Enter additional info"		: "Enter additional info",
			"Security code"			: "Security code",
			"Your reaction"			: "Your reaction",
			"Submit"			: "Submit",
			"pause_text"			: "<b>Click on me to pause !</b>",
			"start_text"			: "<b>Click on me in order to start !</b>",
			"Welcome in &1!"		: "<b>Welcome in &1!</b>",
			"has written on"		: "has written on",
			"Winter room"			: "Winter room, Decorated in delicate shades of grey and white, this room offers two comfortable single beds for a luxurious and peaceful night's rest.",
			"Spring room"			: "Spring room, In pretty shades of green this room provides two very comfortable twin beds plus an additional sofa bed large enough for two persons.",
			"Summer room"			: "Summer room, In blue colors, the room offers summer freshness and cheerfulness. The bedroom is comfortable with its twin beds, a sofa bed for two extra people if necessary, a table and chairs, TV and Internet connection.",
			"Autumn room"			: "Autumn room, In brown tones, this room has a romantic atmosphere offering comfortable twin beds, TV, Internet connection, table and chairs, a wardrobe for hanging and storing  clothes and also a safe for your personal items.",
			"Show Toast"			: "Show info",
			"Clear Toasts"			: "Clear info",
			"Clear Last Toast"		: "Clear last info",
			"Leisure activities"		: "Leisure activities",
			"Walking, biking"		: "Walking, biking",
			"Visit, relax"			: "Visit, relax",
			"Good food"			: "Good food....",
			"bikerental"			: "Bike rental"
		},
		de : {
			"Reserve"			: "Reserve",
			"Contact"			: "Wenden an",
			"Rooms & Prices"		: "Zimmer & Preisen",
			"Introduction"			: "Einführung",
			"Availability"			: "Verfügbarheit",
			"Guestbook"			: "Gastbuch",
			"Gallery"			: "Galerie",
			"Location"			: "Lokation",
			"Surroundings"			: "Umgebung",
			"Contact"			: "Kontakt",
			"Play sound"			: "Ton abspielen",
			"Luxirious Suites"		: "Luxuriöse Suiten",
			"Your name"			: "Ihre name",
			"Your phone number"		: "Ihre Telefonnummer",
			"Your email address"		: "Ihre E-Mail-Adresse",
			"Your desired room"		: "Ihre erwünschte Zimmer",
			"Number of adults"		: "Anzahl der Erwachsene",
			"Number of days"		: "Anzahl der Tage",
			"Date of arrival"		: "Tag der Anreise",
			"Additional info"		: "Zusätzliche info",
			"Show an other image"		: "Zeige ein anderes bild",
			"Your name please"		: "Ihre name bitte",
			"Your phone number please"	: "Ihre Telefonnummer bitte",
			"Your email address please"	: "Ihre E-Mail-Adresse bitte",
			"Date of arrival within a year from now please"   : "Tag der Anreise innerhalb eines Jahres von nun an bitte",
			"Additional info please"	: "Zusätzliche info bitte",
			"The code displayed in the image please": "Der Code angezeigt in dem Bild bitte",
			"Your feedback please"		: "Ihre Rückkopplung bitte",
			"Fill in your name"		: "Geben Sie Ihren Namen",
			"Fill in your phonenumber (optional)": "Geben Sie Ihre Telefonnummer (fakultativ)",
			"Fill in your email address"	: "Geben Sie Ihre E-Mail-Adresse",
			"Enter your date of arrival within a year from now": "Tag der Anreise innerhalb eines Jahres von nun",
			"Enter the security code displayed in the image": "Geben Sie der Sicherheits Code angezeigt in dem Bild",
			"Enter your reaction"		: "Geben Sie Ihre Rückkopplung",
			"Enter additional info"		: "Geben Sie zusätzliche info",
			"Security code"			: "Sicherheits Code",
			"Your reaction"			: "Ihre Reaktion",			
			"Submit"			: "Versenden ",
			"pause_text"			: "<b>Klicken Sie mich um zu pausieren !</b>",
			"start_text"			: "<b>Klicken Sie mich um zu starten !</b>",
			"Welcome in &1!"		: "<b>Willkommen in &1!</b>",
			"has written on"		: "schrieb am",
			"Winter room"			: "Winterzimmer, Herrlich in grauen und sonnigen Tönen. Zwei erhöhte Luxusbetten sorgen für eine angenehme Nachtruhe. TV, Internetanschluss und ein kleines Büro. Kleiderschrank, Safe, Luxusbadezimmer mit Dusche, Waschtisch und Toilette.",
			"Spring room"			: "Spring room, In pretty shades of green this room provides two very comfortable twin beds plus an additional sofa bed large enough for two persons.",
			"Summer room"			: "Summer room, In blue colors, the room offers summer freshness and cheerfulness. The bedroom is comfortable with its twin beds, a sofa bed for two extra people if necessary, a table and chairs, TV and Internet connection.",
			"Autumn room"			: "Autumn room, In brown tones, this room has a romantic atmosphere offering comfortable twin beds, TV, Internet connection, table and chairs, a wardrobe for hanging and storing  clothes and also a safe for your personal items.",
			"Show Toast"			: "Info zeigen",
			"Clear Toasts"			: "Info entleeren",
			"Clear Last Toast"		: "Letzte info entleeren",
			"Leisure activities"		: "Freizeitaktivitäten",
			"Walking, biking"		: "Gehen, Radfahren",
			"Visit, relax"			: "Besichtigung, Entspannen",
			"Good food"			: "Gutes Essen....",
			"bikerental"			: "Fahrradverleih"
		},
		nl : {
			"Reserve"			: "Reserveren",
			"Contact"			: "Contact opnemen",
			"Rooms & Prices"		: "Kamers & Tarieven",
			"Introduction"			: "Introductie",
			"Availability"			: "Beschikbaarheid",
			"Guestbook"			: "Gastenboek",
			"Gallery"			: "Gallerij",
			"Location"			: "Locatie",
			"Surroundings"			: "Omgeving",
			"Contact"			: "Contact",
			"Play sound"			: "Geluid afspelen",
			"Luxirious Suites"		: "Luxueuze Suites",
			"Your name"			: "Uw naam",
			"Your phone number"		: "Uw telefoonnummer",
			"Your email address"		: "Uw email adres",
			"Your desired room"		: "Uw gewenste kamer",
			"Number of adults"		: "Aantal volwassenen",
			"Number of days"		: "Aantal dagen",
			"Date of arrival"		: "Datum van aankomst",
			"Additional info"		: "Additionele info",
			"Show an other image"		: "Toon een andere afbeeling",
			"Your name please"		: "Uw naam a.u.b.",
			"Your phone number please"	: "Uw telefoonnummer a.u.b.",
			"Your email address please"	: "Uw email adres a.u.b.",
			"Date of arrival within a year from now please"   : "Datum van aankomst binnen een jaar vanaf nu a.u.b.",
			"Additional info please"	: "Aanvullende informatie a.u.b.",
			"The code displayed in the image please": "De code getoond in de afbeelding a.u.b.",
			"Your feedback please"		: "Uw reactie a.u.b.",
			"Fill in your name"		: "Vul uw naam in",
			"Fill in your phonenumber (optional)": "Vul uw telefoonnummer in (optioneel)",
			"Fill in your email address"	: "Vul uw emailadres in",
			"Enter your date of arrival within a year from now": "Datum van aankomst binnen een jaar vanaf nu",
			"Enter the security code displayed in the image": "Vul de veiligheids code in die in de afbeelding getoond wordt",
			"Enter your reaction"		: "Geef Uw reactie",
			"Enter additional info"		: "Geef additionele informatie",
			"Security code"			: "Veiligheids code",
			"Your reaction"			: "Uw reactie",			
			"Submit"			: "Verstuur",
			"pause_text"			: "<b>Klik op mij om te pauseren !</b>",
			"start_text"			: "<b>Klik op mij om te starten !</b>",
			"Welcome in &1!"		: "<b>Welkom in &1!</b>",
			"has written on"		: "schreef op",
			"Winter room"			: "Winter kamer, Heerlijk dicht bij elkaar in de grijze en zonnige tinten. Twee luxe en hoge boxspringen zorgen voor een goede nachtrust. Tv, internetaansluiting en bureautje. Hang- en legkast. Kluisje. Luxe badkamer met douche, badkamermeubel en toilet.",
			"Spring room"			: "Lente kamer, Ruimte genoeg voor rolstoelgebruikers. Speciale brede deuren. Grote badkamer voorzien van alle faciliteiten voor minder valide mensen. Slaapbank voor eventueel 2 extra personen op slaapkamer. Als enige heeft deze slaapkamer een eigen deur op het terras.",
			"Summer room"			: "Zomer kamer, Fris en vrolijk van kleur, deze slaapkamer biedt comfort en ruimte . Twee boxspringen een slaapbank geven de mogelijkheid om van 2 tot 4 personen te laten logeren. Hang- en legkast met kluisje. Tafeltje met stoel. Luxe badkamer met douche, toilet en badkamermeubel.",
			"Autumn room"			: "Herfst kamer, De bruine tinten van de herfst geven een nostalgische sfeer aan de slaapkamer. Tv en internetaansluiting. Tafeltje en stoel om te kunnen schrijven. Hang- en legkas .met kluisje. Eigen badkamer met douche, badkamermeubel en toilet.",
			"Show Toast"			: "Info tonen",
			"Clear Toasts"			: "Info verwijderen",
			"Clear Last Toast"		: "Laatste info verwijderen",
			"Leisure activities"		: "Vrijetijdsactiviteiten",
			"Walking, biking"		: "Wandelen, Fietsen",
			"Visit, relax"			: "Bezoeken, Ontspannen",
			"Good food"			: "Lekker Eten....",
			"bikerental"			: "Fietsverhuur"
		}
	}

	$.tr.dictionary(myDictionary);
	function myFunction(prm_lang) {
		$.tr.language(prm_lang);
		var tr = $.tr.translator();
		currentLangCode = prm_lang;
		$.cookie('language', currentLangCode);
		$('#nav_reserve').text(tr("Reserve"));
		$('#nav_contact').text(tr("Contact"));
		$('#nav_rooms').text(tr("Rooms & Prices"));
		$('#nav_intro').text(tr("Introduction"));
		$('#nav_availability').text(tr("Availability"));
		$('#nav_guestbook').text(tr("Guestbook"));
		$('#nav_gallery').text(tr("Gallery"));
		$('#nav_location').text(tr("Location"));
		$('#nav_surroundings').text(tr("Surroundings"));
		$('#fnav_reserve').text(tr("Reserve"));
		$('#fnav_contact').text(tr("Contact"));
		$('#fnav_rooms').text(tr("Rooms & Prices"));
		$('#fnav_intro').text(tr("Introduction"));
		$('#fnav_availability').text(tr("Availability"));
		$('#fnav_guestbook').text(tr("Guestbook"));
		$('#fnav_gallery').text(tr("Gallery"));
		$('#fnav_location').text(tr("Location"));
		$('#fnav_surroundings').text(tr("Surroundings"));
		$('#form_name').text(tr("Your name"));
		$('#form_phone').text(tr("Your phone number"));
		$('#form_email').text(tr("Your email address"));
		$('#form_room').text(tr("Your desired room"));
		$('#form_adults').text(tr("Number of adults"));
		$('#form_days').text(tr("Number of days"));
		$('#form_arrival').text(tr("Date of arrival"));
		$('#form_info').text(tr("Additional info"));
		$('#form_reaction').text(tr("Your reaction"));
		$('#feedbackSubmit').text(tr("Submit"));
		$('#guestbook').text(tr("Guestbook"));
		$('#reserve').text(tr("Reserve"));
		$('#form_other_image').text(tr("Show an other image"));
		$('#form_security_code').text(tr("Security code"));
		$('#form_help_name').text(tr("Your name please"));
		$('#form_help_phone').text(tr("Your phone number please"));
		$('#form_help_email').text(tr("Your email address please"));
		$('#form_help_date').text(tr("Date of arrival within a year from now please"));
		$('#form_help_info').text(tr("Additional info please"));
		$('#form_help_security').text(tr("The code displayed in the image please"));
		$('#form_help_feedback').text(tr("Your feedback please"));
		$('#gallery').text(tr("Gallery"));
		$('#location').text(tr("Location"));
		$('#surroundings').text(tr("Surroundings"));
		$('#contact').text(tr("Contact"));
		$('#load_sound').text(tr("Play sound"));
		$('#introduction').text(tr("Introduction"));
		$('#rooms_prices').text(tr("Luxirious Suites"));
		$('#rooms_tariff').text(tr("Rooms & Prices"));
		$('#availability').text(tr("Availability"));
		$('#name').attr("placeholder",tr("Fill in your name"));
		$('#phone').attr("placeholder",tr("Fill in your phonenumber (optional)"));
		$('#email').attr("placeholder",tr("Fill in your email address"));
		$('#datepicker').attr("placeholder",tr("Enter your date of arrival within a year from now"));
		$('#captcha_code').attr("placeholder",tr("Enter the security code displayed in the image"));
		$('#message').attr("placeholder",tr("Enter your reaction"));
		$('#remessage').attr("placeholder",tr("Enter additional info"));
		$('#guestbook_write').text(tr("has written on"));
		$('#calendar1').fullCalendar('destroy');
		$('#calendar2').fullCalendar('destroy');
		$('#calendar3').fullCalendar('destroy');
		$('#calendar4').fullCalendar('destroy');
		renderCalendar();
		$('#datepicker').datepicker('remove');
		$('#datepicker').datepicker({
                    format: "dd-mm-yyyy",
                    todayHighlight: true,
                    todayBtn: true,
                    language: currentLangCode
                });
		$('[id^="en_"]').hide();
		$('[id^="fr_"]').hide();
		$('[id^="de_"]').hide();
		$('[id^="nl_"]').hide();
		if ("en" == currentLangCode) $('[id^="en_"]').show();
		if ("fr" == currentLangCode) $('[id^="fr_"]').show();
		if ("de" == currentLangCode) $('[id^="de_"]').show();
		if ("nl" == currentLangCode) $('[id^="nl_"]').show();
		$('#showtoast').text(tr("Show Toast"));
		$('#cleartoasts').text(tr("Clear Toasts"));
		$('#clearlasttoast').text(tr("Clear Last Toast"));
		$('#target1').text(tr("Walking, biking"));
		$('#target2').text(tr("Visit, relax"));
		$('#target3').text(tr("Good food"));
		$('#nav_bikerental').text(tr("bikerental"));
		$('#fnav_bikerental').text(tr("bikerental"));
	}
