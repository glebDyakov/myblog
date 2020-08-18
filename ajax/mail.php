<?php
$username= trim(filter_var($_POST["username"], FILTER_SANITIZE_STRING));
$email= trim(filter_var($_POST["email"], FILTER_SANITIZE_EMAIL));
$mess= trim(filter_var($_POST["mess"], FILTER_SANITIZE_STRING));
$error="";
if(strlen($username)<=3){
	$error='введите имя';
}
else if(strlen($email)<=3){
	$error='введите эмайл';
}
else if(strlen($mess)<=3){
	$error='введите сообщение';
}
if($error!=''){
	echo $error;
	exit();
}
$from="example@mail.ru";
$subject="=?utf-8?B?".base64_encode("новое сообщение с сайта")."?=";
$headers="From: $from\r\nReply-to: $email\r\nContent-type:text/html; charset=utf-8\r\n";
mail($from,$subject,$mess,$headers);
echo "готово";
