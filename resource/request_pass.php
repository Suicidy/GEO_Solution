<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/geo_solution/resource/header.php'; ?>
<style type="text/css">
    .wrapper {
        width: 400px;
        padding: 20px;
    }
</style>
    <center>
        <div class="card wrapper" style="border: none;">
            <h1>ขอรหัสผ่านครั้งแรก</h1>
                <div class="form-group" id="request-pass-form">
                    <label>รหัสนักศึกษา</label>
                    <input type="text" class="form-control" id="student-id" name="studentid">
                    <span class="help-block" id="req-error"></span>
                </div>
                <div class="form-group">
                   <input type="submit" id="req-btn" class="btn btn-primary" style="background-color: #ff7454" value="Submit">
                </div>
        </div>
    </center>
    <script>
        $(document).ready(function(){
            $('#req-btn').click(function(){
                var dataString = { studentid : $("#student-id").val(), type : 'req_pass' };
                console.log(dataString);//test only
                if(dataString){
                    $.ajax({
                        type: "POST",
                        url: "request_check.php",
                        data: dataString,
                        datatype: 'json',
                        success: function (data){
                            console.log(data);
                            if(data['ERROR']){
                                $("#request-pass-form").addClass('has-error');
                                document.getElementById("req-error").innerHTML = data['ERROR'];
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
    <!--     </body>
    </html> -->
    <?php require_once './footer.php'; ?>