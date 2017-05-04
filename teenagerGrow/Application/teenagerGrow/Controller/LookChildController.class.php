<?php
/**
 * Created by PhpStorm.
 * User: XH
 * Date: 2016/11/10
 * Time: 13:34
 */

namespace teenagerGrow\Controller;
use Think\Controller;

class LookChildController extends Controller
{
    /*包含所有儿童的信息的表格查询后台处理*/
    public function allChildList()
    {
        session_start();
        if (isset($_SESSION['userName'])) {
            $loginDoctor = $_SESSION['userName'];
            $user = M("BaseInformation");
            $info = $user->field("name,account,sex,birthYear,latestHeight,latestWeight,importTime,importPerson,latestUpdate")->select();
            $array = array("data" => $info);
            $this->ajaxReturn($array, "json");
        } else {
            $this->error("用户还未登陆，请先登陆");
        }

    }
    /*包含所有用户的孕期体检信息的表格查询后台处理*/
    public function allPregnancyRecordList(){
        $medicalID=$_SESSION["medicalID"];
        $user = M("PregnancyCheck");
        $info = $user->where("account='$medicalID'")->field("account,checkDate")->select();
        $array = array("data" => $info);
        $this->ajaxReturn($array, "json");
        }
    /*包含所有用户的婴儿访视信息的表格查询后台处理*/
    public function allVisitRecordList(){
        $medicalID=$_SESSION["medicalID"];
        $user = M("BabyVisit");
        $info = $user->where("account='$medicalID'")->field("account,checkDate,visitPersonName")->select();
        $array = array("data" => $info);
        $this->ajaxReturn($array, "json");
    }
    /*儿童家族病例史输出表格*/
    public function allFamilySickList(){
        $medicalID=$_SESSION["medicalID"];
        $user = M("ChildFamilySick");
        $info = $user->where("account='$medicalID'")->field("memberName,memberSex,sickName")->select();
        $array = array("data" => $info);
        $this->ajaxReturn($array, "json");

    }

    /*包含所有用户的儿童各个时期体检记录的表格查询后台处理*/
    public function allCheckRecordList(){
        $medicalID=$_SESSION["medicalID"];
        $dateForm=I("get.dateForm");
        $user = M($dateForm);
        $info = $user->where("account='$medicalID'")->field("account,age,checkDate")->select();
        $array = array("data" => $info);
        $this->ajaxReturn($array, "json");
    }

    /*将点击的要查看的儿童就诊号存入session中，便于后面的数据库操作*/
    public function saveMedicalID()
{
    $medicalID=I("post.medicalID");
    session_start();
    if($_SESSION["medicalID"]){
        session("medicalID",null);
        session("medicalID",$medicalID);
    }else{
        session("medicalID",$medicalID);
    }
    if($_SESSION["medicalID"]){
        $this->ajaxReturn($medicalID);
    }
}
    /*将点击的要查看的体检日期存入session中，便于后面的数据库操作*/
    public function saveCheckDate()
    {
        $checkDate=I("post.checkDate");
        session_start();
        if($_SESSION["checkDate"]){
            session("checkDate",null);
            session("checkDate",$checkDate);
        }else{
            session("checkDate",$checkDate);
        }
        if($_SESSION["checkDate"]){
            $this->ajaxReturn($checkDate);
        }
    }
    /*将点击的要查看的体检日期存入session中，便于后面的数据库操作*/
    public function saveMemberName()
    {
        $memberName=I("post.memberName");
        session_start();
        if($_SESSION["memberName"]){
            session("memberName",null);
            session("memberName",$memberName);
        }else{
            session("memberName",$memberName);
        }
        if($_SESSION["memberName"]){
            $this->ajaxReturn($memberName);
        }
    }

    /*显示对应儿童详细的各方面表格信息的后台处理*/
    public function showDetailInfo()
    {
        $medicalID = $_SESSION["medicalID"];
        $dataForm = I("post.dataForm");
        $user = M($dataForm);
        $info = $user->where("account='$medicalID'")->find();
        $this->ajaxReturn($info, "json");

    }
    /*显示详细体检记录的后台处理*/
    public function showDetailRecord()
    {
        $medicalID = $_SESSION["medicalID"];
        $checkDate=$_SESSION["checkDate"];
        $dataForm = I("post.dataForm");
        $user = M($dataForm);
        $info = $user->where("account='$medicalID'and checkDate='$checkDate'")->find();
        $this->ajaxReturn($info, "json");

    }
    /*显示对应体检记录的各方面表格信息的后台处理*/
    public function showCheckRecord(){
        $dateForm=I("post.dataForm");
        $medicalID=$_SESSION["medicalID"];
        $checkDate=$_SESSION["checkDate"];
        $user=M($dateForm);
        $info = $user->where("account='$medicalID'and checkDate='$checkDate'")->find();
        $this->ajaxReturn($info, "json");
    }

