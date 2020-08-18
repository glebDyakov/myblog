<?php if($_COOKIE["login"]==""){
	header("Location: /reg.php");
	exit();
} ?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<?php $title="добавление статьи";
	 require "blocks/head.php"; ?>
</head>
<body>
	<?php require "blocks/header.php"; ?>
<main class="container mt-5">
	<div class="row">
		<div class="col-md-8">
			<h4>добавление статьи</h4>
			<form>
				<label for="title">заголовок статьи</label>
				<Input id="title" name="title" class="form-control">
				<label for="pass">Интро статьи</label>
				<textarea name="intro" id="intro" class="form-control"></textarea>
				<label for="text">текст статьи</label>
				<textarea name="text" id="text" class="form-control"></textarea>
				<div class="alert alert-danger mt-2" id="errorBlock"></div>
				<button  type="button" id="article_send" name="article_send" class="btn btn-success mt-3">добавить</button>
			</form>
		</div>
		<?php require "blocks/aside.php"; ?>
	</div>
</main>
<?php require "blocks/footer.php"; ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
	var send=$("#article_send");
	send.click(function(){
		var title= $("#title").val();
		var intro= $("#intro").val();
		var text= $("#text").val();
		$.ajax({
			url:"ajax/add_article.php",
			type:"POST",
			cache:false,
			data:{
				"title":title,
				"intro":intro,
				"text":text
			},
			dataType:"html",
			success: function(data){
					if(data == 'готово'){
						$("#errorBlock").hide();
						send.text("всё готово");
					}else {
						$("#errorBlock").show();
						$("#errorBlock").text(data);
					}
				}
		});
	});


</script>
</body>
</html>