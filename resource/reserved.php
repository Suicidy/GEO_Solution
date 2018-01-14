<?php include('header.php'); ?>
	<link href="/GEO_Solution/css/reserved.css" rel="stylesheet">
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
				  <tbody>
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
<!-- </body>
</html> -->
  <?php require_once 'footer.php'; ?>