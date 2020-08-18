<!DOCTYPE html>
<html lang="ru">
<head>
	<?php $title="регистрация";
	 require "blocks/head.php"; ?>
</head>
<body>
	<?php require "blocks/header.php"; ?>
<main class="container mt-5">
	<div class="row">
		<div class="col-md-8">
			<h4>форма регистрации</h4>
			<form>
				<label for="username">Ваше имя</label>
				<Input id="username" name="username" class="form-control">
				<label for="email">Email</label>
				<Input id="email" name="email" class="form-control">
				<label for="login">Логин</label>
				<Input id="login" name="login" class="form-control">
				<label for="pass">Пароль</label>
				<Input type="password" id="pass" name="pass" class="form-control">
				<div class="alert alert-danger mt-2" id="errorBlock"></div>
				<button  type="button" id="reg_user" name="pass" class="btn btn-success mt-3">зарегистрироваться</button>
			</form>
		</div>
		<?php require "blocks/aside.php"; ?>
	</div>
</main>
<?php require "blocks/footer.php"; ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
	var send=$("#reg_user");
	send.click(function(){
		var name= $("#username").val();
		var email= $("#email").val();
		var pass= $("#pass").val();
		var login= $("#login").val();
		$.ajax({
			url:"ajax/reg.php",
			type:"POST",
			cache:false,
			data:{
				"username":name,
				"email":email,
				"login":login,
				"pass":pass
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