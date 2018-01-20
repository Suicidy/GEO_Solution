<?php include('header.php');?>
	<link href="/geo_solution/css/reserved.css" rel="stylesheet">
	<script src="/geo_solution/js/reserved.js"></script>
	<script>
	$.post("/geo_solution/resource/review/view_type.php",{},function(data,status){
  type = data['type'];
  if (type != "student"){
    $("#all").empty();
    window.location.replace("/geo_solution/home.php");
  }
  else{	
    show_data();
  }
},"json");
	$(document).ready(function(){
		var course_id;
		$('#ask-modal').on('show.bs.modal',function(event){
			var button = $(event.relatedTarget);
  		course_id = button.data('course'); 
		});
		$('#submit-btn-modal').click(function(){
				$.post("/geo_solution/resource/reserved/cancel.php", {course_id : course_id}, function(data,status){
						alert("เรียบร้อย")
						location.reload();
				},"json").fail(function(){
					alert("เกิดบางอย่างผิดพลาด");
				});
				$('#ask-modal').modal('hide');
				show_data();
			});
	});
	
	
	</script>
		<div class="row">
			<div class="col">
				<h2>สถานะการจอง</h2>
			<div style="overflow-x:auto;">
				<table class="table table-striped" id="all">
				  <thead>
				    <tr>
				      <th scope="col"><center></center></th>
				      <th scope="col"><center>วิชา</center></th>
				      <th scope="col"><center>เรื่อง</center></th>
				      <th scope="col"><center>ผู้สอน</center></th>
				      <th scope="col"><center>รายละเอียด</center></th>
				      <th scope="col"><center>ยกเลิกการจอง</center></th>
				    </tr>
				  </thead>
				  <tbody id="body">
				  </tbody>
				</table>
			</div>
		</div>
		</div>
	
		<div class="modal fade" id="ask-modal" tabindex="-1" role="dialog" aria-labelledby="ยืนยันที่จะยกเลิกหรือไม่" aria-hidden="true">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel">สถานะการจอง</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		      	<center>
		        <p>ยืนยันการยกเลิกการจอง</p>
		        <button id ="submit-btn-modal"  type="submit" class="btn btn-success">ยืนยัน</button>
		        </center>
		      </div>
		    </div>
		  </div>
		</div>
<!-- 	</body> -->
		

  <?php require_once 'footer.php'; ?>