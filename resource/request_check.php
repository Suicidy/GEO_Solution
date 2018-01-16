<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    
    require 'phpmailer/src/Exception.php';
    require 'phpmailer/src/PHPMailer.php';
    require 'phpmailer/src/SMTP.php';
    require_once '../config.php';
    // Define variables and initialize with empty values
    $studentid = "";
    $message = array();
    $error = false;
    // Processing form data when form is submitted
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        // Check if username is empty
        if(empty(clean($link,$_POST["studentid"]))){
            $error = true;
            $message['ERROR'] = 'Please enter Student ID.';
            $message['type'] = 'stid_err';
        } else{
            $studentid = clean($link,$_POST["studentid"]);
        }
        // Validate credentials
        if(!$error){
            // Prepare a select statement
            $sql = "SELECT student_id, email FROM student WHERE student_id = ?";
            if($stmt = mysqli_prepare($link, $sql)){
                // Bind variables to the prepared statement as parameters
                mysqli_stmt_bind_param($stmt, "s", $param_studentid);
                // Set parameters
                $param_studentid = $studentid;
               // Attempt to execute the prepared statement
                if(mysqli_stmt_execute($stmt)){
                    // Store result
                    mysqli_stmt_store_result($stmt);
                    // Check if username exists
                    if(mysqli_stmt_num_rows($stmt) == 1){                    
                        // Bind result variables
                         mysqli_stmt_bind_result($stmt, $studentid,$email);
                         if(mysqli_stmt_fetch($stmt)){
                            $select=mysqli_query($link,"select student_id,email,password from student where student_id = '$studentid' and password =' '");
                            if(mysqli_num_rows($select)>=1)
                            {
                              while($row=mysqli_fetch_array($select))
                              {
                                $to = $row['email'];
                                $password = generatePassword(10);
                                $emailreal=$row['email'];
                                $email=md5($row['email']);
                                $pass=md5($password);
                                $student_id=$row['student_id'];
                              
                              $sql = "UPDATE student SET password='$pass' WHERE student_id = '$student_id' ";
                              $link->query($sql);
                              
                              $link="<a href='http://geo.li.kmutt.ac.th/geo_solution/resource/login/reset.php?key=".$email."&reset=".$pass."'>Click To Reset password</a>";
                                 $mail = new PHPMailer();
                                 $mail->CharSet =  "utf-8";
                                 $mail->IsSMTP();
                                    // enable SMTP authentication
                                $mail->SMTPAuth = true;                  
                                // GMAIL username
                                $mail->Username = "geo.kmutt@gmail.com";
                                // GMAIL password
                                $mail->Password = "admin0000";
                                $mail->SMTPSecure = "ssl";  
                                // sets GMAIL as the SMTP server
                                $mail->Host = 'smtp.gmail.com';
                                // set the SMTP port for the GMAIL server
                                $mail->Port = "465";
                                $mail->From='geo.kmutt@gmail.com';
                                $mail->FromName='GEO KMUTT';
                                $mail->AddAddress($emailreal);
                                $mail->Subject  =  '[GEO Soultion] RESET PASSWORD';
                                $mail->IsHTML(true);
                                $mail->Body    = '<H2>Hello '.$emailreal.'</H2><br>Here is the password you need to login your GEO Solution :<br><H3>'.$password.'</H3><br><br>if you want to reset password <br><H3>'.$link.'</H3>';
                                if($mail->Send())
                                {
                                    $mailsend = 'Your mail has been sent successfully.';
                                    echo '<script>console.log("'.$mailsend.' '.$emailreal.'");</script>';
                                    session_start();
                                    $_SESSION['email'] = $emailreal; 
                                    $message['SUCCESS'] = 'success';
                                    //header("location: login/comfirm.php");        
                                }
                                else
                                {
                                $mailerror =  "Mail Error - >".$mail->ErrorInfo;
                                $message['ERROR'] = $mailerror ;
                                $message['type'] = 'mail_err';
                                }
                              } 
                            }   
                            else
                            {
                                $message['ERROR'] = "This account is already request password.";
                                $message['type'] = 'stid_already_req';
                            }
                         }
                    } else{
                        // Display an error message if username doesn't exist
                        $message['ERROR'] = 'No account found with that username.';
                        $message['type'] = 'stid_notfound';
                    }
                } else{
                    $message['ERROR'] = "Oops! Something went wrong. Please try again later.";
                    $message['type'] = 'err';
                }
            }
            // Close statement
            mysqli_stmt_close($stmt);
        }
    header('Content-type: application/json');
    echo json_encode($message);
    }
    /// function generate password
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