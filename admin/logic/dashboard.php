<?php
require("../db/funcs.php");
require("../db/db_config.php");
adminLogin();

if(isset($_POST['booking_analytics'])){
    $frm_data = filternation($_POST);

    $condition ="";

    if($frm_data['period']== 1){
        $condition ="WHERE datentime BETWEEN NOW() - INTERVAL 7 DAY AND NOW()";
    }
    else if($frm_data['period']==2){
        $condition ="WHERE datentime BETWEEN NOW() - INTERVAL 30 DAY AND NOW()";
    }
    else if($frm_data['period']==3){
        $condition ="WHERE datentime BETWEEN NOW() - INTERVAL 90 DAY AND NOW()";
    }
    else if($frm_data['period']==4){
        $condition ="WHERE datentime BETWEEN NOW() - INTERVAL 1 YEAR AND NOW()";
    }

    $result = mysqli_fetch_assoc(mysqli_query($conn, "SELECT 
    COUNT(CASE WHEN bo.booking_status != 'cancelled' THEN 1 END) AS `total_bookings`,
    SUM(CASE WHEN bo.booking_status != 'cancelled' THEN td.total_pay END) AS `total_amt`,

    COUNT(CASE WHEN bo.booking_status = 'booked' THEN 1 END) AS `active_bookings`,
    SUM(CASE WHEN bo.booking_status = 'booked' THEN td.total_pay END) AS `active_amt`,

    COUNT(CASE WHEN bo.booking_status = 'cancelled' THEN 1 END) AS `cancelled_bookings`,
    SUM(CASE WHEN bo.booking_status = 'cancelled' THEN td.total_pay END) AS `cancelled_amt`
    FROM booking_order bo
    JOIN booking_details td ON bo.booking_id = td.booking_id
    $condition"));


    $output = json_encode($result);

    echo $output;
}

// if(isset($_POST['user_analytics'])){
//     $frm_data = filternation($_POST);

//     $condition = "";

//     if($frm_data['period'] ==1){
//         $condition="WHERE datentime BETWEEN NOW() - INTERVAL 7 DAY AND NOW()";
//     }
//     else if($frm_data['period']==2){
//         $condition="WHERE datentime BETWEEN NOW() - INTERVAL 30 DAY AND NOW()";
//     }
//     else if($frm_data['period']==3){
//         $condition="WHERE datentime BETWEEN NOW() - INTERVAL 90 DAY AND NOW()";
//     }
//     else if($frm_data['period']==4){
//         $condition="WHERE datentime BETWEEN NOW() - INTERVAL 1 YEAR AND NOW()";
//     }

//     $total_reviews = mysqli_fetch_assoc(mysqli_query(
//         $conn, "SELECT COUNT(sr_no) AS `count` FROM `rating_review` $condition"
//     ));

//     $total_queries = mysqli_fetch_assoc(mysqli_query(
//         $conn, "SELECT COUNT(sr_no) AS `count` FROM `user_query` $condition"
//     ));

//     $total_new_reg = mysqli_fetch_assoc(mysqli_query(
//         $conn, "SELECT COUNT(id) AS `count` FROM `user` $condition"
//     ));

//     $output = ['total_queries' => $total_queries['count'], 
//     'total_reviews' => $total_reviews['count'],
//     'total_new_reg' => $total_new_reg['count']];

//     $output = json_encode($output);

//     echo $output;
// }
if(isset($_POST['user_analytics']))
  {
    $frm_data = filternation($_POST);

    $condition="";

    if($frm_data['period'] ==1){
        $condition="WHERE datentime BETWEEN NOW() - INTERVAL 7 DAY AND NOW()";
    }
    else if($frm_data['period']==2){
        $condition="WHERE datentime BETWEEN NOW() - INTERVAL 30 DAY AND NOW()";
    }
    else if($frm_data['period']==3){
        $condition="WHERE datentime BETWEEN NOW() - INTERVAL 90 DAY AND NOW()";
    }
    else if($frm_data['period']==4){
        $condition="WHERE datentime BETWEEN NOW() - INTERVAL 1 YEAR AND NOW()";
    }

    $total_reviews = mysqli_fetch_assoc(mysqli_query
        ($conn,"SELECT COUNT(sr_no) AS `count` FROM `rating_review` $condition"));

    $total_queries = mysqli_fetch_assoc(mysqli_query
        ($conn,"SELECT COUNT(sr_no) AS `count` FROM `user_query` $condition"));

    $total_new_reg = mysqli_fetch_assoc(mysqli_query
        ($conn,"SELECT COUNT(id) AS `count` FROM `user` $condition"));

    $output = ['total_queries' => $total_queries['count'],
      'total_reviews' => $total_reviews['count'],
      'total_new_reg' => $total_new_reg['count']
    ];

    $output = json_encode($output);

    echo $output;

  }

// $result = mysqli_fetch_assoc(mysqli_query($conn, "SELECT 
    // COUNT(CASE WHEN booking_status!='cancelled' THEN 1 END) AS `total_bookings`,
    // SUM (CASE WHEN booking_status!='cancelled' THEN `total_pay` END) AS `total_amt`,

    // COUNT(CASE WHEN booking_status = 'booked' THEN 1 END) AS `active_bookings`,
    // SUM(CASE WHEN booking_status = 'booked' THEN `total_pay` END AS `active_amt`,

    // COUNT(CASE WHEN booking_status='cancelled' THEN 1 END) AS `cancelled_bookings`,
    // SUM(CASE WHEN booking_status='cancelled' THEN `total_pay` END) AS `cancelled_amt`
    // FROM `booking_order` $condition"));