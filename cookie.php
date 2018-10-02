<?php
	
	//cookie是一种在远程浏览器端存储数据并以此数据来跟踪和识别用户的机制。
	//启用session
session_start();
//cookie 客户端，通过获取$_COOKIE中的visitcount元素，没有时默认为1，读取用户访问次数
$c=isset($_COOKIE["visitcount"])?$_COOKIE["visitcount"]:1;
$c=$_COOKIE["visitcount"]+1;
//创建cookie：

//setcookie(stringcookiename , string value , int expire);
// cookiename是需要设置的cookie的名字，将来需要调用时可以通过$_COOKIE[cookiename]来获取其中的值；
// expire为cookie的失效时间，是标准的UNIX时间标记，
//如果不设置失效时间，那么cookie的生命周期就是浏览器会话期间，一旦这个页面关闭了，相应的cookie也就自动消失。


//例如：setcookie('visitcount', $count , time()+60);有效时间一般是当前时间戳加需要延长的时间秒数。
//本例意思是名字是visitcount的cookie的有效时间为60秒。当前时间戳可以通过time()/mktime()来获取。
setcookie("visitcount",$c,time()+3600*24*999);
echo '你是第'.$_COOKIE["visitcount"]."次访问";
setcookie("visittime",date('Y-m-d'));//时间格式年-月-日
echo $_COOKIE["visittime"];
?>