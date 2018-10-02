<?php
	
   	session_start();
   	@$name=$_SESSION['user'];//@屏蔽错误信息
 require "./view/book.html";

 
?>