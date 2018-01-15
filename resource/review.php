<?php include('header.php'); ?>
	<script src="/geo_solution/js/review.js"></script>
	<link href="/geo_solution/css/review.css" rel="stylesheet">
	<script>
		$(document).ready(function(){
			var type, course_id;
			$.post("/geo_solution/resource/review/view_type.php",{},function(data,status){
				type = data['type'];
			},"json");
			if (type == "student"){
					$("#all").empty();
				}
			else{	
					show_data("all");	
			}
			$("#body > tr:even").css("background-color", "gray");
			$("#select").click(function(){
				type = $("#select").val();
				show_data(type);
			});
			$('#review-modal').on('show.bs.modal', function (event) {
  			var button = $(event.relatedTarget);
  			course_id = button.data('course'); 
				var modal = $(this);
				$.post("/geo_solution/resource/review/pre_review.php",{course : course_id},function(data,status){
					var name = data['title'] + " " + data['firstname'] + " " + data['lastname'];
					var nickname = "พี่ " + data['nickname'];
					var subject = "วิชา " + data['subject'];
					var topic = "เรื่องที่สอน " + data['topic'];
					var image = "/geo_solution/image/" + data['image'];
					var obj = {
						name: name,
						nickname: nickname,
						subject: subject,
						topic: topic,
					}
					var i;
					for (i in obj){
						$("#"+i).html(obj[i]);
					}
					$("#ta_image").attr("src",image);
					$("#content_txt").val("");
					$("#teacher_txt").val("");
					$("#other_txt").val("");		
				},"json");
			});
			$("#submit_review").click(function(){
				var content = $("#content_txt").val();
				var teacher = $("#teacher_txt").val();
				var other = $("#other_txt").val();
				$.post("/geo_solution/resource/review/submit_review.php", {content : content, teacher : teacher, other : other, course_id : course_id}, function(data,status){
						alert("แสดงความคิดเห็นเรียบร้อย ขอบคุณสำหรับความร่วมมือ")
				},"json").fail(function(){
					alert("เกิดบางอย่างผิดพลาด");
				});
				$('#review-modal').modal('hide')
			});
			$('#review-modal').on('hidden.bs.modal', function (event) {
				type = $("#select").val();
				show_data(type);
			});
		});
	</script>
	<div class="modal fade" id="review-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
										<div class="square" style="wide:100px; height:100px;">
											<img id = "ta_image" src = "">
											<p class="nickname" id="nickname"></p>
										</div>
									</div>
									<div class="col-sm">
										<p id = "name"></p>
										<p id = "subject"></p>
										<p id = "topic"></p>
									</div>
								</div>
								<p>ให้คะแนนพี่ TA   
									<span class="fa fa-star"></span>
									<span class="fa fa-star"></span>
									<span class="fa fa-star"></span>
									<span class="fa fa-star"></span>
									<span class="fa fa-star"></span>
								</p>
								<form>
									<div class="form-group">
										<label for="exampleFormControlTextarea1">เนื้อหา</label>
									    <textarea class="form-control" id="content_txt" rows="3" placeholder="แสดงความคิดเห็นเกี่ยวกับเนื้อหาที่เรียน..."></textarea>
									</div>
									<div class="form-group">
										<label for="exampleFormControlTextarea1">ผู้สอน</label>
									    <textarea class="form-control" id="teacher_txt" rows="3" placeholder="แสดงความคิดเห็นเกี่ยวกับผู้สอน..."></textarea>
									</div>
									<div class="form-group">
										<label for="exampleFormControlTextarea1">ข้อเสนอแนะ</label>
									    <textarea class="form-control" id="other_txt" rows="3" placeholder="คำแนะนำเพิ่มเติม..."></textarea>
									</div>
								</form>
						      </div>
						      <div class="modal-footer">
						        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
						        <button id = "submit_review" type="submit" class="btn btn-primary">Submit</button>
						      </div>
						    </div>
						  </div>
						</div>
	<div class="container" id = "all">
		<div class="row">
			<div class="col">
				<h2>Review</h2>
				<div class="form-group">
					<select class="form-control col-2" style="float:left;" id="select">
					    <option value = "all">ทั้งหมด</option>
							<option value = "not_review">ยังไม่รีวิว</option>
					    <option value = "reviewed">รีวิวแล้ว</option>					    
					</select>
				</div>
				<br>
				<br>
				<table class="table table-striped table-bordered">
				  <thead>
				    <tr>
				      <th scope="col"><center>ลำดับ</center></th>
				      <th scope="col"><center>วิชา</center></th>
				      <th scope="col"><center>เรื่อง</center></th>
				      <th scope="col"><center>ผู้สอน</center></th>
				      <th scope="col"><center>รายละเอียด</center></th>
				      <th scope="col"><center>สถานะ </center></th>
				    </tr>
				  </thead>
					<tbody id = "body"></tbody>
				</table>
			</div>
		</div>
	</div>
  <?php require_once 'footer.php'; ?>