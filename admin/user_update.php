<?php
	
header('Content-type:text/html;charset=utf-8');
  require '../common/function.php';

  
  $id=isset($_GET['id'])? $_GET['id']:"";

  
   $sql="select * from customer where customerID=$id";
  
   $result=query_sql($sql);
   $row=mysqli_fetch_assoc($result);

   //把要修改的字段名放在数组中
	if($_POST)
	{
		$name=['customerName','realName','password','phoneNum','address','email','time'];
		foreach($name as $v)
		{
			$data=isset($_POST[$v])?$_POST[$v]:'';//值是否为空。isset两种返回值true和false，三目预算符返回$_POST[$v]和空
			$update[]="$v='$data'";
			
		}
		
		$update_str=implode(',',$update);
		$update_sql="update customer set $update_str where customerID=$id";
		$row=query_sql($update_sql);
		if($row)
		{
			echo "<script>alert('修改成功')</script>";
			  header("refresh:0.5;url=/bookstore/admin/manageroperate.php");
		}
		else
		{
			echo "<script>alert('修改失败')</script>";
		}
	}
	
  
  require './View/user_update.html';
?>