<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/geo_solution/resource/header.php'; ?>
    <style type="text/css">
        .wrapper {
            width: 400px;
            padding: 20px;
        }
    </style>
    <center>
    <div class="card wrapper" style="border: none;">
        <h1>เปลี่ยนรหัสผ่านใหม่</h1>
        <div class="form-group" id="recov-pass-form">
            <label>รหัสนักศึกษา</label>
            <input type="text" class="form-control" id="student-id" name="studentid">
            <p class="help-block" id="recov-error"></p>
        </div>    
        <div class="form-group">
            <input type="submit" id="recov-btn" class="btn btn-primary" style="background-color: #ff7454" value="Submit">
        </div>
    </div>
    </center>  
    <script>
        $(document).ready(function(){
            $('#recov-btn').click(function(){
                var dataString = { studentid : $("#student-id").val(), type : 'recov_pass' };
                if(dataString){
                    $.ajax({
                        type: "POST",
                        url: "request_check.php",
                        data: dataString,
                        datatype: 'json',
                        success: function (data){
                            if(data['ERROR']){
                                if(data['type'] == "stid_notreq"){
                                    window.location.href = '/geo_solution/resource/request_pass.php';
                                }
                                else{
                                    $("#recov-pass-form").addClass('has-error');
                                    document.getElementById("recov-error").innerHTML = data['ERROR'];
                                }
                            }
                            else{
                                window.location.href = '/geo_solution/resource/login/comfirm.php';                                
                            }
                        }
                    });
                }
            });
        });
    </script>
<?php require_once './footer.php'; ?>