    /*显示家族病历上的表格处理后台*/
    public function showFamilySickRecord(){
        $medicalID=$_SESSION["medicalID"];
        $memberName=$_SESSION["memberName"];
        $user=M("ChildFamilySick");
        $info = $user->where("account='$medicalID'and memberName='$memberName'")->find();
        $this->ajaxReturn($info, "json");
    }
    /*各种记录的删除后台*/
    public function deleteCheckRecord(){
        $medicalID=$_SESSION["medicalID"];
        $checkDate=I("get.checkDate");
        $form=I("get.dataBaseForm");
            $dataCheck=A("DataCheck");
            $conn=$dataCheck->data_connect();
            if (!$conn) {
                 E('Could not connect to database.');
            }
            mysqli_query($conn,"SET NAMES 'utf8'");//设置数据库数据的编码，不加这一句中文字符无法正常显示
            $delete="delete from $form WHERE account='$medicalID'AND checkDate='$checkDate'";
            $result=mysqli_query($conn,$delete);
            if (!$result) {
                $this->error("记录删除失败，请重试");
            }else{
                $this->success("记录删除成功");
            }

    }
    /*家族病历史的删除后台*/
    public function deleteMemberSick(){
        $medicalID=$_SESSION["medicalID"];
        $memberName=$_SESSION["memberName"];
        $dataCheck=A("DataCheck");
        $conn=$dataCheck->data_connect();
        if (!$conn) {
            E('Could not connect to database.');
        }
        mysqli_query($conn,"SET NAMES 'utf8'");//设置数据库数据的编码，不加这一句中文字符无法正常显示
        $delete="delete from tg_child_family_sick WHERE account='$medicalID'AND memberName='$memberName'";
        $result=mysqli_query($conn,$delete);
        if (!$result) {
//            $this->error("记录删除失败，请重试");
            $back = array("icon" => 0);
        }else{
//            $this->success("记录删除成功");
            $back = array("icon" => 1);
        }
        $this->ajaxReturn($back);

    }

/*儿童的父亲信息存储修改后台处理*/
    public function childBaseInfoHandle()
    {
        $real_name = $_POST['real_name'];
        $sex = $_POST['sex'];
        $nation = $_POST['nation'];
        $birthday = $_POST['childBirthday'];
        $idCard = $_POST['idCard'];
        $medicalID = $_POST['medicalID'];
        $phone = $_POST['phone'];
        $height = $_POST['height'];
        $weight = $_POST['weight'];
        $city = $_POST['city'];
        $address = $_POST['address'];
        $medicalID=$_SESSION["medicalID"];
        if ($medicalID) {
            $dataCheck=A("DataCheck");
            $conn=$dataCheck->data_connect();
            if (!$conn) {
                E('Could not connect to database');
            }
            mysqli_query($conn, "SET NAMES 'utf8'");//设置数据库数据的编码，不加这一句中文字符无法正常显示
            $q = "select *from tg_base_information where account='$medicalID'";
            $result = mysqli_query($conn, $q);
            if ($result->num_rows > 0) {
                $date = date("Y-m-d", time());
                $mess = "update tg_base_information set name='$real_name',sex='$sex',nation='$nation',birthdate='$birthday',childPhone='$phone',childIDCard='$idCard',city='$city',address='$address',latestUpdate='$date'WHERE account='$medicalID' ";
                $last = mysqli_query($conn, $mess);
            }
            if (!$last) {
                $this->error("信息修改失败，请重试");
            }else{
                $this->success("信息修改成功");
            }
        } else {
            E('未获取到用户的就诊号，无法读取数据');
        }
    }
    /*儿童父亲信息处理后台页面*/
    public function fatherInfoHandle()
    {
        $fatherName = $_POST['fatherName'];
        $fatherBirthday=$_POST['fatherBirthday'];
        $fatherHeight = $_POST['fatherHeight'];
        $fatherWeight = $_POST['fatherWeight'];
        $fatherPhone = $_POST['fatherPhone'];
        $fatherEmail = $_POST['fatherEmail'];
        $fatherEducation=$_POST['fatherEducation'];
        $fatherJob=$_POST['fatherJob'];
        $fatherSmoke = $_POST['fatherSmoke'];
        $fatherDrink = $_POST['fatherDrink'];
        $income=$_POST['income'];
        $location=$_POST['location'];

        $medicalID=$_SESSION["medicalID"];
        if($medicalID) {
            $dataCheck=A("DataCheck");
            $conn=$dataCheck->data_connect();
            if (!$conn) {
                E('Could not connect to database.');
            }
            mysqli_query($conn,"SET NAMES 'utf8'");//设置数据库数据的编码，不加这一句中文字符无法正常显示
            $q = "select *from tg_base_information where account='$medicalID'";
            $result = mysqli_query($conn, $q);
            if ($result->num_rows > 0) {
                $date=date("Y-m-d",time());
                $mess="update tg_base_information set fatherName='$fatherName',fatherBirthday='$fatherBirthday',fatherPhone='$fatherPhone',fatherEmail='$fatherEmail',fatherEducation='$fatherEducation',fatherJob='$fatherJob',fatherSmoke='$fatherSmoke',fatherDrink='$fatherDrink',income='$income',location='$location',latestUpdate='$date'";
                //解决数据库内float数据类型存储遇到空值无法存入的问题，采用拼接判断，如果用户没提交父亲身高体重，则设为NULL。
                $mess=$dataCheck->decimalCheck($fatherHeight,$mess,"身高","fatherHeight");
                $mess=$dataCheck->decimalCheck($fatherWeight,$mess,"体重","fatherWeight");
                $nn=" WHERE account='$medicalID'";
                $messLast=$mess.$nn;
                // $mess="update base_information set fatherName='$fatherName',fatherBirthday='$fatherBirthYear.$fatherBirthMonth.$fatherBirthDay',fatherHeight='$fatherHeight',fatherWeight='$fatherWeight',fatherPhone='$fatherPhone',fatherEmail='$fatherEmail',fatherEducation='$fatherEducation',fatherJob='$fatherJob',fatherSmoke='$fatherSmoke',fatherDrink='$fatherDrink',income='$income',location='$location',latestUpdate='$date'WHERE account='$medicalID'";

                $last = mysqli_query($conn, $messLast);
            }
            if (!$last) {
                $this->error("信息修改失败，请重试");
            }else{
                $this->success("信息修改成功");
            }
        }
        else {
            E('未获取到用户的就诊号，无法读取数据');
        }
    }
    /*儿童母亲信息处理后台页面*/
    public function motherInfoHandle(){
        $motherName = $_POST['motherName'];
        $motherBirthday=$_POST['motherBirthday'];
        $motherHeight = $_POST['motherHeight'];
        $motherWeight = $_POST['motherWeight'];
        $motherPhone = $_POST['motherPhone'];
        $motherEmail = $_POST['motherEmail'];
        $motherEducation=$_POST['motherEducation'];
        $motherJob=$_POST['motherJob'];
        $motherSmoke = $_POST['motherSmoke'];
        $motherDrink = $_POST['motherDrink'];

        $medicalID=$_SESSION["medicalID"];
        if($medicalID) {
            $dataCheck=A("DataCheck");
            $conn=$dataCheck->data_connect();
            if (!$conn) {
                E('Could not connect to database.');
            }
            mysqli_query($conn,"SET NAMES 'utf8'");//设置数据库数据的编码，不加这一句中文字符无法正常显示
            $q = "select *from tg_base_information where account='$medicalID'";
            $result = mysqli_query($conn, $q);
            if ($result->num_rows > 0) {
                $date=date("Y-m-d",time());
                $mess="update tg_base_information set motherName='$motherName',motherBirthday='$motherBirthday',motherPhone='$motherPhone',motherEmail='$motherEmail',motherEducation='$motherEducation',motherJob='$motherJob',motherSmoke='$motherSmoke',motherDrink='$motherDrink',latestUpdate='$date'";
                //调用小数点检测函数，解决数据库内float数据类型存储遇到空值无法存入的问题，采用拼接判断，如果用户没提交母亲身高体重，则设为NULL。
                $mess=$dataCheck->decimalCheck($motherHeight,$mess,"身高","motherHeight");
                $mess=$dataCheck->decimalCheck($motherWeight,$mess,"体重","motherWeight");

                $nn=" WHERE account='$medicalID'";
                $messLast=$mess.$nn;
                // $mess="update base_information set fatherName='$fatherName',fatherBirthday='$fatherBirthYear.$fatherBirthMonth.$fatherBirthDay',fatherHeight='$fatherHeight',fatherWeight='$fatherWeight',fatherPhone='$fatherPhone',fatherEmail='$fatherEmail',fatherEducation='$fatherEducation',fatherJob='$fatherJob',fatherSmoke='$fatherSmoke',fatherDrink='$fatherDrink',income='$income',location='$location',latestUpdate='$date'WHERE account='$medicalID'";

                $last = mysqli_query($conn, $messLast);
            }
            if (!$last) {
                $this->error("信息修改失败，请重试");
            }else{
                $this->success("信息修改成功");
            }
        }
        else {
            E('未获取到用户的就诊号，无法读取数据');
        }
    }
    /*孕期情况信息处理后台页面*/
    public function pregnancyHandle(){
        $taici= $_POST['taici'];
        $chanci= $_POST['chanci'];
        $yunzhou = $_POST['yunzhou'];
        $tbDisease = $_POST['tbDisease'];
        $tbDiseaseType = $_POST['tbDiseaseType'];
        $vomit = $_POST['vomit'];
        $vomitStart = $_POST['vomitStart'];
        $vomitStop = $_POST['vomitStop'];
        $workTime = $_POST['workTime'];
        $exercise = $_POST['exercise'];
        $exerciseNumber=$_POST['exerciseNumber'];
        $exerciseTime=$_POST['exerciseTime'];
        $weightBeforePreg = $_POST['weightBeforePreg'];
        $weightAfterPreg = $_POST['weightAfterPreg'];
        $chronicBeforePreg = $_POST['chronicBeforePreg'];
        $chronicName = $_POST['chronicName'];
        $newDisease = $_POST['newDisease'];
        $diseaseName = $_POST['diseaseName'];
        $diseaseStart = $_POST['diseaseStart'];
        $eatMedical = $_POST['eatMedical'];
        $severeEvent = $_POST['severeEvent'];
        $lifeDetail = $_POST['lifeDetail'];

        $medicalID=$_SESSION["medicalID"];
        if($medicalID) {
            $dataCheck=A("DataCheck");
            $conn=$dataCheck->data_connect();
            if (!$conn) {
                E('Could not connect to database.');
            }
            mysqli_query($conn,"SET NAMES 'utf8'");//设置数据库数据的编码，不加这一句中文字符无法正常显示
            $q = "select *from tg_during_pregnancy where account='$medicalID'";
            $result = mysqli_query($conn, $q);
            if ($result->num_rows > 0) {
                $mess="update tg_during_pregnancy set taici='$taici',chanci='$chanci',weekOfPregnancy='$yunzhou',tbDisease='$tbDisease',tbDiseaseType='$tbDiseaseType',heavyVomiting='$vomit',weekOfStartVomit='$vomitStart',weekOfEndVomit='$vomitStop',workTimeDuringPregnancy='$workTime',exerciseDuringPregnancy='$exercise',exerciseNumberOfWeek='$exerciseNumber',AveExerciseTime='$exerciseTime',chronicDiseaseBeforePregnancy='$chronicBeforePreg',chronicDiseaseName='$chronicName',newDiseaseDuringPregnancy='$newDisease',newDiseaseName='$diseaseName',beginTimeOfNewDisease='$diseaseStart',eatMedicineDuringPregnancy='$eatMedical',severeEvent='$severeEvent',lifeDetail='$lifeDetail'";
                //调用小数点检测函数，解决数据库内float数据类型存储遇到空值无法存入的问题，采用拼接判断，如果用户没提交，则设为NULL。
                $mess=$dataCheck->decimalCheck($weightBeforePreg,$mess,"孕前体重","weightBeforePregnancy");
                $mess=$dataCheck->decimalCheck($weightAfterPreg,$mess,"孕后体重","weightAfterPregnancy");

                $nn=" WHERE account='$medicalID'";
                $messLast=$mess.$nn;
                // $mess="update base_information set fatherName='$fatherName',fatherBirthday='$fatherBirthYear.$fatherBirthMonth.$fatherBirthDay',fatherHeight='$fatherHeight',fatherWeight='$fatherWeight',fatherPhone='$fatherPhone',fatherEmail='$fatherEmail',fatherEducation='$fatherEducation',fatherJob='$fatherJob',fatherSmoke='$fatherSmoke',fatherDrink='$fatherDrink',income='$income',location='$location',latestUpdate='$date'WHERE account='$medicalID'";

                $last = mysqli_query($conn, $messLast);
            }
            if (!$last) {
                $this->error("信息修改失败，请重试");
            }else{
                $this->success("信息修改成功");
            }
        }
        else {
            E('未获取到用户的就诊号，无法读取数据');
        }
    }
    /*新增孕期体检记录处理后台页面*/
    public function addPregnancyRecordHandle(){
        $checkDate= $_POST['checkDate'];
        $bloodPressure= $_POST['bloodPressure'];
        $weight = $_POST['weight'];
        $fuwei = $_POST['fuwei'];
        $gonggao = $_POST['gonggao'];
        $taixin= $_POST['taixin'];
        $taidong = $_POST['taidong'];
        $Bchao = $_POST['Bchao'];
        $uterusForm = $_POST['uterusForm'];
        $ABNORMUTE = $_POST['ABNORMUTE'];
        $ovary=$_POST['ovary'];
        $ABNORMUTE_A=$_POST['ABNORMUTE_A'];
        $taipanSitua = $_POST['taipanSitua'];
        $ABNORMPLAC = $_POST['ABNORMPLAC'];
        $SD = $_POST['SD'];
        $BPD = $_POST['BPD'];
        $femurLength = $_POST['femurLength'];
        $AFV = $_POST['AFV'];

        if(empty($checkDate)){
            $this->error("必须填入体检日期才能生成新的体检记录");
        }

        if(empty($bloodPressure)){
            $bloodPressure=null;
        }
        if(empty($taixin)){
            $taixin=null;
        }
        if(empty($taidong)){
            $taidong=null;
        }
        if(empty($Bchao)){
            $Bchao=null;
        }
        if(empty($uterusForm)){
            $uterusForm=null;
        }
        if(empty($ABNORMUTE)){
            $ABNORMUTE=null;
        }
        if(empty($ovary)){
            $ovary=null;
        }
        if(empty($ABNORMUTE_A)){
            $ABNORMUTE_A=null;
        }
        if(empty($taipanSitua)){
            $taipanSitua=null;
        }
        if(empty($ABNORMPLAC)){
            $ABNORMPLAC=null;
        }
        $dataCheck=A("DataCheck");
        $weight=$dataCheck->decimailKeep($weight,"体重");
        $fuwei=$dataCheck->decimailKeep($fuwei,"腹围");
        $gonggao=$dataCheck->decimailKeep($gonggao,"宫高");
        $SD=$dataCheck->decimailKeep($SD,"脐动脉S/D");
        $BPD=$dataCheck->decimailKeep($BPD,"BPD");
        $femurLength=$dataCheck->decimailKeep($femurLength,"股骨长");
        $AFV=$dataCheck->decimailKeep($AFV,"羊水量");

        $medicalID=$_SESSION["medicalID"];
        if($medicalID&&$checkDate) {

            $conn=$dataCheck->data_connect();
            if (!$conn) {
                 E('Could not connect to database.');
            }
            mysqli_query($conn,"SET NAMES 'utf8'");//设置数据库数据的编码，不加这一句中文字符无法正常显示
            $p = "select *from tg_pregnancy_check where account='$medicalID'AND checkDate='$checkDate'";
            $end=mysqli_query($conn,$p);
            if($end->num_rows>0){
                $this->error("该日期的体检记录已存在，不能重复添加");
            }else{
                $mess="insert into tg_pregnancy_check (account,checkDate,bloodPressure,taixin,taidong,BChao,uterusForm,ABNORMUTE,ovarySituation,ABNORMUTE_A,placentaSituation,ABNORMPLAC,weight,fuwei,gonggao,femurLength,SD,BPD,AFV) VALUES ('$medicalID','$checkDate','$bloodPressure','$taixin','$taidong','$Bchao','$uterusForm','$ABNORMUTE','$ovary','$ABNORMUTE_A','$taipanSitua','$ABNORMPLAC','$weight','$fuwei','$gonggao','$femurLength','$SD','$BPD','$AFV')";

                $last = mysqli_query($conn, $mess);
            }
            if (!$last) {
                $this->error("新增检查记录失败，请重试");
            }else{
                $this->success("新增检查记录成功");
            }
        }
        else {
            E('未获取到用户的就诊号，无法读取数据');
        }
    }
    /*孕期体检记录修改后台*/
    public function pregnancyCheckHandle(){
        $checkDate= $_POST['checkDate'];
        $bloodPressure= $_POST['bloodPressure'];
        $weight = $_POST['weight'];
        $fuwei = $_POST['fuwei'];
        $gonggao = $_POST['gonggao'];
        $taixin= $_POST['taixin'];
        $taidong = $_POST['taidong'];
        $Bchao = $_POST['Bchao'];
        $uterusForm = $_POST['uterusForm'];
        $ABNORMUTE = $_POST['ABNORMUTE'];
        $ovary=$_POST['ovary'];
        $ABNORMUTE_A=$_POST['ABNORMUTE_A'];
        $taipanSitua = $_POST['taipanSitua'];
        $ABNORMPLAC = $_POST['ABNORMPLAC'];
        $SD = $_POST['SD'];
        $BPD = $_POST['BPD'];
        $femurLength = $_POST['femurLength'];
        $AFV = $_POST['AFV'];

        $medicalID=$_SESSION["medicalID"];
        $dataCheck=A("DataCheck");
        if($medicalID&&$checkDate) {
            $conn=$dataCheck->data_connect();
            if (!$conn) {
                E('Could not connect to database.');
            }
            mysqli_query($conn,"SET NAMES 'utf8'");//设置数据库数据的编码，不加这一句中文字符无法正常显示
            $q = "select *from tg_pregnancy_check where account='$medicalID'AND checkDate='$checkDate'";
            $result = mysqli_query($conn, $q);
            if ($result->num_rows > 0) {
                $mess="update tg_pregnancy_check set bloodPressure='$bloodPressure',taixin='$taixin',taidong='$taidong',BChao='$Bchao',uterusForm='$uterusForm',ABNORMUTE='$ABNORMUTE',ovarySituation='$ovary',ABNORMUTE_A='$ABNORMUTE_A',placentaSituation='$taipanSitua',ABNORMPLAC='$ABNORMPLAC'";
                //调用小数点检测函数，解决数据库内float数据类型存储遇到空值无法存入的问题，采用拼接判断，如果用户没提交，则设为NULL。
                $mess=$dataCheck->decimalCheck($weight,$mess,"体重","weight");
                $mess=$dataCheck->decimalCheck($fuwei,$mess,"腹围","fuwei");
                $mess=$dataCheck->decimalCheck($gonggao,$mess,"腹围","gonggao");
                $mess=$dataCheck->decimalCheck($femurLength,$mess,"股骨长","femurLength");
                $mess=$dataCheck->decimalCheck($SD,$mess,"SD","SD");
                $mess=$dataCheck->decimalCheck($BPD,$mess,"BPD","BPD");
                $mess=$dataCheck->decimalCheck($AFV,$mess,"AFV","AFV");


                $nn=" WHERE account='$medicalID' AND checkDate='$checkDate'";
                $messLast=$mess.$nn;
                $last = mysqli_query($conn, $messLast);
            }
            if (!$last) {
                $this->error("信息修改失败，请重试");
            }else{
                $this->success("信息修改成功");
            }
        }
        else {
            E('未获取到用户的就诊号或体检日期，无法读取数据');
        }
    }
    /*孕期体检记录修改后台*/
    public function childBornHandle(){
        $bornPlace = $_POST['bornPlace'];
        $bornStyle = $_POST['bornStyle'];
        $motherName = $_POST['motherName'];
        $taishu= $_POST['taishu'];
        $tailing=$_POST['tailing'];
        $bornWeight = $_POST['bornWeight'];
        $bornHeight = $_POST['bornHeight'];
        $touwei=$_POST['touwei'];
        $WGA=$_POST['WGA'];
        $APGAR1=$_POST['APGAR1'];
        $APGAR5=$_POST['APGAR5'];
        $bornDisease=$_POST['bornDisease'];
        $A10A=$_POST['A10A'];
        $taipanProblem=$_POST['taipanProblem'];
        $qidaiProblem=$_POST['qidaiProblem'];
        $yangshuiProblem=$_POST["yangshuiProblem"];
        $ALT_A=$_POST["ALT_A"];
        $APOA1_B=$_POST["APOA1_B"];
        $APOB_B=$_POST["APOB_B"];
        $CT_A =$_POST['CT_A'];
        $GH_A =$_POST['GH_A'];
        $HDLCH_A=$_POST["HDLCH_A"];
        $CRP=$_POST["CRP"];
        $insulin_A=$_POST["insulin_A"];
        $LDLCH_A=$_POST["LDLCH_A"];
        $a_B=$_POST["a_B"];
        $dgc_B=$_POST["dgc_B"];
        $gysz_B=$_POST["gysz_B"];
        $ns_A=$_POST["ns_A"];
        $bloodSugar=$_POST["bloodSugar"];
        $hemoglobin=$_POST["hemoglobin"];

        $medicalID=$_SESSION["medicalID"];
        $dataCheck=A("DataCheck");
        if($medicalID) {
            $conn=$dataCheck->data_connect();
            if (!$conn) {
                 E('Could not connect to database.');
            }
            mysqli_query($conn,"SET NAMES 'utf8'");//设置数据库数据的编码，不加这一句中文字符无法正常显示
            $q = "select *from tg_child_born where account='$medicalID'";
            $result = mysqli_query($conn, $q);
            if ($result->num_rows > 0) {
                $mess="update tg_child_born set bornPlace='$bornPlace',bornStyle='$bornStyle',motherName='$motherName',taishu='$taishu',tailing='$tailing',WGA='$WGA',APGAR1='$APGAR1',APGAR5='$APGAR5',congenitalDisease='$bornDisease',A10A='$A10A',placentalProblem='$taipanProblem',umbilicalCordProblem='$qidaiProblem',AFProblem='$yangshuiProblem',ALT_A='$ALT_A',APOA1_B='$APOA1_B',APOB_B='$APOB_B',CT_A='$CT_A',GH_A='$GH_A',HDLCH_A='$HDLCH_A',CRP='$CRP',insulin_A='$insulin_A',LDLCH_A='$LDLCH_A',a_B='$a_B',cholesterol_B='$dgc_B',triglyceride_B='$gysz_B',uricAcid_A='$ns_A',bloodSugar='$bloodSugar',hemoglobin='$hemoglobin'";

                //调用小数点检测函数，解决数据库内float数据类型存储遇到空值无法存入的问题，采用拼接判断，如果用户没提交，则设为NULL。
                $mess=$dataCheck->decimalCheck($bornHeight,$mess,"身长","bornHeight");
                $mess=$dataCheck->decimalCheck($bornWeight,$mess,"体重","bornWeight");
                $mess=$dataCheck->decimalCheck($touwei,$mess,"头围","touwei");
                $nn=" WHERE account='$medicalID'";
                $messLast=$mess.$nn;
                // $mess="update base_information set fatherName='$fatherName',fatherBirthday='$fatherBirthYear.$fatherBirthMonth.$fatherBirthDay',fatherHeight='$fatherHeight',fatherWeight='$fatherWeight',fatherPhone='$fatherPhone',fatherEmail='$fatherEmail',fatherEducation='$fatherEducation',fatherJob='$fatherJob',fatherSmoke='$fatherSmoke',fatherDrink='$fatherDrink',income='$income',location='$location',latestUpdate='$date'WHERE account='$medicalID'";

                $last = mysqli_query($conn, $messLast);
            }
            if (!$last) {
                $this->error("信息修改失败，请重试");
            }else{
                $this->success("信息修改成功");
            }
        }
        else {
            E('未获取到用户的就诊号，无法读取数据');
        }

    }

