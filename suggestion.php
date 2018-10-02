<?php
   require './common/function.php';
    
	if($_POST)
	{
     $name=['customerID','suggestion'];
	   foreach($name as $v)
	   {
		  $data=isset($_POST[$v])?$_POST[$v]:'';
		  $fil[]=$v;
		  $update[]="'$data'";
	   }
	   $update_str=implode(',', $update);
	   $fil_str=implode(',', $fil);
	   //echo $update_str;
	   
	   $sql="INSERT INTO `suggestion` ($fil_str) VALUES ($update_str)";
	   //echo $sql;
	   $row=query_sql($sql);
	  
	   if($row)
	   {
		  echo "<script>alert('提交成功')</script>";
          header("refresh:0.5;url=./admin/cusuggestion.php");
		
	   }
	   else
	   {
	   	  echo "<script>alert('提交失败')</script>";
	   }
	}
	require './view/suggestion.html';
?>