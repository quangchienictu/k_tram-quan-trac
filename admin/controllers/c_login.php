<?php
include_once ("controllers/set_session.php");
include_once ("controllers/C_Main.php");
class c_login extends  c_main{
    function process(){
        $object = $this->object;
        $code = $_REQUEST['code'];
        $email = $_REQUEST['email'];

        $objectModelName="M_".$object;
        include_once ("models/{$objectModelName}.php");
        $objectModel = new $objectModelName();
        $objectModel->setFieldValue(array('field' => 'email','value' => $_REQUEST['email']));
        $objectModel->setFieldValue(array('field' => 'name','value' => $_REQUEST['name']));
        $objectModel->setFieldValue(array('field' => 'ma_tram','value' => $_REQUEST['ma_tram']));
        $objectModel->setFieldValue(array('field' => 'password','value' => md5($_REQUEST['password'])));
        if ($code == 1) {
            $record = $objectModel->findRecord();
            if ($record == "") {
                echo "<script>
                window.location.href = 'Login.php';
                </script>";

            }
            else {
                $getUsername = $objectModel->getUsername($record);
                $_SESSION['user'] =  $getUsername;

                $MaTram=$record['ma_tram'];
                if ($MaTram =='0') {
                    echo "<script>
                        window.location.href = 'index.php?object=trambom&action=dashboard';
                </script>";
                    exit();
                }else{
                    echo "<script>
                           window.location.href = 'index.php?object=mucnuoc&action=list&ma_tram=$MaTram';
                </script>";
                    exit();
                }
            }
        }if ($code == 2) {
            $record = $objectModel->findRecordByEmail($email);
            if ($record == "") {
             $objectModel->saveRegister();
                echo "<script>alert('Dang ky thanh cong');
                window.location.href = 'index.php?object=admin&action=list';
                </script>";
            }elseif ($record){
                $objectModel->updateRegister($email);
                echo "<script>alert('sửa thanh cong');
                window.location.href = 'index.php?object=admin&action=list';
                </script>";
            }
            else {
                echo "<script>alert('Tài khoản đã tồn tại');
                    window.location.href = 'Register.php';
                </script>";
            }
        }

        if ($code == 3) {
            $objectModel->Logout();
              $_SESSION['user'] =null;
            echo "<script>
            window.location.href = 'Login.php';
            </script>";
        }
    }
}