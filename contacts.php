<!DOCTYPE html>
<html lang="ru">
<head>
	<?php $title="контакты";
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
				<label for="mess">сообщение</label>
				<textarea id="mess" name="mess" class="form-control"></textarea>
				<div class="alert alert-danger mt-2" id="errorBlock"></div>
				<button  type="button" id="mess_send" name="mess_send" class="btn btn-success mt-3">отправить</button>
			</form>
		</div>
		<?php require "blocks/aside.php"; ?>
	</div>
</main>
<?php require "blocks/footer.php"; ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
	var send=$("#mess_send");
	send.click(function(){
		var name= $("#username").val();
		var email= $("#email").val();
		var mess= $("#mess").val();
		$.ajax({
			url:"ajax/mail.php",
			type:"POST",
			cache:false,
			data:{
				"username":name,
				"email":email,
				"mess":mess
			},
			dataType:"html",
			success: function(data){
					if(data == 'готово'){
						$("#errorBlock").hide();
						send.text("всё готово");
						username="";
						mess="";
						email="";
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