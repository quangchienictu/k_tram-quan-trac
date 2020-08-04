<?php
include_once('views/header.php')
?>

<h1>
       thêm mới
    </h1>
    <br>

    <?php if ($object == "admin"){
        echo ' <form method="POST" action="index.php?object=Login&action=Login&code=2" style="width: 500px;margin-left: 415px;">';}else{?>
    <form method="POST" action="index.php" style="width: 500px;margin-left: 415px;">
    <input type="hidden" name="object" value="<?php echo $object ?>">
    <input type="hidden" name="id" value="<?php echo $id ?>">
    <input type="hidden" name="action" value="save">
    <?php } ?>
    <div class="form-group">
        <?php foreach ($listHeader as $COLUMN =>$COLUMN_NAME){?>
            <label style="float: left;margin: 8px;"> <?php echo $COLUMN_NAME ?></label>
        <input type="text" class="form-control" name="<?php echo $COLUMN;?>" placeholder="<?=$COLUMN_NAME?>" >
        <?php } ?>
        <?php if ($object == "admin"){ echo '<label style="float: left;margin: 8px;">Mật Khẩu</label> <input type="password" class="form-control" name="password" placeholder="Mật khẩu" >';} ?>
    </div>

    <input style="" class="btn btn-success text-center" type="submit" value="Thêm mới" >
</form>
<?php
include_once('views/footer.php')
?>