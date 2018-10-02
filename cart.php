<html>

<body>
<?php

 require './common/function.php';

 //传入页码
 $page=isset($_GET['p'])?$_GET['p']:1;
 //获取数据
 $pageSize=4;//定义每页显示的条数
 $sql="select * from shop limit ".($page-1)*$pageSize.",$pageSize";
 $result=query_sql($sql);
 //计算有几条记录
 $sql_count="select count(*)from shop";
 $result2=query_sql($sql_count);
 $row2=mysqli_fetch_array($result2);
 //计算有几页
 $totalPage=ceil($row2[0]/$pageSize);

require './view/cart.html';
 

?>
</body>
</html>