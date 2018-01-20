  <?php
    session_start();
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>GEO Solution</title>
  <link href="https://fonts.googleapis.com/css?family=Kanit:100,200,300,400,500,600,700" rel="stylesheet"> 
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
  <script src="/geo_solution/js/jquery-3.2.1.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
  <style>
* {
    box-sizing: border-box;
}
.row::after {
    content: "";
    clear: both;
    display: block;
}
[class*="col-"] {
    float: left;
}
.header {
    background-color: #9933cc;
    color: #ffffff;
    padding: 15px;
}
.menu ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
}
.menu li {
    padding: 8px;
    margin-bottom: 7px;
    background-color: #33b5e5;
    color: #ffffff;
    box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
}
.menu li:hover {
    background-color: #0099cc;
}
.aside {
    background-color: #33b5e5;
    padding: 15px;
    color: #ffffff;
    text-align: center;
    font-size: 14px;
    box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
}
/**
 * Demo Styles
 */

html {
  height: 100%;
  box-sizing: border-box;
}

*,
*:before,
*:after {
  box-sizing: inherit;
}

body {
/*  background-color: #D3D3D3;*/
/*  background-color: #efd9cd;*/
  background-color: #363636;
  position: relative;
  margin: 0;
  padding-bottom: 6rem;
  min-height: 100%;
	font-family: 'Kanit', sans-serif;
}

#container{
  background-color: white;
  border-radius: 10px;
}

.demo {
  margin: 0 auto;
  padding-top: 64px;
  max-width: 640px;
  width: 94%;
}

.demo h1 {
  margin-top: 0;
}

/**
 * Footer Styles
 */

.footer {
  position: absolute;
  right: 0;
  bottom: 0;
  left: 0;
}

/*.h1{
  background-color: #ff7454;
  font-color: white;
}*/

.navbar{
  padding-top: 0px;
  padding-bottom: 0px;
}

.nav-item{
  margin-right: 10px;
}

#navbarNavDropdown{
  padding-left: 20px;
}

img {
  max-width: 100%;
  max-height: 100%;
}

/* For desktop: */
.col-1 {width: 8.33%;}
.col-2 {width: 16.66%;}
.col-3 {width: 25%;}
.col-4 {width: 33.33%;}
.col-5 {width: 41.66%;}
.col-6 {width: 50%;}
.col-7 {width: 58.33%;}
.col-8 {width: 66.66%;}
.col-9 {width: 75%;}
.col-10 {width: 83.33%;}
.col-11 {width: 91.66%;}
.col-12 {width: 100%;}

@media only screen and (max-width: 768px) {
    /* For mobile phones: */
    [class*="col-"] {
        width: 100%;
    }
}
</style>
<script>
  $(document).ready(function(){
    $("#login").click(function(){
      $("#user_err").empty();
      $("#pass_er").empty();
      var username = $("#username").val();
      var password = $("#password").val();
      $.post("/geo_solution/resource/login/login.php",{username : username,password : password},function(data,status){
        var username_err = data['username_err'];
        var password_err = data['password_err'];
        var status_login = data['status_login'];
        var login_count = data['login_count'];
        var type = data['type'];
        $("#user_err").text(username_err);
        $("#pass_err").text(password_err);
        if(login_count==0&&type!="teacher"&&type!="admin")
        {
           window.location.replace("/geo_solution/resource/profile.php");
         }
        else if(status_login==1)
        {
          location.reload();
        }
      },"json")
      $('#login-modal').on('hidden.bs.modal', function (event) {
        location.reload();
			});
    });

    $("#username").on("keydown", function (e) {
    if (e.keyCode === 13) {  //checks whether the pressed key is "Enter"
      $("#user_err").empty();
      $("#pass_er").empty();
      var username = $("#username").val();
      var password = $("#password").val();
      $.post("/geo_solution/resource/login/login.php",{username : username,password : password},function(data,status){
        var username_err = data['username_err'];
        var password_err = data['password_err'];
        var status_login = data['status_login'];
        var login_count = data['login_count'];
        var type = data['type'];
        $("#user_err").text(username_err);
        $("#pass_err").text(password_err);
        if(login_count==0&&type!="teacher"&&type!="admin")
        {
           window.location.replace("/geo_solution/resource/profile.php");
         }
        else if(status_login==1)
        {
          location.reload();
        }
      },"json")
      $('#login-modal').on('hidden.bs.modal', function (event) {
        location.reload();
			});
    }
    });
    
    $("#password").on("keydown", function (e) {
    if (e.keyCode === 13) {  //checks whether the pressed key is "Enter"
      $("#user_err").empty();
      $("#pass_er").empty();
      var username = $("#username").val();
      var password = $("#password").val();
      $.post("/geo_solution/resource/login/login.php",{username : username,password : password},function(data,status){
        var username_err = data['username_err'];
        var password_err = data['password_err'];
        var status_login = data['status_login'];
        var login_count = data['login_count'];
        var type = data['type'];
        $("#user_err").text(username_err);
        $("#pass_err").text(password_err);
        if(login_count==0&&type!="teacher"&&type!="admin")
        {
           window.location.replace("/geo_solution/resource/profile.php");
         }
        else if(status_login==1)
        {
          location.reload();
        }
      },"json")
      $('#login-modal').on('hidden.bs.modal', function (event) {
        location.reload();
			});
    }
    });

  });
</script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-faded navbar-dark bg-dark sticky-top">
  <div class="nav container">
    <a class="navbar-brand mx-auto" href="/geo_solution/home.php">
      <img src="/geo_solution/image/geo_logo.png" width="70" height="70">
      <font color="#ff7454" size="6">GEO Solution</font>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div id="navbarNavDropdown" class="navbar-collapse collapse">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="/geo_solution/home.php">หน้าหลัก</a>
        <?php
          if(isset($_SESSION['username']) && $_SESSION['userview'] == 'student') {echo
            '<li class="nav-item">
              <a class="nav-link" href="/geo_solution/resource/review.php">รีวิว</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="/geo_solution/resource/reserved.php">สถานะการจอง</a>
            </li>
            ';
          }
          elseif(isset($_SESSION['username']) && $_SESSION['userview'] == 'teacher') {echo
            '<li class="nav-item">
              <a class="nav-link" href="/geo_solution/resource/attendance.php">เช็กชื่อ</a>
            </li>' 
            .
            '<li class="nav-item">
              <a class="nav-link" href="/geo_solution/resource/check_info.php">ข้อมูลห้องเรียน</a>
            </li>'
            .
            '<li class="nav-item">
              <a class="nav-link" href="/geo_solution/resource/check_review.php">ความคิดเห็น</a>
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
                <i class="fa fa-user" aria-hidden="true"></i>   '. $_SESSION['username'] .
              '</a>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="/geo_solution/resource/profile.php"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>  ข้อมูลส่วนตัว</a>
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
                <a class="dropdown-item" href="/geo_solution/resource/login/logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i>  ออกจากระบบ</a>
              </div>
            </li>';
          }
        ?>
      </ul>
    </div>
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
                    <input class="form-control" type="text" id="username">
                    <span class="help-block" id="user_err"></span>
	            		</div>
	            	<div class="form-group">
						<label class="form-control-label">รหัสผ่าน</label>
						<input class="form-control" type="password" id="password">
						<span class="help-block" id="pass_err"></span>
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
  <br>
<div class="container" id="container">
