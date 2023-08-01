<?php
require("../admin/db/db_config.php");
require("../admin/db/funcs.php");
date_default_timezone_set("Asia/Dubai");
/*
if(isset($_POST['register'])){
    $data = filternation($_POST);

    if($data['password']!= $data['cpassword']){
        // echo 'pass_mismatch';
        echo json_encode(array('status' => 'error', 'message' => 'The passwords you have entered do not match, please try again!'));

        exit;
    }

    $u_exist = select("SELECT * FROM `user` WHERE `email` =? OR `username` =? LIMIT 1", [$data['email'],$data['username']],"ss");

    if(mysqli_num_rows($u_exist)!=0){
        // $u_exist_fetch = mysqli_fetch_assoc($u_exist);
        // echo ($u_exist_fetch['email']== $data['email'])? 'email_already': 'username_already';
        // exit;
        $u_exist_fetch = mysqli_fetch_assoc($u_exist);
        $message = ($u_exist_fetch['email'] == $data['email']) ? 'email_already' : 'This username/email already exists,please try another one!';
        echo json_encode(array('status' => 'error', 'message' => $message));
        exit;
    }
    

    $enc_pass = password_hash($data['password'],PASSWORD_BCRYPT);

    // $query = "INSERT INTO `user`(`name`, `email`, `username`, `phone`, `dob`, `password`,`verification_code`, `is_verified`) VALUES (?,?,?,?,?,?,?,?)";
    // $values = [$data['name'],$data['email'],$data['username'],$data['phone'],$data['dob'],$enc_pass, $data['verification_code'],'1'];

    $query = "INSERT INTO `user`(`name`, `email`, `username`, `phone`, `dob`, `password`) VALUES (?,?,?,?,?,?)";

    $values = [$data['name'],$data['email'],$data['username'],$data['phone'],$data['dob'],$enc_pass];

    if(insert($query,$values,"ssssss")){
        // alert('success','success');
        echo json_encode(array('status' => 'success', 'message' => 'Registration successful!'));


    }
    else{
        echo json_encode(array('status' => 'error', 'message' => 'Insert method failed'));

        //echo 'Insert method failed';
    }
}

// if(isset($_POST['login'])){
//     $data = filternation($_POST);

//     $u_exist = select("SELECT * FROM `user` WHERE `email` =? OR `username` =? LIMIT 1", [$data['email'],$data['username']],"ss");


//     if(mysqli_num_rows($u_exist)==0){
//         echo json_encode(array('status' => 'error', 'message' => 'Invalid Username'));
//         $u_fetch= mysqli_fetch_assoc($u_exist);
//         if(!password_verify($data['password'],$u_fetch['password'])){
//             echo json_encode(array('status' => 'error', 'message' => 'Invalid password'));
//         }
//         else{
//             session_start();
//             $_SESSION['login']=true;
//             $_SESSION['uId']= $u_fetch['id'];
//             $_SESSION['uname'] =$u_fetch['name'];
//             $_SESSION['uUsername'] = $u_fetch['username'];
//             echo json_encode(array('status' => 'success', 'message' => 'LoginSuccess'));
//         }
//     }
// }
if(isset($_POST['login']))
{
  $data = filternation($_POST);

  $u_exist = select("SELECT * FROM `user` WHERE `email`=? OR `username`=? LIMIT 1",
  [$data['email_mob'],$data['email_mob']],"ss");

  if(mysqli_num_rows($u_exist)==0){
    echo 'inv_email_mob';
  }
  else{
    $u_fetch = mysqli_fetch_assoc($u_exist);
    // if($u_fetch['is_verified']==0){
    //   echo 'not_verified';
    // }
    // else if($u_fetch['status']==0){
    //   echo 'inactive';
    // }
    // else{
      if(!password_verify($data['password'],$u_fetch['password'])){
        echo 'invalid_pass';
      }
      else{
        session_start();
        $_SESSION['login'] = true;
        $_SESSION['uId'] = $u_fetch['id'];
        $_SESSION['uName'] = $u_fetch['name'];
        $_SESSION['uUsername'] = $u_fetch['username'];
        echo json_encode(array('status' => 'success', 'message' => 'Login successful!'));
      }
    //}
  }
}*/
?>