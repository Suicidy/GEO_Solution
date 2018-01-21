<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/geo_solution/resource/header.php'; ?>
<style type="text/css">
    .wrapper {
        width: 350px;
        padding: 20px;
    }
</style>
<center>
    <div class="card bg-light wrapper" id="reset-box" hidden>
        <h1>เปลี่ยนรหัสผ่าน</h1>
        <form id="reset-pass">
        <div class="form-group" id="old-pass-form">
            <label>รหัสผ่านใหม่</label>
            <input type="password" name="password" class="form-control" id="old-pass">
            <span class="help-block" id="old-pass-error"></span>
        </div>
        <div class="form-group" id="new-pass-form">
            <label>ยืนยันรหัสผ่านใหม่อีกครั้ง</label>
            <input type="password" name="confirmpassword" class="form-control" id="new-pass" >
            <span class="help-block" id="new-pass-error"></span>
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary" id="reset-btn" style="background-color: #ff7454" value="Submit">
        </div>
        </form>
    </div>
</center>
<script src="/geo_solution/js/jquery.validate.js"></script>
<script src="/geo_solution/js/jquery.form.js"></script>
<script>
        $(document).ready(function(){
            var reset =  window.location.search.substring(1);
            $.ajax({
                type: "GET",
                url: "reset.php",
                data: reset,
                datatype: 'json',
                success: function(data){
                    if(data['ERROR']){
                        if(data['type'] == 'link_fail'){
                            window.location.href = '/geo_solution/home.php';
                        }else{
                            window.location.href = '/geo_solution/resource/login/expired.php';
                        }
                    }else{
                        $('#reset-box').removeAttr("hidden");
                    }
                }
            });

            $('#reset-pass').ajaxForm();
            $('#reset-pass').validate({
                rules:{
                    password:{
                        required: true,
                        minlength: 6,
                        maxlength: 18,
                    },
                    confirmpassword:{
                        equalTo: "#old-pass",
                        minlength: 6,
                        maxlength: 18,
                    }
                },
                message:{
                    password:{
                        required:"required password"
                    }
                },
                submitHandler: function(form){
                    $(form).ajaxSubmit({
                        type: "POST",
                        url: "reset.php",
                        success: function (data){
                            if(data['SUCCESS']){
                                window.location.href = '/geo_solution/home.php';
                            }
                        }
                    });
                }

            });
        });
    </script>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/geo_solution/resource/footer.php'; ?>