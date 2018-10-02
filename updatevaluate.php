<?php
	
header('Content-type:text/html;charset=utf-8');
  require './common/function.php';

  
  $id=isset($_GET['id'])? $_GET['id']:"";

  /*$result=mysqli_query($link,"SELECT * from customer where customerID=$id");*/
   $sql="select * from evaluate where id=$id";
  // echo $sql;
   $result=query_sql($sql);
   $row=mysqli_fetch_assoc($result);

   
	if($_POST)
	{
		  $name=['bookID','customerID','bookName','customerName','evaluate'];
		foreach($name as $v)
		{
			$data=isset($_POST[$v])?$_POST[$v]:'';//值是否为空。isset两种返回值true和false，三目预算符返回$_POST[$v]和空
			$update[]="$v='$data'";
			
		}
		
		$update_str=implode(',',$update);
		$update_sql=" UPDATE evaluate SET $update_str where id=$id";
		$row=query_sql($update_sql);
		if($row)
		{
			echo "<script>alert('评价修改成功')</script>";
			  header("refresh:0.5;url=../bookstore/user_evaluateoperate.php");
		}
		else
		{
			echo "<script>alert('评价修改失败')</script>";
		}
	}
	
  
  require './view/updatevaluate.html';
?>