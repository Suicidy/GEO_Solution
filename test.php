<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script src="js/jquery-3.2.1.js"></script>
	<script>
	$(document).ready(function(){
		//$("#eiei").html("aasd2");
		jQuery.ajax({
			url: 'resource/home/showCourse.php',
			type: 'post',
			data: {
				'day':"ทุกวัน"
			},
			dataType: 'json',
			success: function(data){
				//var response = data[0];
				//$("#demo").html(status);
				$("#eiei").html("aasd2");
			}
		});
				//$("#buttonMTH102").html("aasd");
	});
	</script>
</head>
<body>
	<p id="eiei">vbvb</p>
</body>
</html>