<?php
/**
 *
 */
class m_main
{
    protected $conc;
    protected $table;
    protected $fieldValue = array();

    function __construct()
    {
        $this->conc = mysqli_connect('localhost', 'root', '', 'waterlevel');
        mysqli_set_charset($this->conc, 'UTF8');
        return $this;
    }

    public function executeQuery($sql)
    {
        $results = mysqli_query($this->conc, $sql);
        return $results;
    }

    function executeNonQuery($sql)
    {
        mysqli_query($this->conc, $sql);
    }
    function setRelatedTable($field)
    {
        $this->fieldValue[$field] = $field['value'];
    }
    function getRelatedTable($field)
    {
        return $this->fieldValue[$field['field']];
    }
    function setFieldValue($key,$field){
        $this->fieldValue[$key]=$field;
    }
    function fetchArray($result)
    {
        $array = mysqli_fetch_array($result, MYSQLI_ASSOC);
        return $array;
    }
    function numRow($result)
    {
        return mysqli_num_rows($result);
    }

    function getFieldValue($field)
    {
        return $this->fieldValue[$field['field']];
    }
    function phanTrang(){
        $ma_tram= $_REQUEST['ma_tram'];
        $sql = "select count($ma_tram) as total from $this->table where ma_tram = '$ma_tram'";
        $result = $this->executeQuery($sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $total_records = $row['total'];

            }
        }
        $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
        $limit = 10;
        $total_page = ceil($total_records / $limit);
        if ($current_page > $total_page){
            $current_page = $total_page;
        }
        else if ($current_page < 1){
            $current_page = 1;
        }
        $start = ($current_page - 1) * $limit;
        $phanTrang = array(
            'current_page' =>$current_page,
            'total_page' => $total_page,
            'start' =>$start,
            'limit'=>'10',
            'range' =>'3'

        );
        return $phanTrang;
    }
    function getList()
    {
        $ma_tram= $_REQUEST['ma_tram'];
        $phanTrang = $this ->phanTrang();
        $start = $phanTrang['start'];
        $limit =$phanTrang['limit'];
        $order = 'DESC';
        if(isset($_REQUEST['search'])){
            $search = $_REQUEST['search'];
        }else{
            $search ='';
        }
        if($this->table=="thong_tin_tram") {
            if($_REQUEST['sort']){
                $sort = $_REQUEST['sort'];
            }else{
                $sort = 'ma_tram';
            }

            $sql = "select *from $this->table where ma_tram like '%$search%' 
                                                OR ten_tram LIKE '%$search%' 
                                                OR cap_bao_dong_1 LIKE '%$search%'  
                                                OR cap_bao_dong_2 LIKE '%$search%' 
                                                OR cap_bao_dong_3 LIKE '%$search%'
                                                 order by $sort $order";
        }elseif($this->table=="muc_nuoc") {
            $sort = 'ngay_do';
            $time = 'thoi_gian_do';

            $sql = "select *from $this->table where ma_tram ='$ma_tram' order by id DESC LIMIT $start, $limit ";
        }elseif ($this->table=="login"){
            if($_REQUEST['sort']){
                $sort = $_REQUEST['sort'];
            }else{
                $sort = 'ma_tram';
            }
            $sql = "select *from $this->table where name like '%$search%' 
                                                OR email LIKE '%$search%' 
                                                OR ma_tram LIKE '%$search%'
                                                 order by $sort $order";
        }else{
            $sort='';
        }
        $data = array();
        $results = $this->executeQuery($sql);
        if (mysqli_num_rows($results) > 0) {
            while ($row = mysqli_fetch_assoc($results)) {
                $data[] = $row;

            }
        }
        return $data;
    }
    /* function getsearch($search)
     {
         $search = $_REQUEST['search'];
         $sql = "select*from $this->table where id LIKE '%$search%'
                                                 OR name LIKE '%$search%'
                                                 OR roll_number LIKE '%$search%'
                                                 OR dob LIKE '%$search%'
                                                 OR class LIKE '%$search%' ";
         $results = $this->executeQuery($sql);
         $data = array();
         if (mysqli_num_rows($results) > 0) {
             while ($row = mysqli_fetch_assoc($results)) {
                 $data[] = $row;
             }
         }
         return $data;
     }*/

    function getEdit($recordId)
    {
        $sql = "select*from $this->table WHERE stt=$recordId";
        $results = $this->executeQuery($sql);
        if (mysqli_num_rows($results) > 0) {
            while ($row = mysqli_fetch_assoc($results)) {
                $data[] = $row;
            }
        }
        return $data;
    }

    function saveRecord()
    {
        $MaTram = $_REQUEST['ma_tram'];
        $ThoiGianDo = $_REQUEST['thoi_gian_do'];
        $NgayDo = date_create($_REQUEST['ngay_do']);
        $NgayDo = date_format($NgayDo,"Y/m/d");
        $MucNuoc = $_REQUEST['muc_nuoc'];
        $stt = $_REQUEST['stt'];
        if ($MucNuoc) {
            $sql = "SELECT * FROM muc_nuoc WHERE thoi_gian_do='$ThoiGianDo'";
            $data = $this->executeQuery($sql);
        }
        //update
        if ($stt) {
            $sql = "update $this->table set";
            foreach ($this->fieldValue as $column => $value) {
                $sql .= " $column = '$value',";
            }
            $sql = rtrim($sql, ',');
            $sql .= " Where stt=$stt";
        }elseif ($data){
                $sql = "insert into $this->table(ma_tram,ngay_do,thoi_gian_do,muc_nuoc) values('$MaTram','$NgayDo','$ThoiGianDo','$MucNuoc')";
        } else {
            $column = implode(",", array_keys($this->fieldValue));
            $value = implode("','", $this->fieldValue);
            $sql = "insert into $this->table(ma_tram,name_tram,ten_tram,lat,lon,cap_bao_dong_1,cap_bao_dong_2,cap_bao_dong_3) values('$value')";
        }
        $this->executeNonQuery($sql);
    }
    function deleteRecord($stt)
    {
        $sql = "delete from $this->table ";
        $sql .= " where stt= $stt";
        $this->executeNonQuery($sql);
    }
    function  getThemMucNuoc(){
        $matram = $_REQUEST['ma_tram'];
        $sql = "select *from muc_nuoc where ma_tram = $matram";
        $data = array();
        $results = $this->executeQuery($sql);
        if (mysqli_num_rows($results) > 0) {
            while ($row = mysqli_fetch_assoc($results)) {
                $data[] = $row;

            }
        }
        return $data;
    }

    function countTK($not){
       if($not=="0"){
         $sql="SELECT COUNT(*) as sl FROM `login` WHERE `ma_tram` = 0";
         }else{
             $sql="SELECT COUNT(*) as sl FROM `login` WHERE `ma_tram` != 0";
         }

        $data = array();
        $results = $this->executeQuery($sql);
        if (mysqli_num_rows($results) > 0) {
            while ($row = mysqli_fetch_assoc($results)) {
                $data[] = $row;

            }
        }
        return $data;
    }

    function check($email){
        $sql="SELECT * FROM `login` WHERE `email` ='$email'";
        $result = $this->executeQuery($sql);
                $data = $result->fetch_assoc();
                return $data;
    }
    function insert_mucnuoc($matram,$ngaydo,$thoigian,$mucnuoc){
        $sql="INSERT INTO `muc_nuoc`( `ma_tram`, `ngay_do`, `thoi_gian_do`, `muc_nuoc`) VALUES ($matram,'$ngaydo','$thoigian',$mucnuoc)";
        echo "$sql";
        $this->executeQuery($sql);
    }
    public function test(){
        echo "sadasdasdas";
    }
}
?>