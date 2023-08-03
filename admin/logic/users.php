<?php
require("../db/funcs.php");
require("../db/db_config.php");
adminLogin();

if (isset($_POST['get_users'])) {
  $res = selectAll('user');
  $i = 1;
  $data = "";

  while ($row = mysqli_fetch_assoc($res)) {
    $del_btn = "<button type='button' onclick='remove_user($row[id])' class='btn btn-danger shadow-none btn-sm'>
        <i class='bi bi-trash'></i> 
      </button>";

    // $verified = "<span class='badge bg-warning'><i class='bi bi-x-lg'></i></span>";

    // if ($row['is_verified']) {
    //   $verified = "<span class='badge bg-success'><i class='bi bi-check-lg'></i></span>";
    //   $del_btn = "";
    // }
    $verified = "<span class='badge bg-warning'><i class='bi bi-x-lg'></i></span>";

    if($row['is_verified']){
      $verified = "<span class='badge bg-success'><i class='bi bi-check-lg'></i></span>";
      $del_btn = ""; 
    }

    $status =
      "<button onclick='toggle_status($row[id],0)' class='btn btn-dark btn-sm shadow-none'>
        ACTIVE 
      </button>";

    if (!$row['status']) {
      $status =
        "<button onclick='toggle_status($row[id],1)' class='btn btn-danger btn-sm shadow-none'>
        INACTIVE
      </button>";
    }

    $data .= "
      <tr>
        <td>$i</td>
        <td>
          $row[name]
        </td>
        <td>$row[email]</td>
        <td>$row[username]</td>
        <td>$row[phone]</td>
        <td>$row[dob]</td>
        <td>$row[country]</td>
        <td>$status</td>
        <td>$verified</td>

        <td> 
        <button type='button' onclick='remove_user($row[id])' class='btn btn-danger shadow-none btn-sm'>
          <i class='bi bi-trash'></i> 
        </button></td>
      </tr>
    ";
    $i++;
  }  //<td>$row[is_verified]</td>
  echo $data;
}

if (isset($_POST['toggle_status'])) {
  $frm_data = filternation($_POST);
  $q = "UPDATE `user` SET `status` =? WHERE `id`=?";
  $v = [$frm_data['value'], $frm_data['toggle_status']];

  if (update($q, $v, 'ii')) {
    echo 1;
  } else {
    echo 0;
  }
}

// <td>$del_btn</td> <td>$row[verification_code]</td>
if (isset($_POST['remove_user'])) {
  // $frm_data = filternation($_POST);

  // $res = delete("DELETE FROM `user` WHERE `id`=?", [$frm_data['id']],'i');

  // if($res){
  //   echo 1;
  // }
  // else{
  //   echo 0;
  // }
  $frm_data = filternation($_POST);
  $values = [$frm_data['remove_user']];
  $q = "DELETE FROM `user` WHERE `id`=?";
  $res = delete($q, $values, 'i');
  echo $res;
}

if (isset($_POST['search_user'])) {
  $frm_data = filternation($_POST);

  $query = "SELECT * FROM `user` WHERE `name` LIKE ?";

  $res = select($query, ["%$frm_data[name]%"], 's');
  $i = 1;
  $data = "";
  while ($row = mysqli_fetch_assoc($res)) {
    $del_btn = "<button type='button' onclick='remove_user($row[id])' class='btn btn-danger shadow-none btn-sm'>
        <i class='bi bi-trash'></i> 
      </button>";

    $verified = "<span class='badge bg-warning'><i class='bi bi-x-lg'></i></span>";

    if ($row['is_verified']) {
      $verified = "<span class='badge bg-success'><i class='bi bi-check-lg'></i></span>";
      $del_btn = "";
    }

    $status =
      "<button onclick='toggle_status($row[id],0)' class='btn btn-dark btn-sm shadow-none'>
        ACTIVE 
      </button>";

    if (!$row['status']) {
      $status =
        "<button onclick='toggle_status($row[id],1)' class='btn btn-danger btn-sm shadow-none'>
        INACTIVE
      </button>";
    }

    $data .= "
      <tr>
        <td>$i</td>
        <td>
          $row[name]
        </td>
        <td>$row[email]</td>
        <td>$row[username]</td>
        <td>$row[phone]</td>
        <td>$row[dob]</td>
        <td>$row[country]</td>
        <td>$status</td>
        <td>$row[is_verified]</td>
        <td> 
        <button type='button' onclick='remove_user($row[id])' class='btn btn-danger shadow-none btn-sm'>
          <i class='bi bi-trash'></i> 
        </button></td>
      </tr>
    ";
    $i++;
  }
  echo $data;
}
