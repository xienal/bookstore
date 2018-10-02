
<?php
   require'../common/function.php';
   
 //接收文件、临时文件的信息
  $fileinfo=@$_FILES['myfile'];
  $filename=$fileinfo['name'];
  $type=$fileinfo['type'];
  $size=$fileinfo['size'];
  $error=$fileinfo['error'];
  $tmpname=$fileinfo['tmp_name'];
  
  //服务器端设置限制
  $maxsize=245760; 
$allowExt=['jpeg','jpg','gif','png','tif']; //图片的类型
$ext=pathinfo($filename,PATHINFO_EXTENSION);//提取文件的扩展名
  
  //目录信息
  $path="image";//图片上传的目录
  if(!file_exists($path)){
  	mkdir($path,0777,true);//创建多级目录
  	
  	//第一个参数：必须，代表要创建的多级目录的路径；
//第二个参数：设定目录的权限，默认是 0777，意味着最大可能的访问权；
//第三个参数：true表示允许创建多级目录。
  }
  
  if($error==0){//表示上传文件成功
  	if($size>$maxsize){
  		echo "上传文件过大";
  	}
	else if (!in_array($ext, $allowExt)){//判断图片的扩展名是否是定义的类型数组中的任意一个
		echo "上传的文件类型不对！" ;
	}
	else if(move_uploaded_file($tmpname,$path."/".$filename)){//文件上传成功，将文件保存到目录下$tmpname中
		
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
		//获取图片路径和名称
		$photo=$path."/".$filename;
		//数据库中的字段
     $name=['bookName','brand','bookNum','price','kind','discount','photo'];
    // var_dump($name);
	   foreach($name as $key=>$v)//$name数组名，$key键（bookName)=>$v值(红楼梦)
	   {
		 
		 if($key==6)
		 {
		 	 $update['photo']="'$photo'";//获取到photo的路径给$update['photo'];
		 }
		 else{
		 	//$data取出管理员添加的图书信息
		 	$data=isset($_POST[$v])?$_POST[$v]:'';//$_POST[$v]存在输出v,不存在为空（判断为空的语句）
		    $all[]=$v;
		    $update[]="'$data'";
		    
		 }
	   }
	   $update_arr=implode(',', $update);
	   $all_arr=implode(',', $name);
	  
	   
	   $sql="INSERT INTO `book`($all_arr) VALUES ($update_arr)";
	
	  $row=query_sql($sql);
	   
	   if($row)
	   {
		  echo "<script>alert('上新成功')</script>";
      header("refresh:0.5;url=bookoperate.php");
		
	   }
	   else
	   {
	   	  echo "<script>alert('上新失败')</script>";
	   }
	}
		
	
//载入HTML模板
	require './View/book_add.html';
?>
