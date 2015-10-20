<?php 
 
if( isset($_POST["json"]) ) {
     $data = json_decode($_POST["json"]);
     $data->msg = strrev($data->msg);
     $today = time();
     $data->msg = $data->msg . $today;
     echo json_encode($data);
}
