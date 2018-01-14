function show_data(type){
    $.post("/geo_solution/resource/review/show_data.php",{show_type : type},function(data,status){
    $("#body").empty();
    var attributes = ["subject","topic","nickname","start_time"];
var length = attributes.length;
if (!jQuery.isEmptyObject(data)){
  for (var i = 0; data[i];i++){
                $("<td></td>").html("<center>" + (i+1) + "</center>").appendTo("#body");
    for (var j = 0; j < length ; j++){
      var k = attributes[j];
      $("<td></td>").html("<center>" + data[i][k] + "</center>" ).appendTo("#body");
                }
                if (data[i]['star'] != null){
                    $('<td><button type="button" class="btn btn-outline-Secondary active btn-block" disabled>Reviewed</button></td>').appendTo("#body");
                }
                else{
                    $('<td><button type="button" class="btn btn-info btn-block" data-toggle="modal" data-target="#review-modal" data-course="' + data[i]['course_id'] +'">Review</button></td>').appendTo("#body");
                }
    $("#body > td").wrapAll("<tr></tr>");
            }
    }
},"json");
}