<?php require_once './header.php'; ?>

<style type="text/css">
    body {
        font: 18px sans-serif;
        font-family: 'Kanit', sans-serif;
    }

    .wrapper {
        width: 400px;
        padding: 20px;
    }
</style>
    <center>
    <div class="card bg-light wrapper">
        <h2> Forgotten Password</h2>
        <p>Please fill in your Student ID.</p>
        <div class="form-group" id="recov-pass-form">
            <label>Student ID:<sup>*</sup></label>
            <input type="text" class="form-control" id="student-id" name="studentid">
            <span class="help-block" id="recov-error"></span>
        </div>    
        <div class="form-group">
            <input type="submit" id="recov-btn" class="btn btn-primary" value="Submit">
        </div>
    </div>
    </center>  
    <script>
        $(document).ready(function(){
            $('#recov-btn').click(function(){
                var dataString = { studentid : $("#student-id").val(), type : 'recov_pass' };
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
                                $("#recov-pass-form").addClass('has-error');
                                document.getElementById("recov-error").innerHTML = data['ERROR'];
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

