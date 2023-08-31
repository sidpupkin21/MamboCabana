<?php
require("../db/funcs.php");
require("../db/db_config.php");
adminLogin();

if(isset($_POST['add_admin'])){
    $frm_data = filternation($_POST);
    $flag = 0;

    $q1 = "INSERT INTO `admins`( `adminuser`, `adminpass`) VALUES (?,?)";
    $values = [$frm_data['adminuser'],$frm_data['adminpass']];

    if(insert($q1, $values, "ss")){
        $flag =1;
    }
    $admin_id = mysqli_insert_id($conn);

    if($flag){
        echo 1;
    }
    else{
        echo 0;
    }
}

if(isset($_POST['get_all_admins'])){
    $res = select("SELECT * FROM `admins` WHERE `adminuser`=?", [0], 'i');
    $i = 1;
    $data = "";

    while($row = mysqli_fetch_assoc($res)){
        $data .= "
        <tr>
            <td>$i</td>
            <td>$row[adminuser]</td>
            <td>$row[adminpass]</td>
            <td>
            <button type='button' onclick='edit_details($row[sr_no])' class='btn btn-primary shadow-none btn-sm' data-bs-toggle='modal' data-bs-target='#edit-admin'>
              <i class='bi bi-pencil-square'></i> 
            </button>
            <button type='button' onclick='remove_admin($row[sr_no])' class='btn btn-danger shadow-none btn-sm'>
                <i class='bi bi-trash'></i> 
            </button>
            </td>
        </tr>
        ";
        $i++;
    }
    echo $data;
}

if(isset($_POST['get_admin'])){
    $frm_data = filternation($_POST);

    $res = select("SELECT * FROM `admins` WHERE `sr_no`=?", [$frm_data['get_admin']],'i');
    $admindata = mysqli_fetch_assoc($res);

    $data=["admindata" => $admindata];
    $data = json_encode($data);
    echo $data;
}

if(isset($_POST['edit_admin'])){
    $frm_data = filternation($_POST);
    $flag = 0;
    $q = "UPDATE `admins` SET `adminuser`=?,`adminpass`=? WHERE `sr_no`=?";
    $values = [$frm_data['adminuser'],$frm_data['adminpass'],$frm_data['sr_no']];
    if( update($q, $values, 'ssi')){
        $flag =1;
    }

    if ($flag) {
        echo 1;
    } else {
        echo 0;
    }
}


if(isset($_POST['remove_admin'])){
    $frm_data = filternation($_POST);
    $values = [$frm_data['remove_admin']];
    $q = "DELETE FROM `admins` WHERE `sr_no`=?";
    $res = delete($q, $values,'i');
    echo $res;
}
