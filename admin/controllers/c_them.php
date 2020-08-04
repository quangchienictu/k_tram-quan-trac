<?php
include_once('controllers/c_main.php');
include_once ("controllers/set_session.php");
class c_them extends c_main
{
    function process()
    {
        $object = $this->object;
        $objectModelName = 'm_' . $object;
        include_once("models/$objectModelName.php");
        $objectModel = new $objectModelName();
        $listHeader=$objectModel->getHeader();
        $quyen = $objectModel->check($_SESSION['user']);
        include_once('views/them.php');

    }
}

?>