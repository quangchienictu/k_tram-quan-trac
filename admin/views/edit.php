<?php
include_once('views/header.php');
?>
<h1>
    Sửa Trạm
</h1>
<!-- <?php if ($object == "admin"){
    echo ' <form method="POST" action="index.php?object=Login&action=Login&code=2" style="width: 500px;margin-left: 415px;">';}else{?>
<form style="margin-left: 500px;" method="post" action="index.php?object=<?php echo $object ?>&action=save">
    <?php } ?>
    <?php foreach( $data as $keys => $DETAILS){?>
       <?php foreach($DETAILS as $KEY =>$VALUE) {?>
           <?php echo $listHeader[$KEY] ?>  <input name="<?php echo $KEY ?>" <?php if ($KEY =='stt'){echo 'type="hidden"';}if ($KEY =='password'){echo 'type="password"';}else{echo 'type="text"';} ?>  value="<?php echo $VALUE; ?>"><br><br>
       <?php } ?>
   <?php } ?>
      <?php print_r($data); ?>
      <?php print_r($DETAILS); ?>
   <input type="submit" value="update">  -->

<!--  <?php print_r($data); ?> -->
<?php if($object == "admin") {?>
<div class="container">
		<form  method="post" style="width: 500px;
    /* margin-bottom: 200px; */
    margin: 10px auto;">
     <div class="form-group">
    <label for="email">Mã trạm:</label>
    <input type="text" class="form-control" placeholder="Enter email" id="email"  value="<?=$data[0][ma_tram]?>" name="ma_tram" disabled>
  </div>
  <div class="form-group">
    <label for="pwd">Tên :</label>
    <input type="text" class="form-control"  id="pwd" value="<?=$data[0][name]?>">
  </div>
   <div class="form-group">
    <label for="pwd">Tài khoản:</label>
    <input type="text" class="form-control" placeholder="Enter password"  id="pwd" value="<?=$data[0][email]?>" name="email">
  </div>
   <div class="form-group">
    <label for="pwd">Mật khẩu:</label>
    <input type="text" class="form-control" placeholder="Enter password" id="pwd" value="<?=$data[0][password]?>" name="password">
  </div>
  
  <button type="submit" class="btn btn-primary" value="update">Sửa đổi</button>
</form>
</div>

<?php }else{ ?>

		<form  method="post" style="width: 500px;
    /* margin-bottom: 200px; */
    margin: 10px auto;">
     <div class="form-group">
    <label for="email">Mã trạm:</label>
    <input type="text" class="form-control" placeholder="Enter email" id="email"  value="<?=$data[0][ma_tram]?>" disabled name="ma_tram">
  </div>
   <div class="form-group">
    <label for="pwd">Tên trạm không dấu:</label>
    <input type="text" class="form-control"  id="pwd" value="<?=$data[0][name_tram]?>" name="name_tram">
  </div>
  <div class="form-group">
    <label for="pwd">Tên trạm:</label>
    <input type="text" class="form-control"  id="pwd" value="<?=$data[0][ten_tram]?>" name="ten_tram">
  </div>
  <div class="form-group">
    <label for="pwd">Kinh độ :</label>
    <input type="text" class="form-control" id="pwd" value="<?=$data[0][lat]?>" name ="lat">
  </div>
  <div class="form-group">
    <label for="pwd">Vỹ độ:</label>
    <input type="text" class="form-control"   id="pwd" value="<?=$data[0][lon]?>" name="lon">
  </div>
   <div class="form-group">
    <label for="pwd">Báo động cấp 1:</label>
    <input type="text" class="form-control"   id="pwd" value="<?=$data[0][cap_bao_dong_1]?>" name="cap_bao_dong_1">
  </div>
  <div class="form-group">
    <label for="pwd">Báo động cấp 2:</label>
    <input type="text" class="form-control"   id="pwd" value="<?=$data[0][cap_bao_dong_2]?>" name="cap_bao_dong_2">
  </div>
   <div class="form-group">
    <label for="pwd">Báo động cấp 3:</label>
    <input type="text" class="form-control"   id="pwd" value="<?=$data[0][cap_bao_dong_3]?>" name="cap_bao_dong_3">
  </div>
   <div class="form-group">
    <label for="pwd">Mã màu:</label>
    <input type="color" class="form-control"  id="pwd" value="<?=$data[0][color]?>" name="color">
  </div>
  
  <button type="submit" class="btn btn-primary" value="update">Sửa đổi</button>
</form>
<?php } ?>
<?php
include_once('views/footer.php');
?>
