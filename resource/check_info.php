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
    <div class="row">
      <div class="col">
        <h2>Student Info</h2>
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
          <div id="accordion">
                <div class="card">
                  <div class="card-header" id="headingOne">
                    <h5 class="mb-0">
                      <button class="btn collapsed course-head" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                        Block Diagram (12/01/2016  08.00-09.00 น.)
                      </button>
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                      Show Request
                    </button>
                    </h5>
                    
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="false">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Request</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <div class="col-12 request-body">
                              <p class="request-text">Goooooooooooooooooodอิอิอิ</p>
                            </div>
                             <div class="col-12 request-body">
                              <p class="request-text">GoooooooooooooooooodอิอิอิksdjjvisojsovkGoooooooooooooooooodGoooooooooooooooooodGoooooooooooooooooodGooooooooooooooooood</p>
                            </div>
                            
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                    <div class="card-body course-body">                      
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
                       
         
                     
                    </div>
                  </div>
                </div>
                <div class="card">
                  <div class="card-header" id="headingTwo">
                    <h5 class="mb-0">
                      <button class="btn collapsed course-head" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Block Diagram55555 (12/01/2016  08.00-09.00 น.)
                      </button>
                    </h5>
                  </div>
                  <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                    <div class="card-body">
                      Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                    </div>
                  </div>
                </div>
                <div class="card">
                  <div class="card-header" id="headingThree">
                    <h5 class="mb-0">
                      <button class="btn collapsed course-head" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        Block Diagram22222 (12/01/2016  08.00-09.00 น.)
                      </button>
                    </h5>
                  </div>
                  <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                    <div class="card-body">
                      Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

        
                       
               
 
          </p>                        
        </div>
      </div>
 <?php include('footer.php'); ?>