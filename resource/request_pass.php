<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    
    require 'phpmailer/src/Exception.php';
    require 'phpmailer/src/PHPMailer.php';
    require 'phpmailer/src/SMTP.php';
    require_once '../config.php';

    // Define variables and initialize with empty values
    $username = "";
    $username_err = "";

    // Processing form data when form is submitted
    if($_SERVER["REQUEST_METHOD"] == "POST"){

        // Check if username is empty
        if(empty(trim($_POST["username"]))){
            $username_err = 'Please enter Student ID.';
        } else{
            $username = trim($_POST["username"]);
        }

        // Validate credentials
        if(empty($username_err)){

            // Prepare a select statement
            $sql = "SELECT student_id, email FROM student WHERE student_id = ?";
            if($stmt = mysqli_prepare($link, $sql)){

                // Bind variables to the prepared statement as parameters
                mysqli_stmt_bind_param($stmt, "s", $param_username);

                // Set parameters
                $param_username = $username;

               // Attempt to execute the prepared statement
                if(mysqli_stmt_execute($stmt)){

                    // Store result
                    mysqli_stmt_store_result($stmt);

                    // Check if username exists
                    if(mysqli_stmt_num_rows($stmt) == 1){                    

                        // Bind result variables
                         mysqli_stmt_bind_result($stmt, $username,$email);
                         if(mysqli_stmt_fetch($stmt)){
                            $select=mysqli_query($link,"select student_id,email,password from student where student_id = '$username' and password =' '");
                            if(mysqli_num_rows($select)>=1)
                            {
                              echo "START<br>";
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
                                    echo 'Your mail has been sent successfully.';
                                    session_start();
                                    $_SESSION['email'] = $emailreal; 
                                    header("location: login/comfirm.php");        
                                }
                                else
                                {
                                echo "Mail Error - >".$mail->ErrorInfo;
                                }
                              }	
                            }	
                            else
                            {
                              $username_err =  "This account is already request password.";
                            }
                         }
                    } else{
                        // Display an error message if username doesn't exist
                        $username_err = 'No account found with that username.';
                    }
                } else{
                    echo "Oops! Something went wrong. Please try again later.";
                }
            }
            // Close statement
            mysqli_stmt_close($stmt);
        }
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
    ?>
<!-- 
    <!DOCTYPE html>
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
        
    </head>

    <body> -->
        <?php require_once './header.php'; ?>
        <style type="text/css">
            body{ font: 18px sans-serif; font-family: 'Kanit', sans-serif;}
            .wrapper{ width: 400px; padding: 20px; }
        </style>
        <center>
        <div class="card bg-light wrapper">
            <h2>Request Password</h2>
            <p>Please enter student ID.</p>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                    <label>Student ID:<sup>*</sup></label>
                    <input type="text" name="username"class="form-control" value="<?php echo $username; ?>">
                    <span class="help-block"><?php echo $username_err; ?></span>
                </div>    
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Submit">
                </div>
            </form>
        </div>
        </center>  
<!--     </body>
    </html> -->
    <?php require_once './footer.php'; ?>

