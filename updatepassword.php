<?php
   require './common/function.php';
	
	//启动session
	 session_start();
	 //为项目创建session,统一保存到user中
     $user=$_SESSION['user'];//用户已登录，取出用户消息
     $pwd=isset($_POST['password'])?$_POST['password']:'';
     $newPwd=isset($_POST['newpassword'])?$_POST['newpassword']:'';
	 $newPwd1=isset($_POST['newpassword1'])?$_POST['newpassword1']:'';
	 
	 $sql="update customer set password=$newPwd WHERE customerName='$user' and password='$pwd'";
    if($newPwd==$newPwd1)
    {
	 $row=query_sql($sql);
	 if($row)
	 {
        echo "<script>alert('修改成功')</script>";
        header("refresh:0.5;url=/bookstore/view/Login.html");   	
	 }
	 else
	 {
	   echo "<script>alert('修改失败')</script>";
	 }
	 }else{
	 	echo "<script>alert('两次密码输入不一致，请重输')</script>";
	 }
	
?>