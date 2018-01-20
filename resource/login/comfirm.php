<?php require_once '../header.php'; ?>
	<link href="/geo_solution/css/comfirm.css" rel="stylesheet">
	<center>
		<div class="card wrapper" id="confirm-box" style="border: none; max-width: 35rem;" hidden>
		  <center><img src="../../image/check-mark-button.png"></center>
		  <div class="card-body">
		  	<h5 class="card-title">ส่งเรียบร้อย</h5>
		    <p class="card-text">กรุณาตรวจสอบรหัสผ่านที่อีเมล์</p>
				<p class="card-text" id="email-placeholder" >
				</p>
		    <button type="button" class="btn btn-primary">Home</button>
		   </div>
		</div>
	</center>
	<script>
		$(document).ready(function(){
			$.ajax({
				type: "GET",
				url: "session_check.php",
				success: function(data){
					if(data['email']){
						document.getElementById("email-placeholder").innerHTML = data['email'];
						$('#confirm-box').removeAttr("hidden");
					}else{
						window.location.href = '/geo_solution/resource/login/expired.php';                                
					}
				}
			});
		});
	</script>

<?php require_once '../footer.php'; ?>


