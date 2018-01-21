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
            else{
                $("#accordion").empty();
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
                    $("#accordion").empty();
                    if (data.length) {
                        data.forEach(element => {
                            stringHtml = '';
                            stringHtml = stringHtml + '<div class="card" id="card'+element['course_id']+'"><div class="card-header" id="headingOne"><h5 class="mb-0"><button class="btn course-head col-12 collapsed" data-toggle="collapse" data-target="#collapse' + element['course_id'] + '" aria-expanded="false" aria-controls="collapseOne" id="coursehead' + element['course_id'] + '"><div class="row align-item-center"><div class="col-12 col-md-5 ">' + element['topic'] + '</div><div class="col-12 col-md-5">(' + element['date'] + '  ' + element['start_time'] + '-' + element['end_time'] + ' น.)</div><div class="col-12 col-md-2">ห้อง ' + element['room'] + '</div><div class="col-12 col-lg-2"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#requestModal" id="request' + element['course_id'] + '" onclick="getRequest('+element['course_id']+')">Show Request</button></div></div></button></h5></div></div></div>';
                            $("#accordion").append(stringHtml);
                            loadCourseData(element['course_id']);
                        }); 
                    }
                    else{
                        $("#accordion").append('<div class="card col-12"><span class="col-12">ไม่มีคอร์สที่สอน</span></div><br><br>');
                    }
                }
            });
        }
    });
});

function loadCourseData(id) {
    var stringHtml = '';
    var obj = {};
    obj['course_id'] = id;
    $.ajax({
        url: '/geo_solution/resource/info/list_info.php',
        type: 'post',
        data: obj,
        dataType: 'json',
        success: function (data) {
            reloadJS();

            if (data.length) {
                stringHtml = '<div id="collapse' + id + '" class="collapse" aria-labelledby="headingOne" data-parent="#accordion"><div class="card-body course-body col-12" id="courseinfo'+id+'"></div></div>';
                $("#card"+id).append(stringHtml);
                reloadJS();
                data.forEach(element => {
                    stringHtml = '';
                    stringHtml = stringHtml + '<div class="row"><div class="col-md col-12 class-name"><span class="col-12">' + element['student_id'] + '</span></div><div class="col-md-3 col-12 class-name"><span class="col-12">'+element['topic']+element['firstname']+' '+element['lastname']+'</span></div><div class="col-md col-12 class-name"><span class="col-12">เบอร์โทร '+element['tel']+'</span></div><div class="col-md col-12"><span class="col-12"><img src="/geo_solution/image/facebook.png" class="contract"><span>'+element['facebook']+'</span></span></div><div class="col-md col-12 class-name "><span class="col-12"><img src="/geo_solution/image/line.png" class="contract"><span>'+element['line']+'</span></span></div></div><hr class="course-line">';
                    $("#courseinfo"+id).append(stringHtml);
                });
                $("#card"+id).append(stringHtml);
            }
            else{
                stringHtml = '<div id="collapse'+id+'" class="collapse" aria-labelledby="headingOne" data-parent="#accordion"><div class="card-body course-body col-12"><div class="row align-item-center"><div class="col-12 offset-xs-1"><span class="col-12">ไม่มีคนลงเรียน</span></div></div><br></div></div>';
                $("#card"+id).append(stringHtml);
            }
        },
        error: function(data,status){
            console.log(status);
        }
    });
};

function getRequest(id){
    var stringHtml='';
    var obj ={};
    obj['course_id'] =id;
    $.ajax({
        url: '/geo_solution/resource/info/list_review.php',
        type: 'post',
        data: obj,
        dataType: 'json',
        success: function (data) {
            console.log('cccง');
            $("#bodyModal").empty();
            if(data.length){
                data.forEach(element => {
                    stringHtml = '<div class="col-12 request-body"><p class="request-text">'+element['review_txt']+'</p></div>';
                    $("#bodyModal").append(stringHtml);
                });
            }
            else{
                stringHtml = '<div class="col-12 request-body"><p class="request-text">ไม่มีข้อมูลคำขอ</p></div>';
                $("#bodyModal").append(stringHtml);
            }
        },
        error: function(data,status){
            console.log(status);
        }
    });    
};

function reloadJS() {
    //$("#atcd").empty();
    $("#js0").attr({
        scr: "",
        type: ""
    }).appendTo("#atcd");
    //console.log($("#atcd").html());
    $("#js0").attr({
        scr: "/geo_solution/js/check_infoJS.js",
        type: "text/javascript"
    }).appendTo("#atcd");
    //console.log($("#atcd").html());
};

