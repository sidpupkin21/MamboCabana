<?php
require("../db/funcs.php");
require("../db/db_config.php");
adminLogin();

if(isset($_POST['get_all_booking'])){
    $query = select("SELECT * FROM `booking_order` WHERE `arrival`=?", [0], 'i');
    $i = 1;
    $data = "";

    while($row = mysqli_fetch_assoc($query)){
        $data.="
        <tr>
            <td>$i</td>
            <td>$row[order_id]</td>
            <td>$row[check_in]</td>
            <td>$row[check_out]</td>
            <td>     
                <button type='button' onclick='edit_bookings($row[booking_id])' class='btn btn-primary shadow-none btn-sm' data-bs-toggle='modal' data-bs-target='#modify-booking'>
                <i class='bi bi-pencil-square'></i> 
                </button>
            </td>

        </tr>";
        $i++;
    }
    echo $data;
}

if(isset($_POST['get_booking'])){
    $frm_data = filternation($_POST);

    $res = select("SELECT * FROM `booking_order` WHERE `booking_id`=?", [$frm_data['get_booking']],'i');
    $bookingdata = mysqli_fetch_assoc($res);

    $data = ["bookingdata"=> $bookingdata];
    $data = json_encode($data);
    echo $data;
}


if(isset($_POST['edit_bookings'])){
    $frm_data = filternation($_POST);
    $flag =0;

    $q = "UPDATE `booking_order` SET `check_in`=? , `check_out`=? WHERE `booking_id`=?";
    $values = [$frm_data['check_in'], $frm_data['check_out'], $frm_data['booking_id']];

    if(update($q, $values, 'ssi')){
        $flag = 1;
    }
    if ($flag) {
        echo 1;
    } else {
        echo 0;
    }
}
?>