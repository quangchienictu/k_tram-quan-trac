<?php
include("controllers/set_session.php");
include('controllers/c_main.php');
 include_once("models/m_main.php");
class c_save extends c_main
{

    function  process(){
        $model = new m_main();
        $object = $this->object;
        if(isset($_POST['add'])){
           $matram = $_POST['ma_tram'];
           $ngaydo= $_POST['ngay_do'];
           $muc_nuoc_hien_tai=$_POST['muc_nuoc_hien_tai'];
           $thoi_gian_do=$_POST['thoi_gian_do'];
           $muc_nuoc =$_POST['muc_nuoc'];
           $day = $_POST['optradio'];
           $date = date('Y/m/d');
           if($day=="ok"){
                $date = date('Y/m/d');
           }else{
                 $date = $_POST['date'];
           }

           $model->insert_mucnuoc($matram,$date,$thoi_gian_do, $muc_nuoc);
           header("Location: index.php?object=$object&action=list&ma_tram=$matram");
        }
        


       
       /* $object = $this->object;
        $ma_tram =$_REQUEST['ma_tram'];
        if ($ma_tram){
            $sua = '';
        } else {
            $them = '';
        }
        $objectModelName = 'm_' . $object;
        include_once ("models/$objectModelName.php");
        $objectModel = new $objectModelName();
        $header = $objectModel->getHeader();
        foreach ($header as $key=>$value) {
            $value = $_REQUEST[$key];
            $objectModel->setFieldValue($key,$value);
        }
        $objectModel->saveRecord();
        if ($object == 'mucnuoc') {
            header("Location: index.php?object=$object&action=list&ma_tram=$ma_tram");
        }else{
            header("Location:http://localhost:8080/tramquantrac");
        }*/
    }
}
?>