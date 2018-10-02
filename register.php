<?php
    require'./common/function.php';
 $username=@$_POST['customerName'];
$password=@$_POST['password'];
$email=@$_POST['email'];
$realname=@$_POST['realName'];
$phoneNum=@$_POST['phoneNum'];
$address=@$_POST['address'];
   //把要添加的字段名放在数组中

	if($_POST)
	{
     $name=['customerName','realName','password','phoneNum','address','email','time'];
	   foreach($name as $v)
	   {
		  $data=isset($_POST[$v])?$_POST[$v]:'';
		  $fil[]=$v;
		  $update[]="'$data'";
	   }
	   $update_str=implode(',', $update);
	   $fil_str=implode(',', $fil);
	   //echo $update_str;
	   
	   $sql="INSERT INTO `customer`($fil_str) VALUES ($update_str)";
	   //echo $sql;
	   $row=query_sql($sql);
	  
	   if($row)
	   {
		  echo "<script>alert('注册成功,欢迎 . $username')</script>";
         
          header("refresh:0.5;url=/bookstore/view/Login.html");
		
	   }
	   else
	   {
	   	  echo "<script>alert('注册失败')</script>";
	   }
	}
	
	require "./view/register.html"
?>