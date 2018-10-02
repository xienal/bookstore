<?php 
   require '../common/function.php';
	//获取ID并判断是否为空
     $id=isset($_GET['id'])?$_GET['id']:'';

	
	 $sql="DELETE FROM `orders` WHERE orderID=$id";

	 $row=query_sql($sql);
	 if($row)
	 {
        echo "<script>alert('删除成功')</script>";
        header("refresh:0.5;url=orderoperate.php");   	
	 }
	 else
	 {
	   echo "<script>alert('删除失败')</script>";
	 }
	
	  require './View/orderoperate.html';
?>