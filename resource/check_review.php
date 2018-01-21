
<?php include('header.php'); ?>
<script src="/geo_solution/js/check_review.js"></script>
<link href="/geo_solution/css/check_review.css" rel="stylesheet">
<div class="row">
	<div class="col">
		<h1>Check Review</h1>
        <div id="all" class="form-row align-items-center">
          <div class="col-auto my-1">
            <label class="mr-sm-2" for="inlineFormCustomSelect">Teacher Assistant ID</label>
            <input id="teacher_id" class="form-control" type="text" placeholder="กรอกรหัสนักศึกษา">
          </div>
          <div class="col-auto my-1">
            <label class="mr-sm-2" for="inlineFormCustomSelect">Course</label>
            <select class="custom-select mr-sm-2" id = "subject">
              <option value="" selected>Choose...</option>
              <option value="MTH102">MTH102</option>
              <option value="MTH112">MTH112</option>
              <option value="PHY102">PHY102</option>
              <option value="PHY104">PHY104</option>
              <option value="CHM103">CHM103</option>
            </select>
          </div>
          <button id = "search" type="submit" class="btn btn-primary search"> SEARCH </button>
        </div>
		<div class="card">
	      <div class="card-body">									      	
					<h5 class="card-title">คอร์สที่สอน</h5>
					<hr class="course-line">	
	        <p class="card-text">
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
									<!-- //////////// -->
									<div id="detail"></div>
									<!-- ////////////// -->
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
										<!-- //////////// -->
										<div id="ta"></div>
										<!-- //////////// -->
							  </div>
							  <div class="tab-pane fade" id="content" role="tabpanel" aria-labelledby="content-tab">
							  	<br>
							  		<!-- //////////// -->
										<div id="subject_review"></div>
										<!-- //////////// -->
							  </div>
							  <div class="tab-pane fade" id="other" role="tabpanel" aria-labelledby="other-tab">
							  	<br>
							 			<!-- //////////// -->
										<div id="etc"></div>
						        <!-- //////////// -->
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
					        <textarea id="text_comment" class="form-control"  rows="3" placeholder="สิ่งที่อยากบอกกับน้อง"></textarea>
					      </div>
					      <div class="modal-footer">
					        <button id="save"type="button" class="btn btn-primary">ยืนยัน</button>
					      </div>
					    </div>
					  </div>
					</div>
						       		
						<div id="body"></div>
	    	</p>								        
	      </div>
    	</div>
    </div>
	 </div>
	 <div id="atcd">
	<script type="text/javascript" scr="js/check_review.js" id="js0"></script>
</div>
 <?php include('footer.php'); ?>