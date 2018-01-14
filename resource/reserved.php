<?php include('header.php'); ?>
	<link href="/GEO_Solution/css/reserved.css" rel="stylesheet">
	<script>
		$(document).ready(function(){
			//$("#courselist").html("stringHtml");
		  	$.ajax({
				url: 'home/showAssignCourse.php',
				type: 'post',
				data: {},
				dataType: 'json',
				success: function(data){
					courseList(data);
				}
			});
		})

	</script>

	<script>
		function updateCourse(id){
			var obj = {};
			obj['course_id']=id;
			$.ajax({
				url: 'home/updateAssignCourse.php',
				type: 'post',
				data: obj,
				dataType: 'json',
				success: function(data){
					//var data = data[0];
					courseList(data);	
				}
			});
		}

		function courseList(data){
				var stringHtml='';
				for (var i = 0; i < data.length; i++) {
					stringHtml = stringHtml+'<tr><th scope="row">'+(i+1)+'</th><td>'+data[i].subject+'</td><td>'+data[i].topic+'</td><td>'+data[i].title+' '+data[i].firstname+' '+data[i].lastname+'</td><td>'+data[i].date+' '+data[i].start_time+'-'+data[i].end_time+' น.'+'</td><td><center><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#'+i+'">ยกเลิก</button><div class="modal fade" id="'+i+'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog" role="document"><div class="modal-content"><div class="modal-header"><h5 class="modal-title" id="exampleModalLabel">สถานะการจอง</h5><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><div class="modal-body"><center><p>ยืนยันการยกเลิกการจอง</p><button type="button" class="btn btn-success" onclick="updateCourse('+data[i].course_id+')">ยืนยัน</button></center></div></div></div></div></center></td></tr>';
				}
				$("#courselist").html(stringHtml);
			}
		}
	</script>
		<div class="row">
			<div class="col">
				<br>
				<h2>สถานะการจอง</h2>
				<br>
				<table class="table table-striped">
				  <thead>
				    <tr>
				      <th scope="col">ลำดับ</th>
				      <th scope="col">วิชา</th>
				      <th scope="col">เรื่อง</th>
				      <th scope="col">ผู้สอน</th>
				      <th scope="col">รายละเอียด</th>
				      <th scope="col">ยกเลิดการจอง</th>
				    </tr>
				  </thead>
				  <tbody id="courselist">
				    <tr>
				      <th scope="row">1</th>
				      <td>MTH102</td>
				      <td>Block Diagram</td>
				      <td>porifkjdu asdergvtifodp</td>
				      <td>13/01/2016 13.20-15.20 น.</td>
				      <td>
				      	<center>
				      	<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
						  ยกเลิก
						</button>
						<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
						        <button type="button" class="btn btn-success">ยืนยัน</button>
						        </center>
						      </div>
						    </div>
						  </div>
						</div>
						</center>
				      </td>
				    </tr>
				    <tr>
				      <th scope="row">2</th>
				      <td>Jacob</td>
				      <td>Thornton</td>
				      <td>@fat</td>
				    </tr>
				    <tr>
				      <th scope="row">3</th>
				      <td>Larry</td>
				      <td>the Bird</td>
				      <td>@twitter</td>
				    </tr>
				  </tbody>
				</table>
			</div>
		</div>
		
<!-- </body>
</html> -->
  <?php require_once 'footer.php'; ?>