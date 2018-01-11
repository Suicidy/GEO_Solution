<?php

    // Include config file
    require_once 'config.php';


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
                            $select=mysqli_query($link,"select student_id,email,password from student where student_id = '$username'");
                            if(mysqli_num_rows($select)>=1)
                            {
                              echo "START<br>";
                              while($row=mysqli_fetch_array($select))
                              {
                                $to = $row['email'];
                                $password = generatePassword(10);
                                echo $password.'<br>';
                                echo $row['email'].'<br>';
                                $email=md5($row['email']);
                                $pass=md5($password);
                                $student_id=$row['student_id'];
                              
                              $sql = "UPDATE student SET password='$pass' WHERE student_id = '$student_id' ";
                              $link->query($sql);
                              
                              $link="<a href='www.samplewebsite.com/reset.php?key=".$email."&reset=".$pass."'>Click To Reset password</a>";
                             
                                  $subject = 'GEO@KMUTT RESET PASSWORD';
                                  $from = 'tanakrit.k18373@gmail.com';
                              
                                  // To send HTML mail, the Content-type header must be set
                              
                                  $headers  = 'MIME-Version: 1.0' . "\r\n";
                                  $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
                              
                                  // Create email headers
                              
                                  $headers .= 'From: '.$from."\r\n".
                                      'Reply-To: '.$from."\r\n" .
                                      'X-Mailer: PHP/' . phpversion();
                              
                                  // Compose a simple HTML email message
                              
                                  $message = $password;
                                  $message .= $link.'<br>';
                                   
                                  // Sending email
                              
                                  if(mail($to, $subject, $message, $headers)){
                                      echo 'Your mail has been sent successfully.';
                                  } else{
                                      echo 'Unable to send email. Please try again.';
                                  }
                                }
                            }	
                            else
                            {
                              echo "ERROR";
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

    <!DOCTYPE html>

    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
        <style type="text/css">
            body{ font: 14px sans-serif; }
            .wrapper{ width: 350px; padding: 20px; }
        </style>
    </head>

    <body>
        <div class="wrapper">
            <h2>Login</h2>
            <p>Please fill in your credentials to login.</p>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                    <label>Username:<sup>*</sup></label>
                    <input type="text" name="username"class="form-control" value="<?php echo $username; ?>">
                    <span class="help-block"><?php echo $username_err; ?></span>
                </div>    
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Submit">
                </div>
            </form>
        </div>    
    </body>
    </html>

