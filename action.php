<?php
if ($_POST['mode'] == 'MucNuocDinhKy') {
    echo MucNuocDinhKy();
}elseif ($_POST['mode'] == 'XemMucNuoc'){
    echo XemMucNuoc();
}
function MucNuocDinhKy(){
    $NgayDo = date_create($_POST['NgayDo']);
    $MaTram = $_POST['MaTram'];
    $NgayDo1 = date_create($_POST['NgayDo1']);
    $NgayDo= date_format($NgayDo,"Y/m/d");
    $NgayDo1= date_format($NgayDo1,"Y/m/d");
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $conn = mysqli_connect('localhost', 'root', '', 'waterlevel');
    $sql = "SELECT * FROM muc_nuoc where ma_tram = '$MaTram' AND ngay_do BETWEEN '$NgayDo1' AND '$NgayDo' ";
    $data=array();
    $results = mysqli_query($conn, $sql);
    if (mysqli_num_rows($results) > 0) {
        while ($row = mysqli_fetch_assoc($results)) {

            $data[] = $row;
//        $datajs= json_encode($row);
        }
    }
    $sql1 ="SELECT * FROM thong_tin_tram  where ma_tram = '$MaTram'";
    $dataInfo = array();
    $results = mysqli_query($conn, $sql1);
    if (mysqli_num_rows($results) > 0) {
        while ($row = mysqli_fetch_assoc($results)) {

            $dataInfo[] = $row;
        }
    }
    header('Content-type: text/json; charset=UTF-8');
     echo json_encode(array($data,$dataInfo));
}
function XemMucNuoc(){

    $MaTram = $_POST['MaTram'];
    $conn = mysqli_connect('localhost', 'root', '', 'waterlevel');
    $sql = "SELECT * FROM muc_nuoc where ma_tram = '$MaTram'";
    $results = mysqli_query($conn, $sql);

        while ($row = mysqli_fetch_assoc($results)) {

            $data = $row;
//        $datajs= json_encode($row);
        }

    header('Content-type: text/json; charset=UTF-8');
    $dataMucNuoc= array(
    "DataMucNuoc" => '<p> '.$data['ngay_do'].' '.$data['thoi_gian_do'].' : '.$data['muc_nuoc'].'(m)  </p>'
);
    echo json_encode($dataMucNuoc);

}