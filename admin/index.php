<?php
session_start();
ini_set("display_errors", 0);
    $object=$_REQUEST['object'];
    $action=$_REQUEST['action'];
    if($object==''){
        $object='trambom';
        $action='list';
    }
    $controllerName = "c_" . $action;
    include_once("controllers/$controllerName.php");
    $process = new $controllerName($action, $object);
    $process->process();
?>