<!DOCTYPE html>
<html lang="ru">
<head>
	<?php 
	require_once "blocks/connect.php";
	$sql="SELECT * FROM articles WHERE id=:id";
	$query=$pdo->prepare($sql);
	$query->execute(["id"=>$_GET["id"]]);
	$article=$query->fetch(PDO::FETCH_OBJ);
	$title=$article->title;
	 require "blocks/head.php" ?>
</head>
<body>
	<?php require "blocks/header.php"; ?>
<main class="container mt-5">
	<div class="row">
		<div class="col-md-8 mb-3">
			<div class="jumbotron">
			<h1><?php echo $article->title?></h1>
			<p><b>автор статьи</b><mark><?=$article->author?></mark></p>
			<p><?php echo $article->intro?>
				<br><br>
			<?php echo $article->text?>
			</p>
			<?php
			$date=date("d ", $article->date);
			$arr=["января","февраля","марта","апреля","мая","июня","июля","августа","сентября","октября","ноября","декабря"];
			$date.=$arr[date("n",$article->date)-1];
			?>
			<p><b>время публикации</b><u><?= $date?></u></p>
		</div>
		<h3 class="mt-5">коментарии</h3>
	<form method="post" action="news.php?id=<?= $_GET['id']?>">
		<label for="username">Ваше имя</label>
		<Input id="username" name="username" value="<?=$_COOKIE["login"]?>" class="form-control">
		<label for="mess">сообщение</label>
		<textarea name="mess" id="mess" class="form-control"></textarea>
		<button  type="submit" id="mess_send" name="mess_send" class="btn btn-success mt-3 mb-5">добавить комментарий</button>
	</form>
	<?php
	if($_POST["username"]!="" && $_POST["mess"]!=""){
		$username=trim(filter_var($_POST["username"] , FILTER_SANITIZE_STRING));
		$mess=trim(filter_var($_POST["mess"] , FILTER_SANITIZE_STRING));
		$sql="INSERT INTO comments(name, mess, article_id) VALUES(?,?,?)";
		$query=$pdo->prepare($sql);
		$query->execute([$username, $mess, $_GET["id"]]);
	}
	?>
	<?php 
	$sql="SELECT * FROM comments WHERE article_id=:id ORDER BY id DESC";
	$query=$pdo->prepare($sql);
	$query->execute(["id"=> $_GET["id"]]);
	while($row=$query->fetch(PDO::FETCH_ASSOC)){
		echo "<div class='alert alert-info'><b>$row[name]</b>
		<p>$row->mess</p><p>$row[mess]</p></div>";
	}
	?>
		<?php require "blocks/aside.php"; ?>
	</div>
	
</main>
<?php require "blocks/footer.php"; ?>
</body>
</html>