<?php include('resource/header.php'); ?>
<!-- <!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>GEO Solution</title>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="js/jquery-3.2.1.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
	
	<link href="https://fonts.googleapis.com/css?family=Kanit:400,500,600,700,800,900" rel="stylesheet"> -->
	<link href="css/self_booking.css" rel="stylesheet">
	<script>
	$(document).ready(function(){
		//$("#dayMTH102").html( "ทุกวัน" );
		$.ajax({
			url: 'resource/home/showCourse.php',
			type: 'post',
			data: {
				'day':"ทุกวัน"
			},
			dataType: 'json',
			success: function(data){
				//var response = data[0];
				//$("#demo").html(status);
				//$("#mondayMTH102").html(data[1].MTH102[0].course.length);
				//test();
				var stringForPrintHtml='';
				var response;
				//var data = data[0];

				// // MTH102
				// stringForPrintHtml = stringForPrintHtml.concat('<div class="form-group"><select class="form-control col-2" style="float:left;" id="formControlSelectMTH102"><option>-</option>');
				// for (var datetrig = 0; datetrig<data.length; datetrig--) {
				// 	stringForPrintHtml = stringForPrintHtml.concat('<option>', data[i].day, '  ', data[i].date, '</option>');
				// }
				// stringForPrintHtml = stringForPrintHtml.concat('</select><button type="submit" class="btn btn-success" id="buttonMTH102">ยืนยัน</button></div>');
				// $("#nav-MTH_102").html(stringForPrintHtml);

				// // MTH112
				// stringForPrintHtml='';
				// stringForPrintHtml = stringForPrintHtml.concat('<div class="form-group"><select class="form-control col-2" style="float:left;" id="formControlSelectMTH112"><option>-</option>');
				// for (var datetrig = 0; datetrig<data.length; datetrig--) {
				// 	stringForPrintHtml = stringForPrintHtml.concat('<option>', data[i].day, '  ', data[i].date, '</option>');
				// }
				// stringForPrintHtml = stringForPrintHtml.concat('</select><button type="submit" class="btn btn-success" id="buttonMTH112">ยืนยัน</button></div>');
				// $("#nav-MTH_112").html(stringForPrintHtml);

				// // PHY102
				// stringForPrintHtml='';
				// stringForPrintHtml = stringForPrintHtml.concat('<div class="form-group"><select class="form-control col-2" style="float:left;" id="formControlSelectPHY102"><option>-</option>');
				// for (var datetrig = 0; datetrig<data.length; datetrig--) {
				// 	stringForPrintHtml = stringForPrintHtml.concat('<option>', data[i].day, '  ', data[i].date, '</option>');
				// }
				// stringForPrintHtml = stringForPrintHtml.concat('</select><button type="submit" class="btn btn-success" id="buttonPHY102">ยืนยัน</button></div>');
				// $("#nav-PHY_102").html(stringForPrintHtml);

				// // PHY104
				// stringForPrintHtml='';
				// stringForPrintHtml = stringForPrintHtml.concat('<div class="form-group"><select class="form-control col-2" style="float:left;" id="formControlSelectPHY104"><option>-</option>');
				// for (var datetrig = 0; datetrig<data.length; datetrig--) {
				// 	stringForPrintHtml = stringForPrintHtml.concat('<option>', data[i].day, '  ', data[i].date, '</option>');
				// }
				// stringForPrintHtml = stringForPrintHtml.concat('</select><button type="submit" class="btn btn-success" id="buttonPHY104">ยืนยัน</button></div>');
				// $("#nav-PHY_104").html(stringForPrintHtml);

				// // CHM103
				// stringForPrintHtml='';
				// stringForPrintHtml = stringForPrintHtml.concat('<div class="form-group"><select class="form-control col-2" style="float:left;" id="formControlSelectCHM103"><option>-</option>');
				// for (var datetrig = 0; datetrig<data.length; datetrig--) {
				// 	stringForPrintHtml = stringForPrintHtml.concat('<option>', data[i].day, '  ', data[i].date, '</option>');
				// }
				// stringForPrintHtml = stringForPrintHtml.concat('</select><button type="submit" class="btn btn-success" id="buttonCHM103">ยืนยัน</button></div>');
				// $("#nav-CHM_103").html(stringForPrintHtml);

				//stringForPrintHtml=' ';
				for (var checkdate = 0; checkdate<data.length; checkdate++) {
					var response = data[checkdate];

					stringForPrintHtml = stringForPrintHtml.concat('<tr><th style="width:1%"></th><td id="', response.day, 'MTH102">', response.day, '<hr style="border: 1px"></td></tr>');

					for(var i=0; i<response.MTH102.length; i++){
						stringForPrintHtml = stringForPrintHtml.concat('<tr><th scope="row"></th><td style="width: 25%"><div class="square"><img src="', response.MTH102[i].image);
						stringForPrintHtml = stringForPrintHtml.concat('.jpg"><p class="nickname", id="nicknameMTH102TA', response.MTH102[i].teacher_id, '"> พี่ ', response.MTH102[i].nickname);
						stringForPrintHtml = stringForPrintHtml.concat('</p><p>', response.MTH102[i].star, '</p></div></td><td colspan="2"><p>ชื่อ ', response.MTH102[i].title, ' ', response.MTH102[i].firstname, '    ', response.MTH102[i].lastname, '</p><p>เรื่องที่สอน</p><table class="table borderless"><tbody>' );
						for(var j=0; j<response.MTH102[i].course.length; j++){
							stringForPrintHtml = stringForPrintHtml.concat('<tr><td style="width: 35%">', response.MTH102[i].course[j].topic, '</td><td style="width: 15%">', response.MTH102[i].course[j].room, '</td><td style="width: 18%" class="bookingtime"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalNB', response.MTH102[i].course[j].course_id, '" onclick="updateSeat(', response.MTH102[i].course[j].course_id, ')" >', response.MTH102[i].course[j].time, '</button><div class="modal fade" id="modalNB', response.MTH102[i].course[j].course_id, '" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog" role="document"><div class="modal-content"><div class="modal-header"><h5 class="modal-title" id="exampleModalLabel">ยืนยันการจอง</h5><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><div class="modal-body" id="modalcontent', response.MTH102[i].course[j].course_id, '">จำนวนที่นั่งคงเหลือ ', response.MTH102[i].course[j].seatLeft, ' ที่นั่ง</div><div class="modal-footer"><button type="button" class="btn btn-success" onclick="sendBooking(', response.MTH102[i].course[j].course_id, ')">ยืนยัน</button></div></div></div></div></td><td>จำนวนที่นั่งคงเหลือ ', response.MTH102[i].course[j].seatLeft, ' ที่นั่ง</td></tr>'  )
						}
						stringForPrintHtml = stringForPrintHtml.concat('</tbody></table></td></tr>');
					}

// '<tr><td><button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModalLong">review</button><div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true"><div class="modal-dialog" role="document"><div class="modal-content"><div class="modal-header"><h5 class="modal-title" id="exampleModalLongTitle">Review</h5><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><div class="modal-body"><div class="col-12" style="word-wrap: break-word;"><p>Goooooooooooooooooodอิอิอิ</p></div><div class="row"><div class="col-3"><p>คะแนนพี่TA</p></div><div class="col-5"><p> ใส่ดาวววววววววววววว </p></div><div class="col-4"><p>17/01/2018 16.45 น.</p></div></div><div class="col-12" style="word-wrap: break-word;"><p>GoooooooooooooooooodอิอิอิksdjjvisojsovkGoooooooooooooooooodGoooooooooooooooooodGoooooooooooooooooodGooooooooooooooooood</p></div><div class="row"><div class="col-3"><p>คะแนนพี่TA</p></div><div class="col-5"><p> ใส่ดาวววววววววววววว </p></div><div class="col-4"><p>17/01/2018 16.45 น.</p></div></div></div><div class="modal-footer"><nav aria-label="Page navigation example"><ul class="pagination justify-content-center"><li class="page-item disabled"><a class="page-link" href="#" tabindex="-1">Previous</a></li><li class="page-item"><a class="page-link" href="#">1</a></li><li class="page-item"><a class="page-link" href="#">2</a></li><li class="page-item"><a class="page-link" href="#">3</a></li><li class="page-item"><a class="page-link" href="#">Next</a></li></ul></nav></div></div></div></div></td></tr>'


					//stringForPrintHtml = stringForPrintHtml+;

				}
				$("#tableMTH102").html(stringForPrintHtml);		
				//$("#mondayMTH102").html(data[1].MTH102[0].course.length);
			}
		});
		
		$("#buttonMTH102").click(function(){
	    	var singleValues = $( "#exampleFormControlSelect1" ).val();

	    	if (!singleValues.localeCompare("เลือกวัน")) {
	    		singleValues = "ทุกวัน";
	    	}

	  		$("#dayMTH102").html(singleValues);
		  	var obj = {};
		  	obj['day'] = singleValues;

		  	$.ajax({
				url: 'resource/home/showCourse.php',
				type: 'post',
				data: obj,
				dataType: 'json',
				success: function(data){
					//
				}
			});
	    });
	});
	</script>

	<script type="text/javascript">
		function alerteiei(){
			$("#test12").html("2345");
		};

		function updateSeat(id){
			//$("#modalcontent"+id).html("2345");
			//$("#mondayMTH102").html('eiei');
			$("#modalcontent"+id).html("2345"+id);
			var obj ={};
			obj['course_id'] = id;
			$.ajax({
				url: 'resource/home/showSeatLeft.php',
				type: 'post',
				data: obj,
				dataType: 'json',
				success: function(data){
					//
				}
			});
		};

		function sendBooking(id){
			var obj ={};
			obj['course_id'] = id;
			$.ajax({
				url: 'resource/home/booking.php',
				type: 'post',
				data: obj,
				dataType: 'json',
				success: function(data){
					//
				}
			});;
		};
	</script>
