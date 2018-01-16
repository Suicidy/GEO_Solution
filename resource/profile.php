<?php include('header.php');
if(empty($_SESSION['username']))
{
  exit(0);  
}
?>
<script>
    $(document).ready(function(){
      $.post("/geo_solution/resource/profile/view_profile.php",{},function(data,status){
        document.getElementById("name_title").placeholder = data['title'];
        document.getElementById("firstname").placeholder = data['firstname'];
        document.getElementById("lastname").placeholder = data['lastname'];
        document.getElementById("faculty").placeholder = data['faculty'];
        document.getElementById("department").placeholder = data['department'];
        document.getElementById("tel").placeholder = data['tel'];
        document.getElementById("email").placeholder = data['email'];
      },"json");
    });
</script>


	<h1><font color="#ff7454">แก้ไขข้อมูลส่วนตัว</font></h1>
  <p>ช่องที่มี <font color="red">*</font> จำเป็นต้องกรอกข้อมูล</p>
  <br>
	<form action=>
  <div class="form-row">
        <div class="form-group col-md-2">
      <label>คำนำหน้าชื่อ<font color="red">*</font></label>
      <input id="name_title" class="form-control" type="text" readonly>
   
    </div>
    <div class="form-group col-md-5">
      <label>ชื่อ<font color="red">*</font></label>
      <input id="firstname" class="form-control" type="text"  readonly>
    </div>
    <div class="form-group col-md-5">
      <label>นามสกุล<font color="red">*</font></label>
      <input id="lastname" class="form-control" type="text"  readonly>
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
      <input id="tel" type="text" class="form-control" >
    </div>
    <div class="form-group col-md-6">
      <label>อีเมล์<font color="red">*</font></label>
      <input id="email" type="email" class="form-control" >
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label>Facebook</label>
      <input id="facebook" class="form-control" placeholder="Phichayut Siripis no database">
    </div>
    <div class="form-group col-md-6">
      <label>Line</label>
      <input id="line" class="form-control" id="email" placeholder="pangyasff no database">
    </div>
  </div>
  <br>
  <center>
    <button id="login" type="button" class="btn btn-secondary" style="background-color: #ff7454">ยืนยัน</button>
    <button type="button" class="btn btn-secondary">ยกเลิก</button>
  </center>
</form>
<?php require_once 'footer.php'; ?>