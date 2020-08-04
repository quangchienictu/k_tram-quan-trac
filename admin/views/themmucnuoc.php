<?php
include_once('views/header.php');
include_once('coltrollers/c_themmucnuoc.php');
?>
<div class="container-fluid" style="font-size: 20px;">
    <h2 style="margin-top: 50px; font-size: 30px;">
        Thêm mới mức nước ngày <?php echo date('d/m/Y') ?>
    </h2>

    <br>

    <form method="POST"  class="text-left" name="myForm">
        <input type="hidden" name="object" value="<?php echo $object ?>">
        <input type="hidden" name="ma_tram" value="<?php echo $ma_Tram ?>">
        <input type="hidden" name="ngay_do" value="<?php echo date('Y/m/d') ?>">
        <input type="hidden" name="muc_nuoc_hien_tai" value="<?php echo $mucNuocHienTai['muc_nuoc'] ?>">
        <input type="hidden" name="action" value="save">
        <div class="form-group">
            <h4> Trạm: <?php echo $ma_Tram ?></h4>
            <div style="margin:30px 0px;">
               <p> Ngày đo :</p>
               <div class="form-check-inline" style="margin-top: 10px;">
                  <label class="form-check-label">
                    <input  type="radio" class="form-check-input" name="optradio" checked="" value="ok">Hôm nay
                </label>
            </div>
            <div class="form-check-inline disabled " style="margin-top: 10px;">

              <label class="form-check-label">
                <input  type="radio" class="form-check-input" name="optradio" value="none" >Tuỳ chỉnh
            </label>

            <input id="check" style="display: none;" style="margin-left: 10px;" type="date"  name="date" >
        </div>
    </div>
    <select name="thoi_gian_do" id="thoi_gian_do" class="btn btn-primary dropdown-toggle">
        <option value="00:00:00">Chọn thời gian đo</option>
        <option value="01:00:00">01:00:00</option>
        <option value="04:00:00">04:00:00</option>
        <option value="07:00:00">07:00:00</option>
        <option value="10:00:00">10:00:00</option>
        <option value="13:00:00">13:00:00</option>
        <option value="16:00:00">16:00:00</option>
        <option value="19:00:00">19:00:00</option>
        <option value="22:00:00">22:00:00</option>
    </select>
    <br>


</div>
    <h4>Mức Nước</h4>


<input type="number" step="0.01" class="form-control" id="muc_nuoc"  name="muc_nuoc" placeholder="Nhập mực nước" style="
width: 50%;margin-bottom: 20px;" required="">



<input class="btn btn-success submit" type="submit" value="thêm" name="add">
</form>
</div>



<?php
include_once('views/footer.php')
?>
<script type="text/javascript">
  var rad = document.myForm.optradio;
var prev = null;
for (var i = 0; i < rad.length; i++) {
    rad[i].addEventListener('change', function() {
        
        if (this !== prev) {
            prev = this;
        }
        if(this.value=="none"){
            document.querySelector("#check").style.display="inline";
          document.getElementById('check').valueAsDate = new Date();
        }else{
             document.querySelector("#check").style.display="none";
        }
    });
}
</script>