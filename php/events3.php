<?php
require_once('loginfullcalendar.php'); 

$json = array();
$requestwinter = "select start,end,rendering from evenement where room = 3;";
$resultstr = "";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
else {
    if ($result = $conn->query($requestwinter)) {
        $tempArray = array();
        while($row = $result->fetch_object()) {
            $tempArray = $row;
            array_push($json, $tempArray);
        }
        $resultstr = json_encode($json);             
        echo $resultstr;
        $result->close();
        $conn->close();
    }
}
?>