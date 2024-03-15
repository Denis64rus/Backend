<?php

	include("include/connection.php");

	if (isset($_POST['register'])) {

		$firstname = $_POST['fname'];
		$surname = $_POST['sname'];
		$username = $_POST['uname'];
		$email = $_POST['email'];
		$gender = $_POST['gender'];
		$phone = $_POST['phone'];
		$password = $_POST['pass'];
		$confirm_password = $_POST['con_pass'];

		$error = array();

		if (empty($firstname)) {
			$error['register'] = "Введите Имя";
		}else if (empty($surname)) {
			$error['register'] = "Введите Фамилию";
		}else if (empty($username)) {
			$error['register'] = "Введите Имя пользователя";
		}else if (empty($email)) {
			$error['register'] = "Введите Эл. почту";
		}else if ($gender == "") {
			$error['register'] = "Выберите свой пол";
		}else if (empty($phone)) {
			$error['register'] = "Введите Номер телефона";
		}else if (empty($password)) {
			$error['register'] = "Введите Пароль";
		}else if ($confirm_password != $password) {
			$error['register'] = "Введённые Пароли не совпадают";
		}

		if (count($error) == 0) {

			$query = "INSERT INTO patients(firstname,surname,username,email,gender,phone,password,data_reg,profile) VAlUES('$firstname','$surname','$username','$email','$gender','$phone','$password',NOW(),'patient.jpg')";

			$result = mysqli_query($connect,$query);

			if ($result) {

				echo "<script>alert('Регистрация прошла успешно')</script>";

				header("Location: patientlogin.php");

			}else {

				echo "<script>alert('Произошла ошибка регистрации')</script>";

			}

		}
	}

	if (isset($error['register'])) {

		$s = $error['register'];

		$show = "<h6 class='text-center alert alert-danger'>$s</h6>";

	}else {

		$show = "";

	}

 ?>

<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>СУБ | Регистрация</title>
</head>
<body style="background-image: url(img/back.jpg);
	 		 background-repeat: no-repeat;
	 		 background-size: cover;">

	<?php

		include("include/header.php");

	?>

	<div class="container-fluid">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-3"></div>
				<div class="col-md-6">
					<form method="post" style="background-color: lightcyan; padding: 46px;" class="my-2">
 						<h3 style="text-align: center;">Регистрация</h3><br>

 							<div>

 								<?php echo $show; ?>

 							</div>

 						<div class="form-group">
 							<label style="margin: 5px;">Имя</label>
 							<input type="text"
 								   name="fname"
 								   class="form-control"
 								   autocomplete="off"
 								   placeholder="Введите Имя"
 								   value="<?php if (isset($_POST['fname'])) echo $_POST['fname']; ?>">
 						</div>
 						<div class="form-group">
 							<label style="margin: 5px;">Фамилия</label>
 							<input type="text"
 								   name="sname"
 								   class="form-control"
 								   autocomplete="off"
 								   placeholder="Введите Фамилию"
 								   value="<?php if (isset($_POST['sname'])) echo $_POST['sname']; ?>">
 						</div>
 						<div class="form-group">
 							<label style="margin: 5px;">Имя пользователя</label>
 							<input type="text"
 								   name="uname"
 								   class="form-control"
 								   autocomplete="off"
 								   placeholder="Введите Имя пользователя"
 								   value="<?php if (isset($_POST['uname'])) echo $_POST['uname']; ?>">
 						</div>
 						<div class="form-group">
 							<label style="margin: 5px;">Эл. почта</label>
 							<input type="email"
 								   name="email"
 								   class="form-control"
 								   autocomplete="off"
 								   placeholder="Введите Эл. почту"
 								   value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>">
 						</div>
 						<div class="form-group">
 							<label style="margin: 5px;">Ваш Пол</label>
 							<select name="gender" class="form-control">
 								<option value="">Выберите пол</option>
 								<option value="male">Мужской</option>
 								<option value="female">Женский</option>
 							</select>
 						</div>
 						<div class="form-group">
 							<label style="margin: 5px;">Номер телефона</label>
 							<input type="number"
 								   name="phone"
 								   class="form-control"
 								   autocomplete="off"
 								   placeholder="Введите Номер телефона"
 								   value="<?php if (isset($_POST['phone'])) echo $_POST['phone']; ?>">
 						</div>
 						<div class="form-group">
 							<label style="margin: 5px;">Пароль</label>
 							<input type="password"
 								   name="pass"
 								   class="form-control"
 								   autocomplete="off"
 								   placeholder="Введите Пароль">
 						</div>
 						<div class="form-group">
 							<label style="margin: 5px;">Повторите Пароль</label>
 							<input type="password"
 								   name="con_pass"
 								   class="form-control"
 								   autocomplete="off"
 								   placeholder="Введите Пароль">
 						</div>

 						<input type="submit"
 							   name="register"
 							   class="btn btn-success"
 							   style="margin-top: 15px;
 							   		  margin-left: 40%;"
 							   value="Регистрация">
 						<p>У меня уже есть аккаунт <a href="patientlogin.php">Войти</a></p>
 					</form>
				</div>
				<div class="col-md-3"></div>
			</div>
		</div>
	</div>

</body>
</html>