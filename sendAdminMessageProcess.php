<?php

session_start();
require "connection.php";

$msg_txt = $_POST["t"];
$receiver = $_POST["r"];


$d = new DateTime();
$tz = new DateTimeZone("Asia/Colombo");
$d->setTimezone($tz);
$date = $d->format("Y-m-d H:i:s");

$sender;

if(isset($msg_txt) && isset($receiver)){
if(isset($_SESSION["u"])){

    $sender = $_SESSION["u"]["email"];
    Database::iud("INSERT INTO `chat2`(`content`,`date_time`,`status`,`from`,`to`) VALUES 
    ('".$msg_txt."','".$date."','0','".$sender."','wpasindu2002@gmail.com')");

    echo "success1"; 

}else if(isset($_SESSION["au"])){

    $sender = $_SESSION["au"]["email"];
    Database::iud("INSERT INTO `chat1`(`content`,`date_time`,`status`,`from`,`to`) VALUES 
    ('".$msg_txt."','".$date."','0','wpasindu2002@gmail.com','".$receiver."')");
     
     echo "success1"; 
}
}else{
    echo("something failed");
}


    

    


   

?>