<?php
/**
 * Created by PhpStorm.
 * User: XH
 * Date: 2016/11/9
 * Time: 14:17
 */

namespace teenagerGrow\Controller;
use Think\Controller;
class AddChildController extends Controller
{
    public function childAddHandle()
    {
        session_start();
        date_default_timezone_set('PRC');//将data()时间转换成北京时间
        $time = date("Y-m-d", time());
        if ($_SESSION['isLogin'] == 1) {
            $justyou=$_SESSION['userName']; //当前登录的医生用户
//获取导入的儿童信息
            $medicalID=$_POST["medicalID"];
            $childName=$_POST["childName"];
            $childSex=$_POST["childSex"];
            $childBirthday=$_POST['childBirthday'];
            $childBirthYear=substr($childBirthday,0,4);
//检测表格信息是否完全输入
            $dataCheck=A("DataCheck");
            $dataCheck->fullInput($medicalID);
            $dataCheck->fullInput($childName);
            $dataCheck->fullInput($childSex);
            $dataCheck->fullInput($childBirthday);
            if((!empty($medicalID))&&(!empty($childName))&&(!empty($childSex))&&(!empty($childBirthday))){
                $result=$dataCheck->data_connect();//连接数据库
                mysqli_query($result,"SET NAMES 'utf8'");//设置数据库数据的编码，不加这一句中文字符无法正常显示
                $q="select *from tg_base_information WHERE account='$medicalID'";
                $query= mysqli_query($result,$q);
                if(!$query){
                    E("数据库查询错误，请重试");
                }
                if($query->num_rows>0){
                    echo "<script>alert('输入的就诊号已存在，请核对后重新添加');history.go(-1);</script>";
                    return false;
                }else{
                    $p="INSERT INTO tg_base_information(account,name,sex,importPerson,importTime,birthdate,birthYear) VALUE('$medicalID','$childName','$childSex','$justyou','$time','$childBirthday','$childBirthYear')";
                    $insert=mysqli_query($result,$p);
                    if(!$insert){
                        E("儿童信息插入数据库失败，请重试");
                    }
                    $q="INSERT INTO tg_during_pregnancy (account) VALUE ('$medicalID')";//同时在孕期数据库建立ID号
                    mysqli_query($result,$q);
                    $r="INSERT INTO tg_child_born (account) VALUE ('$medicalID')";//同时在儿童出生时数据库建立ID号
                    mysqli_query($result,$r);
                }
                $this->success("新增儿童信息成功");
            }
        }else{
            $this->error("用户未登陆","Login/loginView");
        }
    }
}
?>




