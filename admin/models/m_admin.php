<?php
include_once ("models/m_main.php");
class m_admin extends m_main
{
    protected $table = 'login';

    function getHeader()
    {
        if ($_REQUEST['action'] == "edit"){
            return array('ma_tram' => 'Mã Trạm', 'name' => 'Tên', 'email' => 'Tài Khoản','password'=>'Mật Khẩu');
        }else {
            return array('ma_tram' => 'Mã Trạm', 'name' => 'Tên', 'email' => 'Tài Khoản');
        }
    }

    /*  static function getAllLop()
      {
          $parent = new m_main();
          $array = '';
          $result = $parent->query("select * from tbl_sinhvien");
          if ($parent->mysqli_num_rows($result) > 0) {
              while ($row = $parent->mysqli_fetch_array($result)) {
                  $array[] = $row;
              }
          }
          return $array;
      }*/
}
?>