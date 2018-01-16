function show_data() {
  $.post(
    "/geo_solution/resource/reserved/show_data.php",
    {},
    function(data, status) {
      $("#body").empty();
      var attributes = ["subject", "topic", "nickname", "start_time"];
      var length = attributes.length;
      if (!jQuery.isEmptyObject(data)) {
        for (var i = 0; data[i]; i++) {
          $("<td></td>")
            .html("<center>" + (i + 1) + "</center>")
            .appendTo("#body");
          for (var j = 0; j < length; j++) {
            var k = attributes[j];
            $("<td></td>")
              .html("<center>" + data[i][k] + "</center>")
              .appendTo("#body");
          }
          $(
            '<td><center><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#ask-modal" data-course = "' + data[i]["course_id"] + '">ยกเลิก</button></center></td>'
          ).appendTo("#body");
          $("#body > td").wrapAll("<tr></tr>");
        }
      }
    },
    "json"
  );
}
