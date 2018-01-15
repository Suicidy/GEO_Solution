<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script src="js/jquery-3.2.1.js"></script>
	<script>
	$(document).ready(function(){
		//$("#eiei").html("aasd2");
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
				//$("#eiei").html("aasd2");
				hello();
			}
		});
				//$("#buttonMTH102").html("aasd");

		$("#modaleiei").click(function(){
			$("#modaleiei2").modal('show');
		});

	});

	function hello(){
		$("#eiei").html("aasd23");
	}

	function hello2(){
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
				//$("#eiei").html("aasd2");
				$("#ei2").html("kumsi");
			}
		});
	}
	</script>


</head>
<body>
	<p id="eiei">vbvb</p>
	<p id="ei2" onclick="hello2()">asdf</p>
	<p id="modaleiei">dfsi</p>

</body>
</html>