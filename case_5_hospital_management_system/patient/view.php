<?php

	session_start();

 ?>

<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>СУБ | Пациент - Оплата - Квитация</title>
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
	 				<h4 class="my-2">Пациент | Оплата - Квитанция</h4>
	 				<div class="col-md-12">
	 					<div class="row">
	 						<div class="col-md-3"></div>
	 						<div class="col-md-6">
	 							<?php

	 								if (isset($_GET['id'])) {

	 									$id = $_GET['id'];

	 									$query = "SELECT * FROM income WHERE id='$id'";
	 									$res = mysqli_query($connect,$query);

	 									$row = mysqli_fetch_array($res);

	 								}

	 							?>
	 							<table class="table table-bordered text-center">
	 								<tr>
	 									<th colspan="2">Счёт на оплату</th>
	 								</tr>

	 								<tr>
	 									<td>Доктор</td>
	 									<td><?php echo $row['doctor']; ?></td>
	 								</tr>

	 								<tr>
	 									<td>Пациент</td>
	 									<td><?php echo $row['patient']; ?></td>
	 								</tr>

	 								<tr>
	 									<td>Дата выписки</td>
	 									<td><?php echo $row['date_discharge']; ?></td>
	 								</tr>

	 								<tr>
	 									<td>Стоимость</td>
	 									<td><?php echo $row['amount_paid']; ?> ₽</td>
	 								</tr>

	 								<tr>
	 									<td>Рекомендации</td>
	 									<td><?php echo $row['description']; ?></td>
	 								</tr>
	 							</table>
	 						</div>
	 						<div class="col-md-3"></div>
	 					</div>
	 				</div>
	 			</div>
			</div>
		</div>
	</div>

</body>
</html>