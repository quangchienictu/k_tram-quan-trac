<?php
session_start();
include_once("models/m_main.php");
class m_login extends m_main{
    protected $table = "login";
    private $email;
    private $password;
    private $userData;
    private $record ='';
    private $getUsername='';
   
    function setFieldValue($field){
        $this->fieldValue[$field['field']]=$field['value'];
    }
    function getFieldValue($field){
        return $this->fieldValue[$field['field']];
    }
    function findRecordByEmail($email =''){
        $sql= "select * from ".$this->table." where email = '".$email."' ";
        $result =$this->executeQuery($sql);
        if ($this->numRow($result)>0){
            $row=$this->fetchArray($result);
            return $row;
        }
    }
    function findRecord(){
        if (isset($_REQUEST['email'])&& isset($_REQUEST['password'])){
            $this->email = $_REQUEST['email'];
            $this->password = $_REQUEST['password'];
            $sql = "select * from " . $this->table . " where email = '" . $this->email . "' and password = '" . md5($this->password) . "'";
            $result=$this->executeQuery($sql);
            if ($this->numRow($result)>0){
                $row = $this->fetchArray($result);
                $this->userData = $row;
            }
        }
        return $this->userData;
        }
    function saveRegister()
    {
        $fields = implode(',',array_keys($this->fieldValue));
        $values = implode("','",$this->fieldValue);
        $sql="INSERT INTO $this->table ($fields) VALUES('$values')";
        $result=$this->executeQuery($sql);
        return $result;
    }
    function updateRegister($email)
    {
        $fields = implode(',',array_keys($this->fieldValue));
        $values = implode("','",$this->fieldValue);
        $sql="UPDATE $this->table SET ".$fields." = ".$values." WHERE email = ".$email." ";
        $result=$this->executeQuery($sql);
        return $result;
    }
        public function getUsername($record=''){
        return $record['email'];
        }
        function setSession($getUsername=''){
            $_SESSION['login']= $getUsername;
        }
        function  Logout(){
            unset ($_SESSION['login']);
        }

}
?>