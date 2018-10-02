<?php 
   require './common/function.php';
	
     $id=isset($_GET['id'])?$_GET['id']:'';

	
	 $sql="DELETE FROM `evaluate` WHERE id=$id";

	 $row=query_sql($sql);
	 if($row)
	 {
        echo "<script>alert('删除成功')</script>";
        header("refresh:0.5;url=user_evaluateoperate.php");   	
	 }
	 else
	 {
	   echo "<script>alert('删除失败')</script>";
	 }
	
	  require '/bookstore/view/user_evaluateoperate.html';
?>