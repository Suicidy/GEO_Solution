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
          $("#body").empty();
          var data_array = {};
          var id = $("#search_teacher").val();
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
            $.post("check_review/searching.php",data_array,function(data,status){
              var attributes = ["student_id","title","firstname","lastname"];
              var length = attributes.length;
              if (jQuery.isEmptyObject(data)){
                alert("This is not time to checking attendance or Everyone has been checked")
              } 
              else{
                for (var i = 0; data[i];i++){
                  for (var j = 0; j < length ; j++){
                    var k = attributes[j];
                    $("<td></td>").text(data[i][k]).appendTo("#body");
                  }
                  $('<td><input type="checkbox" name="student_id[]" value="' + data[i]['student_id'] +'"></td>').appendTo("#body");
                  $("#body > td").wrapAll("<tr></tr>");
                }
                $("#course").val(data[0]['course_id']);
                $("#table,#send").slideDown();
              } 
            },"json");        
          }
        });
      });
    </script>
      <h1><font color="#ff7454">Check Review</font></h1>
        <div id="all" class="form-row align-items-center">
          <div class="col-auto my-1">
            <label class="mr-sm-2" for="inlineFormCustomSelect">Teacher Assistant ID</label>
            <input type="text" class="form-control" id="search_teacher">
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
          <button id = "search" type="submit" class="btn btn-primary search" style ="background-color : #ff7454; border-color : #ff7454; margin-top: 30px; "> SEARCH </button>
        </div>
        <div class="form-row align-items-center" id = "table" >
          <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">ลำดับ</th>  
                <th scope="col">วิชา</th>
                <th scope="col">หัวข้อ</th>
                <th scope="col">รายละเอียด</th>
                <th scope="col">เมนู</th>
              </tr>
            </thead>
            <tbody id = "body">
            </tbody>
          </table>
        </div>
 <?php include('footer.php'); ?>