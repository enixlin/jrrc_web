<?php 
$ch =curl_init ();
$str="http://109.0.223.182/jmpas/login.do?method=login&userName=J021016&password=394539&tiancom_zdtj=null";
$str1="http://109.0.223.182/jmpas/login.do?method=selectjs&jsdh=7&style=1";
$str2="http://109.0.223.182/jmpas/studio/queryParser.do?method=queryData&funId=wbckyjtjb&isForPage=true&queryConTipsValue=null&tjrq=20160321&sdbs=4&tjkj=1&page=1&rows=50";
//$str="http://96.0.32.11/oa/";
/*
curl_setopt($ch,CURLOPT_URL,$str);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
$output=curl_exec($ch);

curl_setopt($ch,CURLOPT_URL,$str1);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
$output=curl_exec($ch); 
*/

curl_setopt($ch,CURLOPT_URL,$str);
//curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
$output=curl_exec($ch);
if($output){
 var_dump(curl_getinfo($ch) );
	$output=null;
	curl_setopt($ch,CURLOPT_URL,$str1);
	$output=curl_exec($ch);
	if($output){
		$output=null;
		curl_setopt($ch,CURLOPT_URL,$str2);
		$output=curl_exec($ch);
	}
}

var_dump($output);
// 关闭cURL资源，并且释放系统资源
curl_close ( $ch );

