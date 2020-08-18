<?php
$title= trim(filter_var($_POST["title"], FILTER_SANITIZE_STRING));
$intro= trim(filter_var($_POST["intro"], FILTER_SANITIZE_STRING));
$text= trim(filter_var($_POST["text"], FILTER_SANITIZE_STRING));
$error="";
if(strlen($title)<=3){
	$error='введите заголовок статьи';
}
else if(strlen($intro)<=15){
	$error='введите интро статьи';
}
else if(strlen($text)<=20){
	$error='введите текст статьи';
}
if($error!=''){
	echo $error;
	exit();
}
include "../blocks/connect.php";
$sql="INSERT INTO articles(title, intro, text, date, author) VALUES(?,?,?,?,?)";
$query=$pdo->prepare($sql);
$query->execute([$title,$intro,$text, time(), $_COOKIE["login"]]);
echo "готово";



