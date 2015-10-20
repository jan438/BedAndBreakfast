<?php

require_once('loginaagje.php');
if (isset($_POST["json"])) {
    $data = json_decode($_POST["json"]);
    $requestarticle = "select itemId, itemName, itemPrice, itemAssortment, itemBitmap from articles";
    $resultstr = "";
// Create connection
    $conn = new mysqli($servername, $username, $password, $database);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        $resultstr = "No connection with mysql";
    } else {
        if ($result = $conn->query($requestarticle)) {
            while ($row = $result->fetch_object()) {
                $resultstr .= $row->itemId;
                $resultstr .= ",";
                $resultstr .= $row->itemName;
                $resultstr .= ",";
                $resultstr .= $row->itemPrice;
                $resultstr .= ",";
                $resultstr .= base64_encode($row->itemBitmap);
                $resultstr .= ",";
                $resultstr .= $row->itemAssortment;
                $resultstr .= ",";
            }
        }
        $conn->close();
    }
    $data->msg = $resultstr;
    echo json_encode($data);
}
?>

