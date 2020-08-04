<?php
include_once ("controllers/set_session.php");
include_once('controllers/c_main.php');
class c_themmucnuoc extends c_main
{

    function process()
    {
        $object = $this->object;
        $objectModelName = 'm_' . $object;
        include_once("models/$objectModelName.php");
        $objectModel = new $objectModelName();
        $ma_Tram =$_REQUEST['ma_tram'];
        $mucNuocHienTai = $this->setMucNuoc($ma_Tram);
        $quyen = $objectModel->check($_SESSION['user']);
        include_once('views/themmucnuoc.php');
    }

    function setMucNuoc($ma_Tram){
        $object = $this->object;
        $objectModelName = 'm_' . $object;
        $objectModel = new $objectModelName();
        $sql = "SELECT * FROM muc_nuoc WHERE ma_tram =$ma_Tram";
        $quyen = $objectModel->check($_SESSION['user']);
        $results = $objectModel->executeQuery($sql);
        if (mysqli_num_rows($results) > 0) {
            while ($row = mysqli_fetch_assoc($results)) {
                $data = $row;

            }
        }
        return $data;
    }
    function test(){
        echo "sadasdasdasdasdsdasd";
    }
}
?>