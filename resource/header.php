<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>GEO Solution</title>
	<!-- <link href="https://fonts.googleapis.com/css?family=Kanit:100,200,300,400,500,600,700" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css"> -->
	<!-- <link rel="stylesheet" href="header.css" echo filemtime('header.css'); ?> -->
	<!-- <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script> -->
  <link href="https://fonts.googleapis.com/css?family=Kanit:100,200,300,400,500,600,700" rel="stylesheet"> 
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
  <!--<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>-->
  <script src="/geo_solution/js/jquery-3.2.1.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
  
  <script>

  $(document).ready(function(){
    $("#login").click(function(){
      var username = $("#username").val();
      var password = $("#password").val();
      $.post("/geo_solution/resource/login/login.php",{username : username,password : password},function(data,status){
        var username_err = data['username_err'];
      },"json").fail(function(data){
					alert(data['username_err']);
        });
        $('#login-modal').modal('hide')
    });
  });
</script>


  <?php
  	session_start();
  ?>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-faded navbar-dark bg-dark sticky-top">
    <a class="navbar-brand mx-auto" href="https://www.facebook.com/GEO.Solution.KMUTT/">
      <img src="/geo_solution/image/geo_logo.png" width="40" height="40" class="d-inline-block align-top" alt="">
      <font color="#ff7454">GEO Solution</font>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div id="navbarNavDropdown" class="navbar-collapse collapse">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="/geo_solution/index.php">หน้าหลัก <span class="sr-only">(current)</span></a>
        <?php
          if(isset($_SESSION['username']) && $_SESSION['userview'] == 'student') {echo
            '<li class="nav-item">
              <a class="nav-link" href="#">รีวิว</a>
            </li>';
          }
          elseif(isset($_SESSION['username']) && $_SESSION['userview'] == 'teacher') {echo
            '<li class="nav-item">
              <a class="nav-link" href="#">เช็กชื่อ</a>
            </li>';
          }
        ?>
      </ul>
      <ul class="navbar-nav">
        <?php
          if(!(isset($_SESSION['username']))) {echo
            '<li class="nav-item">
            	<a href="/geo_solution/resource/request_pass.php"><button type="button" class="btn btn-outline-warning" href="/geo_solution/resource/request_pass.php"><i class="fa fa-unlock" aria-hidden="true"></i>   ขอรหัสผ่านครั้งแรก</button></a>
            </li>
            <li class="nav-item">
              <button type="button" class="btn btn-outline-warning" data-toggle="modal" data-target="#login-modal"><i class="fa fa-sign-in" aria-hidden="true"></i>  ลงชื่อเข้าใช้</button>
            </li>';
          }
          elseif ((isset( $_SESSION['username'])) && ($_SESSION['userview'] == 'student')) {echo
            '<li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                <i class="fa fa-user" aria-hidden="true"></i>'. $_SESSION['username'] .
              '</a>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="#"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>  ข้อมูลส่วนตัว</a>
                <a class="dropdown-item" href="#"><i class="fa fa-wrench" aria-hidden="true"></i>  เปลี่ยนรหัสผ่าน</a>
                <a class="dropdown-item" href="/geo_solution/resource/login/logout.php");><i class="fa fa-sign-out" aria-hidden="true"></i>  ออกจากระบบ</a>
              </div>
            </li>';
          }
          elseif ((isset( $_SESSION['username'])) && ($_SESSION['userview'] == 'teacher')) {echo 
            '<li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                <i class="fa fa-user-secret" aria-hidden="true"></i>   '.$_SESSION['username'].
              '</a>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="/geo_solution/resource/login/logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i>  ออกจากระบบ</a>
              </div>
            </li>';
          }
          elseif ((isset( $_SESSION['username'])) && ($_SESSION['userview'] == 'admin')) {echo 
            '<li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                <i class="fa fa-user-secret" aria-hidden="true"></i>   '.$_SESSION['username'].
              '</a>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="../resource/login/logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i>  ออกจากระบบ</a>
              </div>
            </li>';
          }
        ?>
      </ul>
    </div>
  </nav>
	<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    	<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header" style="background-color: #ff7454">
					<h5 class="modal-title" style="color: white">ลงชื่อเข้าใช้</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
        		</div>
	        	<div class="modal-body">
	          		
	            		<div class="form-group">
			            	<label class="form-control-label">รหัสนักศึกษา</label>
			            	<input class="form-control" type="text" name="username">
                    <span class="help-block"></span>
                    <p id = "username_err"></p>
	            		</div>
	            	<div class="form-group">
						<label class="form-control-label">รหัสผ่าน</label>
						<input class="form-control" type="password" name="password">
						<span class="help-block"></span>
	            	</div>
					<p><a href="#" class="tooltip-test">ลืมรหัสผ่าน</a> หรือ <a href="/geo_solution/resource/request_pass.php" class="tooltip-test">ขอรหัสผ่านครั้งแรก</a></p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
					<button id="login" type="submit" class="btn btn-warning" style="background-color: #ff7454"><font color="white">เข้าสู่ระบบ</font></button>
				</div>
	      
			</div>
		</div>
	</div>
<div class="container">
