<?php
	require '../bookstore/common/function.php';
$search =$_POST['search'];
$sql="select * from book where bookName='$search' or bookID='$search' or kind='$search'";

$result=query_sql($sql);

//if($result)
//{
//	return $result;
//	redirect('search.php');
//}
//else{
//	  echo "<script>alert('没有找到相关的数据，请重输')</script>";
//}

require '../bookstore/view/search.html';
?>	