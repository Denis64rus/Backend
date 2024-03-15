<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>СУБ | Главная</title>
</head>
<body>

	<?php
		include("include/header.php");
	 ?>

	<div style="margin-top: 50px"></div>

	<div class="container">
	 	<div class="col-md-12">
	 		<div class="row">
	 			<div class="col-md-3 mx-1 shadow">
	 				<img src="img/info.jpg" alt="info" style="width: 100%; height: 237px;">
	 				<h5 class="text-center">Дополнительная информация</h5>
	 				<a href="#">
	 					<button class="btn btn-success my-3" style="margin-left: 38%;">Ещё</button>
	 				</a>
	 			</div>
	 			<div class="col-md-4 mx-1 shadow">
	 				<img src="img/patient.jpg" alt="patient" style="width: 100%;">
	 				<h5 class="text-center">Создайте учетную запись, чтобы мы могли позаботиться о вас</h5>
	 				<a href="account.php">
	 					<button class="btn btn-success my-3" style="margin-left: 27%;">Создать Аккаунт</button>
	 				</a>
	 			</div>
	 			<div class="col-md-4 mx-1 shadow">
	 				<img src="img/doctor.jpg" alt="doctor" style="width: 100%;">
	 				<h5 class="text-center">Мы нанимаем докторов</h5><br>
	 				<a href="doctor_register.php">
	 					<button class="btn btn-success my-3" style="margin-left: 30%;">Подать Заявку</button>
	 				</a>
	 			</div>
	 		</div>
	 	</div>
	</div>

</body>
</html>