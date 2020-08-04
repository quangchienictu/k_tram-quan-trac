<?php
include_once ("controllers/set_session.php");
include_once('controllers/c_main.php');
class c_edit extends c_main
{

    function  process()
    {
        $object = $this->object;
        $recordId = $_REQUEST['record'];
        $objectModelName = 'm_' . $object;
        include_once ("models/$objectModelName.php");
        $objectModel = new $objectModelName();
        $listHeader=$objectModel->getHeader();
        $data = $objectModel->getEdit($recordId);
        $quyen = $objectModel->check($_SESSION['user']);
        include_once('views/edit.php');
    }
}
?>