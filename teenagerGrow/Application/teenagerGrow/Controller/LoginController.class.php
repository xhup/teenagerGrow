<?php
/**
 * Created by PhpStorm.
 * User: XH
 * Date: 2016/9/21
 * Time: 14:22
 */
namespace teenagerGrow\Controller;
use Think\Controller;
class LoginController extends Controller{
    public function  loginView(){
        $this->display();
    }
/*用户登录验证，并将登陆状态和用户名存入session中*/
    public function login(){
    $userName=I('post.userName');
    $passWord=I('post.password');
        $user=M('DoctorInfo');
        $condition['doctorAccount']=$userName;
        $condition['doctorPassword']=$passWord;
        $result=$user->where($condition)->select();
        if($result){
            $_SESSION['isLogin']=1;  //把登录状态存入session
            $_SESSION['userName']=$userName; //把登录的用户名存入session
            $this->success('登录成功','mainView');
        }else{
            $this->error('用户名或密码错误，请重新登录');
        }

    }
    public function register(){
        $userName=I('post.user_name');
        $passWord=I('post.passwd1');
        $user=M('DoctorInfo');
        $condition['doctorAccount']=$userName;
        $condition['doctorPassword']=$passWord;
        $check=$user->where("doctorAccount='$userName'")->find();
        if($check){
            $this->error("该用户名已被注册，请重新注册");
        }else{
            $result=$user->add($condition);
            if($result){
                $this->success("注册成功，正在跳回登录页面","loginView.html");
            }else{
                $this->error("系统出错导致注册失败，请重试");
            }
        }
    }
/*session用户登录状态验证*/
    public function sessionCheck(){
        session_start();
        if( $_SESSION['isLogin']==1){
            echo $_SESSION['userName'];
        }else{
            echo "未登陆";
        }

    }
    /*用户退出登录*/
    public function loginOut(){
        session_start();
        if( $_SESSION['isLogin']==1){
            $old_user = $_SESSION['userName'];
            unset($_SESSION['userName']);
            $result_dest = session_destroy();
        }
        if (!empty($old_user)) {
            if ($result_dest)  {
                // if they were logged in and are now logged out
               $this->redirect("loginView","正在返回登录页面...");
            } else {
                // they were logged in and could not be logged out
               $this->error("注销失败，请稍后再试");
            }
        } else {
            // if they weren't logged in but came to this page somehow
            $this->error("用户未登陆","loginView");

        }
    }
    /*验证用户密码*/
    public function checkPassword($userName,$password){
        $user=M('DoctorInfo');
        $condition['doctorAccount']=$userName;
        $condition['doctorPassword']=$password;
        $result=$user->where($condition)->select();
        if($result){
            return 1;
        }else{
            $this->error("旧密码不正确，请重新输入");
        }
    }

    /*更改用户密码*/
    public function updatePassword($userName,$oldPassword,$newPassword){
        $this->checkPassword($userName,$oldPassword);//验证用户密码
        $user=M('DoctorInfo');
        $update['doctorPassword']=$newPassword;
        $result=$user->where("doctorAccount='$userName'")->setField($update);
        if($result){
            $this->success("密码修改成功");
        }else{
            $this->error("密码修改失败,请重试");
        }
    }
    /*用户修改密码的处理方法*/
    public function changePassword(){
      session_start();
      $oldPassword=I("post.oldPassword");
      $newPassword1=I("post.newPassword1");
      $newPassword2=I("post.newPassword2");
        //各种格式的检查
        if(isset($_SESSION['userName'])) {
            $check=A('DataCheck');
            if (!$check->filled_out($_POST)) {
                  $this->error("请填写完整原密码与新密码");
            }
            if ($newPassword1 != $newPassword2) {
                $this->error("两次输入的新密码不一致");
            }
            if ((strlen($newPassword1) < 6) || (strlen($newPassword1) > 16)) {
                $this->error("设置的新密码必须在6-16位之间");
            }
            $this->updatePassword($_SESSION['userName'],$oldPassword,$newPassword1);//进行密码的修改
        } else{
            $this->error("用户还未登陆，请先登陆");
        }
}
    /*完善登陆用户信息*/
    public function userInfoHandle(){
        session_start();
        if($_SESSION["isLogin"]){
            $doctorNow=$_SESSION["userName"];
            $realName=I("post.realName");
            $sex=I("post.sex");
            $birthday=I("post.birthday");
            $phone=I("post.phone");
            $email=I("post.email");
            $address=I("post.address");
            /*用户信息必填项检查*/
            if(!($realName&&$email)){
                echo "<script>alert('请至少完善用户必填信息')</script>";
                return false;
            }
            /*邮箱地址格式检查*/
            $con=A("DataCheck");
            $emailCheck=$con->validEmail($email);
            if (!$emailCheck) {
                echo "<script>alert('请填写正确的邮箱格式')</script>";
                return false;
            }
            /*将完善好的用户信息存入数据库*/
            $user=M('DoctorInfo');
            $condition['name']=$realName;
            $condition['sex']=$sex;
            $condition['birthday']=$birthday;
            $condition['phone']=$phone;
            $condition['email']=$email;
            $condition['address']=$address;
            $result=$user->where("doctorAccount='$doctorNow'")->setField($condition);
            if($result){
                $this->success("信息修改成功");
            }else{
                $this->error("信息修改失败，请重试");
            }
        }else{
            $this->error("请先登陆");
        }
    }
   //登录用户的信息查询并显示在前台页面中
   public function getUserInfo(){
       session_start();
       if(isset($_SESSION['userName'])){
           $loginDoctor=$_SESSION['userName'];
           $user=M("DoctorInfo");
           $info=$user->where("doctorAccount='$loginDoctor'")->find();
           $this->ajaxReturn($info,"json");
       }else{
           $this->error("用户还未登陆，请先登陆");
       }


   }












}