    public function babyVisitHandle(){
        $visitDate = $_POST['visitDate'];
        $visitPlace = $_POST['visitPlace'];
        $visitPersonName = $_POST['visitPersonName'];
        $fromMedical = $_POST['fromMedical'];
        $major=$_POST["major"];
        $title=$_POST["title"];
        $receptionPerson =$_POST['receptionPerson'];
        $identity=$_POST["identity"];
        $homeEnvironment =$_POST['homeEnvironment'];
        $bornSituation=$_POST['bornSituation'];
        $vaccinateSituation=$_POST["vaccinateSituation"];
        $diseaseCheck = $_POST['diseaseCheck'];
        $jiadi = $_POST['jiadi'];
        $PKU = $_POST['PKU'];
        $feedStyle = $_POST['feedStyle'];
        $feedNumber = $_POST['feedNumber'];
        $feedAmount = $_POST['feedAmount'];
        $spitMilk = $_POST['spitMilk'];
        $sleepTime = $_POST['sleepTime'];
        $startle = $_POST['startle'];
        $cry = $_POST['cry'];
        $twitch = $_POST['twitch'];
        $shitNumber= $_POST['shitNumber'];
        $shitColor = $_POST['shitColor'];
        $shitShape = $_POST['shitShape'];
        $mucus= $_POST['mucus'];
        $pusAndBlood = $_POST['pusAndBlood'];
        $valve = $_POST['valve'];
        $growSituation = $_POST['growSituation'];
        $jaundiceSituation = $_POST['jaundiceSituation'];
        $navelSituation = $_POST['navelSituation'];
        $oralCavity = $_POST['oralCavity'];
        $harelip = $_POST['harelip'];
        $cleftpalate = $_POST['cleftpalate'];
        $bornWeight = $_POST['bornWeight'];
        $visitWeight = $_POST['visitWeight' ];
        $bornHeight = $_POST['bornHeight'];
        $visitHeight = $_POST['visitHeight'];
        $bornTouwei = $_POST['bornTouwei'];
        $visitTouwei = $_POST['visitTouwei'];
        $qiancong = $_POST['qiancong'];
        $lufeng = $_POST['lufeng'];
        $houcong = $_POST['houcong'];
        $toupixuezhong = $_POST['toupixuezhong'];
        $chanshang = $_POST['chanshang'];
        $skinColor = $_POST['skinColor'];
        $temperature = $_POST['temperature'];
        $breath = $_POST['breath'];
        $heartRate = $_POST['heartRate'];
        $heartCheck = $_POST['heartCheck'];
        $lungCheck = $_POST['lungCheck'];
        $abdomenCheck = $_POST['abdomenCheck'];
        $genitalMal = $_POST['genitalMal'];
        $limbActivity = $_POST['limbActivity'];

        $medicalID=$_SESSION["medicalID"];
        $dataCheck=A("DataCheck");
        if($medicalID&&$visitDate) {
            $conn = $dataCheck->data_connect();
            if (!$conn) {
               E('Could not connect to database.');
            }
            mysqli_query($conn,"SET NAMES 'utf8'");//设置数据库数据的编码，不加这一句中文字符无法正常显示
            $q = "select *from tg_baby_visit where account='$medicalID'AND checkDate='$visitDate'";
            $result = mysqli_query($conn, $q);
            if ($result->num_rows > 0) {
                $mess="update tg_baby_visit set visitPlace='$visitPlace',visitPersonName='$visitPersonName',fromMedical='$fromMedical',major='$major',title='$title',receptionPerson='$receptionPerson',identity='$identity',homeEnvironment='$homeEnvironment',bornSituation='$bornSituation',vaccinateSituation='$vaccinateSituation',diseaseCheck='$diseaseCheck',jiadi='$jiadi',PKU='$PKU',feedStyle='$feedStyle',feedNumber='$feedNumber',feedAmount='$feedAmount',spitMilk='$spitMilk',sleepTime='$sleepTime',startle='$startle',cry='$cry',twitch='$twitch',shitNumber='$shitNumber',shitColor='$shitColor',shitShape='$shitShape',mucus='$mucus',pusAndBlood='$pusAndBlood',valve='$valve',growSituation='$growSituation',jaundiceSituation='$jaundiceSituation',navelSituation='$navelSituation',oralCavity='$oralCavity',harelip='$harelip',cleftpalate='$cleftpalate',lufeng='$lufeng',toupixuezhong='$toupixuezhong',chanshang='$chanshang',skinColor='$skinColor',temperature='$temperature',breath='$breath',heartRate='$heartRate',heartCheck='$heartCheck',lungCheck='$lungCheck',abdomenCheck='$abdomenCheck',genitalMal='$genitalMal',limbActivity='$limbActivity'";

                //调用小数点检测函数，解决数据库内float数据类型存储遇到空值无法存入的问题，采用拼接判断，如果用户没提交，则设为NULL。
                $mess=$dataCheck->decimalCheck($bornWeight,$mess,"出生时体重","bornWeight");
                $mess=$dataCheck->decimalCheck($visitWeight,$mess,"访视时体重","visitWeight");
                $mess=$dataCheck->decimalCheck($bornHeight,$mess,"出生时身高","bornHeight");
                $mess=$dataCheck->decimalCheck($visitHeight,$mess,"访视时身高","visitHeight");
                $mess=$dataCheck->decimalCheck($bornTouwei,$mess,"出生时头围","bornTouwei");
                $mess=$dataCheck->decimalCheck($visitTouwei,$mess,"访视时头围","visitTouwei");
                $mess=$dataCheck->decimalCheck($qiancong,$mess,"前囱","qiancong");
                $mess=$dataCheck->decimalCheck($houcong,$mess,"后囱","houcong");

                $nn=" WHERE account='$medicalID' AND checkDate='$visitDate'";
                $messLast=$mess.$nn;
                $last = mysqli_query($conn, $messLast);
            }
            if (!$last) {
                $this->error("信息修改失败，请重试");
            }else{
                $this->success("信息修改成功");
            }
        }
        else {
            E('未获取到用户的就诊号或体检日期，无法读取数据');
        }
    }

