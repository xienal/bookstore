
<?php
	
 require '../common/function.php';

 //传入页码，读取p的值
 $page=isset($_GET['p'])?$_GET['p']:1;
 //获取数据
 $pageSize=4;//定义每页显示的条数
 $sql="select * from manager limit ".($page-1)*$pageSize.",$pageSize";//显示第一条开始显示，一页四条
 //select * from shop_user limit  0,3  
 //显示第一页的3条记录
 //limit的第一个参数表示：从表中第几条记录开始显示，第2个参数表示显示几条。
 //如：1，3表示从第2条记录开始显示3条。

 $result=query_sql($sql);//sql语句查询的数据库信息把这些信息给$result
 
 //计算有几条记录
 $sql_count="select count(*)from manager";
 $result2=query_sql($sql_count);
 $row2=mysqli_fetch_array($result2);//mysqli_fetch_assoc()：获取一行结果，并以数组返回
 //计算有几页
 $totalPage=ceil($row2[0]/$pageSize);//总页数$totalPage=ceil(表中总的记录数/$pagesize) ，通过ceil()函数向上取整。

require './View/adminoperate.html';//载入adminoperate.html模板
 

?>
