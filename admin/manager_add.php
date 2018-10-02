<?php
   require'../common/function.php';
    
	if($_POST)
	{
     $name=['managerName','managerPsw'];
	   foreach($name as $v)
	   {
		  $data=isset($_POST[$v])?$_POST[$v]:'';
		  $fil[]=$v;
		  $update[]="'$data'";
	   }
	   $update_str=implode(',', $update);
	   $fil_str=implode(',', $fil);
	   //echo $update_str;
	   
	   $sql="INSERT INTO `manager`($fil_str) VALUES ($update_str)";
	   //echo $sql;
	   $row=query_sql($sql);
	  
	   if($row)
	   {
		  echo "<script>alert('注册成功')</script>";
          //redirect('/glassess/admin/manageroperate.php');
          header("refresh:0.5;url=adminoperate.php");
		
	   }
	   else
	   {
	   	  echo "<script>alert('注册失败')</script>";
	   }
	}
	require './View/manager_add.html';
?>