    public function addBabyVisitRecordHandle(){
        $visitDate = $_POST['visitDate'];
        $visitPlace = $_POST['visitPlace'];
        $visitPersonName = $_POST['visitPersonName'];
        $fromMedical = $_POST['fromMedical'];
        $major=$_POST["major"];
        $title=$_POST["title"];
        $receptionPerson =$_POST['receptionPerson'];
        $identity=$_POST["identity"];
        $homeEnvironment =$_POST['homeEnvironment'];
        $bornSituation=$_POST['bornSituation'];
        $vaccinateSituation=$_POST["vaccinateSituation"];
        $diseaseCheck = $_POST['diseaseCheck'];
        $jiadi = $_POST['jiadi'];
        $PKU = $_POST['PKU'];
        $feedStyle = $_POST['feedStyle'];
        $feedNumber = $_POST['feedNumber'];
        $feedAmount = $_POST['feedAmount'];
        $spitMilk = $_POST['spitMilk'];
        $sleepTime = $_POST['sleepTime'];
        $startle = $_POST['startle'];
        $cry = $_POST['cry'];
        $twitch = $_POST['twitch'];
        $shitNumber= $_POST['shitNumber'];
        $shitColor = $_POST['shitColor'];
        $shitShape = $_POST['shitShape'];
        $mucus= $_POST['mucus'];
        $pusAndBlood = $_POST['pusAndBlood'];
        $valve = $_POST['valve'];
        $growSituation = $_POST['growSituation'];
        $jaundiceSituation = $_POST['jaundiceSituation'];
        $navelSituation = $_POST['navelSituation'];
        $oralCavity = $_POST['oralCavity'];
        $harelip = $_POST['harelip'];
        $cleftpalate = $_POST['cleftpalate'];
        $bornWeight = $_POST['bornWeight'];
        $visitWeight = $_POST['visitWeight' ];
        $bornHeight = $_POST['bornHeight'];
        $visitHeight = $_POST['visitHeight'];
        $bornTouwei = $_POST['bornTouwei'];
        $visitTouwei = $_POST['visitTouwei'];
        $qiancong = $_POST['qiancong'];
        $lufeng = $_POST['lufeng'];
        $houcong = $_POST['houcong'];
        $toupixuezhong = $_POST['toupixuezhong'];
        $chanshang = $_POST['chanshang'];
        $skinColor = $_POST['skinColor'];
        $temperature = $_POST['temperature'];
        $breath = $_POST['breath'];
        $heartRate = $_POST['heartRate'];
        $heartCheck = $_POST['heartCheck'];
        $lungCheck = $_POST['lungCheck'];
        $abdomenCheck = $_POST['abdomenCheck'];
        $genitalMal = $_POST['genitalMal'];
        $limbActivity = $_POST['limbActivity'];

        if(empty($visitDate)){
            $this->error("必须填入访视日期才能生成新的访视记录");
        }

        if(empty($visitPersonName)){
            $visitPersonName=null;
        }
        if(empty($visitPlace)){
            $visitPlace=null;
        }
        if(empty($fromMedical)){
            $fromMedical=null;
        }
        if(empty($major)){
            $major=null;
        }
        if(empty($title)){
            $title=null;
        }
        if(empty($receptionPerson)){
            $receptionPerson=null;
        }
        if(empty($identity)){
            $identity=null;
        }
        if(empty($homeEnvironment)){
            $homeEnvironment=null;
        }
        if(empty($bornSituation)){
            $bornSituation=null;
        }
        if(empty($vaccinateSituation)){
            $vaccinateSituation=null;
        }
        if(empty($diseaseCheck)){
            $diseaseCheck=null;
        }
        if(empty($jiadi)){
            $jiadi=null;
        }
        if(empty($PKU)){
            $PKU=null;
        }
        if(empty($feedStyle)){
            $feedStyle=null;
        }
        if(empty($feedNumber)){
            $feedNumber=null;
        }
        if(empty($feedAmount)){
            $feedAmount=null;
        }
        if(empty($spitMilk)){
            $spitMilk=null;
        }
        if(empty($sleepTime)){
            $sleepTime=null;
        }
        if(empty($startle)){
            $startle=null;
        }
        if(empty($cry)){
            $cry=null;
        }
        if(empty($twitch)){
            $twitch=null;
        }
        if(empty($shitNumber)){
            $shitNumber=null;
        }
        if(empty($shitColor)){
            $shitColor=null;
        }
        if(empty($shitShape)){
            $shitShape=null;
        }if(empty($mucus)){
            $mucus=null;
        }
        if(empty($pusAndBlood)){
            $pusAndBlood=null;
        }
        if(empty($valve)){
            $valve=null;
        }
        if(empty($growSituation)){
            $growSituation=null;
        }
        if(empty($jaundiceSituation)){
            $jaundiceSituation=null;
        }
        if(empty($navelSituation)){
            $navelSituation=null;
        }
        if(empty($oralCavity)){
            $oralCavity=null;
        }
        if(empty($harelip)){
            $harelip=null;
        }
        if(empty($cleftpalate)){
            $cleftpalate=null;
        }
        if(empty($lufeng)){
            $lufeng=null;
        }
        if(empty($toupixuezhong)){
            $toupixuezhong=null;
        }
        if(empty($chanshang)){
            $chanshang=null;
        }
        if(empty($skinColor)){
            $skinColor=null;
        }
        if(empty($temperature)){
            $temperature=null;
        }
        if(empty($breath)){
            $breath=null;
        }
        if(empty($heartRate)){
            $heartRate=null;
        }
        if(empty($heartCheck)){
            $heartCheck=null;
        }
        if(empty($lungCheck)){
            $lungCheck=null;
        }
        if(empty($abdomenCheck)){
            $abdomenCheck=null;
        }
        if(empty($genitalMal)){
            $genitalMal=null;
        }
        if(empty($limbActivity)){
            $limbActivity=null;
        }


        $dataCheck=A("DataCheck");
        $bornWeight=$dataCheck->decimailKeep($bornWeight,"出生时体重");
        $visitWeight=$dataCheck->decimailKeep($visitWeight,"访视时体重");
        $bornHeight=$dataCheck->decimailKeep($bornHeight,"出生时身高");
        $visitHeight=$dataCheck->decimailKeep($visitHeight,"访视时身高");
        $bornTouwei=$dataCheck->decimailKeep($bornTouwei,"出生时头围");
        $visitTouwei=$dataCheck->decimailKeep($visitTouwei,"访视时头围");
        $qiancong=$dataCheck->decimailKeep($qiancong,"前囱");
        $houcong=$dataCheck->decimailKeep($houcong,"后囱");

        $medicalID=$_SESSION["medicalID"];
        if($medicalID&&$visitDate) {
            $conn =$dataCheck->data_connect();
            if (!$conn) {
                 E('Could not connect to database.');
            }
            mysqli_query($conn,"SET NAMES 'utf8'");//设置数据库数据的编码，不加这一句中文字符无法正常显示
            $p = "select *from tg_baby_visit where account='$medicalID'AND visitDate='$visitDate'";
            $end=mysqli_query($conn,$p);
            if($end->num_rows>0){
                $this->error("该日期的访视记录已存在，不能重复添加");
            }else{
                $mess="insert into tg_baby_visit (account,checkDate,visitPlace,visitPersonName,fromMedical,major,title,receptionPerson,identity,homeEnvironment,bornSituation,vaccinateSituation,diseaseCheck,jiadi,PKU,feedStyle,feedNumber,feedAmount,spitMilk,sleepTime,startle,cry,twitch,shitNumber,shitColor,shitShape,mucus,pusAndBlood,valve,growSituation,jaundiceSituation,navelSituation,oralCavity,harelip,cleftpalate,bornWeight,visitWeight,bornHeight,visitHeight,bornTouwei,visitTouwei,qiancong,lufeng,houcong,toupixuezhong,chanshang,skinColor,temperature,breath,heartRate,heartCheck,lungCheck,abdomenCheck,genitalMal,limbActivity) VALUES ('$medicalID','$visitDate','$visitPlace','$visitPersonName','$fromMedical','$major','$title','$receptionPerson','$identity','$homeEnvironment','$bornSituation','$vaccinateSituation','$diseaseCheck','$jiadi','$PKU','$feedStyle','$feedNumber','$feedAmount','$spitMilk','$sleepTime','$startle','$cry','$twitch','$shitNumber','$shitColor','$shitShape','$mucus','$pusAndBlood','$valve','$growSituation','$jaundiceSituation','$navelSituation','$oralCavity','$harelip','$cleftpalate','$bornWeight','$visitWeight','$bornHeight','$visitHeight','$bornTouwei','$visitTouwei','$qiancong','$lufeng','$houcong','$toupixuezhong','$chanshang','$skinColor','$temperature','$breath','$heartRate','$heartCheck','$lungCheck','$abdomenCheck','$genitalMal','$limbActivity')";
                $last = mysqli_query($conn, $mess);
            }
            if (!$last) {
                $this->error("新增访视记录失败，请重试");
            }else{
                $this->success("新增访视记录成功");
            }
        }
        else {
            E('未获取到用户的就诊号，无法读取数据');
        }

    }

