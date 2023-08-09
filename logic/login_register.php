<?php
require("../admin/db/db_config.php");
require("../admin/db/funcs.php");
date_default_timezone_set("Asia/Dubai");

// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\SMTP;
// use PHPMailer\PHPMailer\Exception;

// function send_mail($email, $v_code)
// {
//   require("../PHPMailer/PHPMailer.php");
//   require("../PHPMailer/Exception.php");
//   require("../PHPMailer/SMTP.php");

//   $mail = new PHPMailer(true);

//   try {
//     //Server settings
//     //$mail->SMTPDebug = 3;                     //Enable verbose debug output
//     $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
//     $mail->isSMTP();                                            //Send using SMTP
//     $mail->Host       = 'smtp.gmail.com';//'smtp-mail.outlook.com';                 //Set the SMTP server to send through
//     $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
//     $mail->Username   = 'sidrupkin21@gmail.com';//'mbtester2023@outlook.com';//'sidrupkin21@gmail.com';                     //SMTP username
//     $mail->Password   = 'Mambocabana2023';                               //SMTP password
//     $mail->SMTPSecure =  PHPMailer::ENCRYPTION_SMTPS;//PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
//     $mail->SMTPAuth = false;
//     $mail->SMTPAutoTLS = false;
//     $mail->Port       = 587;                               //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

//     //Recipients
//     $mail->setFrom('sidrupkin21@gmail.com', 'Mambo Cabana');
//     $mail->addAddress($email);     //Add a recipient

//     //Attachments
//     // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
//     // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

//     //Content
//     $mail->isHTML(true);                                  //Set email format to HTML
//     $mail->Subject = 'Email Verification for Mambo Cabana Account';
//     $mail->Body    = "Thank you for registering
//     Click the link below to verify your email address
//     ";
//     // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

//     $mail->send();
//     echo 'Message has been sent';
//     // return true;
//   } catch (Exception $e) {
//     echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
//     // return false;
//   }
// }


if (isset($_POST['register'])) {
  $data = filternation($_POST);

  if ($data['password'] != $data['cpassword']) {
    // echo 'pass_mismatch';
    echo json_encode(array('status' => 'error', 'message' => 'The passwords you have entered do not match, please try again!'));

    exit;
  }

  $u_exist = select("SELECT * FROM `user` WHERE `email` =? OR `username` =? LIMIT 1", [$data['email'], $data['username']], "ss");

  if (mysqli_num_rows($u_exist) != 0) {
    // $u_exist_fetch = mysqli_fetch_assoc($u_exist);
    // echo ($u_exist_fetch['email']== $data['email'])? 'email_already': 'username_already';
    // exit;
    $u_exist_fetch = mysqli_fetch_assoc($u_exist);
    $message = ($u_exist_fetch['email'] == $data['email']) ? 'This email already exists!' : 'This email already exists,please try another one!';
    echo json_encode(array('status' => 'error', 'message' => $message));
    exit;
  }


  $enc_pass = password_hash($data['password'], PASSWORD_BCRYPT);

  // $query = "INSERT INTO `user`(`name`, `email`, `username`, `phone`, `dob`, `password`,`verification_code`, `is_verified`) VALUES (?,?,?,?,?,?,?,?)";
  // $values = [$data['name'],$data['email'],$data['username'],$data['phone'],$data['dob'],$enc_pass, $data['verification_code'],'1'];
  $v_code = bin2hex(random_bytes(16));
  $query = "INSERT INTO `user`(`name`, `email`, `username`, `phone`, `dob`, `country`,`password`,`verification_code`, `is_verified`) VALUES (?,?,?,?,?,?,?,?,?)";

  $values = [$data['name'], $data['email'], $data['username'], $data['phone'], $data['dob'], $data['country'], $enc_pass, $v_code, '0'];

  if (insert($query, $values, "ssssssssi")){//&& send_mail($_POST['email'],$v_code)) {
    // alert('success','success');
    echo json_encode(array('status' => 'success', 'message' => 'Registration successful!'));
  } else {
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
if (isset($_POST['login'])) {
  $data = filternation($_POST);

  $u_exist = select(
    "SELECT * FROM `user` WHERE `email`=? OR `username`=? LIMIT 1",
    [$data['email_mob'], $data['email_mob']],
    "ss"
  );

  if (mysqli_num_rows($u_exist) == 0) {
    //echo 'inv_email_mob';
    echo json_encode(array('status' => 'inv_email_mob', 'message' => 'Email/username is incorrect or does not exist'));

  } else {
    $u_fetch = mysqli_fetch_assoc($u_exist);
    if (!password_verify($data['password'], $u_fetch['password'])) {
      //echo 'inv_pass';
      echo json_encode(array('status' => 'inv_pass', 'message' => 'Password is invalid.. Please enter again or reset'));

    } //else {
    else{
      session_start();
      $_SESSION['login'] = true;
      $_SESSION['uId'] = $u_fetch['id'];
      $_SESSION['uName'] = $u_fetch['name'];
      $_SESSION['uUsername'] = $u_fetch['username'];
      //alert('Success', 'Logic Successful');
      echo json_encode(array('status' => 'success', 'message' => 'Login successful!'));
      //redirect('index.php');
      //echo 1;
    }
    //}
  }
}
?>
