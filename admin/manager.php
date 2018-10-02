<?php
	
    session_start();
    require'../common/function.php';
	$link =mysqli_connect('127.0.0.1:3306','root','123456','book');
	 
$name=@$_POST['managerName'];
$password=@$_POST['managerPsw'];
$cap=@$_POST['captcha'];
$cap_s=@$_SESSION['captcha'];
//设置字符集
mysqli_query($link,'set names utf8');

$str="select * from manager where managerName='$name' and managerPsw='$password'";

$result = mysqli_query($link,$str);
$row=mysqli_num_rows($result);
//echo $row;
if($row>0)
{
	if(trim(strtoupper($cap))==strtoupper($cap_s))//不区分大小写语句
	{
	     $_SESSION['managerName']=$name;
		redirect('./main.php');
   
		
	}
	else
	{
		echo "<script>alert('验证码错误，请重新输入')</script>";
        header("refresh:0;url=/bookstore/admin/View/manager.html");
		
	}
}
   else
	{
		echo "<script>alert('管理员名密码错误')</script>";
	    header("refresh:0;url=/bookstore/admin/View/manager.html");
	}
	?>