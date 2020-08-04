<?php
include_once ("models/m_main.php");
class m_mucnuoc extends m_main
{
    protected $table = 'muc_nuoc';

    function getHeader()
    {
        return array('ma_tram' => 'Mã Trạm', 'ngay_do' => 'ngày đo', 'thoi_gian_do' => 'Thời gian đo', 'muc_nuoc' => 'Mức nuoc');
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