<?php
//解决中文乱码问题	
header('Content-type:text/html;charset=utf-8');
  require '../common/function.php';

  //获取用户修改的ID信息
  $id=isset($_GET['id'])? $_GET['id']:"";//判断是不是为空

 
   $sql="select * from book where bookID=$id";
 
   $result=query_sql($sql);//sql查询要修改的bookID对应的信息
   
   $row=mysqli_fetch_assoc($result);//获取要修改这一行值，$result以关联数组把值给$row

   
	if($_POST)
	{
		$name=['bookName','brand','bookNum','price','kind','discount','photo'];
		foreach($name as $v)
		{
			$data=isset($_POST[$v])?$_POST[$v]:'';//$data值是否为空。isset两种返回值true和false，三目预算符返回$_POST[$v]和空
			$update[]="$v='$data'";
			
		}
		
		$update_arr=implode(',',$update);
		$update_sql=" update book set $update_arr where bookID=$id";
		$row=query_sql($update_sql);
		if($row)
		{
			echo "<script>alert('修改成功')</script>";
			  header("refresh:0.5;url=bookoperate.php");
		}
		else
		{
			echo "<script>alert('修改失败')</script>";
		}
	}
	
  
  require './View/book_update.html';
?>