<?php

require("../db/funcs.php");
require("../db/db_config.php");
adminLogin();

//Features
if (isset($_POST['add_feature'])) {
  $frm_data = filternation($_POST);
  $q = "INSERT INTO `features`( `name`, `icon`) VALUES (?,?)";
  $values = [$frm_data['name'], $frm_data['icon']];
  $res = insert($q, $values, 'ss');
  echo $res;
}
if (isset($_POST['get_features'])) {
  $res = selectAll('features');
  $i = 1;

  while ($row = mysqli_fetch_assoc($res)) {
    echo <<<data
      <tr>
        <td>$i</td>
        <td>$row[name]</td>
        <td><i class="$row[icon]"></i></td>
        <td>
          <button type="button" onclick="rem_feature($row[id])" class="btn btn-danger btn-sm shadow-none">
            <i class="bi bi-trash"></i> Delete
          </button>
        </td>
      </tr>
    data;
    $i++;
  }
}

if (isset($_POST['rem_feature'])) {
  $frm_data = filternation($_POST);
  $values = [$frm_data['rem_feature']];
  $q = "DELETE FROM `features` WHERE `id`=?";
  $res = delete($q, $values, 'i');
  echo $res;
  //Add later when implemented ROOM
  // $check_q = select('SELECT * FROM `room_features` WHERE `features_id`=?',[$frm_data['rem_feature']],'i');
  // if(mysqli_num_rows($check_q)==0){
  //     $q = "DELETE FROM `features` WHERE `id`=?";
  //     $res = delete($q,$values,'i');
  //     echo $res;
  //   }
  //   else{
  //     echo 'room_added';
  //   }
}

//Facilities
if (isset($_POST['add_facility'])) {
  $frm_data = filternation($_POST);
  $q = "INSERT INTO `facilities`(`name`, `icon`, `description`) VALUES (?,?,?)";
  $values = [$frm_data['name'], $frm_data['icon'], $frm_data['desc']];
  $res = insert($q, $values, 'sss');
  echo $res;
}

if (isset($_POST['get_facilities'])) {
  $res = selectAll('facilities');
  $i = 1;
  while ($row = mysqli_fetch_assoc($res)) {
    echo <<<data
      <tr class='align-middle'>
        <td>$i</td>
        <td>$row[name]</td>
        <td><i class="$row[icon]"></i></td>
        <td>$row[description]</td>
        <td>
              <button type="button" onclick="rem_facility($row[id])" class="btn btn-danger btn-sm shadow-none">
                <i class="bi bi-trash"></i> Delete
              </button>
            </td>
      </tr>
    data;
    $i++;
  }
}
if(isset($_POST['rem_facility']))
{
  $frm_data = filternation($_POST);
  $values = [$frm_data['rem_facility']];
  $q = "DELETE FROM `facilities` WHERE `id`=?";
  $res = delete($q, $values, 'i');
  echo $res;
  //Add later for room facilites
}


?>

