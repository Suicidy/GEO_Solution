<?php include('header.php'); ?>
<link href="/geo_solution/css/check_info.css" rel="stylesheet">
    <!-- <script>
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
    </script> -->
    <script src="/geo_solution/js/check_infoJS.js"></script>
    <div class="row">
      <div class="col">
        <h1>Student Info</h1>
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
            <button id = "search" type="submit" class="btn btn-primary search"> SEARCH </button>
            <p id="status"></p>
          </div>
          <br>
          <div id="accordion">
                
          </div>

        </div>
    </div>

    <div class="modal fade" id="requestModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Request</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body" id="bodyModal">
            <div class="col-12 request-body">
              <p class="request-text"></p>
            </div>
             <div class="col-12 request-body">
              <p class="request-text"></p>
            </div>            
          </div>
        </div>
      </div>
    </div>

<div id="atcd">
	<script type="text/javascript" scr="js/indexJS.js" id="js0"></script>
</div>

 <?php include('footer.php'); ?>