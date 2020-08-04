<?php
include_once('views/header.php')
?>
    <div>
        <form style="display: inline;float: left;margin-top: 66px;margin-left: 66px;" method="post" action="index.php?object=<?php echo $object ?>&action=list&seach=">
            <input name="search" type="text" placeholder="Search..">
            <input type="submit" value="tìm kiếm">
        </form>
    </div>
    <div class="btn btn-primary" style="display: inline;float: right;margin-top: 65px;margin-right: 66px;">
        <?php if ($_REQUEST['ma_tram']) { ?>
        <a style="color: #ffffff" href="index.php?object=mucnuoc&action=themmucnuoc&ma_tram=<?php echo $_REQUEST['ma_tram'] ?>"> thêm mới</a>
            <?php }else{echo ' <a style="color: #ffffff" href="index.php?object='.$object.'&action=them"> <i class="fa fa-plus-circle" aria-hidden="true"></i> thêm mới</a>';} ?>
    </div>
        <?php if ($_REQUEST['ma_tram']){?>
            <input type="hidden" name="object" value="<?php echo $object ?>">
            <input type="hidden" name="ma_tram" value="<?php echo $_REQUEST['ma_tram'] ?>">
        <?php } ?>
    <div class="container">
        <div class="table-wrapper" style="margin-top: 100px;">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
                         <b>Danh sách <?=$_GET['object']=="admin"?"Tài khoản ":($_GET['object']=="trambom"?"trạm bơm":"Lịch sử đo");?></b>
                    </div>
                </div>
            </div>
    <table  class="table table-striped table-hover" charset="utf-8">
        <thead>
        <?php foreach ($listHeader as $COLUMN =>$COLUMN_NAME){?>
            <td>
            <a class="sort" id="<?php echo $COLUMN?>" data-order="desc" >
                <?php echo $COLUMN_NAME ?>
            </a>
        </td>
        <?php } ?>
        </thead>
        <?php foreach($data as $KEY => $ITEM){?>
        <tr>
            <?php foreach($listHeader as $COLUMN =>$COLUMN_NAME){?>
            <td>
                <?php echo $ITEM[$COLUMN] ?>
            </td>
                <?php }?>
            <td >
                <p data-placement="top" data-toggle="tooltip" title="Edit">
                <?php if ($_REQUEST['ma_tram']) { ?>
                <?php }else{echo '  <a class="edit" data-toggle="modal" href="index.php?object='.$object.'&action=edit&record= '.$ITEM['stt'].'"><i class="fa fa-pencil" aria-hidden="true"></i></a>';} ?>

            </td>
            <td>
                <?php if ($_REQUEST['ma_tram']) { ?>
                <?php }else{echo '<a class="delete" data-toggle="modal"  href="index.php?object='.$object.'&action=xoa&record= '.$ITEM['stt'].'"> <i class="fa fa-trash" aria-hidden="true"></i></a>';} ?>
            </td>
        </tr>
            <?php }?>

    

        </tbody>
    </table>
        </div>
    </div>

    <div class="h2">
            <?php $pagination = [$phanTrang['current_page']]; ?>
            <?php while (count($pagination) < 5) {  ?>
                <?php $left = $pagination[0] - 1; ?>
                <?php $right = $pagination[count($pagination) - 1] + 1; ?>
                <?php $added = false; ?>
                <?php if ($left > 0) {
                    array_unshift($pagination, $left); // Đẩy page mới vào đầu mảng
                    $added = true;
                } ?>

                <?php  if ($right <= $phanTrang['total_page']) {
                    array_push($pagination, $right); // Đẩy page mới vào cuối mảng
                    $added = true;
                } ?>
                <?php  if (!$added) { // Nếu cả bên trái lẫn bên phải đều không thể thêm phần tử nào vào nữa, thì break khỏi vòng lặp
                    break;
                } ?>
            <?php } ?>
                <?php if ($pagination[0] != $phanTrang['current_page']) { // Nếu trang ngoài cùng bên trái, mà không phải là current page, thì sẽ có nút Previous
                    array_unshift($pagination, '< Previous');
                } ?>
                <?php if ($pagination[count($pagination) - 1] != $phanTrang['current_page']) { // Nếu trang ngoài cùng bên phải, mà không phải là current page, thì sẽ có nút Next
                    array_push($pagination, 'Next >');
                } ?>

        <?php foreach ($pagination as $key =>$values){?>
            <?php echo '<a href="index.php?object=' . $object . '&action=list&ma_tram='. $_REQUEST['ma_tram'] .'&page=' . ($key +1) . '"> '.$values.'</a>  '; ?>
        <?php } ?>
    </div>


        <?php if($_GET['object']=="mucnuoc"):?>
            <div class="container">
                  <br />
                  <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-12">
                
                      <canvas id="barChart"></canvas>
                    </div>
                    <div class="col-md-1"></div>
                  </div>
                </div>
                <script type="text/javascript" src="public/js/test.js"></script>
        <?php endif ?>
<?php
include_once('views/footer.php')
?>
