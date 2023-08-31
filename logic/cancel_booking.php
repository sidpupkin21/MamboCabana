<?php 
require("../admin/db/db_config.php");
require("../admin/db/funcs.php");
date_default_timezone_set("Asia/Dubai");

session_start();

if(!(isset($_SESSION['login']) && $_SESSION['login']==true)){
    redirect('index.php');
}

if(isset($_POST['cancel_booking'])){
    $frm_data = filternation($_POST);

    $query = "UPDATE `booking_order` SET `booking_status`=? WHERE `booking_id`=? AND `user_id`=?";
    
    $values = ['cancelled', $frm_data['id'], $_SESSION['uId']];

    $result = update($query, $values, 'sii');

    echo $result;
}
?>