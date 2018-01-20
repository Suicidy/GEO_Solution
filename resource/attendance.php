<?php include('header.php'); ?>
<link href="/geo_solution/css/attendance.css" rel="stylesheet">
    <script>
    var type;
    $.post("/geo_solution/resource/review/view_type.php",{},function(data,status){
          type = data['type'];
          if (type != "teacher"){
					  window.location.replace("/geo_solution/home.php");
				  }
			    },"json");
      $(document).ready(function(){   
          $("#table,#send").hide();
          $("#search").click(function(){
          $("#body").empty();
          var data_array = {};
          var id = $("#search_id").val();
          var subject = $("#search_subject").val();
          if (id == ""){
            alert("Please select ID");
          }
          else if (subject == ""){
            alert("Please select subject");
          }
          else{
            data_array['id'] = id;
            data_array['subject'] = subject;
            $.post("attendance/searching.php",data_array,function(data,status){
              var attributes = ["student_id","title","firstname","lastname"];
              var length = attributes.length;
              if (jQuery.isEmptyObject(data)){
                alert("This is not time to checking attendance")
              } 
              else{
                for (var i = 0; data[i];i++){
                  $("<td></td>").html("<center>" + i + "</center>").appendTo("#body");
                  for (var j = 0; j < length ; j++){
                    var k = attributes[j];
                    $("<td></td>").html("<center>" + data[i][k] + "</center>").appendTo("#body");
                  }
                  if(data[i]['attending_status']== "0"){
                    $('<td><center><input type="checkbox" name="student_id[]" value="' + data[i]['student_id'] +'"></center></td>').appendTo("#body");
                  }
                  else{
                    $('<td><center><input type="checkbox" name="student_id[]" value="' + data[i]['student_id'] +'" checked></center></td>').appendTo("#body");
                  }
                  
                  $("#body > td").wrapAll("<tr></tr>");
                }
                $("#course").val(data[0]['course_id']);
                $("#table,#send").fadeIn();
              } 
            },"json");        
          }
        });
      });
    </script>
    <div class="row">
      <div class="col">
        <h2>Check Attendance</h2>
          <div id="all" class="form-row align-items-center">
            <div class="col-auto my-1">
              <label class="mr-sm-2" for="inlineFormCustomSelect">Teacher Assistant ID</label>
              <select class="custom-select mr-sm-2" id = "search_id">
                <option value="" selected>Choose...</option>
                <?php require "attendance/option_teacher.php";?>
              </select>
            </div>
            <div class="col-auto my-1">
              <label class="mr-sm-2" for="inlineFormCustomSelect">Course</label>
              <select class="custom-select mr-sm-2" id = "search_subject">
                <option value="" selected>Choose...</option>
                <option value="MTH">Math</option>
                <option value="PHY">Physic</option>
                <option value="CHM">Chemistry</option>
              </select>
            </div>
            <button id = "search" type="submit" class="btn btn-primary search"> SEARCH </button>
          </div>
          <br>
        <div style="overflow-x:auto;">
          <form action="attendance/submit.php" method="post" id = "submit_form">             
                <table class="table table-striped" id = "table">
                  <thead>
                    <tr>
                      <th scope="col"><center></center></th> 
                      <th scope="col"><center>Student-ID</center></th>
                      <th scope="col"><center>Title</center></th>
                      <th scope="col"><center>Firstname</center></th>
                      <th scope="col"><center>Lastname</center></th>
                      <th scope="col"><center>Status</center></th>
                    </tr>
                  </thead>
                  <tbody id = "body">
                  </tbody>
                </table>          
            <input type="hidden" name="course_id" id = "course">
            <center><button id ="send" type="submit" class="btn btn-primary save"> SAVE </button></center>
          </form>
        </div>
      </div>
    </div>
 <?php include('footer.php'); ?>