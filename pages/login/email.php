<?php
 session_start();
    error_reporting(0);

  use PHPMailer\PHPMailer\PHPMailer;

    $username = $_POST['username'];
    include '../../data.php';
    if ($db) {
      $sql = "SELECT password FROM users where username='$username';";
      $ret = pg_query($db, $sql);
      $pass = pg_fetch_array($ret);
    }
    if ($ret) {
      require_once "PHPMailer/src/PHPMailer.php";
      require_once "PHPMailer/src/SMTP.php";
      require_once "PHPMailer/src/Exception.php";

      @$mail = new PHPMailer(true);
          $mail = new PHPMailer();
          $mail->IsSMTP();  // telling the class to use SMTP
          $mail->SMTPDebug = 2;
          $mail->Mailer = "smtp";
          $mail->Host = "smtp.gmail.com";
          $mail->Port = 25;
          $mail->SMTPAuth = true; // turn on SMTP authentication
          $mail->Username = "senderemail@gmail.com"; // SMTP username  // change this mail with college mail or admin mail
          $mail->Password = "jhgfdhjdydjhgfjhkf"; // SMTP password  // change this password with college mail password tokan or admin mail  password tokan
        //  $Mail->Priority = 1;
          $mail->AddAddress($username,$username);
          $mail->SetFrom($username, 'DMS');
          $mail->Subject  = "Your Password";
          $mail->Body     = 'Your Password Is: '. $pass[0];
          $mail->WordWrap = 50;
      if ($mail->send()) {
        $_SESSION['username'];
      header("Location: change_pass.php");
      exit();
      } else {
        $_SESSION['username'];
        header("Location: forgot.php");
        exit();
      }
      exit();
      // exit(json_encode(array($status,$response)));
    } else {
      echo pg_last_error($db);
    }
  
  ?>