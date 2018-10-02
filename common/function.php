<?php
	//函数是程序中用来实现特定功能的代码段
	function redirect($url)//redirect()实现页面跳转的函数
	{
		header("Location:$url");//重定向到目标URL地址
		exit;
	}
	//连接数据库
	function connect_sql()
	{
		//连接数据库
		$link =mysqli_connect('127.0.0.1:3306','root','123456','book');//连接数据库，通过$link保存
	
		if($link)
       {
       	return $link;//返回连接结果
	   echo " 连接成功";
        }
       else
        {
        	return false;
	 	echo " 连接失败";
        }
	}
	//查询数据库
	function query_sql($sql)//$sql接受增删改查的语句 query_sql自定义的函数
	{
		$link =mysqli_connect('127.0.0.1:3306','root','root','book');//连接数据库，通过$link保存
		//设置字符集，避免乱码
		mysqli_query($link,'set names utf8');
		//$result变量接收查询的sql语句的所有数据
		$result=mysqli_query($link,$sql);
		
		if($result)
       {
       	return $result;////返回处理结果集
	  
        }
       else
        {
        	die('SQL语句执行失败！');
	 	
        }
	}
    

?>

