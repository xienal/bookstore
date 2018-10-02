<html>
	<style>
	</style>
<body>
<?php
	
 require '../common/function.php';

 //传入页码isset()用于判断变量或数组是否存在，三元运算符存在取P的值，不存在为1；
 $page=isset($_GET['p'])?$_GET['p']:1;
 //获取数据
 $pageSize=4;//定义每页显示的条数
 $sql="select * from suggestion limit ".($page-1)*$pageSize.",$pageSize";
 //显示第一条开始显示，一页四条
 //select * from shop_user limit  0,3  
 //显示第一页的3条记录
 //limit的第一个参数表示：从表中第几条记录开始显示，第2个参数表示显示几条。
 //如：1，3表示从第2条记录开始显示3条。
 $result=query_sql($sql);
 //计算有几条记录
 $sql_count="select count(*)from suggestion";
 $result2=query_sql($sql_count);
 $row2=mysqli_fetch_array($result2);
 //计算有几页
 $totalPage=ceil($row2[0]/$pageSize);
 

require './View/cusuggestion.html';
 

?>
</body>
</html>