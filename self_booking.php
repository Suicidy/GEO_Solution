<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>GEO Solution</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
	<link href="css/self_booking.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Kanit:400,500,600,700,800,900" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script>
	$(document).ready(function(){
		$( "#demo" ).html( "<b>Single:</b> ทุกวัน" );
		$("#button1").click(function(){
	    	var singleValues = $( "#exampleFormControlSelect1" ).val();
	  		$( "#demo" ).html( "<b>Single:</b> " + singleValues );
		  	var obj = {};
		  	obj['day'] = singleValues;
		  	$.ajax({
				url: 'showCourse.php',
				type: 'post',
				data: obj,
				dataType: 'json',
				success: function(response){
					$("#world").html(response.data1);
				}
			});

/*		  	$.post("demo_test_post.asp",
	        {
	          name: "Donald Duck",
	          city: "Duckburg"
	        },
	        function(data,status){
	            alert("Data: " + data + "\nStatus: " + status);
	        });

		    $.post("showCourse.php", singleValues, function(data, status){
	    		console.log("Data: " + data + "\nStatus: " + status);
			});*/
			$( "#demo" ).html( "<b>Single:</b>555 ");
	    });
	});



	function submitDay() {
	  

	  // When using jQuery 3:
	  // var multipleValues = $( "#multiple" ).val();

	}
	</script>