    public function underThreeCheckHandle(){
        $checkDate = $_POST['checkDate'];
        $age = $_POST['age'];
        $checkPlace = $_POST['checkPlace'];
        $checkPersonName = $_POST['checkPersonName'];
        $checkPersonTitle=$_POST["checkPersonTitle"];
        $weight=$_POST["weight"];
        $weightRank =$_POST['weightRank'];
        $height=$_POST["height"];
        $heightRank =$_POST['heightRank'];
        $touwei =$_POST['touwei'];
        $xiongwei=$_POST["xiongwei"];
        $fuwei = $_POST['fuwei'];
        $qiancong = $_POST['qiancong'];
        $complexion = $_POST['complexion'];
        $shangbiwei = $_POST['shangbiwei'];
        $fubuFold = $_POST['fubuFold'];
        $teethNumber = $_POST['teethNumber'];
        $signOfRickets = $_POST['signOfRickets'];
        $signOfAnemia = $_POST['signOfAnemia'];
        $heartAndLung = $_POST['heartAndLung'];
        $abdomen = $_POST['abdomen'];
        $limb = $_POST['limb'];
        $feedCondition = $_POST['feedCondition'];
        $sleepCondition = $_POST['sleepCondition'];
        $bloodRoutine= $_POST['bloodRoutine'];
        $liverFunction = $_POST['liverFunction'];
        $stoolRoutine = $_POST['stoolRoutine'];
        $healthyEducation = $_POST['healthyEducation'];
        $vaccination = $_POST['vaccination'];

        $medicalID=$_SESSION["medicalID"];
        $dataCheck=A("DataCheck");
        if($medicalID&&$checkDate) {
            $conn = $dataCheck->data_connect();
            if (!$conn) {
                E('Could not connect to database.');
            }
            mysqli_query($conn,"SET NAMES 'utf8'");//设置数据库数据的编码，不加这一句中文字符无法正常显示
            $q = "select *from tg_three_before where account='$medicalID'AND checkDate='$checkDate'";
            $result = mysqli_query($conn, $q);
            if ($result->num_rows > 0) {
                $mess="update tg_three_before set age='$age',checkPlace='$checkPlace',checkPersonName='$checkPersonName',checkPersonTitle='$checkPersonTitle',weightRank='$weightRank',heightRank='$heightRank',complexion='$complexion',abdominalFold='$fubuFold',teethNumber='$teethNumber',signOfRickets='$signOfRickets',signOfAnemia='$signOfAnemia',heartAndLung='$heartAndLung',abdomen='$abdomen',limb='$limb',feedCondition='$feedCondition',sleepCondition='$sleepCondition',bloodRoutine='$bloodRoutine',liverFunction='$liverFunction',stoolRoutine='$stoolRoutine',healthyEducation='$healthyEducation',vaccination='$vaccination'";

                //调用小数点检测函数，解决数据库内float数据类型存储遇到空值无法存入的问题，采用拼接判断，如果用户没提交，则设为NULL。
                $mess=$dataCheck->decimalCheck($weight,$mess,"体重","babyWeight");
                $mess=$dataCheck->decimalCheck($fuwei,$mess,"腹围","fuwei");
                $mess=$dataCheck->decimalCheck($height,$mess,"身高","babyHeight");
                $mess=$dataCheck->decimalCheck($touwei,$mess,"头围","touwei");
                $mess=$dataCheck->decimalCheck($xiongwei,$mess,"胸围","xiongwei");
                $mess=$dataCheck->decimalCheck($qiancong,$mess,"前囱","qiancong");
                $mess=$dataCheck->decimalCheck($shangbiwei,$mess,"上臂围","shangbiwei");

                $nn=" WHERE account='$medicalID' AND checkDate='$checkDate'";
                $messLast=$mess.$nn;
                $last = mysqli_query($conn, $messLast);
            }
            if (!$last) {
                $this->error("信息修改失败，请重试");
            }else{
                $this->success("信息修改成功");
            }
        }
        else {
            E('未获取到用户的就诊号或体检日期，无法读取数据');
        }
    }

    public function addUnderThreeCheckRecordHandle(){
        $checkDate = $_POST['checkDate'];
        $age = $_POST['age'];
        $checkPlace = $_POST['checkPlace'];
        $checkPersonName = $_POST['checkPersonName'];
        $checkPersonTitle=$_POST["checkPersonTitle"];
        $weight=$_POST["weight"];
        $weightRank =$_POST['weightRank'];
        $height=$_POST["height"];
        $heightRank =$_POST['heightRank'];
        $touwei =$_POST['touwei'];
        $xiongwei=$_POST["xiongwei"];
        $fuwei = $_POST['fuwei'];
        $qiancong = $_POST['qiancong'];
        $complexion = $_POST['complexion'];
        $shangbiwei = $_POST['shangbiwei'];
        $fubuFold = $_POST['fubuFold'];
        $teethNumber = $_POST['teethNumber'];
        $signOfRickets = $_POST['signOfRickets'];
        $signOfAnemia = $_POST['signOfAnemia'];
        $heartAndLung = $_POST['heartAndLung'];
        $abdomen = $_POST['abdomen'];
        $limb = $_POST['limb'];
        $feedCondition = $_POST['feedCondition'];
        $sleepCondition = $_POST['sleepCondition'];
        $bloodRoutine= $_POST['bloodRoutine'];
        $liverFunction = $_POST['liverFunction'];
        $stoolRoutine = $_POST['stoolRoutine'];
        $healthyEducation = $_POST['healthyEducation'];
        $vaccination = $_POST['vaccination'];

        if(empty($checkDate)){
            $this->error("必须填入检查日期才能生成新的体检记录");
        }

        if(empty($age)){
            $this->error("年龄是必填项，请填写对应体检年龄");
        }
        if(empty($checkPlace)){
            $checkPlace=null;
        }
        if(empty($checkPersonName)){
            $checkPersonName=null;
        }
        if(empty($checkPersonTitle)){
            $checkPersonTitle=null;
        }
        if(empty($weightRank)){
            $weightRank=null;
        }
        if(empty($heightRank)){
            $heightRank=null;
        }
        if(empty($complexion)){
            $complexion=null;
        }
        if(empty($fubuFold)){
            $fubuFold=null;
        }
        if(empty($teethNumber)){
            $teethNumber=null;
        }
        if(empty($signOfRickets)){
            $signOfRickets=null;
        }
        if(empty($signOfAnemia)){
            $signOfAnemia=null;
        }
        if(empty($heartAndLung)){
            $heartAndLung=null;
        }
        if(empty($abdomen)){
            $abdomen=null;
        }
        if(empty($limb)){
            $limb=null;
        }
        if(empty($feedCondition)){
            $feedCondition=null;
        }
        if(empty($sleepCondtion)){
            $sleepCondtion=null;
        }
        if(empty($bloodRoutine)){
            $bloodRoutine=null;
        }
        if(empty($liverFunction)){
            $liverFunction=null;
        }
        if(empty($stoolRoutine)){
            $stoolRoutine=null;
        }
        if(empty($healthyEducation)){
            $healthyEducation=null;
        }
        if(empty($vaccination)){
            $vaccination=null;
        }
        $dataCheck=A("DataCheck");
        $weight=$dataCheck->decimailKeep($weight,"体重");
        $height=$dataCheck->decimailKeep($height,"身高");
        $touwei=$dataCheck->decimailKeep($touwei,"头围");
        $xiongwei=$dataCheck->decimailKeep($xiongwei,"胸围");
        $fuwei=$dataCheck->decimailKeep($fuwei,"腹围");
        $qiancong=$dataCheck->decimailKeep($qiancong,"前囱");
        $shangbiwei=$dataCheck->decimailKeep($shangbiwei,"上臂围");

        $medicalID=$_SESSION["medicalID"];
        if($medicalID&&$checkDate&&$age) {
            $conn = $dataCheck->data_connect();
            if (!$conn) {
                 E('Could not connect to database.');
            }
            mysqli_query($conn,"SET NAMES 'utf8'");//设置数据库数据的编码，不加这一句中文字符无法正常显示
            $p = "select *from tg_three_before where account='$medicalID'AND checkDate='$checkDate'";
            $end=mysqli_query($conn,$p);
            if($end->num_rows>0){
                $this->error("该日期的体检记录已存在，不能重复添加");
            }else{
                $mess="insert into tg_three_before (account,age,checkDate,checkPlace,checkPersonName,checkPersonTitle,babyWeight,weightRank,babyHeight,heightRank,touwei,xiongwei,fuwei,qiancong,complexion,shangbiwei,abdominalFold,teethNumber,signOfRickets,signOfAnemia,heartAndLung,abdomen,limb,feedCondition,sleepCondition,bloodRoutine,liverFunction,stoolRoutine,healthyEducation,vaccination) VALUES ('$medicalID','$age','$checkDate','$checkPlace','$checkPersonName','$checkPersonTitle','$weight','$weightRank','$height','$heightRank','$touwei','$xiongwei','$fuwei','$qiancong','$complexion','$shangbiwei','$fubuFold','$teethNumber','$signOfRickets','$signOfAnemia','$heartAndLung','$abdomen','$limb','$feedCondition','$sleepCondition','$bloodRoutine','$liverFunction','$stoolRoutine','$healthyEducation','$vaccination')";
                $last = mysqli_query($conn, $mess);
            }
            if (!$last) {
                $this->error("新增体检记录失败，请重试");
            }else{
                $this->success("新增体检记录成功");
            }
        }
        else {
            E('未获取到用户的就诊号或体检日期或体检年龄，无法读取数据');
        }

    }

    public function preSchoolCheckHandle(){
        $checkDate = $_POST['checkDate'];
        $age = $_POST['age'];
        $checkPlace = $_POST['checkPlace'];
        $checkPersonName = $_POST['checkPersonName'];
        $checkPersonTitle=$_POST["checkPersonTitle"];
        $weight=$_POST["weight"];
        $weightRank =$_POST['weightRank'];
        $height=$_POST["height"];
        $heightRank =$_POST['heightRank'];
        $touwei =$_POST['touwei'];
        $WHtR=$_POST["WHtR"];
        $fuwei = $_POST['fuwei'];
        $complexion = $_POST['complexion'];
        $shangbiwei = $_POST['shangbiwei'];
        $fubuFold = $_POST['fubuFold'];
        $teethNumber = $_POST['teethNumber'];
        $vision=$_POST['vision'];
        $signOfRickets = $_POST['signOfRickets'];
        $signOfAnemia = $_POST['signOfAnemia'];
        $heartAndLung = $_POST['heartAndLung'];
        $abdomen = $_POST['abdomen'];
        $limb = $_POST['limb'];
        $eatCondition = $_POST['eatCondition'];
        $sleepCondition = $_POST['sleepCondition'];
        $mentalBehavior=$_POST['mentalBehavior'];
        $bloodRoutine= $_POST['bloodRoutine'];
        $liverFunction = $_POST['liverFunction'];
        $stoolRoutine = $_POST['stoolRoutine'];
        $healthyEducation = $_POST['healthyEducation'];
        $vaccination = $_POST['vaccination'];

        $medicalID=$_SESSION["medicalID"];
        $dataCheck=A("DataCheck");
        if($medicalID&&$checkDate) {
            $conn = $dataCheck->data_connect();
            if (!$conn) {
                E('Could not connect to database.');
            }
            mysqli_query($conn,"SET NAMES 'utf8'");//设置数据库数据的编码，不加这一句中文字符无法正常显示
            $q = "select *from tg_preschool_age where account='$medicalID'AND checkDate='$checkDate'";
            $result = mysqli_query($conn, $q);
            if ($result->num_rows > 0) {
                $mess="update tg_preschool_age set age='$age',checkPlace='$checkPlace',checkPersonName='$checkPersonName',checkPersonTitle='$checkPersonTitle',weightRank='$weightRank',heightRank='$heightRank',complexion='$complexion',abdominalFold='$fubuFold',teethNumber='$teethNumber',vision='$vision',signOfRickets='$signOfRickets',signOfAnemia='$signOfAnemia',heartAndLung='$heartAndLung',abdomen='$abdomen',limb='$limb',eatCondition='$eatCondition',sleepCondition='$sleepCondition',mentalBehavior='$mentalBehavior',bloodRoutine='$bloodRoutine',liverFunction='$liverFunction',stoolRoutine='$stoolRoutine',healthyEducation='$healthyEducation',vaccination='$vaccination'";

                //调用小数点检测函数，解决数据库内float数据类型存储遇到空值无法存入的问题，采用拼接判断，如果用户没提交，则设为NULL。
                $mess=$dataCheck->decimalCheck($weight,$mess,"体重","babyWeight");
                $mess=$dataCheck->decimalCheck($fuwei,$mess,"腹围","fuwei");
                $mess=$dataCheck->decimalCheck($height,$mess,"身高","babyHeight");
                $mess=$dataCheck->decimalCheck($touwei,$mess,"头围","touwei");
                $mess=$dataCheck->decimalCheck($WHtR,$mess,"腰高比","WHtR");
                $mess=$dataCheck->decimalCheck($shangbiwei,$mess,"上臂围","shangbiwei");

                $nn=" WHERE account='$medicalID' AND checkDate='$checkDate'";
                $messLast=$mess.$nn;
                $last = mysqli_query($conn, $messLast);
            }
            if (!$last) {
                $this->error("信息修改失败，请重试");
            }else{
                $this->success("信息修改成功");
            }
        }
        else {
            E('未获取到用户的就诊号或体检日期，无法读取数据');
        }
    }

