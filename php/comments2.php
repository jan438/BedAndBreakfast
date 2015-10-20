<?php
require_once('loginguestbook.php');
$requestcomments = "select name,comment,datetime from guestbook;";
$resultstr = "";
$lang = "";
if (isset($_COOKIE['language'])) {
    $lang = $_COOKIE['language'];
    switch ($lang) {
    case 'nl':
        $interlude = " schreef op ";
        break;
    case 'fr':
        $interlude = " a écrit à ";
        break;
    case 'en':
        $interlude = " wrote at ";
        break;
    case 'de':
        $interlude = " schrieb an  ";
        break;
    default:
        $interlude = " ";
    }
} else {
    $interlude = " ";
}
// Create connection
$conn = new mysqli($servername, $username, $password, $database);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
else {
    if ($result = $conn->query($requestcomments)) {
        $tempArray = array();
        while($row = $result->fetch_object()) {
            $year = substr($row->datetime, -4);
            if ($year == "2014") {
                $resultstr = "<h4>";
                $resultstr .= $row->name;
                $resultstr .= $interlude;
                $resultstr .= $row->datetime;
                $resultstr .= "</h4><p>";
                $resultstr .= $row->comment;
                $resultstr .= "</p>";
                echo $resultstr;
            }
        }
        $conn->close();
    }
}
?>
