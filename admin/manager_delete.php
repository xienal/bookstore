<?php 
   require '../common/function.php';
	
     $id=isset($_GET['id'])?$_GET['id']:'';

	
	 $sql="DELETE FROM `manager` WHERE managerID=$id";

	 $row=query_sql($sql);
	 if($row)
	 {
        echo "<script>alert('删除成功')</script>";
        header("refresh:0.5;url=adminoperate.php");   	
	 }
	 else
	 {
	   echo "<script>alert('删除失败')</script>";
	 }
	
	  require './View/adminoperate.html';
?>