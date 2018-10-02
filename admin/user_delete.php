<?php 
   require '../common/function.php';
	//获取要删除的ID
     $id=isset($_GET['id'])?$_GET['id']:'';

	
	 $sql="DELETE FROM `customer` WHERE customerID=$id";

	 $row=query_sql($sql);
	 if($row)
	 {
        echo "<script>alert('删除成功')</script>";
        header("refresh:0.5;url=manageroperate.php");   	
	 }
	 else
	 {
	   echo "<script>alert('删除失败')</script>";
	 }
	
	  require './View/manageroperate.html';
?>