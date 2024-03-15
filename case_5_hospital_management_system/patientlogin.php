<?php

	session_start();

	include("include/connection.php");

	if (isset($_POST['login'])) {

		$uname = $_POST['uname'];
		$password = $_POST['pass'];

		$error = array();

		$q = "SELECT * FROM  patients WHERE username='$uname' AND password='$password'";
		$qq = mysqli_query($connect, $q);

		$row = mysqli_fetch_array($qq);

		if (empty($uname)) {

			$error['login'] = "Введите Имя пользователя";

		}else if (empty($password)) {

			$error['login'] = "Введите Пароль";

		}



		if (count($error) == 0) {

			$query = "SELECT * FROM  patients WHERE username='$uname' AND password='$password'";
			$res = mysqli_query($connect, $query);

		if (mysqli_num_rows($res)) {

			echo "<script>alert('Вы вошли')</script>";

			$_SESSION['patient'] = $uname;

			header("Location: patient/index.php");
			exit();
		}else {
			echo "<script>alert('Неверное имя пользователя или пароль')</script>";
		}

	}
}

	if (isset($error['login'])) {

		$l = $error['login'];

		$show = "<h6 class='text-center alert alert-danger'>$l</h6>";

	}else {

		$show = "";

	}

 ?>

<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>СУБ | Вход для Пациента</title>
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
 						<h3 style="text-align: center;">Вход для Пациента</h3><br>

 							<div>
 								<?php echo $show; ?>
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
 						<p>У меня нет аккаунта <a href="account.php">Регистрация</a></p>
 					</form>
	 			</div>
	 			<div class="col-md-3"></div>
	 		</div>
	 	</div>
	 </div>
</body>
</html>