    public function addSchoolBeforeCheckRecordHandle(){
        $checkDate = $_POST['checkDate'];
        $age = $_POST['age'];
        $checkPlace = $_POST['checkPlace'];
        $checkPersonName = $_POST['checkPersonName'];
        $checkPersonTitle=$_POST["checkPersonTitle"];
        $weight=$_POST["weight"];
        $weightRank =$_POST['weightRank'];
        $height=$_POST["height"];
        $heightRank =$_POST['heightRank'];
        $touwei =$_POST['touwei'];
        $WHtR=$_POST["WHtR"];
        $fuwei = $_POST['fuwei'];
        $complexion = $_POST['complexion'];
        $shangbiwei = $_POST['shangbiwei'];
        $fubuFold = $_POST['fubuFold'];
        $teethNumber = $_POST['teethNumber'];
        $vision=$_POST['vision'];
        $signOfRickets = $_POST['signOfRickets'];
        $signOfAnemia = $_POST['signOfAnemia'];
        $heartAndLung = $_POST['heartAndLung'];
        $abdomen = $_POST['abdomen'];
        $limb = $_POST['limb'];
        $eatCondition = $_POST['eatCondition'];
        $sleepCondition = $_POST['sleepCondition'];
        $mentalBehavior=$_POST['mentalBehavior'];
        $bloodRoutine= $_POST['bloodRoutine'];
        $liverFunction = $_POST['liverFunction'];
        $stoolRoutine = $_POST['stoolRoutine'];
        $healthyEducation = $_POST['healthyEducation'];
        $vaccination = $_POST['vaccination'];

        if(empty($checkDate)){
            $this->error("必须填入检查日期才能生成新的体检记录");
        }

        if(empty($age)){
            $this->error("年龄是必填项，请填写对应体检年龄");
        }
        if(empty($checkPlace)){
            $checkPlace=null;
        }
        if(empty($checkPersonName)){
            $checkPersonName=null;
        }
        if(empty($checkPersonTitle)){
            $checkPersonTitle=null;
        }
        if(empty($weightRank)){
            $weightRank=null;
        }
        if(empty($heightRank)){
            $heightRank=null;
        }
        if(empty($complexion)){
            $complexion=null;
        }
        if(empty($fubuFold)){
            $fubuFold=null;
        }
        if(empty($teethNumber)){
            $teethNumber=null;
        }
        if(empty($vision)){
            $vision=null;
        }
        if(empty($signOfRickets)){
            $signOfRickets=null;
        }
        if(empty($signOfAnemia)){
            $signOfAnemia=null;
        }
        if(empty($heartAndLung)){
            $heartAndLung=null;
        }
        if(empty($abdomen)){
            $abdomen=null;
        }
        if(empty($limb)){
            $limb=null;
        }
        if(empty($eatCondition)){
            $eatCondition=null;
        }
        if(empty($sleepCondition)){
            $sleepCondition=null;
        }
        if(empty($mentalBehavior)){
            $mentalBehavior=null;
        }
        if(empty($bloodRoutine)){
            $bloodRoutine=null;
        }
        if(empty($liverFunction)){
            $liverFunction=null;
        }
        if(empty($stoolRoutine)){
            $stoolRoutine=null;
        }
        if(empty($healthyEducation)){
            $healthyEducation=null;
        }
        if(empty($vaccination)){
            $vaccination=null;
        }
        $dataCheck=A("DataCheck");
        $weight=$dataCheck->decimailKeep($weight,"体重");
        $height=$dataCheck->decimailKeep($height,"身高");
        $touwei=$dataCheck->decimailKeep($touwei,"头围");
        $WHtR=$dataCheck->decimailKeep($WHtR,"腰高比WHtR");
        $fuwei=$dataCheck->decimailKeep($fuwei,"腹围");
        $shangbiwei=$dataCheck->decimailKeep($shangbiwei,"上臂围");

        $medicalID=$_SESSION["medicalID"];
        if($medicalID&&$checkDate&&$age) {
            $conn = $dataCheck->data_connect();
            if (!$conn) {
                 E('Could not connect to database.');
            }
            mysqli_query($conn,"SET NAMES 'utf8'");//设置数据库数据的编码，不加这一句中文字符无法正常显示
            $p = "select *from tg_preschool_age where account='$medicalID'AND checkDate='$checkDate'";
            $end=mysqli_query($conn,$p);
            if($end->num_rows>0){
                $this->error("该日期的体检记录已存在，不能重复添加");
            }else{
                $mess="insert into tg_preschool_age (account,age,checkDate,checkPlace,checkPersonName,checkPersonTitle,babyWeight,weightRank,babyHeight,heightRank,touwei,WHtR,fuwei,complexion,shangbiwei,abdominalFold,teethNumber,vision,signOfRickets,signOfAnemia,heartAndLung,abdomen,limb,eatCondition,sleepCondition,mentalBehavior,bloodRoutine,liverFunction,stoolRoutine,healthyEducation,vaccination) VALUES ('$medicalID','$age','$checkDate','$checkPlace','$checkPersonName','$checkPersonTitle','$weight','$weightRank','$height','$heightRank','$touwei','$WHtR','$fuwei','$complexion','$shangbiwei','$fubuFold','$teethNumber','$vision','$signOfRickets','$signOfAnemia','$heartAndLung','$abdomen','$limb','$eatCondition','$sleepCondition','$mentalBehavior','$bloodRoutine','$liverFunction','$stoolRoutine','$healthyEducation','$vaccination')";
                $last = mysqli_query($conn, $mess);
            }
            if (!$last) {
                $this->error("新增体检记录失败，请重试");
            }else{
                $this->success("新增体检记录成功");
            }
        }
        else {
            E('未获取到用户的就诊号或体检日期或体检年龄，无法读取数据');
        }



    }

    public function schoolCheckHandle(){
        $checkDate = $_POST['checkDate'];
        $age = $_POST['age'];
        $school = $_POST['school'];
        $grade=$_POST['grade'];
        $class=$_POST['class'];
        $studentID=$_POST['studentID'];
        $classTeacher=$_POST['classTeacher'];
        $checkPersonName = $_POST['checkPersonName'];
        $weight=$_POST["weight"];
        $weightHDS =$_POST['weightHDS'];
        $height=$_POST["height"];
        $heightHDS =$_POST['heightHDS'];
        $BMI =$_POST['BMI'];
        $WHtR=$_POST["WHtR"];
        $fuwei = $_POST['fuwei'];
        $xiongwei = $_POST['xiongwei'];
        $vitalCapacity = $_POST['vitalCapacity'];
        $bloodPressure = $_POST['bloodPressure'];
        $pulse = $_POST['pulse'];
        $visionLeft=$_POST['visionLeft'];
        $visionRight=$_POST['visionRight'];
        $systemCheck = $_POST['systemCheck'];
        $mentalBehavior=$_POST['mentalBehavior'];
        $breast= $_POST['breast'];
        $vulva = $_POST['vulva'];
        $boneAge = $_POST['boneAge'];
        $growthEvaluation = $_POST['growthEvaluation'];
        $advice= $_POST['advice'];

        $medicalID=$_SESSION["medicalID"];
        $dataCheck=A("DataCheck");
        if($medicalID&&$checkDate) {
            $conn = $dataCheck->data_connect();
            if (!$conn) {
                   E('Could not connect to database.');
            }
            mysqli_query($conn,"SET NAMES 'utf8'");//设置数据库数据的编码，不加这一句中文字符无法正常显示
            $q = "select *from tg_school_age where account='$medicalID'AND checkDate='$checkDate'";
            $result = mysqli_query($conn, $q);
            if ($result->num_rows > 0) {
                $mess="update tg_school_age set age='$age',school='$school',grade='$grade',class='$class',studentID='$studentID',classTeacher='$classTeacher',checkPersonName='$checkPersonName',weightHDS='$weightHDS',heightHDS='$heightHDS',vitalCapacity='$vitalCapacity',bloodPressure='$bloodPressure',pulse='$pulse',visionLeft='$visionLeft',visionRight='$visionRight',systemCheck='$systemCheck',mentalBehavior='$mentalBehavior',breast='$breast',vulva='$vulva',boneAge='$boneAge',growthEvaluation='$growthEvaluation',advice='$advice'";

                //调用小数点检测函数，解决数据库内float数据类型存储遇到空值无法存入的问题，采用拼接判断，如果用户没提交，则设为NULL。
                $mess=$dataCheck->decimalCheck($weight,$mess,"体重","weight");
                $mess=$dataCheck->decimalCheck($fuwei,$mess,"腹围","fuwei");
                $mess=$dataCheck->decimalCheck($height,$mess,"身高","height");
                $mess=$dataCheck->decimalCheck($BMI,$mess,"身体质量指数BMI","BMI");
                $mess=$dataCheck->decimalCheck($WHtR,$mess,"腰高比WHtR","WHtR");
                $mess=$dataCheck->decimalCheck($xiongwei,$mess,"胸围","xiongwei");

                $nn=" WHERE account='$medicalID' AND checkDate='$checkDate'";
                $messLast=$mess.$nn;
                $last = mysqli_query($conn, $messLast);
            }
            if (!$last) {
                $this->error("信息修改失败，请重试");
            }else{
                $this->success("信息修改成功");
            }
        }
        else {
            E('未获取到用户的就诊号或体检日期，无法读取数据');
        }
    }

