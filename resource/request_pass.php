
    <!-- 
    <!DOCTYPE html>
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
        
    </head>
    <body> -->
    <?php require_once './header.php'; ?>
    <br>
    <br>
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
            <h2>Request Password</h2>
            <p>Please enter student ID.</p>
                <div class="form-group" id="request-pass-form">
                    <label>Student ID:
                        <sup>*</sup>
                    </label>
                    <input type="text" class="form-control" id="student-id" name="studentid">
                    <span class="help-block" id="req-error">
                    </span>
                </div>
                <div class="form-group">
                    <input type="submit" id="req-btn" class="btn btn-primary" value="Submit">
                </div>
        </div>
    </center>
    <script>
        $(document).ready(function(){
            $('#req-btn').click(function(){
                var dataString = { studentid : $("#student-id").val()};
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
                                window.location.href = '/login/comfirm.php';                                
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