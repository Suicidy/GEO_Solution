<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Review</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
	<link href="review.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Kanit:400,500,600,700,800,900" rel="stylesheet">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
</head>
<body>
	
	<nav class="navbar navbar-light bg-light">
	  <a class="navbar-brand" href="#">Navbar</a>
	</nav>
	<div class="container">
		<div class="row">
			<div class="col">
				<h2>Review</h2>
				<div class="form-group">
					<select class="form-control col-2" style="float:left;" id="exampleFormControlSelect1">
					    <option>ทั้งหมด</option>
					    <option>ยังไม่ได้ทำการรีวิว</option>
					    <option>ทำการรีวิวแล้ว</option>					    
					</select>
					<button type="submit" class="btn btn-success" id="button1">ยืนยัน</button>
				</div>
				<br>
				<br>
				<table class="table table-striped">
				  <thead>
				    <tr>
				      <th scope="col"></th>
				      <th scope="col">Course</th>
				      <th scope="col">TA</th>
				      <th scope="col"></th>
				      <th scope="col">สถานะ</th>
				    </tr>
				  </thead>
				  <tbody>
				    <tr>
				      <th scope="row">1</th>
				      <td>
				      	<p>Block Diagram</p>
				      	<p>17/1/18</p>
				  	  </td>
				      <td>
						<div class="square">
							<img src="./images/team-member-2.jpg">
							<p class="nickname">พี่lalala</p>
						</div>
				      </td>
				      <td>
						<p>ชื่อ ieiieieieieieieie</p>
				      </td>
				      <td>
						<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
						  Review
						</button>
						<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
										<div class="square">
											<img src="./images/team-member-3.jpg">
											<p class="nickname">พี่lalala</p>
										</div>
									</div>
									<div class="col-sm">
										<p>ชื่อ eieieieieieieieieie</p>
										<p>เรื่องที่สอน Block Diagram</p>
									</div>
								</div>
								<p>ใส่ดาวววววววววววววววววววว</p>
								<form>
									<div class="form-group">
										<label for="exampleFormControlTextarea1">เนื้อหา</label>
									    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
									</div>
									<div class="form-group">
										<label for="exampleFormControlTextarea1">ผู้สอน</label>
									    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
									</div>
									<div class="form-group">
										<label for="exampleFormControlTextarea1">อื่นๆ</label>
									    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
									</div>
								</form>
						      </div>
						      <div class="modal-footer">
						        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
						        <button type="submit" class="btn btn-primary">Submit</button>
						      </div>
						    </div>
						  </div>
						</div>
				      </td>
				    </tr>
				    <tr>
				      <th scope="row">2</th>
				      <td>
				      	<p>Block Diagram2222</p>
				      	<p>11/1/18</p>
				  	  </td>
				      <td>				      	
						<div class="square">
							<img src="./images/team-member-2.jpg">
							<p class="nickname">พี่lala</p>
						</div>
				      </td>
				      <td>
						<p>ชื่อ ieiieieieieieieie</p>
				      </td>
				      <td>
				      	<button type="button" class="btn btn-secondary">Review</button>
				      </td>					 			   
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
	</div>
</body>
</html>
