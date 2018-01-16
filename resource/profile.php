<?php include('header.php'); ?>
	<h1><font color="#ff7454">แก้ไขข้อมูลส่วนตัว</font></h1>
  <p>ช่องที่มี <font color="red">*</font> จำเป็นต้องกรอกข้อมูล</p>
  <br>
	<form>
  <div class="form-row">
        <div class="form-group col-md-2">
      <label>คำนำหน้าชื่อ<font color="red">*</font></label>
      <input id="name_title" class="form-control" type="text" placeholder="นาย" readonly>
    </div>
    <div class="form-group col-md-5">
      <label>ชื่อ<font color="red">*</font></label>
      <input id="firstname" class="form-control" type="text" placeholder="พิชญุตม์" readonly>
    </div>
    <div class="form-group col-md-5">
      <label>นามสกุล<font color="red">*</font></label>
      <input id="lastname" class="form-control" type="text" placeholder="ศิริพิศ" readonly>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label>คณะ<font color="red">*</font></label>
      <input id="faculty" class="form-control" type="text" placeholder="วิศวกรรมศาสตร์" readonly>
    </div>
    <div class="form-group col-md-6">
      <label>ภาควิชา<font color="red">*</font></label>
      <input id="department" class="form-control" type="text" placeholder="วิศวกรรมคอมพิวเตอร์" readonly>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label>เบอร์โทร<font color="red">*</font></label>
      <input id="tel" type="text" class="form-control" placeholder="0860644292">
    </div>
    <div class="form-group col-md-6">
      <label>อีเมล์<font color="red">*</font></label>
      <input id="email" type="email" class="form-control" placeholder="pangyassf@gmail.com">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label>Facebook</label>
      <input id="facebook" class="form-control" placeholder="Phichayut Siripis">
    </div>
    <div class="form-group col-md-6">
      <label>Line</label>
      <input id="line" class="form-control" id="email" placeholder="pangyasff">
    </div>
  </div>
  <br>
  <center>
    <button type="button" class="btn btn-secondary" style="background-color: #ff7454">ยืนยัน</button>
    <button type="button" class="btn btn-secondary">ยกเลิก</button>
  </center>
</form>
<?php require_once 'footer.php'; ?>