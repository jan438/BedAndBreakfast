<?php
  //start a session -- needed for Securimage Captcha check
  session_start();

$lang = "";
$response_message = 'Uw boodschap was succesvol verzonden';
$error_message = 'Ongeldige security code';
$empty_message = 'Email of boodschap is leeg';

if (isset($_COOKIE['language'])) {
    $lang = $_COOKIE['language'];
    switch ($lang) {
    case 'nl':
        $response_message = 'Uw boodschap was succesvol verzonden';
	$error_message    = 'Ongeldige security code';
	$empty_message    = 'Email of boodschap is leeg';
        break;
    case 'fr':
        $response_message = 'Votre message a été envoyé avec succès';
        $error_message    = 'Code de sécurité est non valable';
	$empty_message    = 'Email ou message est vide';
        break;
    case 'en':
        $response_message = 'Your message was sent successfully';
	$error_message 	  = 'Invalid Security Code';
        $empty_message    = 'Email or message is empty';
        break;
    case 'de':
        $response_message = "Ihre nachricht wurde erfolgreich gesendet";
	$error_message    = 'Sicherheits code ist ungültig';
	$empty_message    = 'Email oder Nachricht ist leer';
        break;
    default:
        ;
    }
  } 
  //add you e-mail address here
  define("MY_EMAIL", "janboon438@gmail.com");
  define("EMAIL_SUBJECT", "Feedback Form Results");

  //a map of fields to include in email, along with if they are required or not
  //aparently in PHP, arrays (maps) can't be constants?
  $fields_req =  array("name" => true, "email" => true, "phone" => false, "rooms" => false, "adults" => false, "days" => false, "datepicker" => false, "message" => true);

  /**
   * Sets error header and json error message response.
   *
   * @param  String $messsage error message of response
   * @return void
   */
  function errorResponse ($messsage) {
    header('HTTP/1.1 500 Internal Server Error');
    die(json_encode(array('message' => $messsage)));
  }

  /**
   * Pulls posted values for all fields in $fields_req array.
   * If a required field does not have a value, an error response is given.
   *
   * @param [Array] $fields_req a map of field name to required
   */
  function setMessageBody ($fields_req) {
    $message_body = "";
    foreach ($fields_req as $name => $required) {
      $postedValue = $_POST[$name];
      if ($required && empty($postedValue)) {
        errorResponse("$name is empty.");
      } else {
        $message_body .= ucfirst($name) . ":  " . $postedValue . "\n";
      }
    }
    return $message_body;
  }

  $email = $_POST['email']; 

  header('Content-type: application/json');
  //do some simple validation. this should have been validated on the client-side also
  if (empty($email)) {
    errorResponse($empty_message);
  }
  $messageBody = setMessageBody($fields_req);

  //do Captcha check, make sure the submitter is not a robot:)...
  include_once './vender/securimage/securimage.php';
  $securimage = new Securimage();
  if (!$securimage->check($_POST['captcha_code'])) {
    errorResponse($error_message);
  }

  //try to send the message
  echo json_encode(array('message' => $response_message));
  mail(MY_EMAIL, EMAIL_SUBJECT, $messageBody, "From: $email");
?>