    public function addSchoolCheckRecordHandle(){
        $checkDate = $_POST['checkDate'];
        $age = $_POST['age'];
        $school = $_POST['school'];
        $grade=$_POST['grade'];
        $class=$_POST['class'];
        $studentID=$_POST['studentID'];
        $classTeacher=$_POST['classTeacher'];
        $checkPersonName = $_POST['checkPersonName'];
        $weight=$_POST["weight"];
        $weightHDS =$_POST['weightHDS'];
        $height=$_POST["height"];
        $heightHDS =$_POST['heightHDS'];
        $BMI =$_POST['BMI'];
        $WHtR=$_POST["WHtR"];
        $fuwei = $_POST['fuwei'];
        $xiongwei = $_POST['xiongwei'];
        $vitalCapacity = $_POST['vitalCapacity'];
        $bloodPressure = $_POST['bloodPressure'];
        $pulse = $_POST['pulse'];
        $visionLeft=$_POST['visionLeft'];
        $visionRight=$_POST['visionRight'];
        $systemCheck = $_POST['systemCheck'];
        $mentalBehavior=$_POST['mentalBehavior'];
        $breast= $_POST['breast'];
        $vulva = $_POST['vulva'];
        $boneAge = $_POST['boneAge'];
        $growthEvaluation = $_POST['growthEvaluation'];
        $advice= $_POST['advice'];

        if(empty($checkDate)){
            $this->error("必须填入检查日期才能生成新的体检记录");
        }

        if(empty($age)){
            $this->error("年龄是必填项，请填写对应体检年龄");
        }
        if(empty($school)){
            $school=null;
        }
        if(empty($grade)){
            $grade=null;
        }
        if(empty($class)){
            $class=null;
        }
        if(empty($studentID)){
            $studentID=null;
        }
        if(empty($classTeacher)){
            $classTeacher=null;
        }
        if(empty($checkPersonName)){
            $checkPersonName=null;
        }
        if(empty($weightHDS)){
            $weightHDS=null;
        }
        if(empty($heightHDS)){
            $heightHDS=null;
        }
        if(empty($vitalCapacity)){
            $vitalCapacity=null;
        }
        if(empty($bloodPressure)){
            $bloodPressure=null;
        }
        if(empty($pulse)){
            $pulse=null;
        }
        if(empty($visionLeft)){
            $visionLeft=null;
        }
        if(empty($visionRight)){
            $visionRight=null;
        }
        if(empty($systemCheck)){
            $systemCheck=null;
        }
        if(empty($mentalBehavior)){
            $mentalBehavior=null;
        }
        if(empty($breast)){
            $breast=null;
        }
        if(empty($vulva)){
            $vulva=null;
        }
        if(empty($boneAge)){
            $boneAge=null;
        }
        if(empty($growthEvaluation)){
            $growthEvaluation=null;
        }
        if(empty($advice)){
            $advice=null;
        }
        $dataCheck=A("DataCheck");
        $weight=$dataCheck->decimailKeep($weight,"体重");
        $height=$dataCheck->decimailKeep($height,"身高");
        $BMI=$dataCheck->decimailKeep($BMI,"身体质量指数BMI");
        $WHtR=$dataCheck->decimailKeep($WHtR,"腰高比WHtR");
        $fuwei=$dataCheck->decimailKeep($fuwei,"腹围");
        $xiongwei=$dataCheck->decimailKeep($xiongwei,"胸围");

        $medicalID=$_SESSION["medicalID"];
        if($medicalID&&$checkDate&&$age) {
            $conn = $dataCheck->data_connect();
            if (!$conn) {
                E('Could not connect to database.');
            }
            mysqli_query($conn,"SET NAMES 'utf8'");//设置数据库数据的编码，不加这一句中文字符无法正常显示
            $p = "select *from tg_school_age where account='$medicalID'AND checkDate='$checkDate'";
            $end=mysqli_query($conn,$p);
            if($end->num_rows>0){
                $this->error("该日期的体检记录已存在，不能重复添加");
            }else{
                $mess="insert into tg_school_age (account,age,school,grade,class,studentID,classTeacher,checkPersonName,checkDate,height,heightHDS,weight,weightHDS,BMI,xiongwei,fuwei,WHtR,vitalCapacity,bloodPressure,pulse,visionLeft,visionRight,systemCheck,mentalBehavior,breast,vulva,boneAge,growthEvaluation,advice) VALUES ('$medicalID','$age','$school','$grade','$class','$studentID','$classTeacher','$checkPersonName','$checkDate','$height','$heightHDS','$weight','$weightHDS','$BMI','$xiongwei','$fuwei','$WHtR','$vitalCapacity','$bloodPressure','$pulse','$visionLeft','$visionRight','$systemCheck','$mentalBehavior','$breast','$vulva','$boneAge','$growthEvaluation','$advice')";
                $last = mysqli_query($conn, $mess);
            }
            if (!$last) {
                $this->error("新增体检记录失败，请重试");
            }else{
                $this->success("新增体检记录成功");
            }
        }
        else {
            E('未获取到用户的就诊号或体检日期或体检年龄，无法读取数据');
        }

    }

    public function adolesCheckHandle(){
        $checkDate = $_POST['checkDate'];
        $age = $_POST['age'];
        $school = $_POST['school'];
        $grade=$_POST['grade'];
        $class=$_POST['class'];
        $studentID=$_POST['studentID'];
        $classTeacher=$_POST['classTeacher'];
        $checkPersonName = $_POST['checkPersonName'];
        $weight=$_POST["weight"];
        $weightHDS =$_POST['weightHDS'];
        $height=$_POST["height"];
        $heightHDS =$_POST['heightHDS'];
        $BMI =$_POST['BMI'];
        $WHtR=$_POST["WHtR"];
        $fuwei = $_POST['fuwei'];
        $xiongwei = $_POST['xiongwei'];
        $vitalCapacity = $_POST['vitalCapacity'];
        $bloodPressure = $_POST['bloodPressure'];
        $pulse = $_POST['pulse'];
        $visionLeft=$_POST['visionLeft'];
        $visionRight=$_POST['visionRight'];
        $systemCheck = $_POST['systemCheck'];
        $mentalBehavior=$_POST['mentalBehavior'];
        $breast= $_POST['breast'];
        $vulva = $_POST['vulva'];
        $boneAge = $_POST['boneAge'];
        $growthEvaluation = $_POST['growthEvaluation'];
        $advice= $_POST['advice'];
        $mensesCondition=$_POST['yuejing'];
        $spermatorrheaCondition=$_POST['yijing'];

        $medicalID=$_SESSION["medicalID"];
        $dataCheck=A("DataCheck");
        if($medicalID&&$checkDate) {
            $conn = $dataCheck->data_connect();
            if (!$conn) {
                 E('Could not connect to database.');
            }
            mysqli_query($conn,"SET NAMES 'utf8'");//设置数据库数据的编码，不加这一句中文字符无法正常显示
            $q = "select *from tg_adolescency where account='$medicalID'AND checkDate='$checkDate'";
            $result = mysqli_query($conn, $q);
            if ($result->num_rows > 0) {
                $mess="update tg_adolescency set age='$age',school='$school',grade='$grade',class='$class',studentID='$studentID',classTeacher='$classTeacher',checkPersonName='$checkPersonName',weightHDS='$weightHDS',heightHDS='$heightHDS',vitalCapacity='$vitalCapacity',bloodPressure='$bloodPressure',pulse='$pulse',visionLeft='$visionLeft',visionRight='$visionRight',systemCheck='$systemCheck',mentalBehavior='$mentalBehavior',breast='$breast',vulva='$vulva',boneAge='$boneAge',growthEvaluation='$growthEvaluation',advice='$advice',mensesCondition='$mensesCondition',spermatorrheaCondition='$spermatorrheaCondition'";

                //调用小数点检测函数，解决数据库内float数据类型存储遇到空值无法存入的问题，采用拼接判断，如果用户没提交，则设为NULL。
                $mess=$dataCheck->decimalCheck($weight,$mess,"体重","weight");
                $mess=$dataCheck->decimalCheck($fuwei,$mess,"腹围","fuwei");
                $mess=$dataCheck->decimalCheck($height,$mess,"身高","height");
                $mess=$dataCheck->decimalCheck($BMI,$mess,"身体质量指数BMI","BMI");
                $mess=$dataCheck->decimalCheck($WHtR,$mess,"腰高比WHtR","WHtR");
                $mess=$dataCheck->decimalCheck($xiongwei,$mess,"胸围","xiongwei");

                $nn=" WHERE account='$medicalID' AND checkDate='$checkDate'";
                $messLast=$mess.$nn;
                $last = mysqli_query($conn, $messLast);
            }
            if (!$last) {
                $this->error("信息修改失败，请重试");
            }else{
                $this->success("信息修改成功");
            }
        }
        else {
            E('未获取到用户的就诊号或体检日期，无法读取数据');
        }
    }

    public function addAdolesCheckRecordHandle(){
        $checkDate = $_POST['checkDate'];
        $age = $_POST['age'];
        $school = $_POST['school'];
        $grade=$_POST['grade'];
        $class=$_POST['class'];
        $studentID=$_POST['studentID'];
        $classTeacher=$_POST['classTeacher'];
        $checkPersonName = $_POST['checkPersonName'];
        $weight=$_POST["weight"];
        $weightHDS =$_POST['weightHDS'];
        $height=$_POST["height"];
        $heightHDS =$_POST['heightHDS'];
        $BMI =$_POST['BMI'];
        $WHtR=$_POST["WHtR"];
        $fuwei = $_POST['fuwei'];
        $xiongwei = $_POST['xiongwei'];
        $vitalCapacity = $_POST['vitalCapacity'];
        $bloodPressure = $_POST['bloodPressure'];
        $pulse = $_POST['pulse'];
        $visionLeft=$_POST['visionLeft'];
        $visionRight=$_POST['visionRight'];
        $systemCheck = $_POST['systemCheck'];
        $mentalBehavior=$_POST['mentalBehavior'];
        $breast= $_POST['breast'];
        $vulva = $_POST['vulva'];
        $boneAge = $_POST['boneAge'];
        $growthEvaluation = $_POST['growthEvaluation'];
        $advice= $_POST['advice'];
        $mensesCondition=$_POST['yuejing'];
        $spermatorrheaCondition=$_POST['yijing'];

        if(empty($checkDate)){
            $this->error("必须填入检查日期才能生成新的体检记录");
        }

        if(empty($age)){
            $this->error("年龄是必填项，请填写对应体检年龄");
        }
        if(empty($school)){
            $school=null;
        }
        if(empty($grade)){
            $grade=null;
        }
        if(empty($class)){
            $class=null;
        }
        if(empty($studentID)){
            $studentID=null;
        }
        if(empty($classTeacher)){
            $classTeacher=null;
        }
        if(empty($checkPersonName)){
            $checkPersonName=null;
        }
        if(empty($weightHDS)){
            $weightHDS=null;
        }
        if(empty($heightHDS)){
            $heightHDS=null;
        }
        if(empty($vitalCapacity)){
            $vitalCapacity=null;
        }
        if(empty($bloodPressure)){
            $bloodPressure=null;
        }
        if(empty($pulse)){
            $pulse=null;
        }
        if(empty($visionLeft)){
            $visionLeft=null;
        }
        if(empty($visionRight)){
            $visionRight=null;
        }
        if(empty($systemCheck)){
            $systemCheck=null;
        }
        if(empty($mentalBehavior)){
            $mentalBehavior=null;
        }
        if(empty($breast)){
            $breast=null;
        }
        if(empty($vulva)){
            $vulva=null;
        }
        if(empty($boneAge)){
            $boneAge=null;
        }
        if(empty($growthEvaluation)){
            $growthEvaluation=null;
        }
        if(empty($advice)){
            $advice=null;
        }
        if(empty($mensesCondition)){
            $mensesCondition=null;
        }
        if(empty($spermatorrheaCondition)){
            $spermatorrheaCondition=null;
        }
        $dataCheck=A("DataCheck");
        $weight=$dataCheck->decimailKeep($weight,"体重");
        $height=$dataCheck->decimailKeep($height,"身高");
        $BMI=$dataCheck->decimailKeep($BMI,"身体质量指数BMI");
        $WHtR=$dataCheck->decimailKeep($WHtR,"腰高比WHtR");
        $fuwei=$dataCheck->decimailKeep($fuwei,"腹围");
        $xiongwei=$dataCheck->decimailKeep($xiongwei,"胸围");

        $medicalID=$_SESSION["medicalID"];
        if($medicalID&&$checkDate&&$age) {
            $conn =$dataCheck->data_connect();
            if (!$conn) {
                 E('Could not connect to database.');
            }
            mysqli_query($conn,"SET NAMES 'utf8'");//设置数据库数据的编码，不加这一句中文字符无法正常显示
            $p = "select *from tg_adolescency where account='$medicalID'AND checkDate='$checkDate'";
            $end=mysqli_query($conn,$p);
            if($end->num_rows>0){
                $this->error("该日期的体检记录已存在，不能重复添加");
            }else{
                $mess="insert into tg_adolescency (account,age,school,grade,class,studentID,classTeacher,checkPersonName,checkDate,height,heightHDS,weight,weightHDS,BMI,xiongwei,fuwei,WHtR,vitalCapacity,bloodPressure,pulse,visionLeft,visionRight,systemCheck,mentalBehavior,breast,vulva,boneAge,growthEvaluation,advice,mensesCondition,spermatorrheaCondition) VALUES ('$medicalID','$age','$school','$grade','$class','$studentID','$classTeacher','$checkPersonName','$checkDate','$height','$heightHDS','$weight','$weightHDS','$BMI','$xiongwei','$fuwei','$WHtR','$vitalCapacity','$bloodPressure','$pulse','$visionLeft','$visionRight','$systemCheck','$mentalBehavior','$breast','$vulva','$boneAge','$growthEvaluation','$advice','$mensesCondition','$spermatorrheaCondition')";
                $last = mysqli_query($conn, $mess);
            }
            if (!$last) {
                $this->error("新增体检记录失败，请重试");
            }else{
                $this->success("新增体检记录成功");
            }
        }
        else {
            E('未获取到用户的就诊号或体检日期或体检年龄，无法读取数据');
        }

    }

