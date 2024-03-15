<?php

	session_start();

 ?>

<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>СУБ | Доктор - Пациенты - Информация</title>
</head>
<body>

	<?php

		include("../include/header.php");
		include("../include/connection.php");

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
	 				<h4 class="my-2">Доктор | Пациенты - Информация</h4>
	 				<?php

	 					if (isset($_GET['id'])) {

	 						$id = $_GET['id'];

	 						$query = "SELECT * FROM patients WHERE id='$id'";
	 						$res = mysqli_query($connect,$query);

	 						$row = mysqli_fetch_array($res);
	 					}

	 				?>

	 				<div class="col-md-12">
	 					<div class="row">
	 						<div class="col-md-3"></div>
	 						<div class="col-md-6">
	 							<?php
	 								echo "<img src='../patient/img/".$row['profile']."' class='col-md-12 my-2' height='250px;'>";
	 							?>

	 							<table class="table table-bordered text-center">
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
										<td>Дата Регистрации</td>
										<td><?php echo $row['data_reg']; ?></td>
									</tr>
								</table>

	 						</div>
	 					</div>
	 				</div>

	 			</div>
			</div>
		</div>
	</div>

</body>
</html>