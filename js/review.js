$.post("/geo_solution/resource/review/view_type.php",{},function(data,status){
  type = data['type'];
  if (type != "student"){
    window.location.replace("/geo_solution/home.php");
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
          $('<td scope="row"></td>')
            .html(i + 1)
            .appendTo("#body");
          for (var j = 0; j < length; j++) {
            var k = attributes[j];
            $('<td></td>')
              .html(data[i][k])
              .appendTo("#body");
          }
          if (data[i]["star"] != null) {
            $(
              '<td><button type="button" class="btn btn-secondary" disabled>Reviewed</button></td>'
            ).appendTo("#body");
          } else {
            $(
              '<td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#review-modal" data-course="' +
                data[i]["course_id"] +
                '">Review</button></td>'
            ).appendTo("#body");
          }
          $("#body > td").wrapAll('<tr></tr>');
        }
      }
    },
    "json"
  );
}