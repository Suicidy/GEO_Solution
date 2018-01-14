<?php
	require $_SERVER['DOCUMENT_ROOT'].'/geo_solution/config.php';
	$sql = 'SELECT * FROM assign_course ac, course c WHERE ac.course_id=c.course_id AND ac.attending_status=1';
	$results = query($sql);

	while($result = mysqli_fetch_assoc($results)) {
		echo "<tr><th>".$result.course_id."</th></tr>";
		// row += '<td>' + (index + 1) + '</td>';
		// echo '<td>' + value.subject + '</td>';
		// row += '<td>' + value.topic + '</td>';
		// row += '<td><img src="../image/team-member-2.jpg" width="100" height="100"><p class="nickname">' + value.teacher_id + '</p></td>';
		// row += '<td>' + value.start_time + '</td>';
		// row += '<td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Review</button></td>';
		// //row += '<td>' + value.userview + '</td>';
		// row += '</tr>';
	}
	mysqli_free_result($results);
?>