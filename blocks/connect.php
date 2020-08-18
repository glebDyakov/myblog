<?php
$user='root';
$password='';
$db='php_db';
$host='localhost';
$dsn='mysql:host='.$host.';dbname='.$db;
$pdo=new PDO($dsn, $user, "");