<!-- </head>
<body>

	<nav class="navbar navbar-light bg-light">
	  <a class="navbar-brand" href="#">Navbar</a>
	</nav>
	<div class="container"> -->
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
						  		<td style="width: 25%">						  
						  		<p id="mondayMTH102">วันจันทร์</p>
						  		<hr style="border: 1px">
						  		</td>
						  		<td>
						  		</td>

						  	</tr>
						    <tr>
						      <th scope="row"></th>
						      <td style="width: 25%">
						      	<div class="square">
									<img src="./image/team-member-2.jpg">
									<p class="nickname" id="nicknameMTH102">พี่.....</p>
									<p >ใส่ดาวววววววววว</p>
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
				  <div class="tab-pane fade" id="nav-MTH_112" role="tabpanel" aria-labelledby="nav-MTH_112-tab">MTH 112</div>
				  <div class="tab-pane fade" id="nav-PHY_102" role="tabpanel" aria-labelledby="nav-PHY_102-tab">PHY 102</div>
				  <div class="tab-pane fade" id="nav-PHY_104" role="tabpanel" aria-labelledby="nav-PHY_104-tab">PHY 104</div>
				  <div class="tab-pane fade" id="nav-CHM_103" role="tabpanel" aria-labelledby="nav-CHM_103-tab">CHM 103</div>
				</div>
			</div>
		</div>
<!-- 	</div>
</body>
</html>
 -->
 <?php include('resource/footer.php'); ?>