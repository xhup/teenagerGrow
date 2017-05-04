<?php
namespace teenagerGrow\Controller;
use Think\Controller;
class DataCheckController extends Controller{

//检测表单信息是否填写完整
    public function filled_out($form_vars) {
        // test that each variable has a value
        foreach ($form_vars as $key => $value) {
            if ((!isset($key)) || ($value == '')) {
                return false;
            }
        }
        return true;
    }
//检测用户注册的邮箱是否合法
    public function validEmail($address) {
        // check an email address is possibly valid
        if (mb_ereg_match('^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$', $address)) {
            return true;
        } else {
            return false;
        }
    }

    function data_connect(){
        @ $my=mysqli_connect('localhost','root','qazwsx','teenager_grow');
        if(mysqli_connect_error()) {
            E("连接数据库失败，请重试");
            exit();
        }else
            return $my;
    }
//检查用户账户与密码是否匹配
    public function userAndPasswdCheck($user_name,$passwd){
        $db=$this->data_connect();
        $query="select *from tg_doctor_info where doctorAccount='$user_name'and doctorPassword='$passwd'";
        $result=mysqli_query($db,$query);
        if(!$result){
            E('Error,Could not log you in');
        }
        if( $result->num_rows){
            return true;
        } else
            E('旧密码错误，请重试');
    }
//更改密码
    public function changePasswd($user_name,$old_passwd,$new_passwd){
        $this->userAndPasswdCheck($user_name,$old_passwd);
        $conn=$this->data_connect();
        $query="update tg_doctor_info set doctorPassword='$new_passwd'where doctorAccount='$user_name'";
        mysqli_query($conn,$query);
        if(!$query){
            throw new Exception('Password could not be changed');
        }else
            return true;

    }
//重置用户密码
    public function reset_password($user_name) {
// set password for username to a random value
        $new_passwd = rand(100000, 999999);
// set user's password to this in database or return false
        $conn = db_connect();
        $query="update web_user set password = '$new_passwd'where account= '$user_name'";
        mysqli_query($conn,$query);
        if (!$query) {
            throw new Exception('Could not change password.');  // not changed
        } else {
            return $new_passwd;  // changed successfully
        }
    }
//将重置后的密码发送到用户的邮箱中
    public function notify_password($user_name, $passwd) {
// notify the user that their password has been changed

        $conn = db_connect();
        $result = $conn->query("select email from web_user where account='$user_name'");
        if (!$result) {
            throw new Exception('Could not find email address.');
        } else if ($result->num_rows == 0) {
            throw new Exception('Could not find email address.');
// username not in db
        } else {
            $row = $result->fetch_object();
            $email = $row->email;
            $from = "From: support@teenager_data_center \r\n";
            $mesg = "Your password has been changed to '$passwd'\r\n"
                ."Please change it next time you log in.\r\n";

            if (mail($email, 'Teenager_data_center login information', $mesg, $from)) {
                return true;
            } else {
                throw new Exception('Could not send email.');
            }
        }
    }

//heightAndWeight.php

//信息输入完整检测
    public function fillInput($para){
        if(empty($para)){
            echo "<script>alert('请确保儿童的年龄、身高和体重信息全部输入');history.go(-1);</script>";
            return false;
        }
    }


//childInfoImportHandle.php

//信息输入完整检测
    public function fullInput($para){
        if(empty($para)){
            echo "<script>alert('请确保表单信息输入完整');history.go(-1);</script>";
            return false;
        }
    }

//fatherInforHandle.php

//小数点保留一位检测
    public function decimalCheck($target,$add,$alert,$string){
        if(!empty($target)){
            //检测用户输入的数据是否保留了一位小数
            if((preg_match("/^[0-9]+\.[0-9]$/",$target))){
                $tag=1;
            }else {
                $tag = 0;
                echo "<script>alert('请确保输入的.$alert.保留一位小数');  </script>";
                return false;
            }
            if($tag==1) {
                $add .= ",$string='$target'";
            }
        }else{
            $add.=",$string=null";
        }
        return $add;
    }

//addPregnancyRecordHandle.php

//检测输入的数据是否为空，如果为空设为NULL，以便存入数据库。如果不为空则检测是否保留了一位小数
    public function  decimailKeep($target,$alert)
    {
        if (!empty($target)) {
            //检测用户输入的数据是否保留了一位小数
            if (!(preg_match("/^[0-9]+\.[0-9]$/", $target))) {
                echo "<script>alert('请确保输入的.$alert.保留一位小数'); history.go(-1); </script>";
            }
        }else{
            $target=0.1;
        }
        return $target;
    }




}


?>


