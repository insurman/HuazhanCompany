<?php
//解決網頁亂碼問題
require("connect.php");

$error_flag = FALSE;
$notfound_flag = FALSE;


//如果收到 POST 表單送來的登入資料，到資料庫檢査是否有這個人存在
//（使用 mysql_query("SELECT ...... ")，然後把回傳的東西透過 mysql_fetch_array(......) 來檢査）
$result=mysqli_query($conn,"select * from adminone");


//如果有找到，檢査密碼是否相符
while($row = mysqli_fetch_array($result)){

 //先檢査使用者有沒有輸入資料
 if(empty($_POST["username"])==FALSE && empty($_POST["password"])==FALSE){

 //防範攻擊
 $userName=$_POST["username"];
 $userName=mysqli_real_escape_string($conn,$userName);
 $userPassword=$_POST["password"];
 $userPassword=mysqli_real_escape_string($conn,$userPassword);
 //有輸入資料的話，再來看輸入的email跟資料庫是否一致
 if($row["username"]==$_POST["username"]){

 if($row["password"]==$_POST["password"]){
 //如果相符合，則設定 Session（記得要先 session_start()！），並轉址到會員中心（valuationform.php）
 session_start();
 $_SESSION["username"]=$_POST["username"];
 $_SESSION["password"]=$_POST["password"];


 //讓網頁轉址的 PHP 寫法：header('Location: member.php');
 header('Location: valuationform.php');

 }else{
 //如果不符合，則設定 $error_flag 為 TRUE，繼續顯示網頁内容
 $error_flag = TRUE;
 break;
 }

 }else{
 //如果沒有找到，則設定 $notfound_flag 為 TRUE，繼續顯示網頁内容
 $notfound_flag = TRUE;
 }

 }else{
 //如果沒收到，繼續顯示網頁内容
 }
 
}
?>
<!DOCTYPE html>
<html lang="zh-Hant-TW">
<head>
 <title>會員登入</title>
 <meta name="huazhancompany" charset="utf-8">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<style type="text/css">
	.text-center{
		font-family: "微軟正黑體";
		font-weight: bold;
	}
	.btn{
		font-family: "微軟正黑體";
		font-weight: bold;
		border: 1px #b0d9d4 solid;
		background-color:#b0d9d4;
		color: black;
		text-align: center;
		letter-spacing: 20px;
	}
	.btn:hover{
		border: 1px #29606b solid;
		background-color:#29606b;
	}
	.text-center{
		letter-spacing: 5px;
	}
</style>
<body>
<br><br><br><br>

<div class="container" >
 <div class="row jumbotron" style="background-color:#66a4ac;">
 <div class="col-md-6 col-md-offset-3">
 <h2 class="text-center">會員登入</h2><br>
 <form action="login.php" method="POST">
 <input class="form-control input-lg" id="pass" type="text" name="username" required="TRUE" placeholder="username" autocomplete="off"><br/>
 <input class="form-control input-lg" id="pass" type="password" name="password" required="TRUE" placeholder="密碼" autocomplete="off"><br/>
 <input class="btn btn-primary btn-lg btn-block" type="submit" value="登入">
 </form>
 <br>
 <?php if($error_flag){ ?>
  <div class="alert alert-danger alert-dismissible" role="alert">
  <button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> 密碼錯誤！
  </div>
 <?php }?>

 <?php if($notfound_flag){ ?>
  <div class="alert alert-danger alert-dismissible" role="alert">
  <button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> 未找到本使用者，請重新確認！
  </div>
 <?php }?>
 </div>
 </div>
</div>
</body>
</html>