<?php
	
header('Content-type:text/html;charset=utf-8');
  require '../common/function.php';

  
  $id=isset($_GET['id'])? $_GET['id']:"";

 
   $sql="select * from manager where managerID=$id";
  // echo $sql;
   $result=query_sql($sql);
   $row=mysqli_fetch_assoc($result);
// echo $customer_info['customerName'];
   
	if($_POST)
	{
		$name=['managerName','managerPsw'];
		foreach($name as $v)
		{
			$data=isset($_POST[$v])?$_POST[$v]:'';//值是否为空。isset两种返回值true和false，三目预算符返回$_POST[$v]和空
			$update[]="$v='$data'";
			
		}
		
		$update_str=implode(',',$update);
		$update_sql=" UPDATE manager SET $update_str where managerID=$id";
		$row=query_sql($update_sql);
		if($row)
		{
			echo "<script>alert('修改成功')</script>";
			  header("refresh:0.5;url=adminoperate.php");
		}
		else
		{
			echo "<script>alert('修改失败')</script>";
		}
	}
	
  
  require './View/manager_update.html';
?>