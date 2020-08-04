<?php
include_once ("controllers/set_session.php");
include_once('controllers/c_main.php');
class c_xoa extends c_main
{
    function  process(){
        $object = $this->object;
        $objectModelName = 'm_' . $object;
        include_once ("models/$objectModelName.php");
        $objectModel = new $objectModelName();
        $stt = $_REQUEST['record'];
        $objectModel->deleteRecord($stt);
        header("Location: index.php?object=$object&action=list");

    }
}
?>