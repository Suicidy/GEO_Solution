<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    
    require 'phpmailer/src/Exception.php';
    require 'phpmailer/src/PHPMailer.php';
    require 'phpmailer/src/SMTP.php';
    require_once '../config.php';
    session_start();
    $studentid = "";
    $message = array();
    $error = false;
    header('Content-type: application/json');
    if($_SERVER["REQUEST_METHOD"] == "POST"){
            if(empty(clean($link,$_POST["studentid"]))){
                $error = true;
                $message['ERROR'] = 'โปรดกรอกรหัสนักศึกษา';
                $message['type'] = 'stid_err';
            } else{
                $studentid = clean($link,$_POST["studentid"]);
            }
            if(!$error){
                $sql = "SELECT student_id,firstname,lastname,email,password FROM student WHERE student_id = ?";
                if($stmt = mysqli_prepare($link, $sql)){
                    mysqli_stmt_bind_param($stmt, "s", $param_studentid);
                    $param_studentid = $studentid;
                    if(mysqli_stmt_execute($stmt)){
                        mysqli_stmt_store_result($stmt);
                        if(mysqli_stmt_num_rows($stmt) == 1){
                            mysqli_stmt_bind_result($stmt, $student_id,$fname,$lname,$email,$password);
                            if(mysqli_stmt_fetch($stmt)){
                                if($_POST['type'] == "req_pass"){
                                    if($password == "" || $password == " " || $password == NULL){   
                                        $to = $email;
                                        $password = generatePassword(10);
                                        $emailreal=$email;
                                        $email=md5($email);
                                        $pass=md5($password);
                                        $sql = "UPDATE student SET password='$pass' WHERE student_id = '$student_id' ";
                                        $link->query($sql);
                                        $link="<a href='http://geo.li.kmutt.ac.th/geo_solution/resource/reset/p.php?key=".$email."&reset=".$pass."'>Click To Reset password</a>";
                                        $mail = new PHPMailer();
                                        $mail->CharSet =  "utf-8";
                                        $mail->IsSMTP();
                                        $mail->SMTPAuth = true;                  
                                        $mail->Username = "geo.kmutt@gmail.com";
                                        $mail->Password = "admin0000";
                                        $mail->SMTPSecure = "ssl";  
                                        $mail->Host = 'smtp.gmail.com';
                                        $mail->Port = "465";
                                        $mail->From='geo.kmutt@gmail.com';
                                        $mail->FromName='GEO KMUTT';
                                        $mail->AddAddress($emailreal);
                                        $mail->Subject  =  '[GEO Soultion] RESET PASSWORD';
                                        $mail->IsHTML(true);
                                        $mail->Body    = '<H2>Password reset </H2><br>'.$fname.' '.$lname.' '.$student_id.'<br>You have requested your password:<br><b>'.$password.'</b><br> or click on the below link to reset your password:<br>'.$link.'<br><br><h4>Geo Solution </h4> <a href="http://geo.li.kmutt.ac.th/geo_solution">geo.li.kmutt.ac.th/geo_solution</a>';
                                        if($mail->Send()){
                                            $mailsend = 'Your mail has been sent successfully.';
                                            $_SESSION['email'] = $emailreal; 
                                            $message['SUCCESS'] = 'success';    
                                        }else{
                                        $mailerror =  "Mail Error - >".$mail->ErrorInfo;
                                        $message['ERROR'] = $mailerror ;
                                        $message['type'] = 'mail_err';
                                        }
                                    }else{
                                        $message['ERROR'] = "ผู้ใช้ได้ขอรหัสผ่านแล้ว";
                                        $message['type'] = 'stid_already_req';
                                    }
                                }
                                if($_POST['type'] == "recov_pass"){
                                    if($password == "" || $password == " " || $password == NULL){
                                        $message['ERROR'] = "Redirecting to request page.";
                                        $message['type'] = 'stid_notreq';
                                    }else{
                                        $to = $email;
                                        $emailreal=$email;
                                        $email=md5($email);
                                        $link="<a href='http://geo.li.kmutt.ac.th/geo_solution/resource/reset/p.php?key=".$email."&reset=".$password."'>Click To Reset password</a>";
                                        $mail = new PHPMailer();
                                        $mail->CharSet =  "utf-8";
                                        $mail->IsSMTP();
                                        $mail->SMTPAuth = true;                  
                                        $mail->Username = "geo.kmutt@gmail.com";
                                        $mail->Password = "admin0000";
                                        $mail->SMTPSecure = "ssl";  
                                        $mail->Host = 'smtp.gmail.com';
                                        $mail->Port = "465";
                                        $mail->From='geo.kmutt@gmail.com';
                                        $mail->FromName='GEO KMUTT';
                                        $mail->AddAddress($emailreal);
                                        $mail->Subject  =  '[GEO Soultion] RESET PASSWORD';
                                        $mail->IsHTML(true);
                                        $mail->Body    = '<H2>Password reset </H2><br>'.$fname.' '.$lname.' '.$student_id.'<br>You have requested a password reset, please click on the below link to reset your password:<br>'.$link.'<br><br><h4>Geo Solution </h4>| <a href="http://geo.li.kmutt.ac.th/geo_solution">geo.li.kmutt.ac.th/geo_solution</a>';
                                        if($mail->Send())
                                        {
                                            $mailsend = 'Your mail has been sent successfully.';
                                            $_SESSION['email'] = $emailreal; 
                                            $message['SUCCESS'] = 'success';    
                                        }
                                        else
                                        {
                                        $mailerror =  "Mail Error - >".$mail->ErrorInfo;
                                        $message['ERROR'] = $mailerror ;
                                        $message['type'] = 'mail_err';
                                        }
                                    }
                                }    
                            }  
                        }else{
                        $message['ERROR'] = 'ไม่พบรหัสนักศึกษานี้';
                        $message['type'] = 'stid_notfound';
                        }
                    } else{
                            $message['ERROR'] = "เกิดข้อผิดพลาด โปรลองอีกครั้งในภายหลัง";
                            $message['type'] = 'err';
                    }
                }
                mysqli_stmt_close($stmt);
            }  
    echo json_encode($message);
    }
        
    function generatePassword($length) { 
        $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'; 
        $count = mb_strlen($chars); 
        for ($i = 0, $result = ''; $i < $length; $i++) 
        { 
          $index = rand(0, $count - 1); 
          $result .= mb_substr($chars, $index, 1); 
        } 
        return $result; 
    }

    function clean($link,$data){
          return mysqli_real_escape_string($link,trim($data));
    }
?>