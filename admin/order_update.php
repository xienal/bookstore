<?php
	//设定编码格式
header('Content-type:text/html;charset=utf-8');
  require '../common/function.php';

  
  $id=isset($_GET['id'])? $_GET['id']:"";

  
   $sql="select * from orders where orderID=$id";

   $result=query_sql($sql);
   $row=mysqli_fetch_assoc($result);

   
	if($_POST)
	{
		
		$name=['customerID','bookID','bookName','brand','time','sale','price','kind','delivery','photo'];
		foreach($name as $v)
		{
			$data=isset($_POST[$v])?$_POST[$v]:'';//值是否为空。isset两种返回值true和false，三目预算符返回$_POST[$v]和空
			$update[]="$v='$data'";
			
		}
		
		$update_arr=implode(',',$update);
		$update_sql=" UPDATE orders SET $update_arr where orderID=$id";
		$row=query_sql($update_sql);
		if($row)
		{
			echo "<script>alert('修改成功')</script>";
			  header("refresh:0.5;url=orderoperate.php");
		}
		else
		{
			echo "<script>alert('修改失败')</script>";
		}
	}
	
  
  require './View/order_update.html';
?>