<?php 
require("../db/funcs.php");
require("../db/db_config.php");
adminLogin();

if(isset($_POST['get_users'])){
    $res = selectAll('user');
    $i = 1;
    $data = "";

    while($row = mysqli_fetch_assoc($res)){
        $del_btn = "<button type='button' onclick='remove_user($row[id])' class='btn btn-danger shadow-none btn-sm'>
        <i class='bi bi-trash'></i> 
      </button>";

      $verified = "<span class='badge bg-warning'><i class='bi bi-x-lg'></i></span>";

      if($row['is_verified']){
        $verified = "<span class='badge bg-success'><i class='bi bi-check-lg'></i></span>";
        $del_btn = ""; 
      }
      //$date = date("d-m-Y",strtotime($row['datentime']));

      $data.="
      <tr>
        <td>$i</td>
        <td>
          <br>
          $row[name]
        </td>
        <td>$row[email]</td>
        <td>$row[username]</td>
        <td>$row[phone]</td>
        <td>$row[dob]</td>
        <td>$row[is_verified]</td>
        <td>$row[verification_code]</td>
        <td>$del_btn</td>
      </tr>
    ";
    $i++;
    }
    echo $data;
}
