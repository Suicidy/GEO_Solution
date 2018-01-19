<?php include('header.php'); ?>
<link href="/geo_solution/css/check_review.css" rel="stylesheet">
<h1>Check Review</h1>
        <div id="all" class="form-row align-items-center">
          <div class="col-auto my-1">
            <label class="mr-sm-2" for="inlineFormCustomSelect">Teacher Assistant ID</label>
            <select class="custom-select mr-sm-2" id = "search_id">
              <option value="" selected>Choose...</option>
              <?php require "attendance/option_teacher.php";?>
            </select>
          </div>
          <div class="col-auto my-1">
            <label class="mr-sm-2" for="inlineFormCustomSelect">Course</label>
            <select class="custom-select mr-sm-2" id = "search_subject">
              <option value="" selected>Choose...</option>
              <option value="MTH">Math</option>
              <option value="PHY">Physic</option>
              <option value="CHM">Chemistry</option>
            </select>
          </div>
          <button id = "search" type="submit" class="btn btn-primary search"> SEARCH </button>
        </div>
		<div class="card">
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
 <?php include('footer.php'); ?>