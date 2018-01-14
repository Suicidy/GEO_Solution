<?php include('header.php'); ?>
<!-- <!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <script src="/geo_solution/js/jquery-3.2.1.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/docsearch.js@2/dist/cdn/docsearch.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Kanit:100,200,300,400,500,600,700,800,900" rel="stylesheet"> -->
    <script>
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
 <!--    <title>Check Attendance</title>
  </head>  
  <body>
    <div class="container"> -->
      <center><p><big><big><h1> Check Attendance </h1></big></center></p></big>
        <div class="form-row align-items-center">
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
              <option value="PHYSIC">Physic</option>
              <option value="CHEM">Chemistry</option>
            </select>
          </div>
          <button id = "search" type="submit" class="btn btn-primary search" style ="background-color : #ff7454; border-color : #ff7454; margin-top: 30px; "> SEARCH </button>
        </div>
      <form action="attendance/submit.php" method="post" id = "submit_form">
        <div class="form-row align-items-center" id = "table" >
          <table class="table table-striped">
            <thead>
              <tr>  
                <th scope="col">Student-ID</th>
                <th scope="col">Title</th>
                <th scope="col">Firstname</th>
                <th scope="col">Lastname</th>
                <th scope="col">Status</th>
              </tr>
            </thead>
            <tbody id = "body">
            </tbody>
          </table>
        </div>
        <input type="hidden" name="course_id" id = "course">
        <center><button id ="send" type="submit" class="btn btn-primary " style ="background-color : #ff7454; border-color : #ff7454;"> SAVE </button></center>
      </form>
 <!--    </div> 
  </body>
</html> -->
 <?php include('footer.php'); ?>