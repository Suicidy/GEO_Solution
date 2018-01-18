$.post("/geo_solution/resource/review/view_type.php",{},function(data,status){
  type = data['type'];
  if (type != "student"){
    window.location.replace("/geo_solution/index.php");
  }
  else{ 
    show_data("all"); 
  }
},"json");

function show_data(type) {
  $.post(
    "/geo_solution/resource/review/show_data.php",
    { show_type: type },
    function(data, status) {
      $("#body").empty();
      var attributes = ["subject", "topic", "nickname", "start_time"];
      var length = attributes.length;
      if (!jQuery.isEmptyObject(data)) {
        for (var i = 0; data[i]; i++) {
          $('<div class="col"></div>')
            .html(i + 1)
            .appendTo("#body");
          for (var j = 0; j < length; j++) {
            var k = attributes[j];
            $('<div class="col"></div>')
              .html(data[i][k])
              .appendTo("#body");
          }
          if (data[i]["star"] != null) {
            $(
              '<div class="col"><button type="button" class="btn btn-outline-Secondary active btn-block" disabled>Reviewed</button></div>'
            ).appendTo("#body");
          } else {
            $(
              '<div class="col"><button type="button" class="btn btn-info btn-block" data-toggle="modal" data-target="#review-modal" data-course="' +
                data[i]["course_id"] +
                '">Review</button></div>'
            ).appendTo("#body");
          }
          $("#body > div").wrapAll('<div class="row"></div>');
        }
      }
    },
    "json"
  );
}