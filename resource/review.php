<!-- <!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Review</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
	<link href="css/review.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Kanit:400,500,600,700,800,900" rel="stylesheet">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
	<script src="../js/show_student_course" type="text/javascript"></script> -->
<!-- 	<script>
$(document).ready(function(){
    $("tr:even").css("background-color", "gray");
});
</script> -->
<!-- </head>
<body>
	<nav class="navbar navbar-light bg-light">
	  <a class="navbar-brand" href="#">Navbar</a>
	</nav> -->
	<?php include('header.php'); ?>
	<!--<link href="/GEO_Solution/css/review.css" rel="stylesheet">-->
	<script>
		$(document).ready(function(){
			var type;
			$.post("review/view_type.php",{},function(data,status){
				type = data['type'];
				//alert(type);
			},"json");
			if (type == "student"){
					$("#body").empty();
				}
			else{
				$.post("review/show_data.php",{show_type : "all"},function(data,status){
				type = data['type'];
				//alert(type);
				},"json");
			}
			alert(type);
			$("tr:even").css("background-color", "gray");
		});
	</script>
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						  <div class="modal-dialog" role="document">
						    <div class="modal-content">
						      <div class="modal-header">
						        <h5 class="modal-title" id="exampleModalLabel">Review</h5>
						        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
						          <span aria-hidden="true">&times;</span>
						        </button>
						      </div>
						      <div class="modal-body">
						        <div class="row">
						        	<div class="col-1"></div>
							      	<div class="col-3">
										<div class="square">
											<img src="/geo_solution/image/team-member-3.jpg">
											<p class="nickname">พี่lalala</p>
										</div>
									</div>
									<div class="col-sm">
										<p>ชื่อ eieieieieieieieieie</p>
										<p>เรื่องที่สอน Block Diagram</p>
									</div>
								</div>
								<p>ใส่ดาวววววววววววววววววววว</p>
								<form>
									<div class="form-group">
										<label for="exampleFormControlTextarea1">เนื้อหา</label>
									    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
									</div>
									<div class="form-group">
										<label for="exampleFormControlTextarea1">ผู้สอน</label>
									    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
									</div>
									<div class="form-group">
										<label for="exampleFormControlTextarea1">อื่นๆ</label>
									    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
									</div>
								</form>
						      </div>
						      <div class="modal-footer">
						        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
						        <button type="submit" class="btn btn-primary">Submit</button>
						      </div>
						    </div>
						  </div>
						</div>
	<div class="container" id = "body">
		<div class="row">
			<div class="col">
				<h2>Review</h2>
				<div class="form-group">
					<select class="form-control col-2" style="float:left;" id="exampleFormControlSelect1">
					    <option value = "all">ทั้งหมด</option>
							<option value = "not_review">ยังไม่รีวิว</option>
					    <option value = "reviewed">รีวิวแล้ว</option>					    
					</select>
					<button type="submit" class="btn btn-success" id="search">ยืนยัน</button>
				</div>
				<br>
				<br>
				<table class="table table-striped">
				  <thead>
				    <tr>
				      <th scope="col">ลำดับ</th>
				      <th scope="col">วิชา</th>
				      <th scope="col">เรื่อง</th>
				      <th scope="col">ผู้สอน</th>
				      <th scope="col">รายละเอียด</th>
				      <th scope="col">สถานะ</th>
				    </tr>
				  </thead>
					<tbody id="student-course-list"></tbody>
					<tr>
				      <td scope="col">ลำดับ</td>
				      <td scope="col">วิชา</td>
				      <td scope="col">เรื่อง</td>
				      <td scope="col">ผู้สอน</td>
				      <td scope="col">รายละเอียด</td>
				      <!--<td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Review</button></td>-->
				    </tr>
				</table>
			</div>
		</div>
	</div>
<!-- </body>
</html> -->
  <?php require_once 'footer.php'; ?>