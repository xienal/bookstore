<?php  
session_start();
session_destroy();//结束当前会话
//为使框架整个页面跳转到登陆页
echo "<script>alert('已经退出登陆');parent.location.href='index.html';</script>";
?>