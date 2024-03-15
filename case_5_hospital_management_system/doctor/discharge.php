<?php

	session_start();

 ?>

<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>СУБ | Доктор - Записи на прием - Пациент</title>
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
	 				<h4 class="my-2">Доктор | Записи на прием - Пациент</h4>
	 				<?php

	 					if (isset($_GET['id'])) {

	 						$id = $_GET['id'];

	 						$query = "SELECT * FROM appointment WHERE id='$id'";

	 						$res = mysqli_query($connect,$query);

	 						$row = mysqli_fetch_array($res);

	 					}

	 				?>
	 				<div class="col-md-12">
	 					<div class="row">
	 						<div class="col-md-6">
	 							<table class="table table-bordered text-center my-1">
	 								<tr>
	 									<td colspan="2" class="text-center">Запись пациента</td>
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
	 									<td>Пол</td>
	 									<td><?php echo $row['gender']; ?></td>
	 								</tr>
	 								<tr>
	 									<td>Номер телефона</td>
	 									<td><?php echo $row['phone']; ?></td>
	 								</tr>
	 								<tr>
	 									<td>Дата записи</td>
	 									<td><?php echo $row['appointment_date']; ?></td>
	 								</tr>
	 								<tr>
	 									<td>Симптомы</td>
	 									<td><?php echo $row['symptoms']; ?></td>
	 								</tr>
	 							</table>
	 						</div>
	 						<div class="col-md-6">
	 							<h5 class="text-center my-1">Оплата</h5>
	 							<?php

	 								if (isset($_POST['send'])) {

	 									$pat = $_POST['pat'];
	 									$des = $_POST['des'];

	 									if (empty($pat)) {

	 									}else if(empty($des)){

	 									}else {

	 										$doc = $_SESSION['doctor'];

	 										$fname = $row['firstname'];

	 										$query = "INSERT INTO income(doctor,patient,date_discharge,amount_paid,description) VAlUES('$doc','$fname',NOW(),'$pat','$des')";

	 										$res = mysqli_query($connect,$query);

	 										if ($res) {

	 											echo "<script>alert('Квитанция на оплату отправлена')</script>";

	 											mysqli_query($connect, "UPDATE appointment SET status='Discharge' WHERE id='$id'");

	 										}

	 									}

	 								}

	 							?>
	 							<form method="post">
	 								<label>Стоимость</label>
	 								<input type="number"
	 									   name="pat"
	 									   class="form-control my-2"
	 									   autocomplete="off"
	 									   placeholder="Напишите стоимость за прием">

	 								<label>Рекомендации</label>
	 								<input type="text"
	 									   name="des"
	 									   class="form-control my-2"
	 									   autocomplete="off"
	 									   placeholder="Напишите рекомендации пациенту">

	 								<input type="submit"
	 									   name="send"
	 									   class="btn btn-success my-3"
	 									   value="Отправить">
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