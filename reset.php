<?php

// Include config file

require_once 'config.php';
session_start();

// Define variables and initialize with empty values

$email = $user = $password = $confirm_password = "";
$link_err = $password_err = $confirm_password_err = "";

//Validation link
if($_SERVER["REQUEST_METHOD"] == "GET"){
    
    if(!empty($_GET["key"])&&!empty($_GET["reset"])){
        $email = mysqli_real_escape_string($link,trim($_GET["key"]));
        $reset = mysqli_real_escape_string($link,trim($_GET["reset"]));
        $select= mysqli_query($link,"SELECT student_id FROM student WHERE md5(email)='$email' and password='$reset'");
        if(mysqli_num_rows($select) == 1){
            $row = mysqli_fetch_array($select);
            $_SESSION['stid'] = $row['student_id'];
        }else{
            $link_err = "Error your link may expired or something might occur please contact yorsh44@gmail.com for more information";
        }
    }else{
        header("Location: ../index.php");
    }
}

// Processing form data when form is submitted

if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Validate password

    if(empty(trim($_POST['password']))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST['password'])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST['password']);
    }

    // Validate confirm password

    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = 'Please confirm password.';     
    } else{
        $confirm_password = trim($_POST['confirm_password']);
        if($password != $confirm_password){
            $confirm_password_err = 'Password did not match.';
        }
    }

    // Check input errors before inserting in database

    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){

        // Set parameters
        $param_username = $_SESSION['stid'];
        $param_password = md5(trim($password)); // Creates a password hash

        // Prepare an execute statement
        $sql = "UPDATE student SET password= '$param_password' WHERE student_id = '$param_username' ";
        // Attempt to execute the statement
        if(mysqli_query($link,$sql)){
            // Redirect to login page
            header("location: login.php");
        } else{
            echo "Something went wrong. Please try again later.";
        }
    }
    // Close connection
    mysqli_close($link);
}
?>

<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>
</head
<body>
    <div class="wrapper">
        <h3>Reset Password</h3>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Password:</label>
                <input type="password" name="password" class="form-control" value="<?php echo $password; ?>">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                <label>Confirm Password:</label>
                <input type="password" name="confirm_password" class="form-control" value="<?php echo $confirm_password; ?>">
                <span class="help-block"><?php echo $confirm_password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
                <input type="reset" class="btn btn-default" value="Reset">
            </div>
        </form>
    </div>    
</body>

</html>


