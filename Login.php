<?php
	
    session_start();
    require'./common/function.php';
	$link =mysqli_connect('127.0.0.1:3306','root','123456','book');
	 
$name=@$_POST['user'];
$password=@$_POST['pwd'];
$cap=@$_POST['captcha'];
$cap_s=@$_SESSION['captcha'];
mysqli_query($link,'set names utf8');

$str="select * from customer  where customerName='$name' and password='$password'";

$result = mysqli_query($link,$str);
$row =mysqli_num_rows($result);
if($row >0)
{
	if(trim(strtoupper($cap))==strtoupper($cap_s)){
	     $_SESSION['user']=$name;
		redirect('book.php');
		 	
		
	}
	else
	{
		echo "<script>alert('验证码错误，请重新输入')</script>";
        header("refresh:0;url=/bookstore/view/Login.html");
		
	}
}
   else
	{
	  
	  echo "<script>alert('用户名密码错误，请重新输入')</script>";
      header("refresh:0;url=/bookstore/view/Login.html");
	}

  require '/bookstore/view/book.html';

?>