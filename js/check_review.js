$(document).ready(function(){

    // $.post("/geo_solution/resource/review/view_type.php",{},function(data,status){
    //     type = data['type'];
    //     if (type != "teacher"){
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
          else
          {
            var no_search = '<div class="col-12 text-comment"><p>ไม่พบข้อมูลที่ต้องการ</p></div>';
            $("#body").append(no_search);
          }
    },"json")
    //location.reload();
    });

    $(document).on("click", ".review", function () {
        $("#ta").empty();
        $("#etc").empty();
        $("#subject_review").empty();
        $("#detail").empty();
        var id = $(this).data('id');

        $.post("/geo_solution/resource/check_review/information_review.php",{id : id},function(data,status){
            if (!jQuery.isEmptyObject(data)) {
                var detail = '<p>วิชา '+data[0]["subject"]+'</p><p>หัวข้อ  '+data[0]["topic"]+'</p><p>รายละเอียด '+data[0]["start_time"]+' น.</p>';
                $("#detail").append(detail);
              }
        },"json")




        $.post("/geo_solution/resource/check_review/all_review.php",{id : id},function(data,status){
            //$("#ta").empty();
            var count_ta =0;
            var count_etc =0;
            var count_re =0;
            var no_review = '<div class="col-12 text-comment"><p>ไม่พบข้อมูลที่ต้องการ</p></div>';
            if (!jQuery.isEmptyObject(data)) {
                for (var i = 0; data[i]; i++) {
                    // var detail = "<div class='row'><div class='col-md-4 col-xs-6 class-name'><span>"+data[i]["review_txt"]+"</span></div><div class='col-md-4 col-xs-6 text-md-center room'><span>"+data[i]["start_time"]+"</span></div>";
                    // var button1 = "<div class='col-md-4 col-xs-4 button-time'><center> <button type='button' class='btn btn-primary review' data-toggle='modal' data-id="+data[i]["review_txt"]+" data-target='#Review'><span>review</span></button>";
                    // var button2 = "&nbsp<button type='button' class='btn btn-success comment' data-toggle='modal' data-id='"+data[i]["review_txt"]+"' data-target='#Comment'><span>comment</span></button></center></div></div>	<hr class='course-line'>";
                    var review = '<div class="col-12 text-comment"><p>'+data[i]["review_txt"]+'</p></div>';
            
                    if(data[i]["type"]=="teacher")
                    {
                        count_ta++;
                        $("#ta").append(review);
                    }
                   else if(data[i]["type"]=="etc")
                   {
                        count_etc++;
                        $("#etc").append(review);
                   }
                   else if(data[i]["type"]=="content")
                   {
                        count_re++;
                        $("#subject_review").append(review);
                   }
                  }
              }
           
            if(count_ta==0)
            {
                $("#ta").append(no_review);
            }
            if(count_etc==0)
            {
                $("#etc").append(no_review);
            }
            if(count_re==0)
            {
                $("#subject_review").append(no_review);
            }
        },"json")

        //alert(myBookId);
    //     $(".modal-body #bookId").val( myBookId );
    //    $('#addBookDialog').modal('show');
   });
   
});
