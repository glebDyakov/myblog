<!DOCTYPE html>
<html lang="ru">
<head>
	<?php 
	 $title="авторизация";
	 require "blocks/head.php"; ?>
</head>
<body>
	<?php require "blocks/header.php"; ?>
<main class="container mt-5">
	<div class="row">
		<div class="col-md-8">
			<?php if($_COOKIE["login"]==""): ?>
			<h4>форма авторизации</h4>
			<form>
				<label for="login">Логин</label>
				<Input id="login" name="login" class="form-control">
				<label for="pass">Пароль</label>
				<Input type="password" id="pass" name="pass" class="form-control">
				<div class="alert alert-danger mt-2" id="errorBlock"></div>
				<button  type="button" id="auth_user" name="pass" class="btn btn-success mt-3">зарегистрироваться</button>
			</form>
			<?php else: ?>
				<h2><?= $_COOKIE["login"] ?></h2>
				<button class="btn btn-danger" id="exit_btn">выйти</button>
			<?php endif;?>
		</div>
		<?php require "blocks/aside.php"; ?>
	</div>
</main>
<?php require "blocks/footer.php"; ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
	var send=$("#auth_user");
	var exit=$("#exit_btn");
	send.click(function(){
		var pass= $("#pass").val();
		var login= $("#login").val();
		$.ajax({
			url:"ajax/auth.php",
			type:"POST",
			cache:false,
			data:{
				"login":login,
				"pass":pass
			},
			dataType:"html",
			success: function(data){
					if(data == 'готово'){
						$("#errorBlock").hide();
						send.text("всё готово");
						document.location.reload(true);
					}else if(data!='готово'){
						$("#errorBlock").show();
						$("#errorBlock").text(data);
					}
				}
		});
	});
	exit.click(function(){
		$.ajax({
			url:"ajax/exit.php",
			type:"POST",
			cache:false,
			data:{},
			dataType:"html",
			success: function(data){
						document.location.reload(true);
				}
		});
	});


</script>
</body>
</html>