<?php

	session_start();

	include("include/connection.php");

	if (isset($_POST['login'])) {

		$username = $_POST['uname'];
	 	$password = $_POST['pass'];

	 	$error = array();

	 	if (empty($username)) {
	 		$error['admin'] = "Введите имя пользователя";
	 	}else if (empty($password)) {
	 		$error['admin'] = "Введите пароль";
	}

	if (count($error) == 0) {

		$query = "SELECT * FROM  admin WHERE username='$username' AND password='$password'";

		$result = mysqli_query($connect, $query);

		if (mysqli_num_rows($result) == 1) {
			echo "<script>alert('Вы вошли как администратор')</script>";

			$_SESSION['admin'] = $username;

			header("Location: admin/index.php");
			exit();
		}else {
			echo "<script>alert('Неверное имя пользователя или пароль')</script>";
		}

	}
}

 ?>

<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>СУБ | Вход для Администратора</title>
</head>
<body style="background-image: url(img/back.jpg);
	 		 background-repeat: no-repeat;
	 		 background-size: cover;">

	<?php
		include("include/header.php");
 	?>

 	<div style="margin-top: 60px;"></div>

 	<div class="container">
 		<div class="col-md-12">
 			<div class="row">
 				<div class="col-md-3"></div>
 				<div class="col-md-6">
 					<form method="post" style="background-color: lightcyan; padding: 46px;" class="my-2">
 						<h3 style="text-align: center;">Вход для Администратора</h3><br>

 							<div>
 								<?php

 									if (isset($error['admin'])) {

 										$sh = $error['admin'];

 										$show = "<h6 class='alert alert-danger'>$sh</h6>";

 									}else {

 										$show = "";
 									}

 									echo $show;

 								 ?>
 							</div>

 						<div class="form-group">
 							<label style="margin: 5px;">Имя пользователя</label>
 							<input type="text"
 								   name="uname"
 								   class="form-control"
 								   autocomplete="off"
 								   placeholder="Введите Имя пользователя">
 						</div>
 						<div class="form-group">
 							<label style="margin: 5px;">Пароль</label>
 							<input type="password"
 								   name="pass"
 								   class="form-control"
 								   autocomplete="off"
 								   placeholder="Введите Пароль">
 						</div>

 						<input type="submit"
 							   name="login"
 							   class="btn btn-success"
 							   style="margin-top: 15px;
 							   		  margin-left: 40%;"
 							   value="Войти">
 					</form>
 				</div>
 				<div class="col-md-3"></div>
 			</div>
 		</div>
 	</div>

</body>
</html>