<?php
require("../db/funcs.php");
require("../db/db_config.php");
adminLogin();

if (isset($_POST['get_bookings'])) {
    $frm_data = filternation($_POST);

    $query = "SELECT bo.*, bd.* FROM `booking_order` bo
    INNER JOIN `booking_details` bd ON bo.booking_id = bd.booking_id
    WHERE (bo.order_id LIKE ? OR bd.phone LIKE ? OR bd.user_name LIKE ?) 
     ORDER BY bo.booking_id DESC";

    $res = select($query, ["%$frm_data[search]%", "%$frm_data[search]%", "%$frm_data[search]%"], 'sss');

    $i = 1;
    $table_data = "";

    if (mysqli_num_rows($res) == 0) {
        echo "<b> No Data Found!</b>";
        exit;
    }

    while ($data = mysqli_fetch_assoc($res)) {
        $date = date("d-m-Y", strtotime($data['datentime']));
        $checkin = date("d-m-Y", strtotime($data['check_in']));
        $checkout = date("d-m-Y", strtotime($data['check_out']));

        if ($data['booking_status'] == 'booked') {
            $status_bg = 'bg-success';
        } else if ($data['booking_status'] == 'pending') {
            $status_bg = 'bg-warning';
        } else if ($data['booking_status'] == 'completed') {
            $status_bg = 'bg-info';
        } else {
            $status_bg = 'bg-danger text-dark';
        }

        $table_data .= "<tr>
            <td>$i</td>
            <td>
                <span class='badge bg-primary'>
                    Order ID: $data[order_id]
                </span>
                <br>
                <b>Name: </b> $data[user_name]
                <br>
                <b>Phone: </b> $data[phone]
                <br>
                <b>Guests: </b> $data[adult] Adults & $data[children] Children
            </td>
            <td>
                <b>Room: </b> $data[room_name]
                <br>
                <b>Price: </b> $$data[price]
                <br>
                <b>Dates: </b> $checkin To $checkout
                <br>
            </td>
            <td>
                <b>Amount: </b> $$data[total_pay]
                <br>
                <b>Date Booked: </b> $date
                <br>
                <b>Room Number: </b> $data[room_no]
            </td>
            <td>
                <span class='badge $status_bg'>$data[booking_status]</span>
            </td>
            <td>
                <button type='button' onclick='approve_booking($data[booking_id])' class='btn btn-size btn-sm btn-primary text-white fw-bold shadow-none'>
                    <i class='bi bi-check2-circle'></i> Accept Booking
                </button>
                <br>
                <br>
                <button type='button' onclick='assign_room($data[booking_id])' class='btn btn-size text-white btn-sm fw-bold custom-bg shadow-none' data-bs-toggle='modal' data-bs-target='#assign-room'>
                    <i class='bi bi-check2-square'></i> Assign Room
                </button>
                <br>
                <br>
                <button type='button' onclick='cancel_booking($data[booking_id])' class='mt-2 btn btn-size btn-danger btn-sm fw-bold shadow-none'>
                    <i class='bi bi-trash'></i> Cancel Booking
                </button>
                <br>
                <br>
                <button type='button' onclick='complete_booking($data[booking_id])' class='mt-2 btn btn-size btn-info btn-sm fw-bold shadow-none'>
                    <i class='bi bi-check2-all'></i> Complete
                </button>
            </td>
        </tr>";
        $i++;
    }
    echo $table_data;
}


if(isset($_POST['modify_booking'])){
    $frm_data = filternation($_POST);
    $booking_id = $_POST['booking_id']; // Get the booking_id from the POST data

    $flag = 0;

    $q = "UPDATE `booking_order` SET `check_in`=?,`check_out`=? WHERE `booking_id`=?";
    $values = [$frm_data['check_in'], $frm_data['check_out'], $frm_data['booking_id']];
    if(update($q, $values, 'ssi')){
        $flag = 1;
    }
    if($flag ){
        echo 1;
    }
    else{
        echo 0;
    }
}

if (isset($_POST['assign_room'])) {
    $frm_data = filternation($_POST);

    $query = "UPDATE `booking_order` bo INNER JOIN `booking_details` bd 
    ON bo.booking_id = bd.booking_id
    SET  bd.room_no =?
    WHERE bo.booking_id = ?"; //bo.arrival = ?,

    $values = [$frm_data['room_no'], $frm_data['booking_id']]; //1
    $res = update($query, $values, 'si'); //isi

    echo ($res == 2) ? 1 : 0;
    //echo $res;
}

if (isset($_POST['cancel_booking'])) {
    $frm_data = filternation($_POST);
    $query = "UPDATE `booking_order` SET `booking_status`=?, `arrival`=? WHERE `booking_id`=?";
    $values = ['cancelled', 0, $frm_data['booking_id']];
    $res = update($query, $values, 'sii');
    echo $res;
}

if (isset($_POST['approve_booking'])) {
    $frm_data = filternation($_POST);
    $query = "UPDATE `booking_order` SET `booking_status`=? WHERE `booking_id`=?";
    $values = ['booked', $frm_data['booking_id']];
    $res = update($query, $values, 'si');
    echo $res;
}

if (isset($_POST['complete_booking'])) {
    $frm_data = filternation($_POST);
    $query = "UPDATE `booking_order` SET `booking_status`=? WHERE `booking_id`=?";
    $values = ['completed', $frm_data['booking_id']];
    $res = update($query, $values, 'si');
    echo $res;
}


?>