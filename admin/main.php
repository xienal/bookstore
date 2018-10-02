<?php
	
	session_start();
   	$name=@$_SESSION['managerName'];
    require './View/main.html';
?>
