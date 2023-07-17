<?php

require("db/funcs.php");
require("db/db_config.php");
adminLogin();

if(isset($_POST['get_bookings'])){
    $frm_data = filternation($_POST);

    $query = "SELECT bo.*, bd.* FROM `booking_order` bo
            INNER JOIN `booking_details` bd ON bo.booking_id = bd.booking_id
            WHERE (bo.orcer_id LIKE ? or bd.phonenum LIKE ? or bd.user_name LIKE ?)
            AND (bo.booking_status=? AND bo-refund=?) ORDER BY bo.booking_id ASC
    ";

    $res = select($query, ["%$frm_data[search]%", "%$frm_data[search]%", "%$frm_data[search]%", "cancelled",0],'sssss');

    $i = 1;
    $table_data = "";

    if(mysqli_num_rows($res)==0){
        echo "<b>NO DATA FOUND!</b>";
        exit;
    }

    while($data = mysqli_fetch_assoc($res)){
        $date = date("d-m-Y", strtotime($data['datentime']));
        $checkin = date("d-m-Y", strtotime($data['check_in']));
        $checkout = date("d-m-Y", strtotime($data['check_out']));

        $table_data .="
            <tr>
                <td>$i</td>
                <td>
                    <span class='badge bg-primary'>
                        ORDER ID: $data[order_id]
                    </span>
                    <br/>
                    <b>Name:</b> $date[user_name]
                    <br/>
                    <b>Phone Number:</b> $data[phonenum]
                </td>
                <td>
                    <b>Room:</b> $data[room_name]
                    <br/>
                    <b>Price:</b> $data[price]
                </td>
                <td>
                    <b>Check In:</b> $checkin
                    <br/>
                    <b>Check Out:</b> $checkout 
                    <br/>
                    <b>Amount Paid:</b> $$data[trans_amt]
                    <br/>
                    <b>Date:</b> $date  
                </td>
                <td>
                    <button type='button' onclick='assign_room($data[booking_id])' class='btn text-white btn-sm fw-bold custom-bg shadow-none' data-bs-toggle='modal' data-bs-target='#assign-room'>
                        <i class='bi bi-check2-square'></i> Assign Room
                    </button>
                    <br/>
                    <button type='button' onclick='cancel_booking($data[booking_id])' class='btn text-white btn-sm fw-bold custom-bg shadow-none' data-bs-toggle='modal' data-bs-target='#assign-room'>
                        <i class='bi bi-trash'></i>Cancel Booking
                    </button>    
                </td>
            </tr>
        ";

        $i++;

    }
    echo $table_data;
}

if(isset($_POST['refund_booking'])){
    $frm_data = filternation($_POST);

    $query = "UPDATE `booking_order` SET `refund`=? WHERE `booking_id`=?";
    $values = [1,$frm_data['booking_id']];
    $res = update($query, $values, 'ii');

    echo $res;
}

?>