<?php
	
header('Content-type:text/html;charset=utf-8');
  require './common/function.php';

  
  $id=isset($_GET['id'])? $_GET['id']:"";


   $sql="select * from shop where id=$id";
 
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
		$row=query_sql($update_sql);
		if($row)
		{
			echo "<script>alert('购买成功')</script>";
			  header("refresh:0.5;url=/bookstore/view/ordero.php");
		}
		else
		{
			echo "<script>alert('购买失败')</script>";
		}
	}
	
  
  require './view/buycart.html';
?>