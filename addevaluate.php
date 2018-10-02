<?php
   require './common/function.php';
    $glassesID=@$_POST['bookID'];
$customerID=@$_POST['customerID'];
$glassesName=@$_POST['bookName'];
$customerName=@$_POST['customerName'];
$evaluate=@$_POST['evaluate'];


 //获取要添加进购物车的字段名添加到数组中 
	if($_POST)
	{
		
        $name=['bookID','customerID','bookName','customerName','evaluate'];
	   foreach($name as $v)
	   {
		  $data=isset($_POST[$v])?$_POST[$v]:'';
		  $fil[]=$v;
		  $update[]="'$data'";
	   }
	   $update_str=implode(',', $update);
	   $fil_str=implode(',', $fil);
	   
	   $sql="INSERT INTO evaluate ($fil_str) VALUES ($update_str)";
	   //echo $sql;
	   $row=query_sql($sql);
	  
	   if($row)
	   {
		  echo "<script>alert('评论发表成功')</script>";
          header("refresh:0.5;url=../bookstore/user_evaluateoperate.php");
		
	   }
	   else
	   {
	   	  echo "<script>alert('评论发表失败')</script>";
	   }
	}
	require './view/addevaluate.html';
?>