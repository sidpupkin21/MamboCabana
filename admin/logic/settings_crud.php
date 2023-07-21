<?php
require("../db/funcs.php");
require("../db/db_config.php");
adminLogin();


if(isset($_POST['get_general']))
{
  $q = "SELECT * FROM `settings` WHERE `sr_no`=?";
  $values = [1];
  $res = select($q,$values,"i");
  $data = mysqli_fetch_assoc($res);
  $json_data = json_encode($data);
  echo $json_data;
}

if (isset($_POST['upd_general'])) {
    $frm_data =  filternation($_POST);
    $q = "UPDATE `settings` SET `site_logo`=?, `site_about`=? WHERE `sr_no`=?";
    $values = [$frm_data['site_logo'], $frm_data['site_about'], 1];
    $res = update($q, $values, 'ssi');
    echo $res;
}

if(isset($_POST['upd_shutdown']))
{
  $frm_data = ($_POST['upd_shutdown']==0) ? 1 : 0;

  $q = "UPDATE `settings` SET `shutdown`=? WHERE `sr_no`=?";
  $values = [$frm_data,1];
  $res = update($q,$values,'ii');
  echo $res;
}

if (isset($_POST['get_contacts'])) {
    $q = "SELECT * FROM `contact_details` WHERE `sr_no`=?";
    $values = [1];
    $res = select($q,$values,"i");
    $data = mysqli_fetch_assoc($res);
    $json_data = json_encode($data);
    echo $json_data;
}

if (isset($_POST['upd_contacts'])) {
    $frm_data = filternation($_POST);
    $q = "UPDATE `contact_details` SET `address`=?, `gmap`=?,`pn1`=?, `pn2`=?,`email1`=?,`email2`=?, `fb`=?,`insta`=?,`tw`=?, `ws`=?,`bk`=? WHERE `sr_no`=?";
    $values =
        [
            $frm_data['address'],
            $frm_data['gmap'],
            $frm_data['pn1'],
            $frm_data['pn2'],
            $frm_data['email1'],
            $frm_data['email2'],
            $frm_data['fb'],
            $frm_data['insta'],
            $frm_data['tw'],
            $frm_data['ws'],
            $frm_data['bk'],1
        ];
    $res = update($q, $values, 'sssssssssssi');
    echo $res;
}

?>