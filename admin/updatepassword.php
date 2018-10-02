<?php 
   require '../common/function.php';
	
	 session_start();
     $user=$_SESSION['managerName'];
     $pwd=isset($_POST['password'])?$_POST['password']:'';
     $newPwd=isset($_POST['newpassword'])?$_POST['newpassword']:'';
	 $newPwd1=isset($_POST['newpassword1'])?$_POST['newpassword1']:'';
	 
	 $sql="update manager set managerPsw=$newPwd WHERE managerName='$user' and managerPsw='$pwd'";
    if($newPwd==$newPwd1)
    {
	 $row=query_sql($sql);
	 if($row)
	 {
        echo "<script>alert('修改成功')</script>";
        header("refresh:0.5;url=/bookstore/admin/View/manager.html");   	
	 }
	 else
	 {
	   echo "<script>alert('修改失败')</script>";
	 }
	 }else{
	 	echo "<script>alert('两次密码输入不一致，请重输')</script>";
	 }
	
?>