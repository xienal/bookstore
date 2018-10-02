<?php
	session_start();
//生成验证码（参数4count表示生成位数）	
function captcha_create($count=5)
{
	//保存生成验证码
$code='';
$charset='ABCDEFGHIJKLMNOPQRSTUVWXYZ123456789';//随机数
//随机自动生成指定位数的验证码
$len =strlen($charset) -1;

for($i=0;$i<$count;$i++)
	{
		$code .= $charset[rand(0,$len)];
	}
	return $code;//返回验证码文本
}
//输出验证图像（参数$code是验证码文本）
function captcha_show($code){
	//创建图片资源，随机生成背景颜色
$im=imagecreate($x=250 , $y=62);
imagecolorallocate($im,rand(50,200),rand(0,255),rand(0,255));
// 设置字体颜色和样式
$fontColor=imagecolorallocate($im,rand(0,255),rand(0,255),rand(0,255));
$fontstyle="../font/captcha.ttf";
//生成指定长度的验证码
for($i=0,$len=strlen($code);$i<$len;++$i)
	{
		imagettftext($im,
		30,//字符尺寸
		rand(0,20) - rand(0,25),//随机设置字符倾斜角度
		32+$i*40,rand(30,50),//随机设置字符坐标
	   $fontColor,//字体颜色
		$fontstyle,//字符样式
		$code[$i]);//字符内容
	}
	//添加6条干扰线
	for($i=0;$i<6;++$i){
		$lineColor =imagecolorallocate($im,rand(0,255),rand(0,255),rand(0,255));
		imageline($im,rand(0,$x),0,rand(0,$x),$y,$lineColor);	
	}
	//添加300个噪点
	for($i=0;$i<300;++$i){
		imagesetpixel($im,rand(0,$x),rand(0,$y),$fontColor);
	}
   header('Content-type:image/gif');
   imagegif($im);
   imagedestroy($im);
}
$code=captcha_create();
captcha_show($code);
$_SESSION['captcha']=$code;
?>