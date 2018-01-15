<?php include('header.php'); ?>
	<script src="/geo_solution/js/review.js"></script>
<<<<<<< HEAD
	<link href="/geo_solution/css/review.css" rel="stylesheet">
=======
	<!-- <link href= "/geo_solution/css/review.css" rel="stylesheet"> -->
>>>>>>> b3fa7ec271cc52c046c90fbf81b65f519dd8bd11
	<script>

		$(document).ready(function(){
			var type, course_id;
			$.post("/geo_solution/resource/review/view_type.php",{},function(data,status){
				type = data['type'];
				if (type != "student"){
					$("#all").empty();
				}
				else{	
					show_data("all");	
				}
			},"json");
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
	<script>
		$(document).ready(function(){
		    // $(".fa-star").click(function(){
		    	
      //        alert($(this).val());

		    	// var t= $(this).val();
  				 //  alert(t);
		        //$(".fa-star").css("color", "#ff7454");
		    // });

		    var $star_rating = $('.star-rating .fa');

			var SetRatingStar = function() {
  				return $star_rating.each(function() {
    				if (parseInt($star_rating.siblings('input.rating-value').val()) >= parseInt($(this).data('rating'))) {
     					 return $(this).removeClass('fa-star-o').addClass('fa-star');
    			 	 } else {
     					 return $(this).removeClass('fa-star').addClass('fa-star-o');
    					}
  				});
			};

			$star_rating.on('click', function() {
  					$star_rating.siblings('input.rating-value').val($(this).data('rating'));
  					alert($(this).data('rating'));
  					return SetRatingStar();
			});
			//SetRatingStar();
				$(document).ready(function() {

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
									<!-- <span class="fa fa-star" id = 'star1' value=1></span>
									<span class="fa fa-star" id = 'star2' value=2></span>
									<span class="fa fa-star" id = 'star3' value=3></span>
									<span class="fa fa-star" id = 'star4' value=4></span>
									<span class="fa fa-star" id = 'star5' value=5></span> -->
									<div class="star-rating">
      									 <span class="fa fa-star-o" data-rating="1"></span>
       								   	 <span class="fa fa-star-o" data-rating="2"></span>
      									 <span class="fa fa-star-o" data-rating="3"></span>
  										 <span class="fa fa-star-o" data-rating="4"></span>
     									 <span class="fa fa-star-o" data-rating="5"></span>
     									  <input type="hidden" name="whatever1" class="rating-value" value="2.56">
      								</div>
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