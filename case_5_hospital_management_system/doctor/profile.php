<?php

	session_start();

	error_reporting(0);

 ?>

<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>СУБ | Доктор - Профиль</title>
</head>
<body>

	<?php

		include("../include/header.php");

	?>

	<div class="container-fluid">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-2" style="margin-left: -20px;">
					<?php

	 					include("sidenav.php");
	 					include("../include/connection.php");

	 				 ?>
				</div>
				<div class="col-md-10">
					<h4 class="my-2">Доктор | Профиль</h4>
					<div class="container-fluid">

						<div class="col-md-12">
							<div class="row">
								<div class="col-md-6">
									<?php

										$doctor = $_SESSION['doctor'];

										$query = "SELECT * FROM doctors WHERE username='$doctor'";

										$res = mysqli_query($connect,$query);

										$row = mysqli_fetch_array($res);


		 								if (isset($_POST['upload'])) {

		 									$img = $_FILES['img']['name'];

		 									if (empty($img)) {

		 									}else {

		 										$query = "UPDATE doctors SET profile='$img'
		 												  WHERE username='$doctor'";

		 										$res = mysqli_query($connect,$query);

		 										if ($res) {
		 											move_uploaded_file($_FILES['img']['tmp_name'],"img/$img");
		 										}

		 									}

		 								}

	 							 	?>
									<form method="post" enctype="multipart/form-data">
	 								<?php

	 									echo "<img src='img/".$row['profile']."'
	 									 		   class='col-md-12 my-3'
	 									 		   style='height: 250px; width: 50%;'>";

	 								 ?>

	 								 	<input type="file"
	 								 	       name="img"
	 								 	       class="form-control my-1">

	 									<input type="submit"
	 								           name="upload"
	 								           class="btn btn-success"
	 								           value="Подтвердить">
	 								</form>

									<div class="my-3">

										<table class="table table-bordered">
											<tr>
												<th class="text-center" colspan="2">Информация</th>
											</tr>

											<tr>
												<td>Имя</td>
												<td><?php echo $row['firstname']; ?></td>
											</tr>

											<tr>
												<td>Фамилия</td>
												<td><?php echo $row['surname']; ?></td>
											</tr>

											<tr>
												<td>Имя пользователя</td>
												<td><?php echo $row['username']; ?></td>
											</tr>

											<tr>
												<td>Эл. почта</td>
												<td><?php echo $row['email']; ?></td>
											</tr>

											<tr>
												<td>Номер телефона</td>
												<td>+<?php echo $row['phone']; ?></td>
											</tr>

											<tr>
												<td>Пол</td>
												<td><?php echo $row['gender']; ?></td>
											</tr>

											<tr>
												<td>Зарплата</td>
												<td><?php echo $row['salary']; ?> ₽</td>
											</tr>
										</table>

				 					</div>

								</div>


								<div class="col-md-6">
									<h5 class="text-center my-2">Изменить Имя пользователя</h5>
									<?php

		 								if (isset($_POST['change_uname'])) {

		 									$uname = $_POST['uname'];

		 									if (empty($uname)) {

		 									}else {

		 										$query = "UPDATE doctors SET username='$uname'
		 										          WHERE username='$doctor'";

		 										$res = mysqli_query($connect,$query);

		 										if ($res) {

		 											$_SESSION['doctor'] = $uname;

		 										}

		 									}

		 								}

	 							 ?>
									<form method="post">
										<label>Имя Пользователя</label>
										<input type="text"
											   name="uname"
											   class="form-control"
											   autocomplete="off"
											   placeholder="Введите новое имя пользователя">
										<br>
										<input type="submit"
											   name="change_uname"
											   class="btn btn-success"
											   value="Подтвердить">
									</form>


									<?php

		 								if ($_POST['change_pass']) {

		 									$old_pass = $_POST['old_pass'];
		 									$new_pass = $_POST['new_pass'];
		 									$con_pass = $_POST['con_pass'];

		 									$ol = "SELECT * FROM doctors WHERE username='$doctor'";

		 									$old = mysqli_query($connect,$ol);
		 									$row = mysqli_fetch_array($old);

		 									if ($old_pass != $row['password']){

		 									}else if(empty($new_pass)){

		 									}else if ($con_pass != $new_pass){

		 									}else {

		 										$query = "UPDATE doctors SET password='$new_pass' WHERE username='$doctor'";

		 										mysqli_query($connect,$query);

		 									}

		 								}

		 							?>

									<h5 class="text-center my-2">Изменить Пароль</h5>
									<form method="post">

										<div class="form-group">
											<label>Старый Пароль</label>
											<input type="password"
											   	   name="old_pass"
											       class="form-control"
											       autocomplete="off"
											       placeholder="Введите старый пароль">


										</div>

										<div class="form-group">
		 									<label>Новый Пароль</label>
		 									<input type="password"
		 									   	   name="new_pass"
		 									       class="form-control"
		 									       autocomplete="off"
		 									       placeholder="Введите новый пароль">
		 								</div>

	 									<div class="form-group">
		 									<label>Повторите Пароль</label>
		 									<input type="password"
		 									   	   name="con_pass"
		 									       class="form-control"
		 									       autocomplete="off"
		 									       placeholder="Введите новый пароль ещё раз">
		 								</div>
		 								<br>

	 									<input type="submit"
											   name="change_pass"
											   class="btn btn-success"
											   value="Подтвердить">
									</form>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>

</body>
</html>