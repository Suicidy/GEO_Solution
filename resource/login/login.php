
<?php
    // Include config file
    require_once $_SERVER['DOCUMENT_ROOT'].'/geo_solution/config.php';
    session_start();
    // Define variables and initialize with empty values
    $username = $password = $type = "";
    $username_err = $password_err = "";
    $username = check_input($_POST['username']);
    $password = check_input($_POST['password']);
    $data = array();
    
    // Processing form data when form is submitted
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        // Check if username is empty
        if(empty(trim($_POST["username"]))){
            $data['username_err'] = 'โปรดกรอกรหัสนักศึกษา';
        } else{
            $username = trim($_POST["username"]);
        }
        // Check if password is empty
        if(empty(trim($_POST['password']))){
            $data['password_err'] = 'โปรดกรอกรหัสผ่าน';
        } else{
            $password = trim($_POST['password']);
        }
        // Validate credentials
        if(empty($data['username_err']) && empty($data['password_err'])){
            // Prepare a select statement
            $sql = "SELECT student_id, password, type, login_count FROM student WHERE student_id = ?";
            if($stmt = mysqli_prepare($link, $sql)){
                // Bind variables to the prepared statement as parameters
                mysqli_stmt_bind_param($stmt, "s", $param_username);
                // Set parameters
                $param_username = $username;
               // Attempt to execute the prepared statement
                if(mysqli_stmt_execute($stmt)){
                    // Store result
                    mysqli_stmt_store_result($stmt);
                    // Check if username exists, if yes then verify password
                    if(mysqli_stmt_num_rows($stmt) == 1){                    
                        // Bind result variables
                        mysqli_stmt_bind_result($stmt, $username, $hashed_password,$type,$login_count);
                        if(mysqli_stmt_fetch($stmt)){
                            if(md5($password) == $hashed_password){
                                /* Password is correct, so start a new session and save the username to the session */
                                $_SESSION['username'] = $username; 
                                $_SESSION['userview'] = $type; 
                                $data['status_login']=1;
                                $data['login_count'] =$login_count;  
                                $login_count++;
                                $add = 'update student set login_count='.$login_count.' where student_id="'.$_SESSION['username'].'";';
                                $results = query($add);
                               // echo $add;
                               // echo $results;
                            } else{
                                // Display an error message if password is not valid
                                $data['password_err'] = 'รหัสผ่านไม่ถูกต้อง';
                               // echo $password.md5($password);
                            }
                        }
                    } else{
                        // Display an error message if username doesn't exist
                        $data['username_err'] = 'ไม่พบบัญชีผู้ใช้นี้';
                    }
                } else{
                    echo "เข้าสู่ระบบอีกครั้งในภายหลัง";
                }
            }
            // Close statement
            mysqli_stmt_close($stmt);
        }
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        // Close connection
        mysqli_close($link);
    }

    
?>