<?php
  require'./common/function.php';
  $customerName =isset($_POST['customerName'])?$_POST['customerName']:'';
  $str="select * from customer where customerName='$customerName'";
  $result=query_sql($str);
  $row=mysqli_num_rows($result);
  if($row>=1)
  {
  	echo '1';
  	
  }
  else
  {
  	echo '0';
  }
  
?>