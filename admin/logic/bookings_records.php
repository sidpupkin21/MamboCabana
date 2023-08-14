<?php
require("../db/funcs.php");
require("../db/db_config.php");
adminLogin();
date_default_timezone_set("Asia/Dubai");


if (isset($_POST['get_bookings'])) {
  $frm_data = filternation($_POST);

  $limit = 5;
  $page = $frm_data['page'];
  $start = ($page - 1) * $limit;

  $query = "SELECT bo.*, bd.* FROM `booking_order` bo
    INNER JOIN `booking_details` bd ON bo.booking_id = bd.booking_id
    WHERE ((bo.booking_status='booked')
    OR (bo.booking_status='completed')
    OR (bo.booking_status='cancelled')
    OR (bo.booking_status='pending')) 

    AND (bo.order_id LIKE ? OR bd.phone LIKE ? OR bd.user_name LIKE ? OR bd.adult LIKE ? OR bd.children LIKE ?) 
    ORDER BY bo.booking_id DESC";
  $res = select($query, ["%$frm_data[search]%", "%$frm_data[search]%", "%$frm_data[search]%", "%$frm_data[search]%", "%$frm_data[search]%"], 'sssss');

  $limit_query = $query . " LIMIT $start,$limit";
  $limit_res = select($limit_query, ["%$frm_data[search]%", "%$frm_data[search]%", "%$frm_data[search]%", "%$frm_data[search]%", "%$frm_data[search]%"], 'sssss');

  $total_rows = mysqli_num_rows($res);

  if ($total_rows == 0) {
    $output = json_encode(["table_data" => "<b>No Data Found!</b>", "pagination" => '']);
    echo $output;
    exit;
  }

  $i = $start + 1;
  $table_data = "";


  while ($data = mysqli_fetch_assoc($limit_res)) {
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
            <b>Dates: </b> $data[check_in] To $data[check_out]
        </td>
        <td>
            <b>Amount: </b> $$data[total_pay]
            <br>
            <b>Date Booked: </b> $date
        </td>
        <td>
        <span class='badge $status_bg'>$data[booking_status]</span>
        </td>
        <td>
            <button type='button'>
            <i class='bi bi-file-earmark-arrow-down-fill' class='btn btn-outline-success btn-sm fw-bold shadow-none'></i>
            </button>
        </td>
    </tr>";
    $i++;
  }


  $pagination = "";

  if ($total_rows > $limit) {
    $total_pages = ceil($total_rows / $limit);

    if ($page != 1) {
      $pagination .= "<li class='page-item'>
          <button onclick='change_page(1)' class='page-link shadow-none'>First</button>
        </li>";
    }

    $disabled = ($page == 1) ? "disabled" : "";
    $prev = $page - 1;
    $pagination .= "<li class='page-item $disabled'>
        <button onclick='change_page($prev)' class='page-link shadow-none'>Prev</button>
      </li>";


    $disabled = ($page == $total_pages) ? "disabled" : "";
    $next = $page + 1;
    $pagination .= "<li class='page-item $disabled'>
        <button onclick='change_page($next)' class='page-link shadow-none'>Next</button>
      </li>";

    if ($page != $total_pages) {
      $pagination .= "<li class='page-item'>
          <button onclick='change_page($total_pages)' class='page-link shadow-none'>Last</button>
        </li>";
    }
  }

  $output = json_encode(["table_data" => $table_data, "pagination" => $pagination]);

  echo $output;
}
