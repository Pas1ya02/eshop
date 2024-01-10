<?php

require "connection.php";

if(isset($_GET["id"])){

    $i = $_GET["id"];

    $i_rs = Database::search("SELECT * FROM `product` WHERE `id`='".$i."'");
    $i_num = $i_rs->num_rows;

    if($i_num == 1){

        $i_data = $i_rs->fetch_assoc();

        if($i_data["status_id"] == 1){
            Database::iud("UPDATE `product` SET `status_id`= '2' WHERE `id`='".$i."'");
            echo ("blocked");
        }else if($i_data["status_id"] == 2){
            Database::iud("UPDATE `product` SET `status_id`= '1' WHERE `id`='".$i."'");
            echo ("unblocked");
        }

    }else{
        echo ("Cannot find the user. Please try again later.");
    }

}else{
    echo ("Something went wrong.");
}

?>