</head>
<body>
	
	<nav class="navbar navbar-light bg-light">
	  <a class="navbar-brand" href="#">Navbar</a>
	</nav>
	<div class="container font-family: 'Kanit' ">
		<div class="row">
			<div class="col">
				<h2>GEO Solution</h2>
				<nav>
				  <div class="nav nav-tabs" id="nav-tab" role="tablist">
				    <a class="nav-item nav-link active" id="nav-MTH_102-tab" data-toggle="tab" href="#nav-MTH_102" role="tab" aria-controls="nav-MTH_102" aria-selected="true">MTH 102</a>
				    <a class="nav-item nav-link" id="nav-MTH_112-tab" data-toggle="tab" href="#nav-MTH_112" role="tab" aria-controls="nav-MTH_112" aria-selected="false">MTH 112</a>
				    <a class="nav-item nav-link" id="nav-PHY_102-tab" data-toggle="tab" href="#nav-PHY_102" role="tab" aria-controls="nav-PHY_102" aria-selected="false">PHY 102</a>
				    <a class="nav-item nav-link" id="nav-PHY_104-tab" data-toggle="tab" href="#nav-PHY_104" role="tab" aria-controls="nav-PHY_104" aria-selected="false">PHY 104</a>
				    <a class="nav-item nav-link" id="nav-CHM_103-tab" data-toggle="tab" href="#nav-CHM_103" role="tab" aria-controls="nav-CHM_103" aria-selected="false">CHM 103</a>
				  </div>
				</nav>
				<div class="tab-content" id="nav-tabContent">
				  <div class="tab-pane fade show active" id="nav-MTH_102" role="tabpanel" aria-labelledby="nav-MTH_102-tab">
				  	<div class="form-group">
				  			<select class="form-control col-2" style="float:left;" id="exampleFormControlSelect1">
						      <option>เลือกวัน</option>
						      <option>วันจันทร์</option>
						      <option>วันอังคาร</option>
						      <option>วันพุธ</option>
						      <option>วันพฤหัสบดี</option>
						      <option>วันศุกร์</option>
						    </select>
						    <button type="submit" class="btn btn-success" id="button1">ยืนยัน</button>
				  		<p id="demo">
				  			
				  		</p>
				  	</div>
					<div class="col-12">
						<h4>วันจันทร์</h4>
						<hr>
						<div class="row">
							<div class="col-3">
								<div class="square">
									<img src="./images/team-member-1.jpg">
									<p class="nickname">พี่.....</p>
									<p>ใส่ดาวววววววววว</p>
								</div>
							</div>
							<div class="col-sm">
								<p>ชื่อ xxxxxxxxxxxxxxxxxxxxx</p>
								<p>เรื่องที่สอน</p>
								<div class="row subject">
									<div class="col-4">
										<p>diff</p>
									</div>
									<div class="col-2 bookingtime">
									<!-- Button trigger modal -->
										<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
										  9.30-11.30
										</button>
										<!-- Modal -->
										<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
										  <div class="modal-dialog" role="document">
										    <div class="modal-content">
										      <div class="modal-header">
										        <h5 class="modal-title" id="exampleModalLabel">ยืนยันการจอง</h5>
										        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
										          <span aria-hidden="true">&times;</span>
										        </button>
										      </div>
										      <div class="modal-body">
										        จำนวนที่นั่งคงเหลือ 10 ที่นั่ง
										      </div>
										      <div class="modal-footer">
										        <button type="button" class="btn btn-success">ยืนยัน</button>
										      </div>
										    </div>
										  </div>
										</div>
									</div>
									<div class="col-4">
										<p>จำนวนที่นั่งคงเหลือ 10 ที่นั่ง</p>
									</div>
								</div>
								<div class="row subject">
									<div class="col-4">
										<p>BLA BLA BLA</p>
									</div>
									<div class="col-2 bookingtime">
									<!-- Button trigger modal -->
										<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
										  14.30-16.30
										</button>

										<!-- Modal -->
										<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
										  <div class="modal-dialog" role="document">
										    <div class="modal-content">
										      <div class="modal-header">
										        <h5 class="modal-title" id="exampleModalLongTitle">ยืนยันการจอง</h5>
										        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
										          <span aria-hidden="true">&times;</span>
										        </button>
										      </div>
										      <div class="modal-body">
										        จำนวนที่นั่งคงเหลือ 2 ที่นั่ง
										      </div>
										      <div class="modal-footer">
										        <button type="button" class="btn btn-success">ยืนยัน</button>
										      </div>
										    </div>
										  </div>
										</div>
									</div>
									<div class="col-4">
										<p>จำนวนที่นั่งคงเหลือ 2 ที่นั่ง</p>
									</div>
								</div>
								<!-- Button trigger modal -->
								<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModalLong">
								  review
								</button>
								<!-- Modal -->
								<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
								  <div class="modal-dialog" role="document">
								    <div class="modal-content">
								      <div class="modal-header">
								        <h5 class="modal-title" id="exampleModalLongTitle">Review</h5>
								        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								          <span aria-hidden="true">&times;</span>
								        </button>
								      </div>
								      <div class="modal-body">
								      	<div class="col-12" style="word-wrap: break-word;">
								        	<p>Goooooooooooooooooodอิอิอิ</p>
								        </div>
								        <div class="row">
											<div class="col-3">
								        		<p>คะแนนพี่TA</p>
								        	</div>
								        	<div class="col-5">
								        		<p> ใส่ดาวววววววววววววว </p>
								        	</div>
								        	<div class="col-4">
								        		<p>17/01/2018 16.45 น.</p>
								        	</div>	
								        </div>
								        <div class="col-12" style="word-wrap: break-word;">
								        	<p>GoooooooooooooooooodอิอิอิksdjjvisojsovkGoooooooooooooooooodGoooooooooooooooooodGoooooooooooooooooodGooooooooooooooooood</p>
								        </div>
								        <div class="row">
											<div class="col-3">
								        		<p>คะแนนพี่TA</p>
								        	</div>
								        	<div class="col-5">
								        		<p> ใส่ดาวววววววววววววว </p>
								        	</div>
								        	<div class="col-4">
								        		<p>17/01/2018 16.45 น.</p>
								        	</div>	
								        </div>				        									    	
								      </div>
								      <div class="modal-footer">
								        <nav aria-label="Page navigation example">
										  <ul class="pagination justify-content-center">
										    <li class="page-item disabled">
										      <a class="page-link" href="#" tabindex="-1">Previous</a>
										    </li>
										    <li class="page-item"><a class="page-link" href="#">1</a></li>
										    <li class="page-item"><a class="page-link" href="#">2</a></li>
										    <li class="page-item"><a class="page-link" href="#">3</a></li>
										    <li class="page-item">
										      <a class="page-link" href="#">Next</a>
										    </li>
										  </ul>
										</nav>
								      </div>
								    </div>
								  </div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-3">
								<div class="square">
									<img src="./images/team-member-2.jpg">
									<p class="nickname">พี่.....</p>
									<p>ใส่ดาวววววววววว</p>
								</div>
							</div>
							<div class="col-sm">
								<p>ชื่อ xxxxxxxxxxxxxxxxxxxxx</p>
								<p>เรื่องที่สอน</p>
								<div class="row subject">
									<div class="col-4">
										<p>diff</p>
									</div>
									<div class="col-2 bookingtime">
									<!-- Button trigger modal -->
										<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
										  9.30-11.30
										</button>
										<!-- Modal -->
										<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
										  <div class="modal-dialog" role="document">
										    <div class="modal-content">
										      <div class="modal-header">
										        <h5 class="modal-title" id="exampleModalLabel">ยืนยันการจอง</h5>
										        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
										          <span aria-hidden="true">&times;</span>
										        </button>
										      </div>
										      <div class="modal-body">
										        จำนวนที่นั่งคงเหลือ 7 ที่นั่ง
										      </div>
										      <div class="modal-footer">
										        <button type="button" class="btn btn-success">ยืนยัน</button>
										      </div>
										    </div>
										  </div>
										</div>
									</div>
									<div class="col-4">
										<p>จำนวนที่นั่งคงเหลือ 7 ที่นั่ง</p>
									</div>
								</div>
								<div class="row subject">
									<div class="col-4">
										<p>BLA BLA BLA</p>
									</div>
									<div class="col-2 bookingtime">
									<!-- Button trigger modal -->
										<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
										  9.30-16.30
										</button>

										<!-- Modal -->
										<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
										  <div class="modal-dialog" role="document">
										    <div class="modal-content">
										      <div class="modal-header">
										        <h5 class="modal-title" id="exampleModalLongTitle">ยืนยันการจอง</h5>
										        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
										          <span aria-hidden="true">&times;</span>
										        </button>
										      </div>
										      <div class="modal-body">
										        จำนวนที่นั่งคงเหลือ 2 ที่นั่ง
										      </div>
										      <div class="modal-footer">
										        <button type="button" class="btn btn-success">ยืนยัน</button>
										      </div>
										    </div>
										  </div>
										</div>
									</div>
									<div class="col-4">
										<p>จำนวนที่นั่งคงเหลือ 2 ที่นั่ง</p>
									</div>
								</div>
								<div class="row subject">
									<div class="col-4">
										<p>BLA BLA BLA</p>
									</div>
									<div class="col-2 bookingtime">
									<!-- Button trigger modal -->
										<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
										  9.30-16.30
										</button>

										<!-- Modal -->
										<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
										  <div class="modal-dialog" role="document">
										    <div class="modal-content">
										      <div class="modal-header">
										        <h5 class="modal-title" id="exampleModalLongTitle">ยืนยันการจอง</h5>
										        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
										          <span aria-hidden="true">&times;</span>
										        </button>
										      </div>
										      <div class="modal-body">
										        จำนวนที่นั่งคงเหลือ 5 ที่นั่ง
										      </div>
										      <div class="modal-footer">
										        <button type="button" class="btn btn-success">ยืนยัน</button>
										      </div>
										    </div>
										  </div>
										</div>
									</div>
									<div class="col-4">
										<p>จำนวนที่นั่งคงเหลือ 5 ที่นั่ง</p>
									</div>
								</div>

								<!-- Button trigger modal -->
								<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModalLong">
								  review
								</button>
								<!-- Modal -->
								<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
								  <div class="modal-dialog" role="document">
								    <div class="modal-content">
								      <div class="modal-header">
								        <h5 class="modal-title" id="exampleModalLongTitle">Review</h5>
								        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								          <span aria-hidden="true">&times;</span>
								        </button>
								      </div>
								      <div class="modal-body">
								      	<div class="col-12" style="word-wrap: break-word;">
								        	<p>Goooooooooooooooooodอิอิอิ</p>
								        </div>
								        <div class="row">
											<div class="col-3">
								        		<p>คะแนนพี่TA</p>
								        	</div>
								        	<div class="col-5">
								        		<p> ใส่ดาวววววววววววววว </p>
								        	</div>
								        	<div class="col-4">
								        		<p>17/01/2018 16.45 น.</p>
								        	</div>	
								        </div>
								        <div class="col-12" style="word-wrap: break-word;">
								        	<p>GoooooooooooooooooodอิอิอิksdjjvisojsovkGoooooooooooooooooodGoooooooooooooooooodGoooooooooooooooooodGooooooooooooooooood</p>
								        </div>
								        <div class="row">
											<div class="col-3">
								        		<p>คะแนนพี่TA</p>
								        	</div>
								        	<div class="col-5">
								        		<p> ใส่ดาวววววววววววววว </p>
								        	</div>
								        	<div class="col-4">
								        		<p>17/01/2018 16.45 น.</p>
								        	</div>	
								        </div>				        									    	
								      </div>
								      <div class="modal-footer">
								        <nav aria-label="Page navigation example">
										  <ul class="pagination justify-content-center">
										    <li class="page-item disabled">
										      <a class="page-link" href="#" tabindex="-1">Previous</a>
										    </li>
										    <li class="page-item"><a class="page-link" href="#">1</a></li>
										    <li class="page-item"><a class="page-link" href="#">2</a></li>
										    <li class="page-item"><a class="page-link" href="#">3</a></li>
										    <li class="page-item">
										      <a class="page-link" href="#">Next</a>
										    </li>
										  </ul>
										</nav>
								      </div>
								    </div>
								  </div>
								</div>
							</div>
						</div>
					</div>

				  </div>
				  <div class="tab-pane fade" id="nav-MTH_112" role="tabpanel" aria-labelledby="nav-MTH_112-tab">MTH 112</div>
				  <div class="tab-pane fade" id="nav-PHY_102" role="tabpanel" aria-labelledby="nav-PHY_102-tab">PHY 102</div>
				  <div class="tab-pane fade" id="nav-PHY_104" role="tabpanel" aria-labelledby="nav-PHY_104-tab">PHY 104</div>
				  <div class="tab-pane fade" id="nav-CHM_103" role="tabpanel" aria-labelledby="nav-CHM_103-tab">CHM 103</div>
				</div>
			</div>
		</div>
	</div>

	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
</body>
</html>