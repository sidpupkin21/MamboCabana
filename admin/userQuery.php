<?php
require("db/funcs.php");
require("db/db_config.php");
// require("db/scripts.php");

adminLogin();
if(isset($_GET['seen']))
  {
    $frm_data = filternation($_GET);

    if($frm_data['seen']=='all'){
      $q = "UPDATE `user_query` SET `seen`=?";
      $values = [1];
      if(update($q,$values,'i')){
        alert('success','All User queries have been marked as read');
      }
      else{
        alert('error','All User queries have already been marked as read');
      }
    }
    else{
      $q = "UPDATE `user_query` SET `seen`=? WHERE `sr_no`=?";
      $values = [1,$frm_data['seen']];
      if(update($q,$values,'ii')){
        alert('success','This user query has been marked as read');
      }
      else{
        alert('error','No changes have been made');
      }
    }
    
  }

  if(isset($_GET['del']))
  {
    $frm_data = filternation($_GET);

    if($frm_data['del']=='all'){
      $q = "DELETE FROM `user_query`";
      if(mysqli_query($conn,$q)){
        alert('success','All user queries have been deleted');
      }
      else{
        alert('error','There are no available messages');
      }
    }
    else{
      $q = "DELETE FROM `user_query` WHERE `sr_no`=?";
      $values = [$frm_data['del']];
      if(delete($q,$values,'i')){
        alert('success','This user query has been deleted');
      }
      else{
        alert('error','No changes have been made');
      }
    }
  }
//   if (isset($_GET['del'])) {
//     $frm_data = filternation($_GET);

//     if ($frm_data['del'] == 'all') {
//         showConfirm(
//             "Are you sure you want to delete all user queries?",
//             function () {
//                 $q = "DELETE FROM `user_query`";
//                 if (mysqli_query($conn, $q)) {
//                     alert('success', 'All user queries have been deleted');
//                 } else {
//                     alert('error', 'There are no available messages');
//                 }
//             },
//             function () {
//                 // Do nothing when canceled
//             }
//         );
//     } else {
//         showConfirm(
//             "Are you sure you want to delete this user query?",
//             function () use ($frm_data) {
//                 $q = "DELETE FROM `user_query` WHERE `sr_no`=?";
//                 $values = [$frm_data['del']];
//                 if (delete($q, $values, 'i')) {
//                     alert('success', 'This user query has been marked deleted');
//                 } else {
//                     alert('error', 'No changes have been made');
//                 }
//             },
//             function () {
//                 // Do nothing when canceled
//             }
//         );
//     }
// }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - User Query </title>
    <?php require('../admin/db/links.php'); ?>
</head>

<body class="bg-light">
    <?php require("../admin/db/header.php"); ?>
    <div class="container-fluid" id="main-content">
        <div class="row">
            <div class="col-lg-10 ms-auto p-4 overflow-hidden">
                <h3 class="mb-4">USER QUERY</h3>

                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">
                        <div class="text-end mb-4">
                            <a href="?seen=all" class="btn btn-dark rounded-pill shadow-none btn-sm">
                                <i class="bi bi-check-all" aria-hidden="true"></i>Mark as read
                            </a>
                            <a href="?del=all" class="btn btn-danger rounded-pill shadow-none btn-sm">
                                <i class="bi bi-trash" aria-hidden="true"></i> Delete all
                            </a>
                        </div>

                        <div class="table-responsive-lg" style="height:750px; overflow-y:scroll;">
                            <table class="table table-hover border text-center">
                                <thead>
                                    <tr class="bg-dark text-light">
                                        <th scope="col">#ID</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email Address</th>
                                        <th scope="col" width="20%">Subject</th>
                                        <th scope="col" width="30%">Message</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    $q = "SELECT * FROM `user_query` ORDER BY `sr_no` DESC";
                                    $data = mysqli_query($conn,$q);
                                    $i=1;

                                    while($row = mysqli_fetch_assoc($data))
                                    {
                                    //   $date = date('d-m-Y',strtotime($row['datentime']));
                                      $seen='';
                                      if($row['seen']!=1){
                                        $seen = "<a href='?seen=$row[sr_no]' class='btn btn-sm rounded-pill btn-primary'>Mark as read</a> <br>";
                                      }
                                      $seen.="<a href='?del=$row[sr_no]' class='btn btn-sm rounded-pill btn-danger mt-2'>Delete</a>";

                                      echo<<<query
                                        <tr>
                                          <td>$i</td>
                                          <td>$row[name]</td>
                                          <td>$row[email]</td>
                                          <td>$row[subject]</td>
                                          <td>$row[message]</td>
                                          <td>$row[datentime]</td>
                                          <td>$seen</td>
                                        </tr>
                                      query;
                                      $i++;
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script> -->
    <?php require("db/scripts.php") ?>

</body>

</html>