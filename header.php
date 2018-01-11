<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>GEO Solution</title>
	<link href="https://fonts.googleapis.com/css?family=Kanit:100,200,300,400,500,600,700" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
	<?php
	session_start();
	$_SESSION['userview'] = '';
	$_SESSION['user_id'] = '';
	?>
</head>
<body>
  	<nav class="navbar navbar-toggleable-sm navbar-inverse bg-inverse fixed-top">
		<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<a class="navbar-brand mx-auto" href="#">
			<img src="favicon.ico" width="30" height="30" class="d-inline-block align-top" alt="">
	    	<font color="#ff7454">GEO Solution</font>
	    </a>
		<div class="collapse navbar-collapse justify-content-between" id="navbar">
			<div class="navbar-nav">
        		<li class="nav-item active">
        			<a class="nav-link" href="#">หน้าหลัก<span class="sr-only">(current)</span></a>
    			</li>
    			<?php
	        		if($_SESSION['userview'] == 'student'){
	            		echo '<li class="nav-item">
	            			<a class="nav-link" href="#">รีวิว</a>
      					</li>';
	        		}
				    if($_SESSION['userview'] == 'teacher') {
			        	echo '<li class="nav-item">
	            			<a class="nav-link" href="#">เช็กชื่อ</a>
      					</li>';
			        }
			    ?>
			</div>
			<div class="navbar-nav">
				<?php
					if($_SESSION['user_id'] == '') echo
						'<li class="nav-item">
	            			<a class="nav-link" href="#"><i class="fa fa-sign-in" aria-hidden="true"></i>  ลงชื่อเข้าใช้</a>
	  					</li>';
	  				elseif (($_SESSION['userview'] == 'student')&&(isset( $_SESSION['user_id']))) {echo
	  					'<li class="nav-item dropdown">
	      					<a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown"><i class="fa fa-user" aria-hidden="true"></i>  '
	      					. $_SESSION['user_id'] 
	      					.'</a>
							<div class="dropdown-menu">
								<a class="dropdown-item" href="#"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>  ข้อมูลส่วนตัว</a>
								<a class="dropdown-item" href="#"><i class="fa fa-wrench" aria-hidden="true"></i>  เปลี่ยนรหัสผ่าน</a>
								<a class="dropdown-item" href="#"><i class="fa fa-sign-out" aria-hidden="true"></i>  ออกจากระบบ</a>
							</div>
						</li>';
					}
					elseif ($_SESSION['userview'] == 'teacher') {echo 
	  					'<li class="nav-item dropdown">
	      					<a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
	      						<i class="fa fa-user-secret" aria-hidden="true"></i>
	      						teacher
	      					</a>
							<div class="dropdown-menu">
								<a class="dropdown-item" href="#"><i class="fa fa-sign-out" aria-hidden="true"></i>  ออกจากระบบ</a>
							</div>
						</li>';
	  				}
	      		?>
			</div>
		</div>
	</nav>