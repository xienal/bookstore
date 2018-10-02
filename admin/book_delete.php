<?php 
   require '../common/function.php';
	//读取用户要删除的ID
     $id=isset($_GET['id'])?$_GET['id']:'';

	
	 $sql="delete from book where bookID=$id";

	 $row=query_sql($sql);
	 if($row)
	 {
        echo "<script>alert('删除成功')</script>";
        header("refresh:0.5;url=bookoperate.php");   	
	 }
	 else
	 {
	   echo "<script>alert('删除失败')</script>";
	 }
	
	  require './View/bookoperate.html';
?>