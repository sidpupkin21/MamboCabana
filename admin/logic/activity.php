<?php

require("../db/funcs.php");
require("../db/db_config.php");
adminLogin();

if(isset($_POST['add_activity'])){
    $frm_data = filternation($_POST);
    $q = "INSERT INTO `activity`(`name`, `icon`, `description`) VALUES (?,?,?)";
    $values = [$frm_data['name'],$frm_data['icon'],$frm_data['desc']];
    $res = insert($q, $values, 'sss');
    echo $res;
}

if(isset($_POST['get_activity'])){
    $res = selectAll('activity');
    $i = 1;
    while($row = mysqli_fetch_assoc($res)) {
        echo <<<data
            <tr class='align-middle'>
                <td>$i</td>
                <td>$row[name]</td>
                <td><iconify-icon icon="$row[icon]" width="50" height="50"></iconify-icon></td>
                <td>$row[description]</td>
                <td>
                    <button type="button" onclick="rem_activity($row[id])" class="btn btn-danger btn-sm shadow-none">
                    <i class="bi bi-trash"></i>
                    </button>
                </td> 
            </tr>
        data;
        $i++;
    }
}

if(isset($_POST['rem_activity'])){
    $frm_data =filternation($_POST);
    $values = [$frm_data['rem_activity']];
    $q = "DELETE FROM `activity` WHERE `id`=?";
    $res = delete($q, $values, 'i');
    echo $res;
}

?>