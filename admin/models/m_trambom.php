<?php
include_once ("models/m_main.php");
class m_trambom extends m_main
{
    protected $table = 'thong_tin_tram';

    function getHeader()
    {
        return array('ma_tram' => 'Mã Trạm', 'name_tram' => 'Tên TRạm Không Dấu', 'ten_tram' => 'Tên Trạm', 'lat' => 'Kinh Độ', 'lon' => 'Vĩ Độ','cap_bao_dong_1' => 'Cáp Báo Động 1','cap_bao_dong_2' => 'Cấp Báo Dộng 2','cap_bao_dong_3' => 'cấp Báo Động 3');
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