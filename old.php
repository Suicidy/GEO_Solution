<?php include('resource/header.php'); ?>

<link href="css/self_booking.css" rel="stylesheet">
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
				  			<select class="form-control col-2" style="float:left;" id="exampleFormControlSelect1">
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
						<hr>
						<table class="table borderless" >
						  <tbody id="tableMTH102">
						  	<tr>
						  		<th></th>
						  		<td style="width: 25%" colspan="3">						  
						  		<p id="mondayMTH102">วันจันทร์</p>
						  		<hr style="border: 1px">
						  		</td>						  		
						  	</tr>
						    <tr>
						      <th scope="row"></th>
						      <td style="width: 25%">
						      	<div class="square">
									<img src="./image/team-member-2.jpg">
									<p class="nickname" id="nicknameMTH102">พี่.....</p>
									<center>
									<span id="star1" class="fa fa-star-half-full"></span>
									<span id="star2" class="fa fa-star"></span>
									<span id="star3" class="fa fa-star"></span>
									<span id="star4" class="fa fa-star"></span>
									<span id="star5" class="fa fa-star"></span>
									</center>
								</div>
						      </td>
						      <td colspan="2">
						      	<p>ชื่อ xxxxxxxxxxxxxxxxxxxxx</p>
								<p>เรื่องที่สอน</p>
								<table class="table borderless">
								  <tbody>
								    <tr>
								      <td style="width: 35%">Block Diagram</td>
								      <td style="width: 15%">ห้อง CB2204</td>
								      <td style="width: 18%" class="bookingtime">
								      	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
										  9.30-11.30
										</button>
										<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
										  <div class="modal-dialog" role="document">
										    <div class="modal-content">
										      <div class="modal-header">
										        <h5 class="modal-title" id="exampleModalLabel">ยืนยันการจอง</h5>
										        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
										          <span aria-hidden="true">&times;</span>
										        </button>
										      </div>
										      <div class="modal-body" id="">
										        จำนวนที่นั่งคงเหลือ 10 ที่นั่ง
										      </div>
										      <div class="modal-footer">
										        <button type="button" class="btn btn-success" onclick="sendBooking()">ยืนยัน</button>
										      </div>
										    </div>
										  </div>
										</div>
								      </td>
								      <td>จำนวนที่นั่งคงเหลือ 10 ที่นั่ง</td>
								    </tr>
								    <tr>
								      <td>Block Diagram22222222222</td>
								      <td>ห้อง CB1406</td>
								      <td class="bookingtime">
								      	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter" onclick="alerteiei()">
										  14.30-16.30
										</button>
										<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
										  <div class="modal-dialog" role="document">
										    <div class="modal-content">
										      <div class="modal-header">
										        <h5 class="modal-title" id="exampleModalLongTitle">ยืนยันการจอง</h5>
										        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
										          <span aria-hidden="true">&times;</span>
										        </button>
										      </div>
										      <div class="modal-body">
										        จำนวนที่นั่งคงเหลือ 2 ที่นั่ง
										      </div>
										      <div class="modal-footer">
										        <button type="button" class="btn btn-success">ยืนยัน</button>
										      </div>
										    </div>
										  </div>
										</div>
								      </td>
								      <td>จำนวนที่นั่งคงเหลือ 2 ที่นั่ง</td>
								    </tr>
								    <tr>
								      <td>
								      	<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModalLong">
										  review
										</button>
										<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
										  <div class="modal-dialog" role="document">
										    <div class="modal-content">
										      <div class="modal-header">
										        <h5 class="modal-title" id="exampleModalLongTitle">Review</h5>
										        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
										          <span aria-hidden="true">&times;</span>
										        </button>
										      </div>
										      <div class="modal-body">
										      	<div class="col-12" style="word-wrap: break-word;">
										        	<p>Goooooooooooooooooodอิอิอิ</p>
										        </div>
										        <div class="row">
													<div class="col-3">
										        		<p>คะแนนพี่TA</p>
										        	</div>
										        	<div class="col-5">
										        		<p> ใส่ดาวววววววววววววว </p>
										        	</div>
										        	<div class="col-4">
										        		<p>17/01/2018 16.45 น.</p>
										        	</div>	
										        </div>
										        <div class="col-12" style="word-wrap: break-word;">
										        	<p>GoooooooooooooooooodอิอิอิksdjjvisojsovkGoooooooooooooooooodGoooooooooooooooooodGoooooooooooooooooodGooooooooooooooooood</p>
										        </div>
										        <div class="row">
													<div class="col-3">
										        		<p>คะแนนพี่TA</p>
										        	</div>
										        	<div class="col-5">
										        		<p> ใส่ดาวววววววววววววว </p>
										        	</div>
										        	<div class="col-4">
										        		<p>17/01/2018 16.45 น.</p>
										        	</div>	
										        </div>				        									    	
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
								      </td>
								    </tr>
								  </tbody>
								</table>
						      </td>
						    </tr>
						    <tr>
						      <th scope="row"></th>
						      <td style="width: 25%">
						      	<div class="square">
									<img src="./image/team-member-1.jpg">
									<p class="nickname">พี่.....</p>
									<p>ใส่ดาวววววววววว</p>
								</div>
						      </td>
						      <td colspan="2">
						      	<p>ชื่อ xxxxxxxxxxxxxxxxxxxxx</p>
								<p>เรื่องที่สอน</p>
								<table class="table borderless">
								  <tbody>
								    <tr>
								      <td style="width: 35%">Block Diagram</td>
								      <td style="width: 15%">ห้อง CB2204</td>
								      <td style="width: 18%" class="bookingtime">
								      	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
										  9.30-11.30
										</button>
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
										        จำนวนที่นั่งคงเหลือ 10 ที่นั่ง
										      </div>
										      <div class="modal-footer">
										        <button type="button" class="btn btn-success">ยืนยัน</button>
										      </div>
										    </div>
										  </div>
										</div>
								      </td>
								      <td>จำนวนที่นั่งคงเหลือ 10 ที่นั่ง</td>
								    </tr>
								    <tr>
								      <td>Block Diagram22222222222</td>
								      <td>ห้อง CB1406</td>
								      <td class="bookingtime">
								      	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
										  14.30-16.30
										</button>
										<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
										  <div class="modal-dialog" role="document">
										    <div class="modal-content">
										      <div class="modal-header">
										        <h5 class="modal-title" id="exampleModalLongTitle">ยืนยันการจอง</h5>
										        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
										          <span aria-hidden="true">&times;</span>
										        </button>
										      </div>
										      <div class="modal-body">
										        จำนวนที่นั่งคงเหลือ 2 ที่นั่ง
										      </div>
										      <div class="modal-footer">
										        <button type="button" class="btn btn-success">ยืนยัน</button>
										      </div>
										    </div>
										  </div>
										</div>
								      </td>
								      <td>จำนวนที่นั่งคงเหลือ 2 ที่นั่ง</td>
								    </tr>
								    <tr>
								      <td>Block Diagram22222222222</td>
								      <td>ห้อง CB1406</td>
								      <td class="bookingtime">
								      	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
										  14.30-16.30
										</button>
										<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
										  <div class="modal-dialog" role="document">
										    <div class="modal-content">
										      <div class="modal-header">
										        <h5 class="modal-title" id="exampleModalLongTitle">ยืนยันการจอง</h5>
										        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
										          <span aria-hidden="true">&times;</span>
										        </button>
										      </div>
										      <div class="modal-body">
										        จำนวนที่นั่งคงเหลือ 2 ที่นั่ง
										      </div>
										      <div class="modal-footer">
										        <button type="button" class="btn btn-success">ยืนยัน</button>
										      </div>
										    </div>
										  </div>
										</div>
								      </td>
								      <td>จำนวนที่นั่งคงเหลือ 2 ที่นั่ง</td>
								    </tr>
								    <tr>
								      <td>
								      	<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModalLong">
										  review
										</button>
										<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
										  <div class="modal-dialog" role="document">
										    <div class="modal-content">
										      <div class="modal-header">
										        <h5 class="modal-title" id="exampleModalLongTitle">Review</h5>
										        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
										          <span aria-hidden="true">&times;</span>
										        </button>
										      </div>
										      <div class="modal-body">
										      	<div class="col-12" style="word-wrap: break-word;">
										        	<p>Goooooooooooooooooodอิอิอิ</p>
										        </div>
										        <div class="row">
													<div class="col-3">
										        		<p>คะแนนพี่TA</p>
										        	</div>
										        	<div class="col-5">
										        		<p> ใส่ดาวววววววววววววว </p>
										        	</div>
										        	<div class="col-4">
										        		<p>17/01/2018 16.45 น.</p>
										        	</div>	
										        </div>
										        <div class="col-12" style="word-wrap: break-word;">
										        	<p>GoooooooooooooooooodอิอิอิksdjjvisojsovkGoooooooooooooooooodGoooooooooooooooooodGoooooooooooooooooodGooooooooooooooooood</p>
										        </div>
										        <div class="row">
													<div class="col-3">
										        		<p>คะแนนพี่TA</p>
										        	</div>
										        	<div class="col-5">
										        		<p> ใส่ดาวววววววววววววว </p>
										        	</div>
										        	<div class="col-4">
										        		<p>17/01/2018 16.45 น.</p>
										        	</div>	
										        </div>				        									    	
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
								      </td>
								    </tr>
								  </tbody>
								</table>
						      </td>
						    </tr>
						    <tr>
						    	<th scope="row"></th>
						      <td style="width: 25%">
						      	<div class="square">
									<img src="./image/team-member-4.jpg">
									<p class="nickname">พี่.....</p>
									<p>ใส่ดาวววววววววว</p>
								</div>
						      </td>
						      <td colspan="2">
						      	<p>ชื่อ xxxxxxxxxxxxxxxxxxxxx</p>
								<p>เรื่องที่สอน</p>
								<table class="table borderless">
								  <tbody>
								    <tr>
								      <td style="width: 35%">Block Diagram</td>
								      <td style="width: 15%">ห้อง CB2204</td>
								      <td style="width: 18%" class="bookingtime">
								      	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
										  9.30-11.30
										</button>
										<div class="modal fade" id="modalStatus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
										  <div class="modal-dialog" role="document">
										    <div class="modal-content">
										      <div class="modal-header">
										        <h5 class="modal-title" id="exampleModalLabel">ยืนยันการจอง</h5>
										        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
										          <span aria-hidden="true">&times;</span>
										        </button>
										      </div>
										      <div class="modal-body" id="modalStatusBody">
										        จำนวนที่นั่งคงเหลือ 10 ที่นั่ง
										      </div>
										    </div>
										  </div>
										</div>
								      </td>
								      <td>จำนวนที่นั่งคงเหลือ 10 ที่นั่ง</td>
								    </tr>
								    <tr>
								      <td>
								      	<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModalLong">
										  review
										</button>
										<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
										  <div class="modal-dialog" role="document">
										    <div class="modal-content">
										      <div class="modal-header">
										        <h5 class="modal-title" id="exampleModalLongTitle">Review</h5>
										        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
										          <span aria-hidden="true">&times;</span>
										        </button>
										      </div>
										      <div class="modal-body">
										      	<div class="col-12" style="word-wrap: break-word;">
										        	<p>Goooooooooooooooooodอิอิอิ</p>
										        </div>
										        <div class="row">
													<div class="col-3">
										        		<p>คะแนนพี่TA</p>
										        	</div>
										        	<div class="col-5">
										        		<p> ใส่ดาวววววววววววววว </p>
										        	</div>
										        	<div class="col-4">
										        		<p>17/01/2018 16.45 น.</p>
										        	</div>	
										        </div>
										        <div class="col-12" style="word-wrap: break-word;">
										        	<p>GoooooooooooooooooodอิอิอิksdjjvisojsovkGoooooooooooooooooodGoooooooooooooooooodGoooooooooooooooooodGooooooooooooooooood</p>
										        </div>
										        <div class="row">
													<div class="col-3">
										        		<p>คะแนนพี่TA</p>
										        	</div>
										        	<div class="col-5">
										        		<p> ใส่ดาวววววววววววววว </p>
										        	</div>
										        	<div class="col-4">
										        		<p>17/01/2018 16.45 น.</p>
										        	</div>	
										        </div>				        									    	
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
								      </td>
								    </tr>
								  </tbody>
								</table>
						      </td>
						    </tr>
						  </tbody>
						</table>
					</div>

				  </div>
				  <div class="tab-pane fade" id="nav-MTH_112" role="tabpanel" aria-labelledby="nav-MTH_112-tab">
				  	<div class="form-group">
				  			<select class="form-control col-2" style="float:left;" id="exampleFormControlSelect2">
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
						<hr>
						<table class="table borderless" >
						  <tbody id="tableMTH112">

						  </tbody>
						</table>
					</div>
				  </div>
				  <div class="tab-pane fade" id="nav-PHY_102" role="tabpanel" aria-labelledby="nav-PHY_102-tab">
				  	<div class="form-group">
				  			<select class="form-control col-2" style="float:left;" id="exampleFormControlSelect3">
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
						<hr>
						<table class="table borderless" >
						  <tbody id="tablePHY102">

						  </tbody>
						</table>
					</div>
				  </div>
				  <div class="tab-pane fade" id="nav-PHY_104" role="tabpanel" aria-labelledby="nav-PHY_104-tab">
				  	<div class="form-group">
				  			<select class="form-control col-2" style="float:left;" id="exampleFormControlSelect4">
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
						<hr>
						<table class="table borderless" >
						  <tbody id="tablePHY104">

						  </tbody>
						</table>
					</div>
				  </div>
				  <div class="tab-pane fade" id="nav-CHM_103" role="tabpanel" aria-labelledby="nav-CHM_103-tab">
				  	<div class="form-group">
				  			<select class="form-control col-2" style="float:left;" id="exampleFormControlSelect5">
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
						<hr>
						<table class="table borderless" >
						  <tbody id="tableCHM103">

						  </tbody>
						</table>
					</div>
				  </div>
				</div>
			</div>
		</div>

		<div class="modal fade" id="modalStatus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel">ยืนยันการจอง</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body" id="modalStatusBody">
		      	จำนวนที่นั่งคงเหลือ 10 ที่นั่ง
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