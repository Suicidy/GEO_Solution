<?php include('header.php'); ?>
    <script>
    var type;
    $.post("/geo_solution/resource/review/view_type.php",{},function(data,status){
          type = data['type'];
          if (type != "teacher"){
					  window.location.replace("/geo_solution/index.php");
				  }
			    },"json");
      $(document).ready(function(){   
          $("#table,#send").hide();
          $("#search").click(function(){
            alert('eiei');
          $("#body").empty();
          var data_array = {};
          var id = $( "#search_teacher" ).val();
          var subject = $("#search_subject").val();
          if (id == ""){
            alert("Please select ID");
          }
          else if (subject == ""){
            alert("Please select subject");
          }
          else{
             alert(id);
             alert(subject);
            data_array['id'] = id;
            data_array['subject'] = subject;
           $.ajax({
                url: 'info/list_course.php',
                type: 'post',
                data: data_array,
                dataType: 'text',
                success: function(data){
                        alert(data)
                      //  $("#bookingModalBody").html("จำนวนที่นั่งคงเหลือ "+data+" ที่นั่ง");
                      //  $("#bookButton").attr({
                      //  onclick : "sendBooking("+id+")",
                      //    })
                      // console.log($("#bookButton").attr("onclick"));
                       }
                  });      
          }
        });
      });
    </script>
      <h1><font color="#ff7454">Student Info</font></h1>
        <div id="all" class="form-row align-items-center">
          <div class="col-auto my-1">
            <label class="mr-sm-2" for="inlineFormCustomSelect">Teacher Assistant ID</label>
              <input type="text" class="form-control" id="search_teacher">
          </div>
          <div class="col-auto my-1">
            <label class="mr-sm-2" for="inlineFormCustomSelect">Course</label>
            <select class="custom-select mr-sm-2" id = "search_subject">
              <option value="" selected>Choose...</option>
              <option value="MTH102">MTH102</option>
              <option value="MTH112">MTH112</option>
              <option value="PHY102">PHY102</option>
              <option value="PHY104">PHY104</option>
              <option value="CHM103">CHM103</option>
            </select>
          </div>
          <button id = "search" type="submit" class="btn btn-primary search" style ="background-color : #ff7454; border-color : #ff7454; margin-top: 30px; "> SEARCH </button>
        </div>
        <br>
      <form action="attendance/submit.php" method="post" id = "submit_form">
        <div class="form-row align-items-center" id = "table" >
          <table class="table table-striped">
            <thead>
              <tr>  
                <th scope="col">วิชา</th>
                <th scope="col">เรื่อง</th>
                <th scope="col">วันที่สอน</th>
                <th scope="col">เวลา</th>
                <th scope="col">สถานที่</th>
                <th scope="col">จำนวนนักเรียนที่เข้าร่วม</th>
              </tr>
            </thead>
            <tbody id = "body">
            </tbody>
          </table>
        </div>
        <input type="hidden" name="course_id" id = "course">
        <center><button id ="send" type="submit" class="btn btn-primary " style ="background-color : #ff7454; border-color : #ff7454;"> SAVE </button></center>
      </form>
      <br>
 <?php include('footer.php'); ?>