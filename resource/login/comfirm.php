<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Confirm</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
	<link href="css/comfirm.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Kanit:400,500,600,700,800,900" rel="stylesheet">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
</head>
<body>
	
	<nav class="navbar navbar-light bg-light">
	  <a class="navbar-brand" href="#">Navbar</a>
	</nav>
	<br>
	<center>
		<div class="card text-white bg-dark mb-3" style="max-width: 35rem;">
		  <center><img src="./image/check-mark-button.png"></center>
		  <div class="card-body">
		  	<h5 class="card-title">ส่งเรียบร้อย</h5>
		    <p class="card-text">กรุณาตรวจสอบรหัสผ่านที่อีเมล์</p>
				<p class="card-text"><?php 
				 if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
					
								header("location: request_pass.php");
					
								exit;
					
							}
				?></p>
		    <button type="button" class="btn btn-primary">Home</button>
		</div>
	</center>
</div>

</body>
</html>