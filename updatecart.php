<?php
	
header('Content-type:text/html;charset=utf-8');
  require './common/function.php';

  
  $id=isset($_GET['id'])? $_GET['id']:"";

   $sql="select * from shop where id=$id";
  echo $sql;
   $result=query_sql($sql);
   $row=mysqli_fetch_assoc($result);

   
	if($_POST)
	{
		 $name=['bookID','customerID','bookName','brand','time','sale','price','kind','delivery','photo'];
		foreach($name as $v)
		{
			$data=isset($_POST[$v])?$_POST[$v]:'';//值是否为空。isset两种返回值true和false，三目预算符返回$_POST[$v]和空
			$update[]="$v='$data'";
			
		}
		
		$update_str=implode(',',$update);
		$update_sql=" UPDATE shop SET $update_str where id=$id";
		echo $update_str;
		$row=query_sql($update_sql);
		echo $row;
		if($row)
		{
			echo "<script>alert('加入购物车成功')</script>";
			  header("refresh:0.5;url=../bookstore/cart.php");
		}
		else
		{
			echo "<script>alert('加入购物车失败')</script>";
		}
	}
	
  
  require './view/updatecart.html';
?>