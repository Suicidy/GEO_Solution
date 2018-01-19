$(document).ready(function(){

    // $.post("/geo_solution/resource/review/view_type.php",{},function(data,status){
    //     type = data['type'];
    //     if (type != "ta"){
    //       window.location.replace("/geo_solution/index.php");
    //     }
    //     // else{ 
    //     //   show_data("all"); 
    //     // }
    //   },"json");

    $("#search").click(function(){
    var id = $("#teacher_id").val();
    var subject = $("#subject").val();
    $.post("/geo_solution/resource/check_review/searching.php",{id : id,subject : subject},function(data,status){
        $("#body").empty();
        if (!jQuery.isEmptyObject(data)) {
            for (var i = 0; data[i]; i++) {
                var detail = "<div class='row'><div class='col-md-4 col-xs-6 class-name'><span>"+data[i]["topic"]+"</span></div><div class='col-md-4 col-xs-6 text-md-center room'><span>"+data[i]["start_time"]+"</span></div>";
                var button1 = "<div class='col-md-4 col-xs-4 button-time'><center> <button type='button' class='btn btn-primary review' data-toggle='modal' data-id="+data[i]["course_id"]+" data-target='#Review'><span>review</span></button>";
                var button2 = "&nbsp<button type='button' class='btn btn-success comment' data-toggle='modal' data-id='"+data[i]["course_id"]+"' data-target='#Comment'><span>comment</span></button></center></div></div>	<hr class='course-line'>";
                $("#body").append(detail+button1+button2);
              }
          }
    },"json")
    //location.reload();
    });

    $(document).on("click", ".comment", function () {
        var myBookId = $(this).data('id');
        //alert(myBookId);
    //     $(".modal-body #bookId").val( myBookId );
    //    $('#addBookDialog').modal('show');
   });
   
});
