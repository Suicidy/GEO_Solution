<?php include('resource/header.php'); ?>
<!-- <!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>GEO Solution</title>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="js/jquery-3.2.1.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
	
	<link href="https://fonts.googleapis.com/css?family=Kanit:400,500,600,700,800,900" rel="stylesheet"> -->
	<link href="css/index.css" rel="stylesheet">
	<script src="js/indexJS.js"></script>


<!-- </head>
<body>

	<nav class="navbar navbar-light bg-light">
	  <a class="navbar-brand" href="#">Navbar</a>
	</nav>
	<div class="container"> -->
		
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
				  			<select class="form-control col-md-3 col-xs-6" style="float:left;" id="SelectMTH102">
						      <option>เลือกวัน</option>
						      <option>วันจันทร์</option>
						      <option>วันอังคาร</option>
						      <option>วันพุธ</option>
						      <option>วันพฤหัสบดี</option>
						      <option>วันศุกร์</option>
						    </select>
						    <button type="submit" class="btn btn-success" id="buttonSelectMTH102">ยืนยัน</button>
				  	</div>

					<div class="col-12">
						<h4 id="headMTH102">ทุกวัน</h4>
						<hr class="head-line">
						<center id="nocourseMTH102"></center>

						<div id="contentMTH102"></div>
					</div>
					<br>					
				</div>
				<div class="tab-pane fade" id="nav-MTH_112" role="tabpanel" aria-labelledby="nav-MTH_112-tab">
				  	<div class="form-group">
				  			<select class="form-control col-md-3 col-xs-6" style="float:left;" id="SelectMTH112">
						      <option>เลือกวัน</option>
						      <option>วันจันทร์</option>
						      <option>วันอังคาร</option>
						      <option>วันพุธ</option>
						      <option>วันพฤหัสบดี</option>
						      <option>วันศุกร์</option>
						    </select>
						    <button type="submit" class="btn btn-success" id="buttonSelectMTH112">ยืนยัน</button>
				  	</div>
					<div class="col-12">
						<h4 id="headMTH112">ทุกวัน</h4>
						<hr class="head-line">
						<center id="nocourseMTH112"></center>

						<div id="contentMTH112"></div>	
					
					</div>
					<br>
				  </div>
				  <div class="tab-pane fade" id="nav-PHY_102" role="tabpanel" aria-labelledby="nav-PHY_102-tab">
				  	<div class="form-group">
				  			<select class="form-control col-md-3 col-xs-6" style="float:left;" id="SelectPHY102">
						      <option>เลือกวัน</option>
						      <option>วันจันทร์</option>
						      <option>วันอังคาร</option>
						      <option>วันพุธ</option>
						      <option>วันพฤหัสบดี</option>
						      <option>วันศุกร์</option>
						    </select>
						    <button type="submit" class="btn btn-success" id="buttonSelectPHY102">ยืนยัน</button>
				  	</div>
					<div class="col-12">
						<h4 id="headPHY102">ทุกวัน</h4>
						<hr class="head-line" >
						<center id="nocoursePHY102"></center>

						<div id="contentPHY102"></div>

					</div>
					<br>
				  </div>
				  <div class="tab-pane fade" id="nav-PHY_104" role="tabpanel" aria-labelledby="nav-PHY_104-tab">
				  	<div class="form-group">
				  			<select class="form-control col-md-3 col-xs-6" style="float:left;" id="SelectPHY104">
						      <option>เลือกวัน</option>
						      <option>วันจันทร์</option>
						      <option>วันอังคาร</option>
						      <option>วันพุธ</option>
						      <option>วันพฤหัสบดี</option>
						      <option>วันศุกร์</option>
						    </select>
						    <button type="submit" class="btn btn-success" id="buttonSelectPHY104">ยืนยัน</button>
				  	</div>
					<div class="col-12">
						<h4 id="headPHY104">ทุกวัน</h4>
						<hr class="head-line">
						<center id="nocoursePHY104">vbvb</center>

						<div id="contentPHY104"></div>
						
					</div>
					<br>
				  </div>
				  <div class="tab-pane fade" id="nav-CHM_103" role="tabpanel" aria-labelledby="nav-CHM_103-tab">
				  	<div class="form-group">
				  			<select class="form-control col-md-3 col-xs-6" style="float:left;" id="SelectCHM103">
						      <option>เลือกวัน</option>
						      <option>วันจันทร์</option>
						      <option>วันอังคาร</option>
						      <option>วันพุธ</option>
						      <option>วันพฤหัสบดี</option>
						      <option>วันศุกร์</option>
						    </select>
						    <button type="submit" class="btn btn-success" id="buttonSelectCHM103">ยืนยัน</button>
				  	</div>
					<div class="col-12">
						<h4 id="headCHM103">ทุกวัน</h4>
						<hr class="head-line">	
						<center id="nocourseCHM103"></center>

						<div id="contentCHM103"></div>					
					</div>
				  </div>
				  <br>
			</div>
		</div>
	</div>

<div class="modal fade" id="reviewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Review</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="reviewModalText">
 
      </div>
      <!-- <div class="modal-footer">
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
      </div> -->
    </div>
  </div>
</div>


<div class="modal fade" id="bookingModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">ยืนยันการจอง</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="bookingModalBody">
        จำนวนที่นั่งคงเหลือ 10/10 ที่นั่งss
      </div>
		<div class="modal-body" id="bookingModalComment">
		    <textarea class="form-control" id="content_txt" rows="3" placeholder="แสดงความคิดเห็นเกี่ยวกับสิ่งที่อยากได้ตอนเรียน..."></textarea>
		</div>
      <div class="modal-footer">						        
        <button type="button" class="btn btn-success" id="bookButton">ยืนยัน</button>
      </div>													 
    </div>
  </div>
</div>
		
<div class="modal fade" id="modalStatus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalStatusLabel">ยืนยันการจอง</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="modalStatusBody">
      	จำนวนที่นั่งคงเหลือ 10 ที่นั่ง
      </div>
    </div>
  </div>
</div>

<div id="atcd">
	<script type="text/javascript" scr="js/indexJS.js" id="js0"></script>
</div>

 <?php include('resource/footer.php'); ?>