<!DOCTYPE html>
<html lang="ru">
<head>
	<?php $title="главная";
	 require "blocks/head.php" ?>
</head>
<body>
	<?php require "blocks/header.php"; ?>
<main class="container mt-5">
	<div class="row">
		<div class="col-md-8">
			<?php require "blocks/connect.php";
			$sql="SELECT * FROM articles ORDER BY date DESC";
			$query=$pdo->query($sql);
			while($row=$query->fetch(PDO::FETCH_ASSOC)){
				echo "<h2>$row[title]</h2>
				<p>$row[intro]</p>
				<mark>$row[author]</mark>
				<a href='news.php?id=$row[id]' title='$row[title]'>
				<button class='btn btn-warning mb-5'>читать далее</button>
				</a>";
			}
			?>
		</div>
		<?php require "blocks/aside.php"; ?>
	</div>
</main>
<?php require "blocks/footer.php"; ?>
</body>
</html>