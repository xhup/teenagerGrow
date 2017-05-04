<?php
/**
 * Created by PhpStorm.
 * User: XH
 * Date: 2016/11/9
 * Time: 14:17
 */

namespace teenagerGrow\Controller;
use Think\Controller;
class HeightAndWeightController extends Controller
{
    /*全部身高体重的表格显示*/
    public function heightAndWeightList()
    {
        $medicalID = $_SESSION["medicalID"];
        $user = M("HeightWeight");
        $info = $user->where("account='$medicalID'")->field("account,childName,childSex,childAge,childHeight,childWeight,importTime,importPerson")->select();
        $array = array("data" => $info);
        $this->ajaxReturn($array, "json");
    }
    /*身高体重的删除后台*/
    public function deleteHeightAndWeightRecord()
    {
        $medicalID = $_SESSION["medicalID"];
        $rowAge = I("post.rowAge");
        $user = M("HeightWeight");
        $info = $user->where("account='$medicalID'and childAge='$rowAge'")->delete();
        if ($info) {
            $back = array("flag" => 1);
        } else {
            $back = array("flag" => 0);
        }
        $this->ajaxReturn($back, "json");
    }
    /*身高体重的修改后台*/
    public function editHeightAndWeightRecord(){
        $user = M("HeightWeight");
        $doctor=$_SESSION["userName"];
        $medicalID = $_SESSION["medicalID"];
        $childHeight = I("post.height");
        $childWeight = I("post.weight");
        $childAge=I("post.age");
        $time=date("Y-m-d",time());
        $data=array("childHeight"=>$childHeight,"childWeight"=>$childWeight,"importTime"=>$time,"importPerson"=>$doctor);
        if (!empty($medicalID)) {
            $info=$user->where("account='$medicalID'and childAge='$childAge'")->setField($data);
            if($info){
                $back = array("flag" => 1);
            }else{
                $back = array("flag" => 0);
            }
        }else{
            $back = array("flag" => 2);
        }
        $this->ajaxReturn($back, "json");
    }
    /*身高体重的添加后台*/
    public function addNewHeightAndWeight()
    {
        $time = date("Y-m-d", time());
        $medicalID = $_SESSION["medicalID"];
        $childName = I("post.name");
        $childAge = I("post.age");
        $childSex = I("post.sex");
        $childHeight = I("post.height");
        $childWeight = I("post.weight");
        $importTime = $time;
        $importPerson = $_SESSION["userName"];
        $dataCheck = A("DataCheck");

        if (!empty($medicalID)) {
            $result = $dataCheck->data_connect();//连接数据库
            mysqli_query($result, "SET NAMES 'utf8'");//设置数据库数据的编码，不加这一句中文字符无法正常显示
            $n = "select *from tg_height_weight WHERE account='$medicalID'AND childAge='$childAge'";
            $check = mysqli_query($result, $n);
            if ($check->num_rows) {
                $back = array("icon" => 2);
            } else {
                //在两个数据库中都插入需要的数据
                $m = "insert into tg_height_weight(account,childSex,childAge,childHeight,childWeight,importPerson,importTime,childName)VALUE('$medicalID','$childSex','$childAge','$childHeight','$childWeight','$importPerson','$importTime','$childName')";
                // $s="insert into base_information(latestHeight,latestWeight,importPerson,latestUpdate)VALUE('$childHeight','$childWeight','$justyou','$time')";
                $s = "update tg_base_information set latestHeight='$childHeight',latestWeight='$childWeight',importPerson='$importPerson',latestUpdate='$importTime'WHERE account='$medicalID'";
                $insert = mysqli_query($result, $m);
                if (!$insert) {
                    E("could not insert child height and weight to table1");
                }
                $insert2 = mysqli_query($result, $s);
                if (!$insert2) {
                    E("could not insert child height and weight to table2");
                }
                if ($insert && $insert2) {
                    $back = array("icon" => 1);
                } else {
                    $back = array("icon" => 0);
                }
            }
            $this->ajaxReturn($back, "json");
        }
    }
    /* 给Echart提供对应的身高体重数据*/
//    public function getHeightAndWeightData(){
//        $parm=I("post.parm");
//        $user = M("HeightWeight");
//        $medicalID = $_SESSION["medicalID"];
//        $info=$user->where("account='$medicalID'")->field($parm)->select();
//        $array=array("data"=>$info);
//        $this->ajaxReturn($array);
//    }
    /* 给Echart提供对应的身高体重数据*/
     public function getHeightAndWeightData(){
         $parm=I("post.parm");
         $medicalID = $_SESSION["medicalID"];
         $dataCheck = A("DataCheck");
         $db = $dataCheck->data_connect();//连接数据库
         $array=array();//用于存储儿童2-18岁身高体重的数组
         for($i=2;$i<=18;$i=$i+0.25){
             $query="select *from tg_height_weight where account='$medicalID'AND childAge='$i'";//查询信息
             $result=mysqli_query($db,$query);
             if( $result->num_rows){
                 $row = mysqli_fetch_assoc($result);
                 $array[]=$row[$parm];
             }else{
                 $array[]=null;
             }
         }
         $this->ajaxReturn($array);
     }





























}

?>




