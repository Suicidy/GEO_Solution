$(document).ready(function () {
    $.ajax({
        url: '/geo_solution/resource/review/view_type.php',
        type: 'post',
        data: {},
        dataType: 'json',
        success: function (data) {
            var type = data['type'];
            console.log(type);
            if (type != "teacher") {
                window.location.replace("/geo_solution/index.php");
            }
        }
    });

    $("#search").on("click", function () {
        var obj = {};
        // Error
        if ($("#search_teacher").val() == "") {
            alert("ใส่ id ให้เรียบร้อย");
        }
        else if ($("#search_subject").val() == "") {
            alert("ใส่ วิชา ให้เรียบร้อย");
        }
        else {
            obj['id'] = $("#search_teacher").val();
            obj['subject'] = $("#search_subject").val();
            $.ajax({
                url: '/geo_solution/resource/info/list_course.php',
                type: 'post',
                data: obj,
                dataType: 'json',
                success: function (data) {
                    var stringHtml = "";
                    if (data.length) {
                        data.forEach(element => {
                            //element['']
                            stringHtml = stringHtml + '<div class="card"><div class="card-header" id="headingOne"><h5 class="mb-0"><button class="btn course-head col-12 collapsed" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne" id="course'+element['course_id']+'"><div class="row "><div class="col-12 col-md ">'+element['topic']+'</div><div class="col-12 col-md-4">('+element['date']+'  '+element['start_time']+'-'+element['end_time']+' น.)</div><div class="col-12 col-md-2">ห้อง '+element['room']+'</div><div class="col-12 col-md-2"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" id="';
                        });
                    }
                }
            });
        }
    });

    $("#eiei").on("click", function () {
        console.log('kum');
    });

    $("#headingOne").click(function () {
        console.log('kumeiei');
    });
});

function loadCourseData() {

};