	$(document).ready(function(){
		getCourseMTH102('ทุกวัน');
		$("#nav-MTH_102-tab").addClass('activeEi');
		$("#buttonMTH102").click(function(){
	    	var singleValues = $( "#exampleFormControlSelect1" ).val();

	    	if (!singleValues.localeCompare("เลือกวัน")) {
	    		singleValues = "ทุกวัน";
	    	}

	  		$("#headMTH102").html(singleValues);

	  		getCourseMTH102(singleValues);
	    });

	    $("#buttonMTH112").click(function(){
	    	var singleValues = $( "#exampleFormControlSelect2" ).val();

	    	if (!singleValues.localeCompare("เลือกวัน")) {
	    		singleValues = "ทุกวัน";
	    	}

	  		$("#headMTH112").html(singleValues);
	  		
	  		getCourseMTH112(singleValues);
	    });

	    $("#buttonPHY102").click(function(){
	    	var singleValues = $( "#exampleFormControlSelect3" ).val();

	    	if (!singleValues.localeCompare("เลือกวัน")) {
	    		singleValues = "ทุกวัน";
	    	}

	  		$("#headPHY102").html(singleValues);
	  		
	  		getCoursePHY102(singleValues);
	    });

	    $("#buttonPHY104").click(function(){
	    	var singleValues = $( "#exampleFormControlSelect4" ).val();

	    	if (!singleValues.localeCompare("เลือกวัน")) {
	    		singleValues = "ทุกวัน";
	    	}

	  		$("#headPHY104").html(singleValues);
	  		
	  		getCoursePHY104(singleValues);
	    });

	    $("#buttonCHM103").click(function(){
	    	var singleValues = $( "#exampleFormControlSelect5" ).val();

	    	if (!singleValues.localeCompare("เลือกวัน")) {
	    		singleValues = "ทุกวัน";
	    	}

	  		$("#headCHM103").html(singleValues);
	  		
	  		getCourseCHM103(singleValues);
	    });	

	    $("#nav-MTH_102-tab").click(function(){
	    	$("#nav-MTH_102-tab").addClass('activeEi');
	    	$("#nav-MTH_112-tab").removeClass('activeEi');
	    	$("#nav-PHY_102-tab").removeClass('activeEi');
	    	$("#nav-PHY_104-tab").removeClass('activeEi');
	    	$("#nav-CHM_103-tab").removeClass('activeEi');
	    	getCourseMTH102('ทุกวัน');
	    	//console.log($("#nav-MTH_102-tab").hasClass('activeEi'));
	    });

	    $("#nav-MTH_112-tab").click(function(){
	    	$("#nav-MTH_102-tab").removeClass('activeEi');
	    	$("#nav-MTH_112-tab").addClass('activeEi');
	    	$("#nav-PHY_102-tab").removeClass('activeEi');
	    	$("#nav-PHY_104-tab").removeClass('activeEi');
	    	$("#nav-CHM_103-tab").removeClass('activeEi');
	    	getCourseMTH112('ทุกวัน');
	    });

	    $("#nav-PHY_102-tab").click(function(){
	    	$("#nav-MTH_102-tab").removeClass('activeEi');
	    	$("#nav-MTH_112-tab").removeClass('activeEi');
	    	$("#nav-PHY_102-tab").addClass('activeEi');
	    	$("#nav-PHY_104-tab").removeClass('activeEi');
	    	$("#nav-CHM_103-tab").removeClass('activeEi');
	    	getCoursePHY102('ทุกวัน');
	    });

	    $("#nav-PHY_104-tab").click(function(){
	    	$("#nav-MTH_102-tab").removeClass('activeEi');
	    	$("#nav-MTH_112-tab").removeClass('activeEi');
	    	$("#nav-PHY_102-tab").removeClass('activeEi');
	    	$("#nav-PHY_104-tab").addClass('activeEi');
	    	$("#nav-CHM_103-tab").removeClass('activeEi');
	    	getCoursePHY104('ทุกวัน');
	    });

	    $("#nav-CHM_103-tab").click(function(){
	    	$("#nav-MTH_102-tab").removeClass('activeEi');
	    	$("#nav-MTH_112-tab").removeClass('activeEi');
	    	$("#nav-PHY_102-tab").removeClass('activeEi');
	    	$("#nav-PHY_104-tab").removeClass('activeEi');
	    	$("#nav-CHM_103-tab").addClass('activeEi');	    	
	    	getCourseCHM103('ทุกวัน');
	    });


 //    $("#modalStatus").on('hidden.bs.modal', function () {
	//     //getCourseMTH102(dayValue);
	// });

	});


	function getCoursePHY102(day){
		var obj ={};
		obj['day'] = day;
		$.ajax({
			url: 'resource/home/showCourse.php',
			type: 'post',
			data: obj,
			dataType: 'json',
			success: function(data){
				var stringForPrintHtml='';
				var response;
				var showDate=0;
				if(day!='ทุกวัน'){
					for (var checkdate = 0; checkdate<data.length; checkdate++){
						if (day==data.day) {
							showDate = checkdate;
						}
					};

					var response = data[showDate];
					if(response.PHY102.length==0){
						stringForPrintHtml = stringForPrintHtml.concat('<tr><th style="width:1%"></th><td id="', response.day, 'PHY102">', response.day, '<hr style="border: 1px"></td><td>',  response.date, '<hr style="border: 1px"></td></tr><tr><th scope="row"></th><td style="width: 25%;" class="square"><center>ไม่มีข้อมูล</center></td><td></td></tr>');
					}
					else{
						stringForPrintHtml = stringForPrintHtml.concat('<tr><th style="width:1%"></th><td id="', response.day, 'PHY102">', response.day, '<hr style="border: 1px"></td><td>',  response.date, '<hr style="border: 1px"></td></tr>');

						for(var i=0; i<response.PHY102.length; i++){
							stringForPrintHtml = stringForPrintHtml.concat('<tr><th scope="row"></th><td style="width: 25%"><div class="square"><img src="image/', response.PHY102[i].img);
							stringForPrintHtml = stringForPrintHtml.concat('"><p class="nickname", id="nicknamePHY102TA', response.PHY102[i].teacher_id, '"> พี่ ', response.PHY102[i].nickname);
							stringForPrintHtml = stringForPrintHtml.concat('</p><p class="nickname">', response.PHY102[i].star, '</p></div></td><td colspan="2"><p>ชื่อ ', response.PHY102[i].title, ' ', response.PHY102[i].firstname, '    ', response.PHY102[i].lastname, '</p><p>เรื่องที่สอน</p><table class="table borderless"><tbody>' );
							for(var j=0; j<response.PHY102[i].course.length; j++){
								stringForPrintHtml = stringForPrintHtml.concat('<tr><td style="width: 35%">', response.PHY102[i].course[j].topic, '</td><td style="width: 15%">', response.PHY102[i].course[j].room, '</td><td style="width: 18%" class="bookingtime"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalNB', response.PHY102[i].course[j].course_id, '" onclick="updateSeat(', response.PHY102[i].course[j].course_id, ');" >', response.PHY102[i].course[j].time, '</button><div class="modal fade" id="modalNB', response.PHY102[i].course[j].course_id, '" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog" role="document"><div class="modal-content"><div class="modal-header"><h5 class="modal-title" id="exampleModalLabel">ยืนยันการจอง</h5><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" id="hidemodal">&times;</span></button></div><div class="modal-body" id="modalcontent', response.PHY102[i].course[j].course_id, '">จำนวนที่นั่งคงเหลือ ', response.PHY102[i].course[j].seatLeft, ' ที่นั่ง</div><div class="modal-footer"><button type="button" class="btn btn-success" onclick="sendBooking(', response.PHY102[i].course[j].course_id, ');" id="buttonToBook">ยืนยัน</button></div></div></div></div></td><td>จำนวนที่นั่งคงเหลือ ', response.PHY102[i].course[j].seatLeft, ' ที่นั่ง</td></tr>'  )
							}

							stringForPrintHtml = stringForPrintHtml+'<tr><td><button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalRWPHY102'+ response.PHY102[i].teacher_id+'" onclick="showReviewPHY102('+response.PHY102[i].teacher_id+')">review</button><div class="modal fade" id="modalRWPHY102'+response.PHY102[i].teacher_id+'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true"><div class="modal-dialog" role="document"><div class="modal-content"><div class="modal-header"><h5 class="modal-title" id="exampleModalLongTitle">Review</h5><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><div class="modal-body" id="reviewTAP102'+response.PHY102[i].teacher_id+'"></div></div></div></div></div></td></tr>';
							stringForPrintHtml = stringForPrintHtml.concat('</tbody></table></td></tr>');
						}
					}	
				}
				else{
					for (var checkdate = 0; checkdate<data.length; checkdate++) {
						var response = data[checkdate];

						if(response.PHY102.length==0){
							stringForPrintHtml = stringForPrintHtml.concat('<tr><th style="width:1%"></th><td id="', response.day, 'PHY102">', response.day, '<hr style="border: 1px"></td><td>',  response.date, '<hr style="border: 1px"></td></tr><tr><th scope="row"></th><td style="width: 25%;" class="square"><center>ไม่มีข้อมูล</center></td><td></td></tr>');
						}
						else{
							stringForPrintHtml = stringForPrintHtml.concat('<tr><th style="width:1%"></th><td id="', response.day, 'PHY102">', response.day, '<hr style="border: 1px"></td><td>',  response.date, '<hr style="border: 1px"></td></tr>');

							for(var i=0; i<response.PHY102.length; i++){
								stringForPrintHtml = stringForPrintHtml.concat('<tr><th scope="row"></th><td style="width: 25%"><div class="square"><img src="image/', response.PHY102[i].img);
								stringForPrintHtml = stringForPrintHtml.concat('"><p class="nickname", id="nicknamePHY102TA', response.PHY102[i].teacher_id, '"> พี่ ', response.PHY102[i].nickname);
								stringForPrintHtml = stringForPrintHtml.concat('</p><p class="nickname">', response.PHY102[i].star, '</p></div></td><td colspan="2"><p>ชื่อ ', response.PHY102[i].title, ' ', response.PHY102[i].firstname, '    ', response.PHY102[i].lastname, '</p><p>เรื่องที่สอน</p><table class="table borderless"><tbody>' );
								for(var j=0; j<response.PHY102[i].course.length; j++){
									stringForPrintHtml = stringForPrintHtml.concat('<tr><td style="width: 35%">', response.PHY102[i].course[j].topic, '</td><td style="width: 15%">', response.PHY102[i].course[j].room, '</td><td style="width: 18%" class="bookingtime"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalNB', response.PHY102[i].course[j].course_id, '" onclick="updateSeat(', response.PHY102[i].course[j].course_id, ');" >', response.PHY102[i].course[j].time, '</button><div class="modal fade" id="modalNB', response.PHY102[i].course[j].course_id, '" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog" role="document"><div class="modal-content"><div class="modal-header"><h5 class="modal-title" id="exampleModalLabel">ยืนยันการจอง</h5><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" id="hidemodal">&times;</span></button></div><div class="modal-body" id="modalcontent', response.PHY102[i].course[j].course_id, '">จำนวนที่นั่งคงเหลือ ', response.PHY102[i].course[j].seatLeft, ' ที่นั่ง</div><div class="modal-footer"><button type="button" class="btn btn-success" onclick="sendBooking(', response.PHY102[i].course[j].course_id, ');" id="buttonToBook">ยืนยัน</button></div></div></div></div></td><td>จำนวนที่นั่งคงเหลือ ', response.PHY102[i].course[j].seatLeft, ' ที่นั่ง</td></tr>'  )
								}

								stringForPrintHtml = stringForPrintHtml+'<tr><td><button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalRWPHY102'+ response.PHY102[i].teacher_id+'" onclick="showReviewPHY102('+response.PHY102[i].teacher_id+')">review</button><div class="modal fade" id="modalRWPHY102'+response.PHY102[i].teacher_id+'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true"><div class="modal-dialog" role="document"><div class="modal-content"><div class="modal-header"><h5 class="modal-title" id="exampleModalLongTitle">Review</h5><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><div class="modal-body" id="reviewTAP102'+response.PHY102[i].teacher_id+'"></div></div></div></div></div></td></tr>';
								stringForPrintHtml = stringForPrintHtml.concat('</tbody></table></td></tr>');
							}
						}
					}
				}

				$("#tablePHY102").html(stringForPrintHtml);	
			}
		});	
	};

	function updateSeat(id){
		var obj ={};
		obj['course_id'] = id;
		$.ajax({
			url: 'resource/home/left_seat.php',
			type: 'post',
			data: obj,
			dataType: 'text',
			success: function(data){
				$("#modalcontent"+id).html("จำนวนที่นั่งคงเหลือ "+data+" ที่นั่ง");
			}
		});
	};

	function sendBooking(id){
		var obj ={};
		obj['course_id'] = id;
    	var dayValue = $( "#exampleFormControlSelect2" ).val();
    	if (!dayValue.localeCompare("เลือกวัน")) {
    		dayValue = "ทุกวัน";
    	};

    	//console.log("eiei");		
		$.ajax({
			url: 'resource/home/book_course.php',
			type: 'post',
			data: obj,
			dataType: 'text',
			beforeSend: function(){
				$("#modalNB"+id).modal('hide').fadeOut(100);
				$('.modal-backdrop').remove();
				$("#modalStatus").modal('show');		
				// $('#modalStatus').show().on('shown', function() { 
				//     $('#modalStatus').modal('hide') 
				// });
			},
			success: function(data){
				//$('.modal-backdrop').remove();
				$("#modalStatusBody").html(data);
				//$("#modalStatus").modal('hide').fadeIn(2000);
				if ($("#nav-MTH_102-tab").hasClass('activeEi')) {
			    	var dayValue = $( "#exampleFormControlSelect1" ).val();
			    	if (!dayValue.localeCompare("เลือกวัน")) {
			    		dayValue = "ทุกวัน";
			    	};
					getCourseMTH102(dayValue);
					//$('.modal-backdrop').remove();
					//console.log("eiei");
					//$("#modalStatusBody").html(data);
				}
				else if($("#nav-MTH_112-tab").hasClass('activeEi')) {
			    	var dayValue = $( "#exampleFormControlSelect2" ).val();
			    	if (!dayValue.localeCompare("เลือกวัน")) {
			    		dayValue = "ทุกวัน";
			    	};
					getCourseMTH112(dayValue);
				}
				else if($("#nav-PHY_102-tab").hasClass('activeEi')) {
			    	var dayValue = $( "#exampleFormControlSelect3" ).val();
			    	if (!dayValue.localeCompare("เลือกวัน")) {
			    		dayValue = "ทุกวัน";
			    	};
					getCoursePHY102(dayValue);
				}
				else if($("#nav-PHY_104-tab").hasClass('activeEi')) {
			    	var dayValue = $( "#exampleFormControlSelect4" ).val();
			    	if (!dayValue.localeCompare("เลือกวัน")) {
			    		dayValue = "ทุกวัน";
			    	};
					getCoursePHY104(dayValue);
				}
				else if($("#nav-CHM_103-tab").hasClass('activeEi')) {
					var dayValue = $( "#exampleFormControlSelect5" ).val();
			    	if (!dayValue.localeCompare("เลือกวัน")) {
			    		dayValue = "ทุกวัน";
			    	};			
					getCourseCHM103(dayValue);
				}	

				//console.log("eiei");										
			},
			error: function(){		
				$("#modalStatusBody").html("ข้อผิดพลาด");
			}
		});
	};

	function showReview(id){
		var obj ={};
		obj['teacher_id'] = id;

		console.log(id);
		$.ajax({
			url: 'resource/home/show_review.php',
			type: 'post',
			data: obj,
			dataType: 'json',
			success: function(data){
				var stringHtml='';
				if(data.length!=0){
					for (var i = 0; i < data.length; i++) {
						stringHtml = stringHtml+'<div class="col-12" style="word-wrap: break-word;"><p>'+data[i].review_txt+'</p></div><div class="row"><div class="col-3"><p>คะแนนพี่TA</p></div><div class="col-5"><p>'+data[i].star+' คะแนน </p></div><div class="col-4"><p>'+data[i].time_stamp+' น.</p></div></div>';
					}
					$("#review"+id).empty().append(stringHtml);
				}
				else{
					$("#review"+id).empty().append('ไม่มีข้อมูล');
				}
			}
		});
	};	

	function showReviewMTH102(id){
		var obj ={};
		obj['teacher_id'] = id;
		console.log(id);
		$.ajax({
			url: 'resource/home/show_review.php',
			type: 'post',
			data: obj,
			dataType: 'json',
			success: function(data){
				var stringHtml='';
				if(data.length!=0){
					for (var i = 0; i < data.length; i++) {
						stringHtml = stringHtml+'<div class="col-12" style="word-wrap: break-word;"><p>'+data[i].review_txt+'</p></div><div class="row"><div class="col-3"><p>คะแนนพี่TA</p></div><div class="col-5"><p>'+data[i].star+' คะแนน </p></div><div class="col-4"><p>'+data[i].time_stamp+' น.</p></div></div>';
					}
					$("#reviewTAM102"+id).empty().append(stringHtml);
				}
				else{
					$("#reviewTAM102"+id).empty().append('ไม่มีข้อมูล');
				}
			}
		});
	};	

	function showReviewMTH112(id){
		var obj ={};
		obj['teacher_id'] = id;
		console.log(id);
		$.ajax({
			url: 'resource/home/show_review.php',
			type: 'post',
			data: obj,
			dataType: 'json',
			success: function(data){
				var stringHtml='';
				if(data.length!=0){
					for (var i = 0; i < data.length; i++) {
						stringHtml = stringHtml+'<div class="col-12" style="word-wrap: break-word;"><p>'+data[i].review_txt+'</p></div><div class="row"><div class="col-3"><p>คะแนนพี่TA</p></div><div class="col-5"><p>'+data[i].star+' คะแนน </p></div><div class="col-4"><p>'+data[i].time_stamp+' น.</p></div></div>';
					}
					$("#reviewTAM112"+id).empty().append(stringHtml);
				}
				else{
					$("#reviewTAM112"+id).empty().append('ไม่มีข้อมูล');
				}
			}
		});
	};

	function showReviewPHY102(id){
		var obj ={};
		obj['teacher_id'] = id;
		$.ajax({
			url: 'resource/home/show_review.php',
			type: 'post',
			data: obj,
			dataType: 'json',
			success: function(data){
				var stringHtml='';
				if(data.length!=0){
					for (var i = 0; i < data.length; i++) {
						stringHtml = stringHtml+'<div class="col-12" style="word-wrap: break-word;"><p>'+data[i].review_txt+'</p></div><div class="row"><div class="col-3"><p>คะแนนพี่TA</p></div><div class="col-5"><p>'+data[i].star+' คะแนน </p></div><div class="col-4"><p>'+data[i].time_stamp+' น.</p></div></div>';
					}
					$("#reviewTAP102"+id).empty().append(stringHtml);
				}
				else{
					$("#reviewTAP102"+id).empty().append('ไม่มีข้อมูล');
				}
			}
		});
	};	

	function showReviewPHY104(id){
		var obj ={};
		obj['teacher_id'] = id;
		$.ajax({
			url: 'resource/home/show_review.php',
			type: 'post',
			data: obj,
			dataType: 'json',
			success: function(data){
				var stringHtml='';
				if(data.length!=0){
					for (var i = 0; i < data.length; i++) {
						stringHtml = stringHtml+'<div class="col-12" style="word-wrap: break-word;"><p>'+data[i].review_txt+'</p></div><div class="row"><div class="col-3"><p>คะแนนพี่TA</p></div><div class="col-5"><p>'+data[i].star+' คะแนน </p></div><div class="col-4"><p>'+data[i].time_stamp+' น.</p></div></div>';
					}
					$("#reviewTAP104"+id).empty().append(stringHtml);
				}
				else{
					$("#reviewTAP104"+id).empty().append('ไม่มีข้อมูล');
				}
			}
		});
	};	

	function showReviewCHM103(id){
		var obj ={};
		obj['teacher_id'] = id;
		$.ajax({
			url: 'resource/home/show_review.php',
			type: 'post',
			data: obj,
			dataType: 'json',
			success: function(data){
				var stringHtml='';
				if(data.length!=0){
					for (var i = 0; i < data.length; i++) {
						stringHtml = stringHtml+'<div class="col-12" style="word-wrap: break-word;"><p>'+data[i].review_txt+'</p></div><div class="row"><div class="col-3"><p>คะแนนพี่TA</p></div><div class="col-5"><p>'+data[i].star+' คะแนน </p></div><div class="col-4"><p>'+data[i].time_stamp+' น.</p></div></div>';
					}
					$("#reviewTAC103"+id).empty().append(stringHtml);
				}
				else{
					$("#reviewTAC103"+id).empty().append('ไม่มีข้อมูล');
				}
			}
		});
	};	

	function getCourseMTH102(day){
		var obj ={};
		obj['day'] = day;
		$.ajax({
			url: 'resource/home/showCourse.php',
			type: 'post',
			data: obj,
			dataType: 'json',
			success: function(data){
				var stringForPrintHtml='';
				var response;
				var showDate=0;
				if(day!='ทุกวัน'){
					for (var checkdate = 0; checkdate<data.length; checkdate++){
						if (day==data.day) {
							showDate = checkdate;
						}
					};

					var response = data[showDate];
					if(response.MTH102.length==0){
						stringForPrintHtml = stringForPrintHtml.concat('<tr><th style="width:1%"></th><td id="', response.day, 'MTH102">', response.day, '<hr style="border: 1px"></td><td>',  response.date, '<hr style="border: 1px"></td></tr><tr><th scope="row"></th><td style="width: 25%;" class="square"><center>ไม่มีข้อมูล</center></td><td></td></tr>');
					}
					else{
						stringForPrintHtml = stringForPrintHtml.concat('<tr><th style="width:1%"></th><td id="', response.day, 'MTH102">', response.day, '<hr style="border: 1px"></td><td>',  response.date, '<hr style="border: 1px"></td></tr>');

						for(var i=0; i<response.MTH102.length; i++){
							stringForPrintHtml = stringForPrintHtml.concat('<tr><th scope="row"></th><td style="width: 25%"><div class="square"><img src="image/', response.MTH102[i].img);
							stringForPrintHtml = stringForPrintHtml.concat('"><p class="nickname", id="nicknameMTH102TA', response.MTH102[i].teacher_id, '"> พี่ ', response.MTH102[i].nickname);
							stringForPrintHtml = stringForPrintHtml.concat('</p><p class="nickname">', response.MTH102[i].star, '</p></div></td><td colspan="2"><p>ชื่อ ', response.MTH102[i].title, ' ', response.MTH102[i].firstname, '    ', response.MTH102[i].lastname, '</p><p>เรื่องที่สอน</p><table class="table borderless"><tbody>' );
							for(var j=0; j<response.MTH102[i].course.length; j++){
								stringForPrintHtml = stringForPrintHtml.concat('<tr><td style="width: 35%">', response.MTH102[i].course[j].topic, '</td><td style="width: 15%">', response.MTH102[i].course[j].room, '</td><td style="width: 18%" class="bookingtime"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalNB', response.MTH102[i].course[j].course_id, '" onclick="updateSeat(', response.MTH102[i].course[j].course_id, ')" >', response.MTH102[i].course[j].time, '</button><div class="modal fade" id="modalNB', response.MTH102[i].course[j].course_id, '" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog" role="document"><div class="modal-content"><div class="modal-header"><h5 class="modal-title" id="exampleModalLabel">ยืนยันการจอง</h5><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" id="hidemodal">&times;</span></button></div><div class="modal-body" id="modalcontent', response.MTH102[i].course[j].course_id, '">จำนวนที่นั่งคงเหลือ ', response.MTH102[i].course[j].seatLeft, ' ที่นั่ง</div><div class="modal-footer"><button type="button" class="btn btn-success" onclick="sendBooking(', response.MTH102[i].course[j].course_id, ')" id="buttonToBook">ยืนยัน</button></div></div></div></div></td><td>จำนวนที่นั่งคงเหลือ ', response.MTH102[i].course[j].seatLeft, ' ที่นั่ง</td></tr>'  )
							}
							stringForPrintHtml = stringForPrintHtml+'<tr><td><button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalRWMTH102'+ response.MTH102[i].teacher_id+'" onclick="showReviewMTH102('+response.MTH102[i].teacher_id+')">review</button><div class="modal fade" id="modalRWMTH102'+response.MTH102[i].teacher_id+'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true"><div class="modal-dialog" role="document"><div class="modal-content"><div class="modal-header"><h5 class="modal-title" id="exampleModalLongTitle">Review</h5><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><div class="modal-body" id="reviewTAM102'+response.MTH102[i].teacher_id+'"></div></div></div></div></div></td></tr>';
							stringForPrintHtml = stringForPrintHtml.concat('</tbody></table></td></tr>');
						}
					}
				}
				else{
					for (var checkdate = 0; checkdate<data.length; checkdate++) {
						var response = data[checkdate];

						if(response.MTH102.length==0){
							stringForPrintHtml = stringForPrintHtml.concat('<tr><th style="width:1%"></th><td id="', response.day, 'MTH102">', response.day, '<hr style="border: 1px"></td><td>',  response.date, '<hr style="border: 1px"></td></tr><tr><th scope="row"></th><td style="width: 25%;" class="square"><center>ไม่มีข้อมูล</center></td><td></td></tr>');
						}
						else{
							stringForPrintHtml = stringForPrintHtml.concat('<tr><th style="width:1%"></th><td id="', response.day, 'MTH102">', response.day, '<hr style="border: 1px"></td><td>',  response.date, '<hr style="border: 1px"></td></tr>');

							for(var i=0; i<response.MTH102.length; i++){
								stringForPrintHtml = stringForPrintHtml.concat('<tr><th scope="row"></th><td style="width: 25%"><div class="square"><img src="image/', response.MTH102[i].img);
								stringForPrintHtml = stringForPrintHtml.concat('"><p class="nickname", id="nicknameMTH102TA', response.MTH102[i].teacher_id, '"> พี่ ', response.MTH102[i].nickname);
								stringForPrintHtml = stringForPrintHtml.concat('</p><p class="nickname">', response.MTH102[i].star, '</p></div></td><td colspan="2"><p>ชื่อ ', response.MTH102[i].title, ' ', response.MTH102[i].firstname, '    ', response.MTH102[i].lastname, '</p><p>เรื่องที่สอน</p><table class="table borderless"><tbody>' );
								for(var j=0; j<response.MTH102[i].course.length; j++){
									stringForPrintHtml = stringForPrintHtml.concat('<tr><td style="width: 35%">', response.MTH102[i].course[j].topic, '</td><td style="width: 15%">', response.MTH102[i].course[j].room, '</td><td style="width: 18%" class="bookingtime"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalNB', response.MTH102[i].course[j].course_id, '" onclick="updateSeat(', response.MTH102[i].course[j].course_id, ')" >', response.MTH102[i].course[j].time, '</button><div class="modal fade" id="modalNB', response.MTH102[i].course[j].course_id, '" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog" role="document"><div class="modal-content"><div class="modal-header"><h5 class="modal-title" id="exampleModalLabel">ยืนยันการจอง</h5><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" id="hidemodal">&times;</span></button></div><div class="modal-body" id="modalcontent', response.MTH102[i].course[j].course_id, '">จำนวนที่นั่งคงเหลือ ', response.MTH102[i].course[j].seatLeft, ' ที่นั่ง</div><div class="modal-footer"><button type="button" class="btn btn-success" onclick="sendBooking(', response.MTH102[i].course[j].course_id, ')" id="buttonToBook">ยืนยัน</button></div></div></div></div></td><td>จำนวนที่นั่งคงเหลือ ', response.MTH102[i].course[j].seatLeft, ' ที่นั่ง</td></tr>'  )
								}

								stringForPrintHtml = stringForPrintHtml+'<tr><td><button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalRWMTH102'+ response.MTH102[i].teacher_id+'" onclick="showReviewMTH102('+response.MTH102[i].teacher_id+')">review</button><div class="modal fade" id="modalRWMTH102'+response.MTH102[i].teacher_id+'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true"><div class="modal-dialog" role="document"><div class="modal-content"><div class="modal-header"><h5 class="modal-title" id="exampleModalLongTitle">Review</h5><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><div class="modal-body" id="reviewTAM102'+response.MTH102[i].teacher_id+'"></div></div></div></div></div></td></tr>';
								stringForPrintHtml = stringForPrintHtml.concat('</tbody></table></td></tr>');
							}
						}
					}
				}
				$("#tableMTH102").empty().html(stringForPrintHtml);	
			}
		});	
	};

	function getCourseMTH112(day){
		var obj ={};
		obj['day'] = day;
		$.ajax({
			url: 'resource/home/showCourse.php',
			type: 'post',
			data: obj,
			dataType: 'json',
			success: function(data){
				var stringForPrintHtml='';
				var showDate=0;
				var response;
				if(day!='ทุกวัน'){
					for (var checkdate = 0; checkdate<data.length; checkdate++){
						if (day==data.day) {
							showDate = checkdate;
						}
					};
					var response = data[showDate];
					if(response.MTH112.length==0){
						stringForPrintHtml = stringForPrintHtml.concat('<tr><th style="width:1%"></th><td id="', response.day, 'MTH112">', response.day, '<hr style="border: 1px"></td><td>',  response.date, '<hr style="border: 1px"></td></tr><tr><th scope="row"></th><td style="width: 25%;" class="square"><center>ไม่มีข้อมูล</center></td><td></td></tr>');
					}
					else{
						stringForPrintHtml = stringForPrintHtml.concat('<tr><th style="width:1%"></th><td id="', response.day, 'MTH112">', response.day, '<hr style="border: 1px"></td><td>',  response.date, '<hr style="border: 1px"></td></tr>');

						for(var i=0; i<response.MTH112.length; i++){
							stringForPrintHtml = stringForPrintHtml.concat('<tr><th scope="row"></th><td style="width: 25%"><div class="square"><img src="image/', response.MTH112[i].img);
							stringForPrintHtml = stringForPrintHtml.concat('"><p class="nickname", id="nicknameMTH112TA', response.MTH112[i].teacher_id, '"> พี่ ', response.MTH112[i].nickname);
							stringForPrintHtml = stringForPrintHtml.concat('</p><p class="nickname">', response.MTH112[i].star, '</p></div></td><td colspan="2"><p>ชื่อ ', response.MTH112[i].title, ' ', response.MTH112[i].firstname, '    ', response.MTH112[i].lastname, '</p><p>เรื่องที่สอน</p><table class="table borderless"><tbody>' );
							for(var j=0; j<response.MTH112[i].course.length; j++){
								stringForPrintHtml = stringForPrintHtml.concat('<tr><td style="width: 35%">', response.MTH112[i].course[j].topic, '</td><td style="width: 15%">', response.MTH112[i].course[j].room, '</td><td style="width: 18%" class="bookingtime"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalNB', response.MTH112[i].course[j].course_id, '" onclick="updateSeat(', response.MTH112[i].course[j].course_id, ')" >', response.MTH112[i].course[j].time, '</button><div class="modal fade" id="modalNB', response.MTH112[i].course[j].course_id, '" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog" role="document"><div class="modal-content"><div class="modal-header"><h5 class="modal-title" id="exampleModalLabel">ยืนยันการจอง</h5><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" id="hidemodal">&times;</span></button></div><div class="modal-body" id="modalcontent', response.MTH112[i].course[j].course_id, '">จำนวนที่นั่งคงเหลือ ', response.MTH112[i].course[j].seatLeft, ' ที่นั่ง</div><div class="modal-footer"><button type="button" class="btn btn-success" onclick="sendBooking(', response.MTH112[i].course[j].course_id, ')" id="buttonToBook">ยืนยัน</button></div></div></div></div></td><td>จำนวนที่นั่งคงเหลือ ', response.MTH112[i].course[j].seatLeft, ' ที่นั่ง</td></tr>'  )
							}

							stringForPrintHtml = stringForPrintHtml+'<tr><td><button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalRWMTH112'+ response.MTH112[i].teacher_id+'" onclick="showReviewMTH112('+response.MTH112[i].teacher_id+')">review</button><div class="modal fade" id="modalRWMTH112'+response.MTH112[i].teacher_id+'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true"><div class="modal-dialog" role="document"><div class="modal-content"><div class="modal-header"><h5 class="modal-title" id="exampleModalLongTitle">Review</h5><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><div class="modal-body" id="reviewTAM112'+response.MTH112[i].teacher_id+'"></div></div></div></div></div></td></tr>';
							stringForPrintHtml = stringForPrintHtml.concat('</tbody></table></td></tr>');
						}
					}
				}
				else{
					for (var checkdate = 0; checkdate<data.length; checkdate++) {
						var response = data[checkdate];

						if(response.MTH112.length==0){
							stringForPrintHtml = stringForPrintHtml.concat('<tr><th style="width:1%"></th><td id="', response.day, 'MTH112">', response.day, '<hr style="border: 1px"></td><td>',  response.date, '<hr style="border: 1px"></td></tr><tr><th scope="row"></th><td style="width: 25%;" class="square"><center>ไม่มีข้อมูล</center></td><td></td></tr>');
						}
						else{
							stringForPrintHtml = stringForPrintHtml.concat('<tr><th style="width:1%"></th><td id="', response.day, 'MTH112">', response.day, '<hr style="border: 1px"></td><td>',  response.date, '<hr style="border: 1px"></td></tr>');

							for(var i=0; i<response.MTH112.length; i++){
								stringForPrintHtml = stringForPrintHtml.concat('<tr><th scope="row"></th><td style="width: 25%"><div class="square"><img src="image/', response.MTH112[i].img);
								stringForPrintHtml = stringForPrintHtml.concat('"><p class="nickname", id="nicknameMTH112TA', response.MTH112[i].teacher_id, '"> พี่ ', response.MTH112[i].nickname);
								stringForPrintHtml = stringForPrintHtml.concat('</p><p class="nickname">', response.MTH112[i].star, '</p></div></td><td colspan="2"><p>ชื่อ ', response.MTH112[i].title, ' ', response.MTH112[i].firstname, '    ', response.MTH112[i].lastname, '</p><p>เรื่องที่สอน</p><table class="table borderless"><tbody>' );
								for(var j=0; j<response.MTH112[i].course.length; j++){
									stringForPrintHtml = stringForPrintHtml.concat('<tr><td style="width: 35%">', response.MTH112[i].course[j].topic, '</td><td style="width: 15%">', response.MTH112[i].course[j].room, '</td><td style="width: 18%" class="bookingtime"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalNB', response.MTH112[i].course[j].course_id, '" onclick="updateSeat(', response.MTH112[i].course[j].course_id, ')" >', response.MTH112[i].course[j].time, '</button><div class="modal fade" id="modalNB', response.MTH112[i].course[j].course_id, '" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog" role="document"><div class="modal-content"><div class="modal-header"><h5 class="modal-title" id="exampleModalLabel">ยืนยันการจอง</h5><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" id="hidemodal">&times;</span></button></div><div class="modal-body" id="modalcontent', response.MTH112[i].course[j].course_id, '">จำนวนที่นั่งคงเหลือ ', response.MTH112[i].course[j].seatLeft, ' ที่นั่ง</div><div class="modal-footer"><button type="button" class="btn btn-success" onclick="sendBooking(', response.MTH112[i].course[j].course_id, ')" id="buttonToBook">ยืนยัน</button></div></div></div></div></td><td>จำนวนที่นั่งคงเหลือ ', response.MTH112[i].course[j].seatLeft, ' ที่นั่ง</td></tr>'  )
								}

								stringForPrintHtml = stringForPrintHtml+'<tr><td><button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalRWMTH112'+ response.MTH112[i].teacher_id+'" onclick="showReviewMTH112('+response.MTH112[i].teacher_id+')">review</button><div class="modal fade" id="modalRWMTH112'+response.MTH112[i].teacher_id+'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true"><div class="modal-dialog" role="document"><div class="modal-content"><div class="modal-header"><h5 class="modal-title" id="exampleModalLongTitle">Review</h5><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><div class="modal-body" id="reviewTAM112'+response.MTH112[i].teacher_id+'"></div></div></div></div></div></td></tr>';
								stringForPrintHtml = stringForPrintHtml.concat('</tbody></table></td></tr>');
							}
						}
					}		
				};

				// for (var checkdate = 0; checkdate<data.length; checkdate++) {
				// 	var response = data[checkdate];

				// 	if(response.MTH112.length==0){
				// 		stringForPrintHtml = stringForPrintHtml.concat('<tr><th style="width:1%"></th><td id="', response.day, 'MTH112">', response.day, '<hr style="border: 1px"></td><td>',  response.date, '<hr style="border: 1px"></td></tr><tr><th scope="row"></th><td style="width: 25%;" class="square"><center>ไม่มีข้อมูล</center></td><td></td></tr>');
				// 	}
				// 	else{
				// 		stringForPrintHtml = stringForPrintHtml.concat('<tr><th style="width:1%"></th><td id="', response.day, 'MTH112">', response.day, '<hr style="border: 1px"></td><td>',  response.date, '<hr style="border: 1px"></td></tr>');

				// 		for(var i=0; i<response.MTH112.length; i++){
				// 			stringForPrintHtml = stringForPrintHtml.concat('<tr><th scope="row"></th><td style="width: 25%"><div class="square"><img src="image/', response.MTH112[i].img);
				// 			stringForPrintHtml = stringForPrintHtml.concat('"><p class="nickname", id="nicknameMTH112TA', response.MTH112[i].teacher_id, '"> พี่ ', response.MTH112[i].nickname);
				// 			stringForPrintHtml = stringForPrintHtml.concat('</p><p class="nickname">', response.MTH112[i].star, '</p></div></td><td colspan="2"><p>ชื่อ ', response.MTH112[i].title, ' ', response.MTH112[i].firstname, '    ', response.MTH112[i].lastname, '</p><p>เรื่องที่สอน</p><table class="table borderless"><tbody>' );
				// 			for(var j=0; j<response.MTH112[i].course.length; j++){
				// 				stringForPrintHtml = stringForPrintHtml.concat('<tr><td style="width: 35%">', response.MTH112[i].course[j].topic, '</td><td style="width: 15%">', response.MTH112[i].course[j].room, '</td><td style="width: 18%" class="bookingtime"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalNB', response.MTH112[i].course[j].course_id, '" onclick="updateSeat(', response.MTH112[i].course[j].course_id, ')" >', response.MTH112[i].course[j].time, '</button><div class="modal fade" id="modalNB', response.MTH112[i].course[j].course_id, '" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog" role="document"><div class="modal-content"><div class="modal-header"><h5 class="modal-title" id="exampleModalLabel">ยืนยันการจอง</h5><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" id="hidemodal">&times;</span></button></div><div class="modal-body" id="modalcontent', response.MTH112[i].course[j].course_id, '">จำนวนที่นั่งคงเหลือ ', response.MTH112[i].course[j].seatLeft, ' ที่นั่ง</div><div class="modal-footer"><button type="button" class="btn btn-success" onclick="sendBooking(', response.MTH112[i].course[j].course_id, ')" id="buttonToBook">ยืนยัน</button></div></div></div></div></td><td>จำนวนที่นั่งคงเหลือ ', response.MTH112[i].course[j].seatLeft, ' ที่นั่ง</td></tr>'  )
				// 			}

				// 			stringForPrintHtml = stringForPrintHtml+'<tr><td><button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalRWMTH112'+ response.MTH112[i].teacher_id+'" onclick="showReviewMTH112('+response.MTH112[i].teacher_id+')">review</button><div class="modal fade" id="modalRWMTH112'+response.MTH112[i].teacher_id+'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true"><div class="modal-dialog" role="document"><div class="modal-content"><div class="modal-header"><h5 class="modal-title" id="exampleModalLongTitle">Review</h5><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><div class="modal-body" id="reviewTAM112'+response.MTH112[i].teacher_id+'"></div></div></div></div></div></td></tr>';
				// 			stringForPrintHtml = stringForPrintHtml.concat('</tbody></table></td></tr>');
				// 		}
				// 	}
				// }
				$("#tableMTH112").empty().html(stringForPrintHtml);
			}
		});	
	};

	function getCoursePHY104(day){
		var obj ={};
		obj['day'] = day;
		$.ajax({
			url: 'resource/home/showCourse.php',
			type: 'post',
			data: obj,
			dataType: 'json',
			success: function(data){
				var stringForPrintHtml='';
				var response;
				var showDate=0;
				if(day!='ทุกวัน'){
					for (var checkdate = 0; checkdate<data.length; checkdate++){
						if (day==data.day) {
							showDate = checkdate;
						}
					};
					var response = data[showDate];
					if(response.PHY104.length==0){
						stringForPrintHtml = stringForPrintHtml.concat('<tr><th style="width:1%"></th><td id="', response.day, 'PHY104">', response.day, '<hr style="border: 1px"></td><td>',  response.date, '<hr style="border: 1px"></td></tr><tr><th scope="row"></th><td style="width: 25%;" class="square"><center>ไม่มีข้อมูล</center></td><td></td></tr>');
					}
					else{
						stringForPrintHtml = stringForPrintHtml.concat('<tr><th style="width:1%"></th><td id="', response.day, 'PHY104">', response.day, '<hr style="border: 1px"></td><td>',  response.date, '<hr style="border: 1px"></td></tr>');

						for(var i=0; i<response.PHY104.length; i++){
							stringForPrintHtml = stringForPrintHtml.concat('<tr><th scope="row"></th><td style="width: 25%"><div class="square"><img src="image/', response.PHY104[i].img);
							stringForPrintHtml = stringForPrintHtml.concat('"><p class="nickname", id="nicknamePHY104TA', response.PHY104[i].teacher_id, '"> พี่ ', response.PHY104[i].nickname);
							stringForPrintHtml = stringForPrintHtml.concat('</p><p class="nickname">', response.PHY104[i].star, '</p></div></td><td colspan="2"><p>ชื่อ ', response.PHY104[i].title, ' ', response.PHY104[i].firstname, '    ', response.PHY104[i].lastname, '</p><p>เรื่องที่สอน</p><table class="table borderless"><tbody>' );
							for(var j=0; j<response.PHY104[i].course.length; j++){
								stringForPrintHtml = stringForPrintHtml.concat('<tr><td style="width: 35%">', response.PHY104[i].course[j].topic, '</td><td style="width: 15%">', response.PHY104[i].course[j].room, '</td><td style="width: 18%" class="bookingtime"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalNB', response.PHY104[i].course[j].course_id, '" onclick="updateSeat(', response.PHY104[i].course[j].course_id, ')" >', response.PHY104[i].course[j].time, '</button><div class="modal fade" id="modalNB', response.PHY104[i].course[j].course_id, '" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog" role="document"><div class="modal-content"><div class="modal-header"><h5 class="modal-title" id="exampleModalLabel">ยืนยันการจอง</h5><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" id="hidemodal">&times;</span></button></div><div class="modal-body" id="modalcontent', response.PHY104[i].course[j].course_id, '">จำนวนที่นั่งคงเหลือ ', response.PHY104[i].course[j].seatLeft, ' ที่นั่ง</div><div class="modal-footer"><button type="button" class="btn btn-success" onclick="sendBooking(', response.PHY104[i].course[j].course_id, ')" id="buttonToBook">ยืนยัน</button></div></div></div></div></td><td>จำนวนที่นั่งคงเหลือ ', response.PHY104[i].course[j].seatLeft, ' ที่นั่ง</td></tr>'  )
							}

							stringForPrintHtml = stringForPrintHtml+'<tr><td><button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalRWPHY104'+ response.PHY104[i].teacher_id+'" onclick="showReviewPHY104('+response.PHY104[i].teacher_id+')">review</button><div class="modal fade" id="modalRWPHY104'+response.PHY104[i].teacher_id+'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true"><div class="modal-dialog" role="document"><div class="modal-content"><div class="modal-header"><h5 class="modal-title" id="exampleModalLongTitle">Review</h5><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><div class="modal-body" id="reviewTAP104'+response.PHY104[i].teacher_id+'"></div></div></div></div></div></td></tr>';
							stringForPrintHtml = stringForPrintHtml.concat('</tbody></table></td></tr>');
						}
					}
				}
				else{
					for (var checkdate = 0; checkdate<data.length; checkdate++) {
						var response = data[checkdate];

						if(response.PHY104.length==0){
							stringForPrintHtml = stringForPrintHtml.concat('<tr><th style="width:1%"></th><td id="', response.day, 'PHY104">', response.day, '<hr style="border: 1px"></td><td>',  response.date, '<hr style="border: 1px"></td></tr><tr><th scope="row"></th><td style="width: 25%;" class="square"><center>ไม่มีข้อมูล</center></td><td></td></tr>');
						}
						else{
							stringForPrintHtml = stringForPrintHtml.concat('<tr><th style="width:1%"></th><td id="', response.day, 'PHY104">', response.day, '<hr style="border: 1px"></td><td>',  response.date, '<hr style="border: 1px"></td></tr>');

							for(var i=0; i<response.PHY104.length; i++){
								stringForPrintHtml = stringForPrintHtml.concat('<tr><th scope="row"></th><td style="width: 25%"><div class="square"><img src="image/', response.PHY104[i].img);
								stringForPrintHtml = stringForPrintHtml.concat('"><p class="nickname", id="nicknamePHY104TA', response.PHY104[i].teacher_id, '"> พี่ ', response.PHY104[i].nickname);
								stringForPrintHtml = stringForPrintHtml.concat('</p><p class="nickname">', response.PHY104[i].star, '</p></div></td><td colspan="2"><p>ชื่อ ', response.PHY104[i].title, ' ', response.PHY104[i].firstname, '    ', response.PHY104[i].lastname, '</p><p>เรื่องที่สอน</p><table class="table borderless"><tbody>' );
								for(var j=0; j<response.PHY104[i].course.length; j++){
									stringForPrintHtml = stringForPrintHtml.concat('<tr><td style="width: 35%">', response.PHY104[i].course[j].topic, '</td><td style="width: 15%">', response.PHY104[i].course[j].room, '</td><td style="width: 18%" class="bookingtime"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalNB', response.PHY104[i].course[j].course_id, '" onclick="updateSeat(', response.PHY104[i].course[j].course_id, ')" >', response.PHY104[i].course[j].time, '</button><div class="modal fade" id="modalNB', response.PHY104[i].course[j].course_id, '" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog" role="document"><div class="modal-content"><div class="modal-header"><h5 class="modal-title" id="exampleModalLabel">ยืนยันการจอง</h5><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" id="hidemodal">&times;</span></button></div><div class="modal-body" id="modalcontent', response.PHY104[i].course[j].course_id, '">จำนวนที่นั่งคงเหลือ ', response.PHY104[i].course[j].seatLeft, ' ที่นั่ง</div><div class="modal-footer"><button type="button" class="btn btn-success" onclick="sendBooking(', response.PHY104[i].course[j].course_id, ')" id="buttonToBook">ยืนยัน</button></div></div></div></div></td><td>จำนวนที่นั่งคงเหลือ ', response.PHY104[i].course[j].seatLeft, ' ที่นั่ง</td></tr>'  )
								}

								stringForPrintHtml = stringForPrintHtml+'<tr><td><button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalRWPHY104'+ response.PHY104[i].teacher_id+'" onclick="showReviewPHY104('+response.PHY104[i].teacher_id+')">review</button><div class="modal fade" id="modalRWPHY104'+response.PHY104[i].teacher_id+'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true"><div class="modal-dialog" role="document"><div class="modal-content"><div class="modal-header"><h5 class="modal-title" id="exampleModalLongTitle">Review</h5><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><div class="modal-body" id="reviewTAP104'+response.PHY104[i].teacher_id+'"></div></div></div></div></div></td></tr>';
								stringForPrintHtml = stringForPrintHtml.concat('</tbody></table></td></tr>');
							}
						}
					}
				}

				$("#tablePHY104").empty().html(stringForPrintHtml);	
			}
		});	
	};


	function getCourseCHM103(day){
		var obj ={};
		obj['day'] = day;
		$.ajax({
			url: 'resource/home/showCourse.php',
			type: 'post',
			data: obj,
			dataType: 'json',
			success: function(data){
				var stringForPrintHtml='';
				var response;
				var showDate=0;
				if(day!='ทุกวัน'){
					for (var checkdate = 0; checkdate<data.length; checkdate++){
						if (day==data.day) {
							showDate = checkdate;
						}
					};
					var response = data[showDate];

					if(response.CHM103.length==0){
						stringForPrintHtml = stringForPrintHtml.concat('<tr><th style="width:1%"></th><td id="', response.day, 'CHM103">', response.day, '<hr style="border: 1px"></td><td>',  response.date, '<hr style="border: 1px"></td></tr><tr><th scope="row"></th><td style="width: 25%;" class="square"><center>ไม่มีข้อมูล</center></td><td></td></tr>');
					}
					else{
						stringForPrintHtml = stringForPrintHtml.concat('<tr><th style="width:1%"></th><td id="', response.day, 'CHM103">', response.day, '<hr style="border: 1px"></td><td>',  response.date, '<hr style="border: 1px"></td></tr>');

						for(var i=0; i<response.CHM103.length; i++){
							stringForPrintHtml = stringForPrintHtml.concat('<tr><th scope="row"></th><td style="width: 25%"><div class="square"><img src="image/', response.CHM103[i].img);
							stringForPrintHtml = stringForPrintHtml.concat('"><p class="nickname", id="nicknameCHM103TA', response.CHM103[i].teacher_id, '"> พี่ ', response.CHM103[i].nickname);
							stringForPrintHtml = stringForPrintHtml.concat('</p><p class="nickname">', response.CHM103[i].star, '</p></div></td><td colspan="2"><p>ชื่อ ', response.CHM103[i].title, ' ', response.CHM103[i].firstname, '    ', response.CHM103[i].lastname, '</p><p>เรื่องที่สอน</p><table class="table borderless"><tbody>' );
							for(var j=0; j<response.CHM103[i].course.length; j++){
								stringForPrintHtml = stringForPrintHtml.concat('<tr><td style="width: 35%">', response.CHM103[i].course[j].topic, '</td><td style="width: 15%">', response.CHM103[i].course[j].room, '</td><td style="width: 18%" class="bookingtime"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalNB', response.CHM103[i].course[j].course_id, '" onclick="updateSeat(', response.CHM103[i].course[j].course_id, ')" >', response.CHM103[i].course[j].time, '</button><div class="modal fade" id="modalNB', response.CHM103[i].course[j].course_id, '" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog" role="document"><div class="modal-content"><div class="modal-header"><h5 class="modal-title" id="exampleModalLabel">ยืนยันการจอง</h5><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" id="hidemodal">&times;</span></button></div><div class="modal-body" id="modalcontent', response.CHM103[i].course[j].course_id, '">จำนวนที่นั่งคงเหลือ ', response.CHM103[i].course[j].seatLeft, ' ที่นั่ง</div><div class="modal-footer"><button type="button" class="btn btn-success" onclick="sendBooking(', response.CHM103[i].course[j].course_id, ')" id="buttonToBook">ยืนยัน</button></div></div></div></div></td><td>จำนวนที่นั่งคงเหลือ ', response.CHM103[i].course[j].seatLeft, ' ที่นั่ง</td></tr>'  )
							}

							stringForPrintHtml = stringForPrintHtml+'<tr><td><button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalRWCHM103'+ response.CHM103[i].teacher_id+'" onclick="showReviewCHM103('+response.CHM103[i].teacher_id+')">review</button><div class="modal fade" id="modalRWCHM103'+response.CHM103[i].teacher_id+'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true"><div class="modal-dialog" role="document"><div class="modal-content"><div class="modal-header"><h5 class="modal-title" id="exampleModalLongTitle">Review</h5><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><div class="modal-body" id="reviewTAC103'+response.CHM103[i].teacher_id+'"></div></div></div></div></div></td></tr>';
							stringForPrintHtml = stringForPrintHtml.concat('</tbody></table></td></tr>');
						}
					}
				}
				else{
					for (var checkdate = 0; checkdate<data.length; checkdate++) {
						var response = data[checkdate];

						if(response.CHM103.length==0){
							stringForPrintHtml = stringForPrintHtml.concat('<tr><th style="width:1%"></th><td id="', response.day, 'CHM103">', response.day, '<hr style="border: 1px"></td><td>',  response.date, '<hr style="border: 1px"></td></tr><tr><th scope="row"></th><td style="width: 25%;" class="square"><center>ไม่มีข้อมูล</center></td><td></td></tr>');
						}
						else{
							stringForPrintHtml = stringForPrintHtml.concat('<tr><th style="width:1%"></th><td id="', response.day, 'CHM103">', response.day, '<hr style="border: 1px"></td><td>',  response.date, '<hr style="border: 1px"></td></tr>');

							for(var i=0; i<response.CHM103.length; i++){
								stringForPrintHtml = stringForPrintHtml.concat('<tr><th scope="row"></th><td style="width: 25%"><div class="square"><img src="image/', response.CHM103[i].img);
								stringForPrintHtml = stringForPrintHtml.concat('"><p class="nickname", id="nicknameCHM103TA', response.CHM103[i].teacher_id, '"> พี่ ', response.CHM103[i].nickname);
								stringForPrintHtml = stringForPrintHtml.concat('</p><p class="nickname">', response.CHM103[i].star, '</p></div></td><td colspan="2"><p>ชื่อ ', response.CHM103[i].title, ' ', response.CHM103[i].firstname, '    ', response.CHM103[i].lastname, '</p><p>เรื่องที่สอน</p><table class="table borderless"><tbody>' );
								for(var j=0; j<response.CHM103[i].course.length; j++){
									stringForPrintHtml = stringForPrintHtml.concat('<tr><td style="width: 35%">', response.CHM103[i].course[j].topic, '</td><td style="width: 15%">', response.CHM103[i].course[j].room, '</td><td style="width: 18%" class="bookingtime"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalNB', response.CHM103[i].course[j].course_id, '" onclick="updateSeat(', response.CHM103[i].course[j].course_id, ')" >', response.CHM103[i].course[j].time, '</button><div class="modal fade" id="modalNB', response.CHM103[i].course[j].course_id, '" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog" role="document"><div class="modal-content"><div class="modal-header"><h5 class="modal-title" id="exampleModalLabel">ยืนยันการจอง</h5><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" id="hidemodal">&times;</span></button></div><div class="modal-body" id="modalcontent', response.CHM103[i].course[j].course_id, '">จำนวนที่นั่งคงเหลือ ', response.CHM103[i].course[j].seatLeft, ' ที่นั่ง</div><div class="modal-footer"><button type="button" class="btn btn-success" onclick="sendBooking(', response.CHM103[i].course[j].course_id, ')" id="buttonToBook">ยืนยัน</button></div></div></div></div></td><td>จำนวนที่นั่งคงเหลือ ', response.CHM103[i].course[j].seatLeft, ' ที่นั่ง</td></tr>'  )
								}

								stringForPrintHtml = stringForPrintHtml+'<tr><td><button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalRWCHM103'+ response.CHM103[i].teacher_id+'" onclick="showReviewCHM103('+response.CHM103[i].teacher_id+')">review</button><div class="modal fade" id="modalRWCHM103'+response.CHM103[i].teacher_id+'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true"><div class="modal-dialog" role="document"><div class="modal-content"><div class="modal-header"><h5 class="modal-title" id="exampleModalLongTitle">Review</h5><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><div class="modal-body" id="reviewTAC103'+response.CHM103[i].teacher_id+'"></div></div></div></div></div></td></tr>';
								stringForPrintHtml = stringForPrintHtml.concat('</tbody></table></td></tr>');
							}
						}
					}					
				}
				$("#tableCHM103").empty().html(stringForPrintHtml);
			}
		});	
	};

	function reloadJS(){
		//$("#atcd").empty();
		$("#js0").attr({
			scr : "",
			type : ""
			}).appendTo("#atcd");
		console.log($("#atcd").html());
		$("#js0").attr({
			scr : "js/indexJ.js",
			type : "text/javascript"
			}).appendTo("#atcd");
		console.log($("#atcd").html());
	}
