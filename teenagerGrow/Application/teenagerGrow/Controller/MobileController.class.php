<?php
/**
 * Created by PhpStorm.
 * User: XH
 * Date: 2017/1/13
 * Time: 14:30
 */

namespace teenagerGrow\Controller;
use Think\Controller;

class MobileController extends Controller
{
    /*手机端用户注册后台*/
        public function register()
        {
            $mobileID=I("post.mobileID");
            $password=I("post.password");
            $table=M("mobileUser");
            $check=$table->where("mobileID='$mobileID'")->find();
            if($check){
                $back=array("flag"=>2);//返回2表示注册账号已存在
            }else{
                $condition["mobileID"]=$mobileID;
                $condition["password"]=$password;
                $result=$table->add($condition);
                if($result){
                    $back=array("flag"=>1);//返回1表示注册成功
                }else{
                    $back=array("flag"=>0);//返回0表示注册失败
                }
            }
            $this->ajaxReturn($back,"json");//将结果json形式返回给前端
         }

    /*手机端用户登陆后台*/
        public function login(){
            $mobileID=I("post.mobileID");
            $password=I("post.password");
            $table=M("mobileUser");
            $condition["mobileID"]=$mobileID;
            $condition["password"]=$password;
            $check=$table->where($condition)->find();
            if($check){
                $_SESSION["mobileUser"]=$mobileID;//记录登陆的手机用户
                $infoTable=M("baseInformation");
                $infoQuery=$infoTable->where("mobileID='$mobileID'")->getField("account,name,sex,birthdate");//查询出该手机用户关联的儿童的信息
                $dataTable=M("growData");
                $dataQuery=$dataTable->where("mobileID='$mobileID'")->select();//查询出该手机用户关联的儿童账号的身高体重头围BMI信息
                $back=array("flag"=>1,"info"=>$infoQuery,"data"=>$dataQuery);//返回1表示登录成功,info:儿童基本信息，data:身高体重头围BMI数据
            }else{
                $back=array("flag"=>0);//返回0表示用户名或密码错误
            }
            $this->ajaxReturn($back,"json");
        }

        /*手机端身高、体重、头围、BMI的添加后台(parm:用户上传的数据)*/
        public function dataAdd($parm){
            $data=I("post.data");
            $date=I("post.date");
            $childID=I("post.childID");
            $childSex=I("post.childSex");
            $childName=I("post.childName");
            $time=date("Y-m-d",time());
            $table=M("growData");
            $condition["importTime"]=$time;//上传数据的日期
            $condition["childDate"]=$date;//上传的选择测试时间，用来换算儿童的年龄
            $condition["importPerson"]=$_SESSION["mobileUser"];//上传的用户
            $condition["mobileID"]=$_SESSION["mobileUser"];//用户账号
            $condition["account"]=$childID;//对应的儿童
            $condition["childSex"]=$childSex;//对应儿童的性别
            $condition["childName"]=$childName;//对应儿童的姓名
            if($_SESSION["mobileUser"]){
                switch($parm){
                    case "height":{
                        $condition["childHeight"]=$data;
                        break;
                }
                    case "weight":{
                        $condition["childWeight"]=$data;
                        break;
                    }
                    case "touwei":{
                        $condition["childTouwei"]=$data;
                        break;
                    }
                    case "bmi":{
                        $condition["childBMI"]=$data;
                        break;
                    }
                };
                $result=$table->add($condition);//将手机端用户需要添加的数据存入数据库
                if($result){
                    $back=array("flag"=>1);//返回1表示添加成功
                }else{
                    $back=array("flag"=>0);//返回0表示添加失败
                }
            }else{
                $back=array("flag"=>2);//返回0表示用户还未登陆
            }
            $this->ajaxReturn($back, "json");
        }

    /*手机端身高、体重、头围、BMI的修改后台*/
    public function dataEdit($parm){
        $data=I("post.data");
        $date=I("post.date");
        $childID=I("post.childID");
        $time=date("Y-m-d",time());
        $table=M("growData");
        $condition["importTime"]=$time;//上传数据的日期
        $condition["importPerson"]=$_SESSION["mobileUser"];//上传的用户
        $condition["mobileID"]=$_SESSION["mobileUser"];//手机用户账号
        if($_SESSION["mobileUser"]){
            switch($parm){
                case "height":{
                    $condition["childHeight"]=$data;
                    break;
                }
                case "weight":{
                    $condition["childWeight"]=$data;
                    break;
                }
                case "touwei":{
                    $condition["childTouwei"]=$data;
                    break;
                }
                case "bmi":{
                    $condition["childBMI"]=$data;
                    break;
                }
            };
            $result=$table->where("account='$childID'and childDate='$date'")->save($condition);//将手机端用户需要修改的数据更新数据库
            if($result){
                $back=array("flag"=>1);//返回1表示修改成功
            }else{
                $back=array("flag"=>0);//返回0表示修改失败
            }
        }else{
            $back=array("flag"=>2);//返回0表示用户还未登陆
        }
        $this->ajaxReturn($back, "json");
    }


        /*手机端身高、体重、头围、BMI的删除后台*/
        public function dataDelete()
        {
            $date = I("post.date");
            $childID = I("post.childID");
            $table=M("growData");
            if($_SESSION["mobileUser"]){
                $result=$table->where("account='$childID'and childDate='$date'")->delete();//将手机端用户需要删除的数据进行删除
                if($result){
                    $back=array("flag"=>1);//返回1表示删除成功
                }else{
                    $back=array("flag"=>0);//返回0表示删除失败
                }
            }else{
                $back=array("flag"=>2);//返回2表示用户还未登陆
            }
            $this->ajaxReturn($back,"json");
        }

    /*用户退出登录*/
    public function loginOut(){
         session("[start]");
         session("mobileUser",null);
         session("[destroy]");
        }


}