<?php
  include('header.php');
  $edit_flag=0;
  if(empty($_SESSION['username']))
  {
    exit(0);  
  }
?>
<script>
    $(document).ready(function(){
      $.post("/geo_solution/resource/profile/view_profile.php",{},function(data,status){
        document.getElementById("name_title").value = data['title'];
        document.getElementById("firstname").value = data['firstname'];
        document.getElementById("lastname").value = data['lastname'];
        document.getElementById("faculty").value = data['faculty'];
        document.getElementById("department").value = data['department'];
        document.getElementById("tel").value = data['tel'];
        document.getElementById("email").value = data['email'];
        document.getElementById("facebook").value = data['facebook'];
        document.getElementById("line").value = data['line'];
      },"json");
      
      //  $( "#firstname" ).keyup(function() {
      //      var value = $( this ).val();
      //      document.getElementById("lastname").value = value;
      //    }).keyup();
        $("#save").click(function(){
          var tel = $("#tel").val();
          var email = $("#email").val();
          var facebook = $("#facebook").val();
          var line = $("#line").val();
          // var obj = {};
          // obj['tel'] = tel;
          // obj['email'] = email;
          // obj['facebook'] = facebook;
          // obj['line'] = line;
          $.post("/geo_solution/resource/profile/save_profile.php",{tel:tel,email:email,facebook:facebook,line:line},function(data,status){
            alert("บันทึกข้อมูลสำเร็จ");
            location.reload();
           },"json").fail(function(){
             alert("เกิดข้อผิดพลาดบางอย่าง");
             location.reload();
         	});
        
    //         $.ajax({
    //       url: '/geo_solution/resource/profile/save_profile.php',
    //       type: 'post',
    //       data: obj,
    //       dataType: 'text',
    //       success: function(data2){
    //       console.log(data2);
    //       alert(data2);
    //    },
    //    error: function(data2,status){
    //     console.log(data2+' '+status);
    //     alert(data2);
    //     //console.log("เกิดบางอย่างผิดพลาด");
    //    }
	 	// });
        });      
    });
    function goBack() {
    //window.history.back();
    location.reload();
    }

    function enable() {
    document.getElementById("save").hidden = false;
    document.getElementById("cancel").hidden = false;
    document.getElementById("edit").hidden = true;
    document.getElementById("tel").readOnly = false;
    document.getElementById("email").readOnly = false;
    document.getElementById("facebook").readOnly = false;
    document.getElementById("line").readOnly = false;
}
</script>

<!-- <form action="/geo_solution/resource/profile/save_profile.php" method="post"> -->
<body>
	<h1><font color="#ff7454">ข้อมูลส่วนตัว</font></h1>
  <p>ช่องที่มี <font color="red">*</font> จำเป็นต้องกรอกข้อมูล</p>
  <br>

  <div class="form-row">
        <div class="form-group col-md-2">
      <label>คำนำหน้าชื่อ<font color="red">*</font></label>
      <input id="name_title" class="form-control" type="text" readonly>
   
    </div>
    <div class="form-group col-md-5">
      <label>ชื่อ<font color="red">*</font></label>
      <input id="firstname" class="form-control" type="text" readonly>
    </div>
    <div class="form-group col-md-5">
      <label>นามสกุล<font color="red">*</font></label>
      <input  id="lastname" class="form-control" type="text"  readonly>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label>คณะ<font color="red">*</font></label>
      <input id="faculty" class="form-control" type="text"  readonly>
    </div>
    <div class="form-group col-md-6">
      <label>ภาควิชา<font color="red">*</font></label>
      <input id="department" class="form-control" type="text"  readonly>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label>เบอร์โทร<font color="red">*</font></label>
      <input id="tel" type="text" class="form-control" readonly >
    </div>
    <div class="form-group col-md-6">
      <label>อีเมล์<font color="red">*</font></label>
      <input id="email" type="email" class="form-control" readonly >
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label>Facebook</label>
      <input id="facebook" class="form-control" readonly >
    </div>
    <div class="form-group col-md-6">
      <label>Line</label>
      <input id="line" class="form-control" readonly >
    </div>
  </div>
  <br>

  <center>
    <button id="edit" onclick="enable()" class="btn btn-secondary" style="background-color: #ff7454">แก้ไขข้อมูล</button>
    <button id="save"  class="btn btn-secondary" style="background-color: #ff7454" hidden="true">ยืนยัน</button>
    <button id="cancel" type="button"onclick="goBack()"  class="btn btn-secondary" hidden="true">ยกเลิก</button>
  </center>
  </body>
<!-- </form> -->
<?php require_once 'footer.php'; ?>