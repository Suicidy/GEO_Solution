<?php include('header.php'); ?>
<link href="/geo_solution/css/check_review.css" rel="stylesheet">
<div class="row">
	<div class="col">
		<h2>Check Review</h2>
        <div id="all" class="form-row align-items-center">
          <div class="col-auto my-1">
            <label class="mr-sm-2" for="inlineFormCustomSelect">Teacher Assistant ID</label>
            <input class="form-control" type="text" placeholder="กรอกรหัสนักศึกษา">
          </div>
          <div class="col-auto my-1">
            <label class="mr-sm-2" for="inlineFormCustomSelect">Course</label>
            <select class="custom-select mr-sm-2" id = "search_subject">
              <option value="" selected>Choose...</option>
              <option value="MTH">MTH102</option>
              <option value="MTH">MTH112</option>
              <option value="PHY">PHY102</option>
              <option value="MTH">PHY104</option>
              <option value="CHM">CHM103</option>
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
						<span>08.00-19.00 น.</span>						
					</div>
					<div class="col-md-4 col-xs-4 button-time">
						<center>
				        	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Review">
							  <span>review</span>
							</button>
				        	<button type="button" class="btn btn-success" data-toggle="modal" data-target="#Comment">
							  <span>comment</span>
							</button>
						</center>
					</div>
					<div class="modal fade" id="Review" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					  <div class="modal-dialog" role="document">
					    <div class="modal-content">
					      <div class="modal-header">
					        <h5 class="modal-title" id="exampleModalLabel">Review</h5>
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					          <span aria-hidden="true">&times;</span>
					        </button>
					      </div>
					      <div class="modal-body">
					        <p>วิชา MTH 102</p>
					        <p>หัวข้อ  Block Diagram</p>
					        <p>สอนเวลา 09.00-00.00 น.</p>
					      	<!-- <div class="col-12 text-comment">
					        	<p>Goooooooooooooooooodอิอิอิ</p>
					        </div>
					        <div class="col-12 text-comment">
					        	<p>GoooooooooooooooooodอิอิอิksdjjvisojsovkGoooooooooooooooooodGoooooooooooooooooodGoooooooooooooooooodGooooooooooooooooood</p>
					        </div>	 -->
					        <ul class="nav nav-tabs" id="myTab" role="tablist">
							  <li class="nav-item">
							    <a class="nav-link active" id="TA-tab" data-toggle="tab" href="#TA" role="tab" aria-controls="TA" aria-selected="true">TA</a>
							  </li>
							  <li class="nav-item">
							    <a class="nav-link" id="content-tab" data-toggle="tab" href="#content" role="tab" aria-controls="content" aria-selected="false">เนิ้อหา</a>
							  </li>
							  <li class="nav-item">
							    <a class="nav-link" id="other-tab" data-toggle="tab" href="#other" role="tab" aria-controls="other" aria-selected="false">อื่นๆ</a>
							  </li>
							</ul>
							<div class="tab-content" id="myTabContent">
							  <div class="tab-pane fade show active" id="TA" role="tabpanel" aria-labelledby="TA-tab">
							  	<br>
							  	<div class="col-12 text-comment">
						        	<p>Goooooooooooooooooodอิอิอิ</p>
						        </div>
						        <div class="col-12 text-comment">
						        	<p>GoooooooooooooooooodอิอิอิksdjjvisojsovkGoooooooooooooooooodGoooooooooooooooooodGoooooooooooooooooodGooooooooooooooooood</p>
						        </div>
							  </div>
							  <div class="tab-pane fade" id="content" role="tabpanel" aria-labelledby="content-tab">
							  	<br>
							  	<div class="col-12 text-comment">
						        	<p>อิอิอิ</p>
						        </div>
						        <div class="col-12 text-comment">
						        	<p>LAlalalalalaalal</p>
						        </div>
							  </div>
							  <div class="tab-pane fade" id="other" role="tabpanel" aria-labelledby="other-tab">
							  	<br>
							  	<div class="col-12 text-comment">
						        	<p>OH No~~~~~~~~~~~~</p>
						        </div>
						        <div class="col-12 text-comment">
						        	<p>55555555</p>
						        </div>
							  </div>
							</div>		        									    	
					      </div>													 
					    </div>
					  </div>
					</div>
					<div class="modal fade" id="Comment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					  <div class="modal-dialog" role="document">
					    <div class="modal-content">
					      <div class="modal-header">
					        <h5 class="modal-title" id="exampleModalLabel">Comment</h5>
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					          <span aria-hidden="true">&times;</span>
					        </button>
					      </div>
					      <div class="modal-body">
					        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="สิ่งที่อยากบอกกับน้อง"></textarea>
					      </div>
					      <div class="modal-footer">
					        <button type="button" class="btn btn-primary">ยืนยัน</button>
					      </div>
					    </div>
					  </div>
					</div>

	       		</div>	
	       		<hr class="course-line">							       		
	       			        	<div class="row">
		        	<div class="col-md-4 col-xs-6 class-name"><span>Block Diagram</span></div>        	
					<div class="col-md-4 col-xs-6 text-md-center room">
						<span>08.00-19.00 น.</span>						
					</div>
					<div class="col-md-4 col-xs-4 button-time">
						<center>
				        	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Review">
							  <span>review</span>
							</button>
				        	<button type="button" class="btn btn-success" data-toggle="modal" data-target="#Comment">
							  <span>comment</span>
							</button>
						</center>
					</div>
					<div class="modal fade" id="Review" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					  <div class="modal-dialog" role="document">
					    <div class="modal-content">
					      <div class="modal-header">
					        <h5 class="modal-title" id="exampleModalLabel">Review</h5>
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					          <span aria-hidden="true">&times;</span>
					        </button>
					      </div>
					      <div class="modal-body">
					        <p>วิชา MTH 102</p>
					        <p>หัวข้อ  Block Diagram</p>
					        <p>สอนเวลา 09.00-00.00 น.</p>
					      	<!-- <div class="col-12 text-comment">
					        	<p>Goooooooooooooooooodอิอิอิ</p>
					        </div>
					        <div class="col-12 text-comment">
					        	<p>GoooooooooooooooooodอิอิอิksdjjvisojsovkGoooooooooooooooooodGoooooooooooooooooodGoooooooooooooooooodGooooooooooooooooood</p>
					        </div>	 -->
					        <ul class="nav nav-tabs" id="myTab" role="tablist">
							  <li class="nav-item">
							    <a class="nav-link active" id="TA-tab" data-toggle="tab" href="#TA" role="tab" aria-controls="TA" aria-selected="true">TA</a>
							  </li>
							  <li class="nav-item">
							    <a class="nav-link" id="content-tab" data-toggle="tab" href="#content" role="tab" aria-controls="content" aria-selected="false">เนิ้อหา</a>
							  </li>
							  <li class="nav-item">
							    <a class="nav-link" id="other-tab" data-toggle="tab" href="#other" role="tab" aria-controls="other" aria-selected="false">อื่นๆ</a>
							  </li>
							</ul>
							<div class="tab-content" id="myTabContent">
							  <div class="tab-pane fade show active" id="TA" role="tabpanel" aria-labelledby="TA-tab">
							  	<br>
							  	<div class="col-12 text-comment">
						        	<p>Goooooooooooooooooodอิอิอิ</p>
						        </div>
						        <div class="col-12 text-comment">
						        	<p>GoooooooooooooooooodอิอิอิksdjjvisojsovkGoooooooooooooooooodGoooooooooooooooooodGoooooooooooooooooodGooooooooooooooooood</p>
						        </div>
							  </div>
							  <div class="tab-pane fade" id="content" role="tabpanel" aria-labelledby="content-tab">
							  	<br>
							  	<div class="col-12 text-comment">
						        	<p>อิอิอิ</p>
						        </div>
						        <div class="col-12 text-comment">
						        	<p>LAlalalalalaalal</p>
						        </div>
							  </div>
							  <div class="tab-pane fade" id="other" role="tabpanel" aria-labelledby="other-tab">
							  	<br>
							  	<div class="col-12 text-comment">
						        	<p>OH No~~~~~~~~~~~~</p>
						        </div>
						        <div class="col-12 text-comment">
						        	<p>55555555</p>
						        </div>
							  </div>
							</div>		        									    	
					      </div>													 
					    </div>
					  </div>
					</div>
					<div class="modal fade" id="Comment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					  <div class="modal-dialog" role="document">
					    <div class="modal-content">
					      <div class="modal-header">
					        <h5 class="modal-title" id="exampleModalLabel">Comment</h5>
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					          <span aria-hidden="true">&times;</span>
					        </button>
					      </div>
					      <div class="modal-body">
					        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="สิ่งที่อยากบอกกับน้อง"></textarea>
					      </div>
					      <div class="modal-footer">
					        <button type="button" class="btn btn-primary">ยืนยัน</button>
					      </div>
					    </div>
					  </div>
					</div>

	       		</div>	
	       		<hr class="course-line">	
	    	</p>								        
	      </div>
    	</div>
    </div>
   </div>
 <?php include('footer.php'); ?>