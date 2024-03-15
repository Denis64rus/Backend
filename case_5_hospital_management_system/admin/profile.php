<?php

	session_start();

 ?>

<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>СУБ | Администратор - Профиль</title>
</head>
<body>

	<?php

		include("../include/header.php");
		include("../include/connection.php");

		$ad = $_SESSION['admin'];

		$query = "SELECT * FROM admin WHERE username='$ad'";

		$res = mysqli_query($connect,$query);

		while ($row = mysqli_fetch_array($res)) {

			$username = $row['username'];
			$profiles = $row['profile'];

		}

	 ?>

	 <div class="container-fluid">
	 	<div class="col-md-12">
	 		<div class="row">
	 			<div class="col-md-2" style="margin-left: -20px;">

	 				<?php

	 					include("sidenav.php");

	 				 ?>

	 			</div>
	 			<div class="col-md-10">
	 				<h4 class="my-2">Администратор | Профиль</h4>
	 				<div class="col-md-12">
	 					<div class="row">
	 						<div class="col-md-6">

	 							<?php

	 								if (isset($_POST['update'])) {

	 									$profile = $_FILES['profile']['name'];

	 									if (empty($profile)) {



	 									}else {

	 										$query = "UPDATE admin SET profile='$profile'
	 												  WHERE username='$ad'";

	 										$result = mysqli_query($connect,$query);

	 										if ($result) {
	 											move_uploaded_file($_FILES['profile']['tmp_name'],"img/$profile");
	 										}

	 									}

	 								}

	 							 ?>

	 							<form method="post" enctype="multipart/form-data">
	 								<?php

	 									echo "<img src='img/$profiles'
	 									 class='col-md-12'
	 									 style='height: 250px; width: 50%;'>";

	 								 ?>

	 								 <br><br>
	 								 <div class="form-group">
	 								 	<label>Обновить Профиль</label>
	 								 	<input type="file"
	 								 	       name="profile"
	 								 	       class="form-control">
	 								 </div>
	 								 <br>
	 								 <input type="submit"
	 								        name="update"
	 								        value="Обновить"
	 								        class="btn btn-success">
	 							</form>
	 						</div>
	 						<div class="col-md-6">

	 							<?php

	 								if (isset($_POST['change'])) {

	 									$uname = $_POST['uname'];

	 									if (empty($uname)) {



	 									}else {

	 										$query = "UPDATE admin SET username='$uname'
	 										          WHERE username='$ad'";

	 										$res = mysqli_query($connect,$query);

	 										if ($res) {

	 											$_SESSION['admin'] = $uname;

	 										}

	 									}

	 								}

	 							 ?>

	 							<form method="post">
	 								<label>Изменить Имя пользователя</label>
	 								<input type="text"
	 									   name="uname"
	 									   class="form-control"
	 									   autocomplete="off">
	 								<br>

	 								<input type="submit"
	 									   name="change"
	 									   value="Изменить"
	 									   class="btn btn-success">
	 							</form>

	 							<br>

	 							<?php

	 								if (isset($_POST['update_pass'])) {

	 									$old_pass = $_POST['old_pass'];
	 									$new_pass = $_POST['new_pass'];
	 									$con_pass = $_POST['con_pass'];

	 									$error = array();

	 									$old = mysqli_query($connect,"SELECT * FROM admin WHERE username='$ad'");

	 									$row = mysqli_fetch_array($old);
	 									$pass = $row['password'];


	 									if (empty($old_pass)) {

	 										$error['p'] = "Введите старый пароль";

	 									}else if(empty($new_pass)){

	 										$error['p'] = "Введите новый пароль";

	 									}else if(empty($con_pass)){

	 										$error['p'] = "Повторите пароль";

	 									}else if($old_pass != $pass){

	 										$error['p'] = "Старый пароль введён неверно";

	 									}else if($new_pass != $con_pass){

	 										$error['p'] = "Новые пароли не совпадают";

	 									}


	 									if (count($error) == 0) {

	 										$query = "UPDATE admin SET password='$new_pass' WHERE username='$ad'";

	 										mysqli_query($connect,$query);

	 									}

	 								}


	 								if (isset($error['p'])) {

	 										$e = $error['p'];

	 										$show = "<h6 class='text-center alert alert-danger'>$e</h6>";

	 									}else {

	 										$show = "";

	 									}

	 							 ?>

	 							<form method="post">
	 								<h5 class="text-center my-4">Изменить Пароль</h5>
	 									<div>

	 										<?php

	 											echo $show;

	 										 ?>

	 									</div>
	 								<div class="form-group">
	 									<label>Введите Старый Пароль</label>
	 									<input type="password"
	 									   	   name="old_pass"
	 									       class="form-control"
	 									       autocomplete="off">
	 								</div>

	 								<div class="form-group">
	 									<label>Введите Новый Пароль</label>
	 									<input type="password"
	 									   	   name="new_pass"
	 									       class="form-control"
	 									       autocomplete="off">
	 								</div>

	 								<div class="form-group">
	 									<label>Повторите Пароль</label>
	 									<input type="password"
	 									   	   name="con_pass"
	 									       class="form-control"
	 									       autocomplete="off">
	 								</div>

	 								<br>

	 								<input type="submit"
	 									   name="update_pass"
	 									   value="Подтвердить"
	 									   class="btn btn-success">
	 							</form>

	 						</div>
	 					</div>
	 				</div>

	 			</div>
	 		</div>
	 	</div>
	 </div>

</body>
</html>