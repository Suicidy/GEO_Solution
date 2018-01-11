<?php
if(isset($_POST['submit_username']) && $_POST['username'])
{
  $username = $_POST['username'];
  $conn = mysqli_connect('localhost','root','','geo_db');
  $select=mysqli_query($conn,"select student_id,email,password from student where student_id = '$username'");
  if(mysqli_num_rows($select)>=1)
  {
    echo "START<br>";
    //$to = $email;
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
    $conn->query($sql);
    
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