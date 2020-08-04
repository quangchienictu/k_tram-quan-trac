<?php
include_once('views/header.php')
?>

<div class="container">
    <h1 style="font-size: 30px;margin-bottom: 50px;">Dashboard</h1>
    <div class="col-md-6">
       <div class="card  text-white " style="background-color:#ffdd29;padding: 20px;font-weight: bold; ">
           <div class="card-body">Số lượng tài khoản admin: <?=$tkAdmin[0]['sl'];?></div>
       </div>
   </div>
   <div class="col-md-6">
       <div class="card  text-white " style="background-color:#9cc497;padding: 20px;font-weight: bold; ">
        <div class="card-body">Số lượng tài khoản user: <?=$tkUser[0]['sl'];?></div>
       </div>
   </div>

  
</div>


<?php
include_once('views/footer.php')
?>
