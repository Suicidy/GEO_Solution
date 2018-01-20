<?php include('header.php'); ?>
<link href="/geo_solution/css/watch_info.css" rel="stylesheet">
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
          <button id = "search" type="submit" class="btn btn-primary search"> SEARCH </button>
        </div>
        <div class="card">
          <div class="card-body">                         
            <h5 class="card-title">คอร์สที่ทำการสอน</h5>
            <p class="card-text">
              <div class="row">
                <div class="col-md-2 col-12 class-name"><span>58070501094</span></div>          
                <div class="col-md-2 col-12 text-md-center">
                  <span>นายภัทรพงศ์</span>           
                </div>
                <div class="col-md-2 col-12 text-md-center">
                  <span>Tel 08xxxxxxxx</span>           
                </div>
                <div class="col-md-3 col-12 text-md-center">
                  <div class="row">
                    <div class="col-4 col-md-4 ">
                      <img class="contract" src="/geo_solution/image/facebook.png">
                    </div>
                    <div class="col-8 col-md-8">
                      Prapasiri sdfdhgffg 
                    </div>                              
                  </div>
                </div>
                <div class="col-md-3 col-12 text-md-center">
                  <div class="row">
                    <div class="col-4 col-md-4 ">
                      <img src="/geo_solution/image/line.png" class="contract">
                    </div>
                    <div class="col-8 col-md-8">
                       bonus><
                    </div>                              
                  </div>          
                </div>           
              </div>
              <hr class="course-line"> 
               <div class="row">
                <div class="col-md-2 col-6 class-name"><span>58070501094</span></div>          
                <div class="col-md-2 col-6 text-md-center">
                  <span>นายภัทรพงศ์</span>           
                </div>
                <div class="col-md-2 col-xs-6 text-md-center">
                  <span>Tel 08xxxxxxxx</span>           
                </div>
                <div class="col-md-3 col-xs-6 text-md-center contract">
                  <img src="/geo_solution/image/facebook.png">
                  <span>Prapasiri sdfdhgffg</span>          
                </div>
                <div class="col-md-2 col-xs-6 text-md-center contract">
                  <img src="/geo_solution/image/line.png">
                  <span>bonus><</span>          
                </div>           
              </div>   
            <hr class="course-line">                        
               
 
          </p>                        
        </div>
      </div>


      <div class="modal fade" id="errorModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">Status</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body" id="reviewModalText">
       
            </div>
          </div>
        </div>
      </div>

 <?php include('footer.php'); ?>