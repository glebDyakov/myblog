<?php 
$login= trim(filter_var($_POST["login"], FILTER_SANITIZE_STRING));
$pass= trim(filter_var($_POST["pass"], FILTER_SANITIZE_STRING));
setcookie("login",$login, time() + 3600*24*30, "/");
$error="";
if(strlen($login)<=3){
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
//require_once "../blocks/connect.php";
require_once "../blocks/connect.php";
$sql="SELECT `id` FROM `users` WHERE `login`=:login && `pass`=:password";
$query=$pdo->prepare($sql);
$query->execute(['login'=>$login, 'password'=>$pass]);
$user=$query->fetch(PDO::FETCH_OBJ);
if($user->id==0){
	echo "такого пользователя не существует";
}else{
	//setcookie("log", $login, time() + 3600*24*30);
	echo "готово";
}

