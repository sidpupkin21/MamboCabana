<?php
require("db/funcs.php");
require("db/db_config.php");
adminLogin();

if(isset($_POST['get_bookings'])){
    $frm_data = filternation($_POST);

    $query = "SELECT bo.*, bd.* from `booking_order` bo
        INNER JOIN `booking_details` bd ON bo.booking_id = bd.booking_id
        WHERE (bo.order_id LIKE ? or bd.phonenum LIKE ? or bd.user_name LIKE ?)
        AND (bo.booking_status=? AND bo-arrival =?) ORDER BY bo.booking_id ASc
    ";

    $res = select($query, ["%$frm_data[search]%", "%$frm_data[search]%", "%$frm_data[search]%", "booked", 0], 'sssss');

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
                   <button type='button' onclick='refund_booking($data[booking_id])' class='btn btn-success btn-sm fw-bold shadow-none'>
                        <i class='bi bi-cash-stack'></i> REFUND
                    </button>
                </td>
            </tr>
        ";

        $i++;

    }
    echo $table_data;

}

if(isset($_POST['assign_room'])){
    $frm_data = filternation($_POST);

    $query = "UPDATE `booking_order` bo 
    INNER JOIN `booking_details` bd
    ON bo.booking_id = bd.booking_id
    SET bo.arrival = ?, bo.rate_review = ?, bd.room_no= ?
    WHERE bo.boooking_id = ?";

    $values = [1,0,$frm_data['room_no'], $frm_data['booking_id']];

    $res = update($query, $values, 'iisi');

    echo ($res ==2 )? 1:0;
}

if(isset($_POST['cancel_booking'])){
    $frm_data = filternation($_POST);

    $query = "UPDATE `booking_order` SET `booking_status`=?, `refund`=?
    WHERE `booking_id` =?";
    $values = ['cancelled', 0, $frm_data['booking_id']];
    $res = update($query, $values, 'sii');

    echo $res;
}


?>
