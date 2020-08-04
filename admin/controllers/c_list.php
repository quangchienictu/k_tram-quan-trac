<?php
include_once ("controllers/set_session.php");
include_once('controllers/c_main.php');
class c_list extends c_main
{

    function process()
    {
        $object = $this->object;

        $objectModelName = 'm_' . $object;
        include_once("models/$objectModelName.php");
        $objectModel = new $objectModelName();
        $data = $objectModel->getList();
        $phanTrang = $objectModel->phanTrang();
        $listHeader=$objectModel->getHeader();
        $quyen = $objectModel->check($_SESSION['user']);
       
        include_once('views/list.php');
    }
}
?>