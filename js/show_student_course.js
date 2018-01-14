// load_student_course();

// function load_student_course() {
// 	jQuery.ajax({
// 		url: './home/load_student_course.php',
// 		success: load_student_course_finished
// 	});
// }

// function load_student_course_finished(msg) {
// 	obj = JSON.parse(msg);
// 	jQuery.each(obj, function(index, value) {
// 		row = '<tr><th scope="row">'+ value.course_id + '</th>';
// 		// row += '<td>' + (index + 1) + '</td>';
// 		row += '<td>' + value.subject + '</td>';
// 		row += '<td>' + value.topic + '</td>';
// 		row += '<td><img src="../image/team-member-2.jpg" width="100" height="100"><p class="nickname">' + value.teacher_id + '</p></td>';
// 		row += '<td>' + value.start_time + '</td>';
// 		row += '<td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Review</button></td>';
// 		//row += '<td>' + value.userview + '</td>';
// 		row += '</tr>';
// 		$('#student-course-list').append(row);
// 	});
// }