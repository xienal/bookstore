006<?php
   require './common/function.php';
    
    
     $fileinfo=@$_FILES['myfile'];
  $filename=$fileinfo['name'];
  $type=$fileinfo['type'];
  $size=$fileinfo['size'];
  $error=$fileinfo['error'];
  $tmpname=$fileinfo['tmp_name'];
  
  //服务器端设置限制
  $maxsize=245760; 
$allowExt=['jpeg','jpg','gif','png','tif']; $ext=pathinfo($filename,PATHINFO_EXTENSION);//提取文件的扩展名
  
  //目录信息
  $path="image";
  if(!file_exists($path)){
  	mkdir($path,0777,true);
  }
  
  if($error==0){//表示上传文件成功
  	if($size>$maxsize){
  		echo "上传文件过大";
  	}
	else if (!in_array($ext, $allowExt)){//判断文件的扩展名是否是定义的数组中的任意一个
		echo "上传的文件类型不对！" ;
	}
	else if(move_uploaded_file($tmpname,$path."/".$filename)){
		
		echo "文件上传成功！";
	}else
		{
			echo "文件上传失败！";
		}
  }else{
  	echo "其他错误";
  }
  
	if($_POST)
	{
		$photo=$path."/".$filename;
      $name=['customerID','bookID','bookName','brand','time','sale','price','kind','delivery','photo'];
	   foreach($name as $key=>$v)
	   {
	   if($key==9)
		 {
		 	 $update['photo']="'$photo'";
		 }
		 else{
		 	$data=isset($_POST[$v])?$_POST[$v]:'';
		    $fil[]=$v;
		    $update[]="'$data'";
		 }
	   }
	   $update_str=implode(',', $update);
	   $fil_str=implode(',', $name);
	   //echo $update_str;
	   
	   $sql="INSERT INTO `orders`($fil_str) VALUES ($update_str)";
	   //echo $sql;
	   $row=query_sql($sql);
	  
	   if($row)
	   {
		  echo "<script>alert('下单成功')</script>";
          header("refresh:0.5;url=/bookstore/ordero.php");
		
	   }
	   else
	   {
	   	  echo "<script>alert('下单失败')</script>";
	   }
	}
	require './view/order_add.html';
?>