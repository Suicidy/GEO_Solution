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
	<!-- <script src="js/indexJ.js"></script>
	

	</script> -->


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
				  			<select class="form-control col-md-3 col-xs-6" style="float:left;" id="exampleFormControlSelect1">
						      <option>เลือกวัน</option>
						      <option>วันจันทร์</option>
						      <option>วันอังคาร</option>
						      <option>วันพุธ</option>
						      <option>วันพฤหัสบดี</option>
						      <option>วันศุกร์</option>
						    </select>
						    <button type="submit" class="btn btn-success" id="buttonMTH102">ยืนยัน</button>
				  	</div>
					<div class="col-12">
						<h4 id="headMTH102">ทุกวัน</h4>
						<hr class="head-line">
						<div class="card text-white mb-3 day-card">
							  <div class="card-header">วันจันทร์</div>
							</div>
						<div class="col-12">
							
							<!-- <h4 id="headMTH102">วันจันทร์</h4>
							<hr class="head-line"> -->							
								<div class="row">
									<div class="col-1"></div>
									<div class="card-group">
										<center>							  
									    	<div class="card text-white bg-dark card-name">
											  <img class="card-img-top" src="./image/team-member-2.jpg" alt="Card image cap">
											  <div class="card-body">
											    <h5 class="card-title">นายภัทรพงศ์  แดงจินดา</h5>
											    <p class="card-text">
											    	<span id="star1" class="fa fa-star-half-full"></span>
													<span id="star2" class="fa fa-star"></span>
													<span id="star3" class="fa fa-star"></span>
													<span id="star4" class="fa fa-star"></span>
													<span id="star5" class="fa fa-star"></span>
											    </p>
											    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#reviewModal">
												  review
												</button>
											  </div>
											</div>
										</center>
									    <div class="card text-white bg-dark card-course">
									      <div class="card-body">									      	
									        <h5 class="card-title">คอร์สที่ทำการสอน</h5>
									        <p class="card-text">
									        	<div class="row">
										        	<div class="col-md-4 col-xs-6 class-name"><span>Block Diagram</span></div>										        	
													<div class="col-md-4 col-xs-6 text-md-center room">
														<span>ห้อง CB2406</span>						
													</div>
													<div class="col-md-4 col-xs-4 button-time">
													<center>
											        	<button type="button" class="btn btn-primary time-reseved" data-toggle="modal" data-target="#exampleModal">
														  <span>08.00-19.00</span>
														</button>
													</center>

													</div>
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
													        จำนวนที่นั่งคงเหลือ 10/10 ที่นั่ง
													      </div>
													      <div class="modal-footer">						        
													        <button type="button" class="btn btn-success">ยืนยัน</button>
													      </div>													 
													    </div>
													  </div>
													</div>

									       		</div>	
									       		<hr class="course-line">							       		
									       		<!-- <div class="row">
										        	<div class="col-md-4 col-xs-6 class-name"><span>Block Diagram</span></div>										        	
													<div class="col-md-4 col-xs-6 text-md-center room">
														<span>ห้อง CB2406</span>						
													</div>
													<div class="col-md-4 col-xs-4 button-time">
													<center>
											        	<button type="button" class="btn btn-primary time-reseved" data-toggle="modal" data-target="#exampleModal">
														  <span>08.00-19.00</span>
														</button>
													</center>
													</div>
									       		</div> -->
									       		<div class="row">
										        	<div class="col-md-4 col-xs-6 class-name"><span>Block Diagram</span></div>										        	
													<div class="col-md-4 col-xs-6 text-md-center room">
														<span>ห้อง CB2406</span>						
													</div>
													<div class="col-md-4 col-xs-4 button-time">
													<center>
											        	<button type="button" class="btn btn-primary time-reseved" data-toggle="modal" data-target="#exampleModal">
														  <span>08.00-19.00</span>
														</button>
													</center>
													</div>
									       		</div>	
									       		<hr class="course-line">	
									    	</p>								        
									      </div>
									      	<div class="card-footer">
										      <p>ติดต่อ</p>
										      <p>
										      <img class="contract" src="./image/facebook.png">
										      Prapasiri Sawetsutipn
										  	  </p>
										  	  <p>
										      <img class="contract" src="./image/line.png">
										      Bonus><
										  	  </p>
										    </div>
								    	</div>
								    </div>
								</div>
								<br>
															<div class="row">
									<div class="col-1"></div>
									<div class="card-group">
										<center>							  
									    	<div class="card text-white bg-dark card-name">
											  <img class="card-img-top" src="./image/team-member-2.jpg" alt="Card image cap">
											  <div class="card-body">
											    <h5 class="card-title">นายภัทรพงศ์  แดงจินดา</h5>
											    <p class="card-text">
											    	<span id="star1" class="fa fa-star-half-full"></span>
													<span id="star2" class="fa fa-star"></span>
													<span id="star3" class="fa fa-star"></span>
													<span id="star4" class="fa fa-star"></span>
													<span id="star5" class="fa fa-star"></span>
											    </p>
											    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#reviewModal">
												  review
												</button>
											  </div>
											</div>
										</center>
									    <div class="card text-white bg-dark card-course">
									      <div class="card-body">									      	
									        <h5 class="card-title">คอร์สที่ทำการสอน</h5>
									        <p class="card-text">
									        	<div class="row">
										        	<div class="col-md-4 col-xs-6 class-name"><span>Block Diagram</span></div>										        	
													<div class="col-md-4 col-xs-6 text-md-center room">
														<span>ห้อง CB2406</span>						
													</div>
													<div class="col-md-4 col-xs-4 button-time">
													<center>
											        	<button type="button" class="btn btn-primary time-reseved" data-toggle="modal" data-target="#exampleModal">
														  <span>08.00-19.00</span>
														</button>
													</center>

													</div>
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
													        จำนวนที่นั่งคงเหลือ 10/10 ที่นั่ง
													      </div>
													      <div class="modal-footer">						        
													        <button type="button" class="btn btn-success">ยืนยัน</button>
													      </div>													 
													    </div>
													  </div>
													</div>

									       		</div>	
									       		<hr class="course-line">							       		
									       		<!-- <div class="row">
										        	<div class="col-md-4 col-xs-6 class-name"><span>Block Diagram</span></div>										        	
													<div class="col-md-4 col-xs-6 text-md-center room">
														<span>ห้อง CB2406</span>						
													</div>
													<div class="col-md-4 col-xs-4 button-time">
													<center>
											        	<button type="button" class="btn btn-primary time-reseved" data-toggle="modal" data-target="#exampleModal">
														  <span>08.00-19.00</span>
														</button>
													</center>
													</div>
									       		</div> -->
									       		<div class="row">
										        	<div class="col-md-4 col-xs-6 class-name"><span>Block Diagram</span></div>										        	
													<div class="col-md-4 col-xs-6 text-md-center room">
														<span>ห้อง CB2406</span>						
													</div>
													<div class="col-md-4 col-xs-4 button-time">
													<center>
											        	<button type="button" class="btn btn-primary time-reseved" data-toggle="modal" data-target="#exampleModal">
														  <span>08.00-19.00</span>
														</button>
													</center>
													</div>
									       		</div>
									       		<hr class="course-line">		
									    	</p>								        
									      </div>
									      	<div class="card-footer">
										      <p>ติดต่อ</p>
										      <p>
										      <img class="contract" src="./image/facebook.png">
										      Prapasiri Sawetsutipn
										  	  </p>
										  	  <p>
										      <img class="contract" src="./image/line.png">
										      Bonus><
										  	  </p>
										    </div>
								    	</div>
								    </div>
								</div>
								<br>
															
						</div>
					</div>					
				</div>
				<div class="tab-pane fade" id="nav-MTH_112" role="tabpanel" aria-labelledby="nav-MTH_112-tab">
				  	<div class="form-group">
				  			<select class="form-control col-md-3 col-xs-6" style="float:left;" id="exampleFormControlSelect2">
						      <option>เลือกวัน</option>
						      <option>วันจันทร์</option>
						      <option>วันอังคาร</option>
						      <option>วันพุธ</option>
						      <option>วันพฤหัสบดี</option>
						      <option>วันศุกร์</option>
						    </select>
						    <button type="submit" class="btn btn-success" id="buttonMTH112">ยืนยัน</button>
				  	</div>
					<div class="col-12">
						<h4 id="headMTH112">ทุกวัน</h4>
						<hr class="head-line">
						<center>
						<div class="card text-white bg-dark mb-3" style="max-width: 18rem;">
						  <div class="card-header">ไม่มีคอร์สเรียน</div>
						</div>
						<br>
						</center>
						<br>						
					</div>
				  </div>
				  <div class="tab-pane fade" id="nav-PHY_102" role="tabpanel" aria-labelledby="nav-PHY_102-tab">
				  	<div class="form-group">
				  			<select class="form-control col-md-3 col-xs-6" style="float:left;" id="exampleFormControlSelect3">
						      <option>เลือกวัน</option>
						      <option>วันจันทร์</option>
						      <option>วันอังคาร</option>
						      <option>วันพุธ</option>
						      <option>วันพฤหัสบดี</option>
						      <option>วันศุกร์</option>
						    </select>
						    <button type="submit" class="btn btn-success" id="buttonPHY102">ยืนยัน</button>
				  	</div>
					<div class="col-12">
						<h4 id="headPHY102">ทุกวัน</h4>
						<hr class="head-line" >
						
					</div>
				  </div>
				  <div class="tab-pane fade" id="nav-PHY_104" role="tabpanel" aria-labelledby="nav-PHY_104-tab">
				  	<div class="form-group">
				  			<select class="form-control col-md-3 col-xs-6" style="float:left;" id="exampleFormControlSelect4">
						      <option>เลือกวัน</option>
						      <option>วันจันทร์</option>
						      <option>วันอังคาร</option>
						      <option>วันพุธ</option>
						      <option>วันพฤหัสบดี</option>
						      <option>วันศุกร์</option>
						    </select>
						    <button type="submit" class="btn btn-success" id="buttonPHY104">ยืนยัน</button>
				  	</div>
					<div class="col-12">
						<h4 id="headPHY104">ทุกวัน</h4>
						<hr class="head-line">
						
					</div>
				  </div>
				  <div class="tab-pane fade" id="nav-CHM_103" role="tabpanel" aria-labelledby="nav-CHM_103-tab">
				  	<div class="form-group">
				  			<select class="form-control col-md-3 col-xs-6" style="float:left;" id="exampleFormControlSelect5">
						      <option>เลือกวัน</option>
						      <option>วันจันทร์</option>
						      <option>วันอังคาร</option>
						      <option>วันพุธ</option>
						      <option>วันพฤหัสบดี</option>
						      <option>วันศุกร์</option>
						    </select>
						    <button type="submit" class="btn btn-success" id="buttonCHM103">ยืนยัน</button>
				  	</div>
					<div class="col-12">
						<h4 id="headCHM103">ทุกวัน</h4>
						<hr class="head-line">						
					</div>
				  </div>
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
										      <div class="modal-body">
										      	<div class="col-12 review-text">
										        	<p>Goooooooooooooooooodอิอิอิ</p>
										        </div>
										        <center>
										        <div class="review-name">
													<div class="col-md-3 col-xs-6">
										        	คะแนนพี่TA
										        	</div>
										        	<div class="col-md-4 col-xs-4">
										        		<span id="star1" class="fa fa-star-half-full"></span>
														<span id="star2" class="fa fa-star"></span>
														<span id="star3" class="fa fa-star"></span>
														<span id="star4" class="fa fa-star"></span>
														<span id="star5" class="fa fa-star"></span>
										        	</div>
										        	<div class="col-md-5 col-xs-5 date-time">
										        		<p>17/01/2018 16.45 น.</p>
										        	</div>	
										        </div>
										        </center>
										        <div class="col-12 review-text">
										        	<p>GoooooooooooooooooodอิอิอิksdjjvisojsovkGoooooooooooooooooodGoooooooooooooooooodGoooooooooooooooooodGooooooooooooooooood</p>
										        </div>
										        <center>
										        <div class="review-name">
													<div class="col-md-3 col-xs-6">
										        	คะแนนพี่TA
										        	</div>
										        	<div class="col-md-4 col-xs-4">
										        		<span id="star1" class="fa fa-star-half-full"></span>
														<span id="star2" class="fa fa-star"></span>
														<span id="star3" class="fa fa-star"></span>
														<span id="star4" class="fa fa-star"></span>
														<span id="star5" class="fa fa-star"></span>
										        	</div>
										        	<div class="col-md-5 col-xs-5 date-time">
										        		<p>17/01/2018 16.45 น.</p>
										        	</div>	
										        </div>
										        </center>
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

		<!-- <script type="text/javascript" scr="js/indexJ.js" id="js0"></script> -->
<!-- 	</div>
</body>
</html>
 -->
 <?php include('resource/footer.php'); ?>