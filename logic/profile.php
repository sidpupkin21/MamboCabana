<?php
require("../admin/db/db_config.php");
require("../admin/db/funcs.php");
date_default_timezone_set("Asia/Dubai");

if(isset($_POST['info_form'])){
    $frm_data = filternation($_POST);
    session_start();

    $user_exist = select("SELECT * FROM `user` WHERE `username`=? AND `id`!=? LIMIT 1",
    [$frm_data['username'], $_SESSION['uId']], "ss");

    if(mysqli_num_rows($user_exist)!=0){
         //echo json_encode(array('status' => 'user_exists', 'message' => 'This username is already registered'));
        echo 3;//"user_exists";
        exit;
    }

    $phone_exist = select("SELECT * FROM `user` WHERE `phone`=? AND `id`!=? LIMIT 1",
    [$frm_data['phone'], $_SESSION['uId']], "ss");

    if(mysqli_num_rows($phone_exist)!=0){
         //echo json_encode(array('status' => 'phone_exists', 'message' => 'This phone number is already registered'));
        echo 2;//"phone_exists";
        exit;
    }

    $query = "UPDATE `user` SET `name`=?, `username`=?, `dob`=?, `phone`=?, `country`=? WHERE `id`=? LIMIT 1";
    $values = [$frm_data['name'],$frm_data['username'], $frm_data['dob'], $frm_data['phone'], $frm_data['country'], $_SESSION['uId']];

    if(update($query, $values, 'ssssss')){
        $_SESSION['uName'] = $frm_data['name'];
        //echo json_encode(array('status' => 'success', 'message' => 'Information has been saved'));
        echo 1;
    }
    else{
        //echo json_encode(array('status' => 'error', 'message' => 'An error has occured'));
        echo 0;

    }

}

if(isset($_POST['pass_form'])){
    $frm_data = filternation($_POST);
    session_start();

    if($frm_data['new_pass']!=$frm_data['confirm_pass']){
        echo 2;//'mismatch';
        exit;
    }

    $enc_pass = password_hash($frm_data['new_pass'],PASSWORD_BCRYPT);

    $query = "UPDATE `user` SET  `password`=? WHERE  `id`=? LIMIT 1";
    $values = [$enc_pass, $_SESSION['uId']];

    if(update($query,$values, 'ss')){
        echo 1;
    }
    else{
        echo 0;
    }
}
?>