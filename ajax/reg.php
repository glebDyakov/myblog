<?php
$username= trim(filter_var($_POST["username"], FILTER_SANITIZE_STRING));
$email= trim(filter_var($_POST["email"], FILTER_SANITIZE_EMAIL));
$login= trim(filter_var($_POST["login"], FILTER_SANITIZE_STRING));
$pass= trim(filter_var($_POST["pass"], FILTER_SANITIZE_STRING));
$error="";
if(strlen($username)<=3){
	$error='введите имя';
}
else if(strlen($email)<=3){
	$error='введите эмайл';
}
else if(strlen($login)<=3){
	$error='введите логин';
}
else if(strlen($pass)<=3){
	$error='введите пароль';
}
if($error!=''){
	echo $error;
	exit();
}

$hash="1";
$pass=md5($pass . $hash);
include "../blocks/connect.php";
$sql="INSERT INTO users(name, email, login, pass) VALUES(?,?,?,?)";
$query=$pdo->prepare($sql);
$query->execute([$username,$email,$login,$pass]);
echo "готово";