    public function sickRecordHandle(){
        $sickDate = $_POST['sickDate'];
        $sickAge = $_POST['sickAge'];
        $diagnosis = $_POST['diagnosis'];
        $mainSymptom = $_POST['mainSymptom'];
        $checkPlace=$_POST["checkPlace"];
        $treatmentSituation=$_POST["treatmentSituation"];
        $diseaseOutcome = $_POST['diseaseOutcome'];

        $medicalID=$_SESSION["medicalID"];
        $dataCheck=A("DataCheck");
        if($medicalID&&$sickDate) {
            $conn = $dataCheck->data_connect();
            if (!$conn) {
                 E('Could not connect to database.');
            }
            mysqli_query($conn,"SET NAMES 'utf8'");//设置数据库数据的编码，不加这一句中文字符无法正常显示
            $q = "select *from tg_sick_record where account='$medicalID'AND checkDate='$sickDate'";
            $result = mysqli_query($conn, $q);
            if ($result->num_rows > 0) {
                $mess="update tg_sick_record set age='$sickAge',diagnosis='$diagnosis',mainSymptom='$mainSymptom',checkPlace='$checkPlace',treatmentSituation='$treatmentSituation',diseaseOutcome='$diseaseOutcome' WHERE account='$medicalID' AND checkDate='$sickDate'";
                $last = mysqli_query($conn, $mess);
            }
            if (!$last) {
                $this->error("信息修改失败，请重试");
            }else{
                $this->success("信息修改成功");
            }
        }
        else {
            E('未获取到用户的就诊号或体检日期，无法读取数据');
        }
    }

    public function addSickRecordHandle(){
        $sickDate = $_POST['sickDate'];
        $sickAge = $_POST['sickAge'];
        $diagnosis = $_POST['diagnosis'];
        $mainSymptom = $_POST['mainSymptom'];
        $checkPlace=$_POST["checkPlace"];
        $treatmentSituation=$_POST["treatmentSituation"];
        $diseaseOutcome = $_POST['diseaseOutcome'];


        if(empty($sickDate)){
            $this->error("必须填入发病日期才能生成新的体检记录");
        }

        if(empty($sickAge)){
            $sickAge=null;
        }
        if(empty($diagnosis)){
            $diagnosis=null;
        }
        if(empty($mainSymptom)){
            $mainSymptom=null;
        }
        if(empty($checkPlace)){
            $checkPlace=null;
        }
        if(empty($treatmentSituation)){
            $treatmentSituation=null;
        }
        if(empty($diseaseOutcome)){
            $diseaseOutcome=null;
        }

        $medicalID=$_SESSION["medicalID"];
        $dataCheck=A("DataCheck");
        if($medicalID&&$sickDate) {
            $conn = $dataCheck->data_connect();
            if (!$conn) {
                 E('Could not connect to database.');
            }
            mysqli_query($conn,"SET NAMES 'utf8'");//设置数据库数据的编码，不加这一句中文字符无法正常显示
            $p = "select *from tg_sick_record where account='$medicalID'AND checkDate='$sickDate'";
            $end=mysqli_query($conn,$p);
            if($end->num_rows>0){
                $this->error("该日期的体检记录已存在，不能重复添加");
            }else{
                $mess="insert into tg_sick_record (account,age,checkDate,diagnosis,mainSymptom,checkPlace,treatmentSituation,diseaseOutcome) VALUES ('$medicalID','$sickAge','$sickDate','$diagnosis','$mainSymptom','$checkPlace','$treatmentSituation','$diseaseOutcome')";
                $last = mysqli_query($conn, $mess);
            }
            if (!$last) {
                $this->error("新增患病记录失败，请重试");
            }else{
                $this->success("新增患病记录成功");
            }
        }
        else {
            E('未获取到用户的就诊号或体检日期，无法读取数据');
        }

    }

    public function imageUpload()
    {
        //隐藏输出的notice和waring信息
        error_reporting(E_ALL ^ E_NOTICE);
        error_reporting(E_ALL ^ E_WARNING);
        $medicalID = $_SESSION["medicalID"];
        $dataCheck = A("DataCheck");
        define("fileStore", "Public/others/teenagerGrow/userUploadPhoto");//文件存储的主目录(在thinkphp框架中位置和后面的数据库存储地址不一样。无语)
        date_default_timezone_set("PRC");
        //设置允许上传的文件的格式
        //$imageCount = count($_FILES['photo']['name']);//获取上传图片的数量
        //for($i=0;$i<$imageCount;$i++){
        if (is_uploaded_file($_FILES["photo"]["tmp_name"])) {

            if (($_FILES["photo"]["type"] == "image/gif")
                || ($_FILES["photo"]["type"] == "image/jpeg")
                || ($_FILES["photo"]["type"] == "image/pjpeg")
            ) {
              //设置允许上传的文件的大小
                if (($_FILES["photo"]["size"] < 500000)) {
                    chdir(fileStore);
                    $mainPath = $medicalID;
                    $path = date('Ymd', time());
                    if (!is_dir($mainPath)) { //按用户名创建主文件夹
                        mkdir($mainPath);
                    }
                    chdir($mainPath);
                    if (!is_dir($path)) { //按日期创建图片存储文件夹，若不存在，先生成文件夹（这里有个问题，因为有两个上传框，每次第二张图片仍然会判断成目录不存在）
                        mkdir($path);
                    }
                    chdir($path);
                    $date = date("-H-i-s.");
                    $photoType = pathinfo($_FILES["photo"]["name"], PATHINFO_EXTENSION); //获取图片后缀名
                    //  $photoType=substr($_FILES["photo"]["name"],-3);//获取图片后缀名
                    $photoNameSave = $path . $date . $photoType;//重新按上传时间生成图片名
                    $result = move_uploaded_file($_FILES["photo"]["tmp_name"], $photoNameSave);


                    //若图片上传成功，则把图片url保存在数据库中，方便查看
                    if ($result == 1) {
                        //echo "图片已经成功上传!";
                        $photoURL = "../../public/others/teenagerGrow/userUploadPhoto/" . $mainPath . "/" . $path . "/" . $photoNameSave; //数据库存储的图片的相对路径
                        $photoSavePlace=fileStore."/". $mainPath . "/" . $path . "/" . $photoNameSave;
                        $conn = $dataCheck->data_connect();
                        if (!$conn) {
                            E('Could not connect to database.');
                        }

                        mysqli_query($conn, "SET NAMES 'utf8'");//设置数据库数据的编码，不加这一句中文字符无法正常显示
                        $mess = "insert into tg_child_image (account,imageUrl,uploadTime,imageSavePlace) VALUES ('$medicalID','$photoURL','$path','$photoSavePlace')";
                        $last = mysqli_query($conn, $mess);
                        if (!$last) {
                            E('Could not register you in database - please try again later.');
                        } else {
                            $this->success("图片已经成功上传");
                        }
                    }

                } else {
                    $this->error("上传失败，文件大小超过限制");
                }

            } else {
                $this->error("上传图片的格式错误，请选择正确的文件格式");
            }
        }
        if ($_FILES["photo"]["error"] > 0) {
            $this->error("上传图片出错，请重试");
        }
    }
/*对应儿童的相关图片加载*/
    public function loadImage(){
        $medicalID=$_SESSION["medicalID"];
        $user=M("ChildImage");
        $info=$user->where("account='$medicalID'")->field("imageUrl")->select();
        $this->ajaxReturn($info, "json");
    }

    public function deleteChildPhoto(){
        //隐藏输出的notice和waring信息
        error_reporting(E_ALL ^ E_NOTICE);
        error_reporting(E_ALL ^ E_WARNING);

        $medicalID=$_SESSION['medicalID'];
        $imgUrl=$_POST{'imgUrl'};
        $dataCheck=A("DataCheck");
        $db=$dataCheck->data_connect();
        if (!$db) {
             E('Could not connect to database.');
        }
        mysqli_query($db,"SET NAMES 'utf8'");//设置数据库数据的编码，不加这一句中文字符无法正常显示
        $select="select from tg_child_image WHERE account='$medicalID'AND imageUrl='$imgUrl'";
        $end=mysqli_query($db,$select);
        if($end->num_rows){
            $row=mysqli_fetch_assoc($end);
            $imageSavePlace=$row["imageSavePlace"];
        }
        $delete="delete from tg_child_image WHERE account='$medicalID'AND imageUrl='$imgUrl'";
        $result=mysqli_query($db,$delete);

        $imgDelete=unlink($imageSavePlace);//删除对应文件夹里的图片文件
        if($result){
            $dataBack=array("code"=>1);
//        echo "<script>setTimeout(function(){alert('删除成功！');history.go(-1);},1000) </script>";
        }else{
//        echo "删除失败，请稍后再试！";
            $dataBack=array("code"=>0);
        }
        $this->ajaxReturn($dataBack,"json");
    }
/*新增家族病例史后台*/
    public function childFamilySickHandle(){
        $medicalID=$_SESSION["medicalID"];
        $memberName=I("post.memberName");
        $condition["account"]=$medicalID;
        $condition["memberName"]=$memberName;
        $condition["memberSex"]=I("post.memberSex");
        $condition["memberLink"]=I("post.memberLink");
        $condition["sickName"]=I("post.sickName");
        $condition["sickAge"]=I("post.sickAge");
        $condition["cure"]=I("post.isCure");
        $condition["others"]==I("post.others");
        $user=M("ChildFamilySick");
        $query=$user->where("account='$medicalID'and memberName='$memberName'")->select();
        if($query){
            $this->error("添加的家族成员已存在，不能重复添加");
        }else{
            $info=$user->data($condition)->add();
        }
        if($info){
            $this->success("添加成功");
        }else{
            $this->error("添加失败，请重试");
        }

    }
/*修改家族成员病历信息*/
    public function modifyMemberSickRecord(){
        $medicalID=$_SESSION["medicalID"];
        $memberName=I("post.memberName");
        $memberSex=I("post.memberSex");
        $memberLink=I("post.memberLink");
        $sickName=I("post.sickName");
        $sickAge=I("post.sickAge");
        $cure=I("post.isCure");
        $others=I("post.others");
        $dataCheck=A("DataCheck");
        if($medicalID&&$memberName) {
            $conn = $dataCheck->data_connect();
            if (!$conn) {
                E('Could not connect to database.');
            }
            mysqli_query($conn,"SET NAMES 'utf8'");//设置数据库数据的编码，不加这一句中文字符无法正常显示
            $q = "select *from tg_child_family_sick where account='$medicalID'AND memberName='$memberName'";
            $result = mysqli_query($conn, $q);
            if ($result->num_rows > 0) {
                $mess="update tg_child_family_sick set memberSex='$memberSex',memberLink='$memberLink',sickName='$sickName',sickAge='$sickAge',cure='$cure',others='$others' WHERE account='$medicalID' AND memberName='$memberName'";
                $last = mysqli_query($conn, $mess);
            }
            if (!$last) {
                $this->error("信息修改失败，请重试");
            }else{
                $this->success("信息修改成功");
            }
        }
        else {
            E('未获取到用户的就诊号或家族成员姓名，无法读取数据');
        }
    }

}